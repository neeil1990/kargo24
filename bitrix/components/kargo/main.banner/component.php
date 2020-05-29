<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");
CModule::IncludeModule('highloadblock');

if(isset($arParams['USER']['ID']) && $arParams['USER']['ID'])
    $arFilter = Array("IBLOCK_ID" => IntVal($arParams['IBLOCK_ID']), "CREATED_BY" => $arParams['USER']['ID']);
else{
    if($arParams['FILTER']){
        $arFilter = $arParams['FILTER'];
    }else
        exit();
}

$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "ACTIVE", "ACTIVE_FROM", "ACTIVE_TO", "PREVIEW_PICTURE", "PROPERTY_*");
$element = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while($ob = $element->GetNextElement()){
    $arFields = $ob->GetFields();
    $arProps = $ob->GetProperties();

    $arFields['PROPERTIES'] = $arProps;

    $arFields['ACTIVE_FROM'] = $DB->FormatDate($arFields['ACTIVE_FROM'], "DD.MM.YYYY HH:MI:SS", "DD.MM.YYYY");
    $arFields['ACTIVE_TO'] = $DB->FormatDate($arFields['ACTIVE_TO'], "DD.MM.YYYY HH:MI:SS", "DD.MM.YYYY");

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
    $arResult['ITEMS'][$arFields['ID']] = $arFields;
}


$this->IncludeComponentTemplate();



