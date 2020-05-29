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
    "kargo:banner",
    "",
    [
        "ELEMENT_CODE" => $arResult["ELEMENT_CODE"],
        "IBLOCK_ID_ADS" => ["1","2","3","6","7","8","9","10"],
        "IBLOCK_ID" => "22",
        "IBLOCK_TYPE" => "content",
        "PHONE" => $arResult['arUser']['UF_PHONES'][0],
        "NAME" => $arResult['arUser']['NAME'].' '.$arResult['arUser']['LAST_NAME']
    ]
);?>

