<?php
define("NO_KEEP_STATISTIC", true); // Не собираем стату по действиям AJAX
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");

$arResult = array();

$arEventFields = array(
    "NAME" => $_REQUEST['name'],
    "PHONE" => $_REQUEST['phone'],
    "EMAIL" => $_REQUEST['email'],
    "DESC" => $_REQUEST['desc'],
    "LINK" => "/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=$_REQUEST[IBLOCK_ID]&type=content&ID=$_REQUEST[ID]&lang=ru",
);
if(CEvent::Send("COMPLAIN_FORM", SITE_ID, $arEventFields)){
    $arResult['STATUS'] = true;
}else{
    $arResult['STATUS'] = false;
}

return print json_encode($arResult);
?>
