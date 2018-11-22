<?
/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CUserTypeManager $USER_FIELD_MANAGER
 * @var array $arParams
 * @var CBitrixComponent $this
 */
use Bitrix\Main\IO\File;
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

$this->setFrameMode(false);

$arResult = array();

global $USER_FIELD_MANAGER;

if(is_array($arParams['IBLOCK_ID'])){
	$iBlock_id = $arParams['IBLOCK_ID'];
}
$iBlock_type = $arParams['IBLOCK_TYPE'];


$strError = '';

if($_SERVER["REQUEST_METHOD"]=="POST" && ($_REQUEST["ads_save"] <> '' || $_REQUEST["apply"] <> '') && check_bitrix_sessid())
{
	if($name = trim(strip_tags($_REQUEST['name']))){
		$arResult['NAME'] = $name;
	}
	if($iblock = trim(strip_tags($_REQUEST['iblock']))){
		$arResult['IBLOCK_ID'] = $iblock;
	}
	if($type = trim(strip_tags($_REQUEST['type'][$arResult['IBLOCK_ID']]))){
		$arResult['TYPE'] = $type;
	}
	if($fio = trim(strip_tags($_REQUEST['fio']))){
		$arResult['FIO'] = $fio;
	}
	if($phone = trim(strip_tags($_REQUEST['phone']))){
		$arResult['PHONE'] = $phone;
	}
	if($price = trim(strip_tags($_REQUEST['price']))){
		$arResult['PRICE'] = $price;
	}
	if($description = trim(strip_tags($_REQUEST['description']))){
		$arResult['PREVIEW_TEXT'] = $description;
	}

	$arFile = $_FILES['file'];
	$is_image = CFile::IsImage($arFile['name'], $arFile["type"]);
	if($is_image){
		$arResult['IMAGES'] = $arFile;
	}else{
		$id_new_image = CFile::CopyFile((int)$_REQUEST['image'],false,'buffering/'.$_REQUEST['image'].'.jpg');
		$arResult['IMAGES'] = CFile::MakeFileArray($id_new_image);
	}

	foreach($_REQUEST['options_value'][$arResult['IBLOCK_ID']][$arResult['TYPE']] as $key => $option){
		if($option){
			$prefix = $_REQUEST['prefix'][$arResult['IBLOCK_ID']][$arResult['TYPE']][$key];
			$arResult['OPTIONS'][$key]["VALUE"] = trim(strip_tags($option)).$prefix;
			$arResult['OPTIONS'][$key]["DESCRIPTION"] = trim(strip_tags($_REQUEST['options_name'][$arResult['IBLOCK_ID']][$arResult['TYPE']][$key]));
		}
	}

	if($region = trim(strip_tags($_REQUEST['region']))){
		$arResult['REGION'] = $region;
	}


	if($arCity = $_REQUEST['city']){
		$arCityId = array();
		foreach($arCity as $city){
			if($city){
				$arCityId[] = $this->getSectionIDByName($arResult['IBLOCK_ID'],$city);
			}
		}
		$arResult['IBLOCK_SECTION_NAME'] = implode(', ',$arCity);
		$arResult['IBLOCK_SECTION_ID'] = $arCityId;
	}

	$arResult['RENTAL_INFO'] = array(
		array("VALUE" => $arResult['PRICE'],"DESCRIPTION" => "coins"),
		array("VALUE" => $arResult['PHONE'],"DESCRIPTION" => "phone"),
		array("VALUE" => $arResult['FIO'],"DESCRIPTION" => "man-user"),
		array("VALUE" => $arResult['IBLOCK_SECTION_NAME'],"DESCRIPTION" => "pin"),
		array("VALUE" => $arResult['REGION'],"DESCRIPTION" => "location")
	);

	$arResult['CODE'] = md5($arResult['NAME'].$arResult['PHONE'].$USER->GetID());

	$el = new CIBlockElement;

	$PROP = array();
	$PROP['TYPE'] = Array("VALUE" => $arResult['TYPE']);
	$PROP['OPTIONS'] = $arResult['OPTIONS'];
	$PROP['RENTAL_INFO'] = $arResult['RENTAL_INFO'];

	$arLoadProductArray = Array(
		"MODIFIED_BY" => $USER->GetID(), // элемент изменен текущим пользователем
		"CODE" => $arResult['CODE'],
		"IBLOCK_SECTION" => $arResult['IBLOCK_SECTION_ID'],          // элемент лежит в корне раздела
		"IBLOCK_ID"      => $arResult['IBLOCK_ID'],
		"PROPERTY_VALUES" => $PROP,
		"NAME"           => $arResult['NAME'],
		"ACTIVE"         => "N",            // активен
		"PREVIEW_TEXT"   => $arResult['PREVIEW_TEXT'],
		"PREVIEW_PICTURE" => $arResult['IMAGES']
	);

	if(is_numeric($_REQUEST['ID']) && ($_REQUEST['IBLOCK_ID'] == $arResult['IBLOCK_ID'])){
		$id_element = (int)$_REQUEST['ID'];
		$res = $el->Update($id_element, $arLoadProductArray);
		if(!$res){
			echo "Error: ".$el->LAST_ERROR;
		}else{
			LocalRedirect("/personal/");
		}
	}else{
		if(is_numeric($_REQUEST['ID']) && (int)$_REQUEST['ID'] > 0){
			CIBlockElement::Delete((int)$_REQUEST['ID']);
		}

		if($PRODUCT_ID = $el->Add($arLoadProductArray)){
			if(file_exists($_SERVER['DOCUMENT_ROOT'].$id_new_image)){
				File::deleteFile($_SERVER['DOCUMENT_ROOT'].$id_new_image);
			}
			LocalRedirect("/personal/");
		}
		else
			echo "Error: ".$el->LAST_ERROR;
	}
}

$arResult["FORM_TARGET"] = $APPLICATION->GetCurPage();
$arResult["BX_SESSION_CHECK"] = bitrix_sessid_post();

//Получение ИБ
$this->setIBlock($iBlock_id,$iBlock_type);
$this->getCategoryService();
$iBlock = $this->getIBlockResult();
if($iBlock){
	$arResult['IBLOCK'] = $iBlock;
}

//Получение Справочников ИБ
foreach($iBlock_id as $id){
	$arResult['HIGHLOAD_IBLOCK'][$id] = $this->getHighloadblock($id);
}
//Получение городов
$location = new IPGeoBase();
$city = $location->getCity();
ksort($city);
if($city){
	$arResult['LOCATIONS'] = $city;
}



$arSelect = Array("ID", "IBLOCK_ID","ACTIVE", "NAME","PREVIEW_PICTURE","PREVIEW_TEXT", "TIMESTAMP_X","DATE_CREATE","PROPERTY_*");
$arFilter = Array("IBLOCK_ID" => $iBlock_id,"IBLOCK_TYPE" => $iBlock_type,"MODIFIED_BY" => $USER->GetID());
if($arParams['ELEMENT_CODE']){
	$arFilter['ID'] = $arParams['ELEMENT_CODE'];
}
$res = CIBlockElement::GetList(Array("desc" => "timestamp_x"), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement()){
	$arFields = $ob->GetFields();
	$arProps = $ob->GetProperties();
	$arResult["ITEMS"][$arFields["ID"]] = $arFields;
	$arResult["ITEMS"][$arFields["ID"]]["PROPERTIES"] = $arProps;
}

$this->IncludeComponentTemplate();
