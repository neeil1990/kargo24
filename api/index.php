<?php
define("NO_KEEP_STATISTIC", true); // Не собираем стату по действиям AJAX
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");

$module = ucfirst($_REQUEST['module']);
include_once 'Classes/'.$module.'.php';
(new $module($_REQUEST))->init();

