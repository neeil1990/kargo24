<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");

CModule::IncludeModule("iblock");

?><?$APPLICATION->IncludeComponent(
	"bitrix:b24connector.openline.info",
	"",
	Array(
		"DATA" => "",
		"GA_MARK" => ""
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>