<?php

$res = CIBlock::GetByID($arParams['IBLOCK_ID']);
if($ar_res = $res->GetNext())
    $arResult['IBLOCK'] = $ar_res;