<?php
define("NO_KEEP_STATISTIC", true); // Не собираем стату по действиям AJAX
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");

$arResult = [];

if($_REQUEST['SELECT_IBLOCK'])
    $arResult['IBLOCK_ID'] = $_REQUEST['SELECT_IBLOCK'];

if($_REQUEST['SECTION_ID'])
    $arResult['SECTION_ID'] = $_REQUEST['SECTION_ID'];

$arResult['COLUMN'] = ($_REQUEST['COLUMN']) ?: 3;

//Получение городов
$items = GetIBlockSectionList($arResult['IBLOCK_ID'], false, Array("NAME" => "asc"),false, array("DEPTH_LEVEL" => 1));
while($arItem = $items->GetNext())
    $arResult['LOCATIONS'][] = ['ID' => $arItem['ID'], 'NAME' => $arItem['NAME']];


if($arResult['SECTION_ID']){

    $items = GetIBlockSectionList($arResult['IBLOCK_ID'], $arResult['SECTION_ID'], Array("NAME" => "asc"),false, []);
    while($arItem = $items->GetNext())
        $arResult['CITY'][] = ['ID' => $arItem['ID'], 'NAME' => $arItem['NAME']];

    if( $arResult['CITY'] ){

        $arResult['ITEMS_CITIES'] = [];
        foreach( $arResult['CITY'] as $arCity){
            $arResult['ITEMS_CITIES'][substr(mb_strtoupper($arCity['NAME']),0,1)][] = $arCity;
        };
        ksort($arResult['ITEMS_CITIES']);

        $i = 0;
        $arResult['CITY_SLICE'] = [];
        foreach($arResult['ITEMS_CITIES'] as $sign => $c){
            $arResult['CITY_SLICE'][$i][$sign] = $c;

            $i++;
            if($i > $arResult['COLUMN'])
                $i = 0;
        }
        $arCitySize = count($arResult['CITY_SLICE']);
        $arCityRequest = (explode(",", $_REQUEST['SECTION_SELECTED']));

        ob_start();
        ?>
        <div class="category-unified-column">
            <? for($i = 0; $i < $arCitySize; $i++):?>
                <div class="inner-column">
                    <? foreach($arResult['CITY_SLICE'][$i] as $letter => $arCity): ?>
                        <h4 class="category-letter"><?=$letter?></h4>
                        <ul class="category-unified-list">
                            <? foreach($arCity as $city):?>
                                <li>
                                    <label class="wrapper-checkbox">
                                        <input
                                                value="<?=$city['ID']?>"
                                                type="checkbox"
                                                name="city[]"
                                            <?=(in_array($city['ID'],$arCityRequest)) ? "checked" : ""?>
                                        >
                                        <span class="text">
                                        <?=$city['NAME']?>
                                    </span>
                                    </label>
                                </li>
                            <? endforeach; ?>
                        </ul>
                    <? endforeach; ?>
                </div>
            <? endfor; ?>
        </div>
        <?
        $arResult['HTML'] = ob_get_contents();

        ob_end_clean();
    }
}

return print json_encode($arResult);
?>
