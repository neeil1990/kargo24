<?php
$arResult['IN_VOICE_ID'] = "a12fdaab-4942-4fe9-a6b0-3192332c5b24";
$arResult['NOTICE'] = sha1(time());
$arResult['PAYMENT_NUMBER'] = time();
$arResult['LOGIN'] = "api@mail.ru";
$arResult['PASSWORD'] = "237e5aaddc582c6acfabca3d55372d23";

$arHash = array($arResult['LOGIN'],$arResult['PASSWORD'],$arResult['NOTICE'],$arResult['PAYMENT_NUMBER'],$arResult['IN_VOICE_ID']);
$arResult['HASH'] = base64_encode(sha1(implode(";",$arHash), true));

$this->IncludeComponentTemplate();