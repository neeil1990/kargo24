<?php
define("NO_KEEP_STATISTIC", true); // Не собираем стату по действиям AJAX
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$arResult = array();
CModule::IncludeModule("iblock");
global $USER;

$elem_id = strip_tags($_REQUEST['elem_id']);
$id = strip_tags($_REQUEST['id']);
$arIds = explode(";",$id);
$IBLOCK_ID = $arIds[0];
$PROP_VALUE_ID = $arIds[1];

$rsUser = CUser::GetByID($USER->GetID());
$arUser = $rsUser->Fetch();
$balance = (int)$arUser["UF_BALANCE"];
if($balance > 0){

    if($IBLOCK_ID && $PROP_VALUE_ID && $elem_id){

        $property_enums = CIBlockPropertyEnum::GetList(false, Array("IBLOCK_ID" => $IBLOCK_ID, "CODE" => "TARIFF", "ID" => $PROP_VALUE_ID));
        if($enum_fields = $property_enums->GetNext())
        {
            if($percent = addPrecent($IBLOCK_ID,$elem_id,(int)$enum_fields['XML_ID']))
                (int)$enum_fields['XML_ID'] = $percent;

            if($balance >= (int)$enum_fields['XML_ID']){
                $balance -= (int)$enum_fields['XML_ID'];
                $user = new CUser;
                $fields = Array(
                    "UF_BALANCE" => $balance,
                );
                $user->Update($USER->GetID(), $fields);

                CIBlockElement::SetPropertyValuesEx($elem_id, $IBLOCK_ID, array("TARIFF" => array("VALUE" => $PROP_VALUE_ID)));

                $arEventFields = array(
                    "LOGIN" => $arUser["LOGIN"],
                    "NAME_USER" => $arUser["NAME"],
                    "LAST_NAME_USER" => $arUser["LAST_NAME"],
                    "LINK_ADS" => "/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=$IBLOCK_ID&type=content&ID=$elem_id&lang=ru",
                );
                CEvent::Send("ADS_MOD", SITE_ID, $arEventFields);

            }else{
                $arResult['ERROR'] = "Недостаточно средств пополните персональный баланс";
            }
        }
    }else{
        $arResult['ERROR'] = "Ошибка данных";
    }

}else{
    $arResult['ERROR'] = "Пополните баланс";
}

if(!$arResult['ERROR']){
    $arResult['RESPONSE'] = "Объявление оплачено и отправлено на модерацию";
}

return print json_encode($arResult);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>