<?php
define("NO_KEEP_STATISTIC", true); // Не собираем стату по действиям AJAX
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");

global $USER;
if($element = CIBlockElement::GetByID($_REQUEST['id'])->GetNext())
    if($element['CREATED_BY'] == $USER->GetID()){

        if(is_numeric($_REQUEST['id']) && (int)$_REQUEST['id'] > 0){
            if(CIBlockElement::Delete((int)$_REQUEST['id'])){
                return print json_encode(array("status" => true));
            }
        }
    }else{
        return print json_encode(array("status" => false));
    }


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>
