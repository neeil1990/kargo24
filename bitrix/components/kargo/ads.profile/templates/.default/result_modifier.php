<?php
if(isset($arResult['ITEMS'][$arParams['ELEMENT_CODE']])){
    $arResult['ITEMS'] = $arResult['ITEMS'][$arParams['ELEMENT_CODE']];
}

if($arParams['IBLOCK_ID']){
    foreach($arParams['IBLOCK_ID'] as $iblock){
        $arParams['OPTIONS_IBLOCK_ID'][$iblock] = $arParams["OPTIONS_IBLOCK_".$iblock];
    }
}



if($region = $arResult['ITEMS']['PROPERTIES']['RENTAL_INFO']['VALUE'][array_flip(($arResult['ITEMS']['PROPERTIES']['RENTAL_INFO']['DESCRIPTION']))['location']]){
    $arResult['ITEMS']['REGION'] = $region;
}

if($strCity = $arResult['ITEMS']['PROPERTIES']['RENTAL_INFO']['VALUE'][array_flip(($arResult['ITEMS']['PROPERTIES']['RENTAL_INFO']['DESCRIPTION']))['pin']]){
    $arResult['ITEMS']['CITY'] = $strCity;
}

$arResult['ITEMS']['PROPERTIES']['OPTIONS']['VALUE'] = array_combine($arResult['ITEMS']['PROPERTIES']['OPTIONS']['DESCRIPTION'], $arResult['ITEMS']['PROPERTIES']['OPTIONS']['VALUE']);
