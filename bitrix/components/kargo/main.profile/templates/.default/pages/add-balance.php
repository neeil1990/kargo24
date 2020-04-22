<?php
$APPLICATION->IncludeComponent(
	"kargo:ads.pay",
	"",
	Array(
		"IBLOCK_ID" => array(""),
		"IBLOCK_TYPE" => "content",
		"BALANCE" => $arResult["BALANCE"],
		"BONUS" => $arResult["BONUS"]
	)
);?>
