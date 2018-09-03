<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");

$ip = new IPGeoBase();
$ip->getCityByRegion("");

?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>