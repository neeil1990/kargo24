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
    "kargo:main.banner",
    "",
    [
        'USER' => $arResult['arUser'],
        'IBLOCK_ID' => '22'
    ]
);?>

