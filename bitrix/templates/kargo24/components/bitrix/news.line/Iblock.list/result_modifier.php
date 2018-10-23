<?php

$arResult = array();

if (CModule::IncludeModule("iblock")):

$res = CIBlock::GetList(
    Array(),
    Array(
        'TYPE' => $arParams['IBLOCK_TYPE'],
        'SITE_ID' => SITE_ID,
        'ACTIVE' => 'Y',
        'ID' => $arParams['IBLOCKS']
    ), true
);
while($ar_res = $res->Fetch())
{
    $arResult["ITEMS"][$ar_res[ID]] = $ar_res;
    $arResult["ITEMS"][$ar_res[ID]]['PICTURE'] = CFile::GetPath($ar_res['PICTURE']);
}

endif;