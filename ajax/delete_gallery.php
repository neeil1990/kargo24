<?php
define("NO_KEEP_STATISTIC", true); // Не собираем стату по действиям AJAX
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(CModule::IncludeModule("iblock")){
    $ELEMENT_ID = strip_tags($_POST['ELEMENT_ID']);
    $ID = strip_tags($_POST['ID']);
    $arFile["MODULE_ID"] = "iblock";
    $arFile["del"] = "Y";

    if(CIBlockElement::SetPropertyValueCode($ELEMENT_ID, "GALLERY", Array ($ID => Array("VALUE" => $arFile))))
        return print json_encode(array('status' => true));
    else
        return print json_encode(array('status' => false));
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>