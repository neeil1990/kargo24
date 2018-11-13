<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
?>

<?$APPLICATION->IncludeComponent(
    "kargo:ads.profile",
    ".main",
    Array(
        "IBLOCK_ID" => array("1","2","9","10","3","6","7"),
        "IBLOCK_TYPE" => "content",
        "OPTIONS_IBLOCK_ID" => array(
            1 => array(
                "Марка грузовика:",
                "Основаня специализация:",
                "Режим работы:",
                "Объём кузова:",
                "Тип кузова:",
                "Высота кузова:",
                "Ширина кузова:",
                "Длина кузова:",
                "Грузоподъемность кузова:",
            ),
            7 => array(
                "Расстояние:",
                "Количество пасажиров:",
                "Время:",
                "Место:",
                "Водитель:",
            )
        )
    )
);?>
