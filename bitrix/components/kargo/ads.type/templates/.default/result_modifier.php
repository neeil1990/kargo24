<?php

$res = CIBlock::GetByID($arParams['IBLOCK_ID']);
if($ar_res = $res->GetNext())
    $arResult['IBLOCK_FOLDER'] = $ar_res['CODE'];