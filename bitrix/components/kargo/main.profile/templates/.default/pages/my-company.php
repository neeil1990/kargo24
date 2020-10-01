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
    "kargo:main.company",
    "",
    [
        'USER' => $arResult['arUser'],
        "IBLOCK_ID_ADS" => ["1","2","3","6","7","8","9","10"],
        'IBLOCK_ID' => '23'
    ]
);?>
