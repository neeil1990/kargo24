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
	if($description = trim(strip_tags($_REQUEST['description']))){
		$arResult['PREVIEW_TEXT'] = $description;
	}

	$arFile = $_FILES['file'];
	$is_image = CFile::IsImage($arFile['name'], $arFile["type"]);
	if($is_image){
		$arResult['IMAGES'] = $arFile;
	}else{
		if($_REQUEST['image']){
			$id_new_image = CFile::CopyFile((int)$_REQUEST['image'],false,'buffering/'.$_REQUEST['image'].'.jpg');
			$arResult['IMAGES'] = CFile::MakeFileArray($id_new_image);
		}else{
			$photo_bank_path = "/upload/bank/$arResult[IBLOCK_ID]/$arResult[TYPE]/";
			$photo_bank_name = rand(1,5).".jpg";
			if(!file_exists($_SERVER['DOCUMENT_ROOT'].$photo_bank_path)){
				mkdir($_SERVER['DOCUMENT_ROOT'].$photo_bank_path, 0755,true);
			}
			if(file_exists($_SERVER['DOCUMENT_ROOT'].$photo_bank_path.$photo_bank_name)){
				$arResult['IMAGES'] = CFile::MakeFileArray($photo_bank_path.$photo_bank_name);
			}
		}


	}

    $arFileGallery = $_FILES['gallery'];
	if(isset($arFileGallery['name'][0])){
        $is_image_gallery = CFile::IsImage($arFileGallery['name'][0], $arFileGallery["type"][0]);
        if($is_image_gallery){
            $arResult['GALLERY'] = $this->reArrayFiles($arFileGallery);
        }
    }

	foreach($_REQUEST['options_value'][$arResult['IBLOCK_ID']][$arResult['TYPE']] as $key => $option){
		if($option){
			$prefix = $_REQUEST['prefix'][$arResult['IBLOCK_ID']][$arResult['TYPE']][$key];
			$arResult['OPTIONS'][$key]["VALUE"] = trim(strip_tags($option)).$prefix;
			$arResult['OPTIONS'][$key]["DESCRIPTION"] = trim(strip_tags($_REQUEST['options_name'][$arResult['IBLOCK_ID']][$arResult['TYPE']][$key]));
			if(stripos($prefix, "руб") && $arResult['OPTIONS'][$key]["VALUE"]){
				$arResult['PRICE'] = $arResult['OPTIONS'][$key]["VALUE"];
			}
		}
	}

	if($region = trim(strip_tags($_REQUEST['region']))){
        $region = CIBlockSection::GetByID($region)->GetNext();
		$arResult['REGION'] = $region['NAME'];
	}

	if($_REQUEST['city']){
		foreach($_REQUEST['city'] as $city){
            $cityResult = CIBlockSection::GetByID($city)->GetNext();
            $arResult['CITY']['ID'][] = $cityResult['ID'];
            $arResult['CITY']['NAME'][] = $cityResult['NAME'];
        }

		$arResult['IBLOCK_SECTION_NAME'] = implode(', ',$arResult['CITY']['NAME']);
		$arResult['IBLOCK_SECTION_ID'] = $arResult['CITY']['ID'];
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
	$PROP['GALLERY'] = $arResult['GALLERY'];


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
		$db_props = CIBlockElement::GetProperty($_REQUEST['IBLOCK_ID'], (int)$_REQUEST['ID'], array("sort" => "asc"), Array("CODE" => "DATE_SORT"));
		if($ar_props = $db_props->Fetch()){
			$arLoadProductArray["PROPERTY_VALUES"]["DATE_SORT"] = $ar_props["VALUE"];
		}
		$db_props_tarif = CIBlockElement::GetProperty($_REQUEST['IBLOCK_ID'], (int)$_REQUEST['ID'], array("sort" => "asc"), Array("CODE" => "TARIFF"));
		if($ar_props_tarif = $db_props_tarif->Fetch()){
			$arLoadProductArray["PROPERTY_VALUES"]["TARIFF"] = array("VALUE" => $ar_props_tarif['VALUE']);
		}

        if($property_status = CIBlockPropertyEnum::GetList(false, Array("IBLOCK_ID" => $_REQUEST['IBLOCK_ID'], "CODE" => "STATUS", "XML_ID" => "N"))->GetNext())
            $arLoadProductArray["PROPERTY_VALUES"][$property_status['PROPERTY_CODE']] = array("VALUE" => $property_status['ID']);

		$res = $el->Update($id_element, $arLoadProductArray, false, true, true, true);
		if(!$res){
			echo "Error: ".$el->LAST_ERROR;
		}else{
			if($arLoadProductArray["PROPERTY_VALUES"]["TARIFF"]["VALUE"]){

                if($property_status = CIBlockPropertyEnum::GetList(false, Array("IBLOCK_ID" => $arResult['IBLOCK_ID'], "CODE" => "STATUS", "XML_ID" => "M"))->GetNext())
                    CIBlockElement::SetPropertyValuesEx($id_element, $IBLOCK_ID, array($property_status['PROPERTY_CODE'] => array("VALUE" => $property_status['ID'])));

				$arEventFields = array(
					"LINK_ADS" => "/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=$arResult[IBLOCK_ID]&type=content&ID=$id_element&lang=ru",
				);
				CEvent::Send("ADS_MOD_UPDATE", SITE_ID, $arEventFields);
			}

			LocalRedirect("/personal/");
		}
	}else{
		$check_update = false;
		$arLoadProductArray["PROPERTY_VALUES"]["DATE_SORT"] = ConvertTimeStamp(false, "FULL");
		if(is_numeric($_REQUEST['ID']) && (int)$_REQUEST['ID'] > 0){
			$db_props = CIBlockElement::GetProperty($_REQUEST['IBLOCK_ID'], (int)$_REQUEST['ID'], array("sort" => "asc"), Array("CODE" => "DATE_SORT"));
			if($ar_props = $db_props->Fetch()){
				$arLoadProductArray["PROPERTY_VALUES"]["DATE_SORT"] = $ar_props["VALUE"];
			}
			$db_props_tarif = CIBlockElement::GetProperty($_REQUEST['IBLOCK_ID'], (int)$_REQUEST['ID'], array("sort" => "asc"), Array("CODE" => "TARIFF"));
			if($ar_props_tarif = $db_props_tarif->Fetch()){

				$property_enums_tarif_to = CIBlockPropertyEnum::GetList(Array("ID"=>"ASC"), Array("IBLOCK_ID" => $arResult['IBLOCK_ID'], "CODE" => "TARIFF"));
				while($enum_fields_tarif_to = $property_enums_tarif_to->GetNext())
				{
					if($enum_fields_tarif_to["XML_ID"] == $ar_props_tarif['VALUE_XML_ID']){
						$arLoadProductArray["PROPERTY_VALUES"]["TARIFF"] = array("VALUE" => $enum_fields_tarif_to['ID']);
						break;
					}
				}
			}


			$res_elem_from = CIBlockElement::GetByID((int)$_REQUEST['ID']);
			if($ar_elem_from = $res_elem_from->GetNext()){
				$arLoadProductArray["ACTIVE_FROM"] = $ar_elem_from["ACTIVE_FROM"];
				$arLoadProductArray["ACTIVE_TO"] = $ar_elem_from["ACTIVE_TO"];
			}

			if(CIBlockElement::Delete((int)$_REQUEST['ID']) && $arLoadProductArray["PROPERTY_VALUES"]["TARIFF"]["VALUE"]){
				$check_update = true;
			}
		}

        if($property_status = CIBlockPropertyEnum::GetList(false, Array("IBLOCK_ID" => $arResult['IBLOCK_ID'], "CODE" => "STATUS", "XML_ID" => "N"))->GetNext())
            $arLoadProductArray["PROPERTY_VALUES"][$property_status['PROPERTY_CODE']] = array("VALUE" => $property_status['ID']);

		if($PRODUCT_ID = $el->Add($arLoadProductArray, false, true, true)){
			if(file_exists($_SERVER['DOCUMENT_ROOT'].$id_new_image)){
				File::deleteFile($_SERVER['DOCUMENT_ROOT'].$id_new_image);
			}
			if($check_update){
				$arEventFields = array(
					"LINK_ADS" => "/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=$arResult[IBLOCK_ID]&type=content&ID=$PRODUCT_ID&lang=ru",
				);
				CEvent::Send("ADS_MOD_UPDATE", SITE_ID, $arEventFields);
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

$arSelect = Array("ID", "IBLOCK_ID", "DETAIL_PAGE_URL", "ACTIVE", "NAME","PREVIEW_PICTURE","PREVIEW_TEXT", "TIMESTAMP_X","DATE_CREATE", "DATE_ACTIVE_FROM","DATE_ACTIVE_TO","PROPERTY_*");
$arFilter = Array("IBLOCK_ID" => $iBlock_id,"IBLOCK_TYPE" => $iBlock_type,"CREATED_BY" => $USER->GetID());
if($arParams['ELEMENT_CODE']){
	$arFilter['ID'] = $arParams['ELEMENT_CODE'];
}
$res = CIBlockElement::GetList(Array("desc" => "timestamp_x"), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement()){
	$arFields = $ob->GetFields();
	$arProps = $ob->GetProperties();

    $db_old_groups = CIBlockElement::GetElementGroups($arFields['ID'], true);
    while($ar_group = $db_old_groups->Fetch()){
        $arFields['SECTIONS_ID'][] = $ar_group['ID'];
        $arFields['REGION_ID'] = $ar_group['IBLOCK_SECTION_ID'];
    }

    $arFields['SECTIONS'] = implode(',', $arFields['SECTIONS_ID']);

	$arResult["ITEMS"][$arFields["ID"]] = $arFields;
	$arResult["ITEMS"][$arFields["ID"]]["PROPERTIES"] = $arProps;
}

$this->IncludeComponentTemplate();
