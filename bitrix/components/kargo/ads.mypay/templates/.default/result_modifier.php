<?php

foreach($arResult["ITEMS"] as &$arItem){
    $date = explode(" ",$arItem['DATE_CREATE']);
    $arItem['DATE_C'] = $date[0];
    $arItem['TIME_C'] = $date[1];
}

