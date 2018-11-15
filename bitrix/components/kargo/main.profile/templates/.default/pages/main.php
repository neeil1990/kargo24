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
        "ELEMENT_CODE" => $arResult["ELEMENT_CODE"],
        "IBLOCK_ID" => array("1","2","3","6","7","8","9","10"),
        "IBLOCK_TYPE" => "content",
    )
);?>

