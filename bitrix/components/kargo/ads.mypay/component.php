<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arParams['IBLOCK_ID'] && $arParams['IBLOCK_TYPE']){

    if (CModule::IncludeModule('iblock')) {

        $arSelect = Array("ID", "IBLOCK_ID","ACTIVE", "NAME","PREVIEW_PICTURE","PREVIEW_TEXT", "TIMESTAMP_X","DATE_CREATE","PROPERTY_*");
        $arFilter = Array("ACTIVE" => "Y", "IBLOCK_ID" => $arParams['IBLOCK_ID'],"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],"CREATED_BY" => $USER->GetID());

        $res = CIBlockElement::GetList(Array("asc" => "id"), $arFilter, false, false, $arSelect);
        while($ob = $res->GetNextElement()){
            $arFields = $ob->GetFields();
            $arProps = $ob->GetProperties();
            $arResult["ITEMS"][$arFields["ID"]] = $arFields;
            $arResult["ITEMS"][$arFields["ID"]]["PROPERTIES"] = $arProps;
        }

    }
}
$this->IncludeComponentTemplate();
?>


