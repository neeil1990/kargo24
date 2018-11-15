<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
    return;

$arTypesEx = CIBlockParameters::GetIBlockTypes();
$arIBlocks = Array();
$db_iblock = CIBlock::GetList(Array("SORT"=>"ASC"), Array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch())
    $arIBlocks[$arRes["ID"]] = "[".$arRes["ID"]."] ".$arRes["NAME"];

$arSorts = Array(
    "ASC" => GetMessage("T_IBLOCK_DESC_ASC"),
    "DESC" => GetMessage("T_IBLOCK_DESC_DESC"),
);

$arSortFields = Array(
    "ID" => GetMessage("T_IBLOCK_DESC_FID"),
    "NAME" => GetMessage("T_IBLOCK_DESC_FNAME"),
    "ACTIVE_FROM" => GetMessage("T_IBLOCK_DESC_FACT"),
    "SORT" => GetMessage("T_IBLOCK_DESC_FSORT"),
    "TIMESTAMP_X" => GetMessage("T_IBLOCK_DESC_FTSAMP")
);


$arComponentParameters = array(
    "GROUPS" => array(
    ),
    "PARAMETERS"  =>  array(
        "ELEMENT_CODE" => array(
            "PARENT" => "BASE",
            "NAME" => "Код элемента (для редактирования не менять!)",
            "TYPE" => "STRING",
            "DEFAULT" => '={$arResult["ELEMENT_CODE"]}',
        ),
        "IBLOCK_TYPE"  =>  Array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("T_IBLOCK_DESC_LIST_TYPE"),
            "TYPE" => "LIST",
            "VALUES" => $arTypesEx,
            "DEFAULT" => "news",
            "REFRESH" => "Y",
        ),
        "IBLOCK_ID"  =>  Array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("T_IBLOCK_DESC_LIST_ID"),
            "TYPE" => "LIST",
            "VALUES" => $arIBlocks,
            "SIZE" => 10,
            "DEFAULT" => '',
            "MULTIPLE" => "Y",
            "REFRESH" => "Y",
        ),
    ),
);

foreach($arCurrentValues['IBLOCK_ID'] as $iblock){
    $arComponentParameters["PARAMETERS"]["OPTIONS_IBLOCK_".$iblock] = array(
        "PARENT" => "BASE",
        "NAME" => "Характеристики для Инфо Блока ".$arIBlocks[$iblock],
        "TYPE" => "STRING",
        "DEFAULT" => "",
        "MULTIPLE" => "Y",
        "ADDITIONAL_VALUES" => "Y"
    );
}

?>
