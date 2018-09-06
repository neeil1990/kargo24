<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php" ) ;
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/section.city/include.php");
IncludeModuleLangFile(__FILE__);

$main = new CreateSection();
if($_REQUEST['id'])
    print json_encode($main->getSection($_REQUEST['id']));

