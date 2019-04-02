<?php
$count_el = ceil(count($arResult['ITEMS'])/6);
$arResult['COUNT'] = $count_el;
$arResult['ITEMS'] = array_chunk($arResult['ITEMS'], $arResult['COUNT'],true);
