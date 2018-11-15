<?php
define("NO_KEEP_STATISTIC", true); // Не собираем стату по действиям AJAX
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$location = new IPGeoBase();
$city = $location->getCity();
ksort($city);
if($city[$_REQUEST['region']]){

    $arCItys = array();
    foreach($city[$_REQUEST['region']] as $city => $arCity){
        $arCItys[substr($city,0,1)][] = $arCity;
    };
    ksort($arCItys);
    $i = 0;
    $cityEnd = array();
    foreach($arCItys as $sign => $c){
        $cityEnd[$i][$sign] = $c;

        $i++;
        if($i > 3)
            $i = 0;
    }
    $arCitySize = count($cityEnd);
    $arCityRequest = (explode(",",str_replace(" ","",$_REQUEST['selectCity'])));
    ?>
    <div class="category-unified-column">
        <? for($i = 0;$i < $arCitySize;$i++):?>
            <div class="inner-column">
                <? foreach($cityEnd[$i] as $s => $arCity): ?>
                    <h4 class="category-letter"><?=$s?></h4>
                    <ul class="category-unified-list">
                        <? foreach($arCity as $city):?>
                            <li>
                                <label class="wrapper-checkbox">
                                    <input
                                        value="<?=$city['city']?>"
                                        type="checkbox"
                                        name="city[]"
                                        <?=(in_array($city['city'],$arCityRequest)) ? "checked" : ""?>
                                        >
                                    <span class="text">
                                        <?=$city['city']?>
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
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>