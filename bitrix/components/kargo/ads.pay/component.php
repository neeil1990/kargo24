<?php
global $USER;
$arResult["USER_ID"] = intval($USER->GetID());

$this->IncludeComponentTemplate();
