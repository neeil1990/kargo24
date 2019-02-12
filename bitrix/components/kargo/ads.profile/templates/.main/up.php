<?php
define("NO_KEEP_STATISTIC", true); // Не собираем стату по действиям AJAX
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");
global $USER;
$price = (int)UP_ADS_PAY;

if(is_numeric($_REQUEST['id']) && (int)$_REQUEST['id'] > 0){

    $rsUser = CUser::GetByID($USER->GetID());
    $arUser = $rsUser->Fetch();
    $balance = (int)$arUser["UF_BALANCE"];
    if($balance > 0){
        if($percent = addPrecent($_REQUEST['ib'],$_REQUEST['id'],$price))
            $price = $percent;

        if($balance >= $price){
            $balance -= $price;
            $user = new CUser;
            $fields = Array(
                "UF_BALANCE" => $balance,
            );
            $user->Update($USER->GetID(), $fields);
            CIBlockElement::SetPropertyValuesEx($_REQUEST['id'], $_REQUEST['ib'], array("DATE_SORT" => ConvertTimeStamp(false, "FULL")));
            return print json_encode(array("status" => true));
        }else{
            return print json_encode(array("status" => false));
        }
    }
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>