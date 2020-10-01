<?php
define("NO_KEEP_STATISTIC", true); // Не собираем стату по действиям AJAX
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?>

<?$APPLICATION->IncludeComponent(
    "kargo:banner",
    "",
    [
        "IBLOCK_ID" => ["1","2","3","6","7","8","9","10"],
        "IBLOCK_TYPE" => "content",
    ]
);?>
