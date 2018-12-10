<?php
define("NO_KEEP_STATISTIC", true); // Не собираем стату по действиям AJAX
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");
global $USER;
$IBLOCK_ID = 19;
$pay_number = strip_tags($_REQUEST['pay_number']);
$arSelect = Array("ID", "NAME");
$arFilter = Array("IBLOCK_ID" => IntVal($IBLOCK_ID),"MODIFIED_BY" => $USER->GetID(),"PROPERTY_PAY_NUMBER" => $pay_number);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
if(!$res->result->num_rows)
{
    $el = new CIBlockElement;
    $PROP = array();
    $PROP["PAY_NUMBER"] = $pay_number;
    $arLoadProductArray = Array(
        "MODIFIED_BY"    => $USER->GetID(),
        "IBLOCK_SECTION_ID" => false,
        "IBLOCK_ID"      => $IBLOCK_ID,
        "PROPERTY_VALUES"=> $PROP,
        "NAME"           => $pay_number,
        "ACTIVE"         => "N",
    );
    $el->Add($arLoadProductArray);
}
?>


<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>