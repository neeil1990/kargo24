<?php

foreach ($arResult['ITEMS'] as &$arItem){

    foreach ($arItem['PROPERTIES']['ACTS_BILL']['VALUE'] as $act){
        $arAct = CFile::GetFileArray($act);
        $arItem['PROPERTIES']['ACTS_BILL']['LINK'][] = '<a href="'.$arAct['SRC'].'" target="_blank">'.$arAct['ORIGINAL_NAME'].'</a>';
    }
}



