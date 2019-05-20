<?php
if(isset($arResult['ITEMS'][$_REQUEST['BILL_ID']]))
    $arResult = $arResult['ITEMS'][$_REQUEST['BILL_ID']];
else
    $arResult = "";


$date = explode(' ', $arResult['DATE_CREATE'],2);
$arResult['DATE'] = $date[0];
$arResult['CLOCK'] = $date[1];

