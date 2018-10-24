<?php

$APPLICATION->IncludeComponent("kargo:ads.type", "ads.type", Array(
    "IBLOCK_ID" => $arParams["IBLOCK_ID"],	// Инфоблок
    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],	// Тип инфоблока
    "SORT" => "NAME",	// Порядок сортировки тегов
    "TYPE" => $_REQUEST['TYPE']
),
    false
);