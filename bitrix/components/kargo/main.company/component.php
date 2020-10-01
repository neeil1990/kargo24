<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");
CModule::IncludeModule('highloadblock');


$arFilter = Array("IBLOCK_ID" => IntVal($arParams['IBLOCK_ID']), "CREATED_BY" => $arParams['USER']['ID']);
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "CREATED_DATE", "ACTIVE", "DETAIL_TEXT", "PREVIEW_PICTURE", "PROPERTY_*");
$element = CIBlockElement::GetList([], $arFilter, false, ["nTopCount" => 1], $arSelect);
if($ob = $element->GetNextElement()){
    $arFields = $ob->GetFields();
    $arProps = $ob->GetProperties();

    $arFields['PROPERTIES'] = $arProps;

    $arFields['CREATED_DATE'] = $DB->FormatDate($arFields['CREATED_DATE'], "YYYY.MM.DD", "DD.MM.YYYY");

    if($arFields['PROPERTIES']['SECTION_ID']['VALUE'])
        $section = CIBlockSection::GetByID($arFields['PROPERTIES']['SECTION_ID']['VALUE'])->GetNext();


    $res = CIBlockProperty::GetByID("TYPE", $arFields['PROPERTIES']['IBLOCK_ID']['VALUE'], 'content');
    if($ar_res = $res->GetNext())
        $HighloadblockId = (int)str_replace("b_hlbd_h","",$ar_res['USER_TYPE_SETTINGS']['TABLE_NAME']);

    $hldata = Bitrix\Highloadblock\HighloadBlockTable::getById($HighloadblockId)->fetch();
    $hlentity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hldata);
    $hlDataClass = $hldata['NAME'].'Table';

    $result = $hlDataClass::getList([
        'select' => array('*'),
        'filter' => array('UF_XML_ID' => $arFields['PROPERTIES']['TYPE_XML_ID']['VALUE'])
    ]);
    if($highload = $result->Fetch())
        $arFields['TITLE'] = $highload['UF_NAME'];

    $arFields['CITY'] = $section['NAME'];

    $res = CIBlock::GetList([], ['ID' => $arParams['IBLOCK_ID_ADS'], 'SITE_ID' => SITE_ID, 'ACTIVE' => 'Y',], true);
    $arFields['ADS_CNT'] = $res->SelectedRowsCount();

    $arResult = $arFields;
}

$this->IncludeComponentTemplate();



