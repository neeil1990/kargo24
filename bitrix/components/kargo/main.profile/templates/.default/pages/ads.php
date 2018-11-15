<?php
$APPLICATION->IncludeComponent(
    "kargo:ads.profile",
    "",
    Array(
        "ELEMENT_CODE" => $arResult["ELEMENT_CODE"],
        "IBLOCK_ID" => array("1","2","3","6","7","8","9","10"),
        "IBLOCK_TYPE" => "content",
        "OPTIONS_IBLOCK_1" => array("Аренда хар"),
        "OPTIONS_IBLOCK_10" => array("Запчасти и ремонт хар"),
        "OPTIONS_IBLOCK_2" => array("Грузовые хар"),
        "OPTIONS_IBLOCK_3" => array("строительного хар"),
        "OPTIONS_IBLOCK_6" => array("Сопутствующие хар"),
        "OPTIONS_IBLOCK_7" => array("Пассажирские хар"),
        "OPTIONS_IBLOCK_8" => array("материалы с доставкой хар"),
        "OPTIONS_IBLOCK_9" => array("спецтехники хар")
    )
);?>