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
    "LINK" => ($_REQUEST['ID']) ? "/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=$_REQUEST[IBLOCK_ID]&type=content&ID=$_REQUEST[ID]&lang=ru" : null,
);

if($_REQUEST['g-recaptcha-response'] && $_REQUEST['ID']){

	$recaptcha = $_REQUEST['g-recaptcha-response'];
    $google_url = "https://www.google.com/recaptcha/api/siteverify";
    $secret = '6LfwPakZAAAAANjtFRSGMa1fRL6Y16EkYlQrLR9A';
    $ip = $_SERVER['REMOTE_ADDR'];
    $url = $google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
    $res = file_get_contents($url, true);
    $res = json_decode($res, true);

    if(!$res['success']){
        $arResult['STATUS'] = false;
    }else{
        if(CEvent::Send("COMPLAIN_FORM", SITE_ID, $arEventFields)){
            $arResult['STATUS'] = true;
        }else{
            $arResult['STATUS'] = false;
        }
    }
}else
    $arResult['STATUS'] = false;

return print json_encode($arResult);
?>
