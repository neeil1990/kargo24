<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");

if(is_array($arParams['IBLOCK_ID_ADS'])){
    $iBlock_id = $arParams['IBLOCK_ID_ADS'];
}
$iBlock_type = $arParams['IBLOCK_TYPE'];

global $USER;
if($_SERVER["REQUEST_METHOD"] == "POST" && ($_REQUEST["banner_save"] <> '' || $_REQUEST["apply"] <> '') && check_bitrix_sessid())
{
    $el = new CIBlockElement;

    $arLoadProductArray = Array(
        'MODIFIED_BY' => $USER->GetID(),
        'IBLOCK_SECTION_ID' => false,
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'PROPERTY_VALUES' => $_REQUEST,
        'NAME' => $_REQUEST['NAME'],
        'ACTIVE' => 'N',
        'PREVIEW_PICTURE' => $arResult['IMAGES']
    );

    $arFile = $_FILES['file'];
    $is_image = CFile::IsImage($arFile['name'], $arFile["type"]);
    if($is_image)
        $arLoadProductArray['PREVIEW_PICTURE'] = $arFile;

    if($property_status = CIBlockPropertyEnum::GetList(false, Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "CODE" => "STATUS", "XML_ID" => "N"))->GetNext())
        $arLoadProductArray["PROPERTY_VALUES"][$property_status['PROPERTY_CODE']] = array("VALUE" => $property_status['ID']);


    if(!CIBlockElement::GetByID($arParams['ELEMENT_CODE'])->SelectedRowsCount()){

        if($PRODUCT_ID = $el->Add($arLoadProductArray)) {
            echo 'New ID: '.$PRODUCT_ID;
        } else {
            echo 'Error: '.$el->LAST_ERROR;
        }
    }else{

        if($props_tarif = CIBlockElement::GetProperty($arParams['IBLOCK_ID'], (int)$arParams['ELEMENT_CODE'], array("sort" => "asc"), Array("CODE" => "TARIFF"))->Fetch())
            $arLoadProductArray["PROPERTY_VALUES"]["TARIFF"] = array("VALUE" => $props_tarif['VALUE']);

        if($arLoadProductArray['PROPERTY_VALUES']['TARIFF']['VALUE']){

            if($property_status = CIBlockPropertyEnum::GetList(false, Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "CODE" => "STATUS", "XML_ID" => "M"))->GetNext())
                $arLoadProductArray["PROPERTY_VALUES"][$property_status['PROPERTY_CODE']] = array("VALUE" => $property_status['ID']);

            $arEventFields = array(
                "LINK_ADS" => "/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=$arLoadProductArray[IBLOCK_ID]&type=content&ID=$arParams[ELEMENT_CODE]&lang=ru",
            );
            CEvent::Send("BANNER_MOD_UPDATE", SITE_ID, $arEventFields);
        }

        $el->Update($arParams['ELEMENT_CODE'], $arLoadProductArray);
    }

    LocalRedirect("/personal/my-banners/");
}

if($elementExist = CIBlockElement::GetByID($arParams['ELEMENT_CODE'])->GetNext()){

    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE","PROPERTY_*");
    $arFilter = Array("IBLOCK_ID" => $elementExist['IBLOCK_ID'], "ID" => $elementExist['ID'], "CREATED_BY" => $USER->GetID());
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    if($ob = $res->GetNextElement()){
        $arFields = $ob->GetFields();
        $arProps = $ob->GetProperties();

        if(!$_REQUEST['SELECT_IBLOCK']){
            $_REQUEST['SELECT_IBLOCK'] = $arProps['IBLOCK_ID']['VALUE'];
            $arResult['TYPE_XML_ID'] = $arProps['TYPE_XML_ID']['VALUE'];
            $arResult['SECTION_ID'] = $arProps['SECTION_ID']['VALUE'];
        }
        $arResult['STATUS'] = $arProps['STATUS']['VALUE_XML_ID'];
        $arResult['PRICE'] = $arProps['PRICE']['VALUE'];
        $arResult['PHONE'] = $arProps['PHONE']['VALUE'];
        $arResult['NAME'] = $arProps['NAME']['VALUE'];
        $arResult['PREVIEW_PICTURE'] = CFile::GetPath($arFields['PREVIEW_PICTURE']);
    }

}

$arResult['IBLOCK_ID_SELECTED'] = ($_REQUEST['SELECT_IBLOCK']) ?: 1;

$res = CIBlock::GetList([], ['ID' => $iBlock_id, 'TYPE' => $iBlock_type, 'SITE_ID' => SITE_ID, 'ACTIVE' => 'Y',], true);
$this->iBlock_result = array();
while($ar_res = $res->Fetch())
{
    $arResult['IBLOCK'][$ar_res['ID']] = $ar_res['NAME'];
}

if($arResult['IBLOCK_ID_SELECTED']){

    $res = CIBlockProperty::GetByID("TYPE", $arResult['IBLOCK_ID_SELECTED'], $iBlock_type);
    if($ar_res = $res->GetNext())
        $HighloadblockId = (int)str_replace("b_hlbd_h","",$ar_res['USER_TYPE_SETTINGS']['TABLE_NAME']);

    $hldata = Bitrix\Highloadblock\HighloadBlockTable::getById($HighloadblockId)->fetch();
    $hlentity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hldata);
    $hlDataClass = $hldata['NAME'].'Table';
    $result = $hlDataClass::getList();
    while($type = $result->Fetch()){
        $arResult['TYPE'][$type['UF_XML_ID']] = $type['UF_NAME'];
    }

    $items = GetIBlockSectionList($arResult['IBLOCK_ID_SELECTED'], false, Array("name" => "asc"),false, array("DEPTH_LEVEL" => 2));
    while($arItem = $items->GetNext())
    {
        $arResult['CITY'][$arItem['ID']] = $arItem['NAME'];
    }

}

$this->IncludeComponentTemplate();
?>


