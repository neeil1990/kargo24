<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");

if(is_array($arParams['IBLOCK_ID_ADS'])){
    $iBlock_id = $arParams['IBLOCK_ID_ADS'];
}
$iBlock_type = $arParams['IBLOCK_TYPE'];

global $USER;
if($_SERVER["REQUEST_METHOD"] == "POST" && ($_REQUEST["company_save"] <> '' || $_REQUEST["apply"] <> '') && check_bitrix_sessid())
{
    $el = new CIBlockElement;

    $arLoadProductArray = Array(
        'MODIFIED_BY' => $USER->GetID(),
        'IBLOCK_SECTION_ID' => false,
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'PROPERTY_VALUES' => $_REQUEST,
        'NAME' => $_REQUEST['NAME'],
        'ACTIVE' => 'Y',
        'PREVIEW_PICTURE' => $arResult['IMAGES'],
        'DETAIL_TEXT' => $_REQUEST['DETAIL_TEXT']
    );

    $arFile = $_FILES['file'];
    $is_image = CFile::IsImage($arFile['name'], $arFile["type"]);
    if($is_image)
        $arLoadProductArray['PREVIEW_PICTURE'] = $arFile;

    if(!CIBlockElement::GetByID($arParams['ELEMENT_CODE'])->SelectedRowsCount()){

        if($PRODUCT_ID = $el->Add($arLoadProductArray)) {
            echo 'New ID: '.$PRODUCT_ID;
        } else {
            echo 'Error: '.$el->LAST_ERROR;
        }

    }else{

        $el->Update($arParams['ELEMENT_CODE'], $arLoadProductArray);
    }


    LocalRedirect("/personal/my-company/");
}

$element = CIBlockElement::GetList([], ["IBLOCK_ID" => IntVal($arParams['IBLOCK_ID']), "CREATED_BY" => $USER->GetID()], false, false, ["ID", "IBLOCK_ID", "NAME"]);
if($ob = $element->fetch()){

    if(!$arParams['ELEMENT_CODE'])
        LocalRedirect("/personal/company/$ob[ID]/");
}

if($elementExist = CIBlockElement::GetByID($arParams['ELEMENT_CODE'])->GetNext()){

    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_TEXT", "PREVIEW_PICTURE","PROPERTY_*");
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
        $arResult['DETAIL_TEXT'] = $arFields['DETAIL_TEXT'];
        $arResult['PRICE'] = $arProps['PRICE']['VALUE'];
        $arResult['PHONE'] = $arProps['PHONE']['VALUE'];
        $arResult['EMAIL'] = $arProps['EMAIL']['VALUE'];
        $arResult['NAME'] = $arProps['NAME']['VALUE'];
        $arResult['WORK_HOURS'] = $arProps['WORK_HOURS']['VALUE'];
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


