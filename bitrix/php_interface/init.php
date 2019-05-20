<?php
define("PAY_BLOCK", 19);

/*Регионы и процент который на них распространяется*/
define('AR_REGIONS', array("Московская область", "Москва", "Ленинградская область"));
define("REGIONS_PERCENT", 10);
/*END Регионы и процент который на них распространяется END*/

/*Цена поднятия объявления*/
define("UP_ADS_PAY", 40);
/*Цена поднятия объявления END*/


session_start();
CModule::AddAutoloadClasses(
    '',
    array(
        'IPGeoBase' => '/bitrix/templates/kargo24/vendor/ipgeobase/ipgeobase.php'
    )
);



function getTypeAdsText($ID,$type){
    CModule::IncludeModule('iblock');

    $res = CIBlockProperty::GetByID("TYPE", $ID, "content");
    if($ar_res = $res->GetNext())
    $HighloadblockId = (int)str_replace("b_hlbd_h","",$ar_res['USER_TYPE_SETTINGS']['TABLE_NAME']);

    $type = explode('-',$type);
    $hldata = Bitrix\Highloadblock\HighloadBlockTable::getById($HighloadblockId)->fetch();
    $hlentity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hldata);
    $hlDataClass = $hldata["NAME"] . "Table";

    $result = $hlDataClass::getList(array(
        "select" => array("*"), // Поля для выборки
        "order" => array("UF_SORT" => "ASC"),
        "filter" => array("UF_XML_ID" => $type[2]),
    ));

    if ($res = $result->fetch()) {
        return $res;
    }
}

function catalog_header($ID){

    global $APPLICATION;
    $url = $APPLICATION->GetCurPage();
    if(preg_match("/\\/(.*)\\/filter\\/(.*)\\/apply/",$url,$clear_property_type)){

        $codes = explode('/',$clear_property_type[1]);
        if($codes){
            $code = $codes[count($codes)-1];
        }
        $filter = $clear_property_type[2];

    }else{
        if($url = substr($url, 1, -1)){
            $codes = explode('/',$url);
            if($codes){
                $code = $codes[count($codes)-1];
            }
        }
        $filter = false;
    }


    $APPLICATION->IncludeComponent("bitrix:catalog.section.list", ".header.catalog", Array(
        "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
        "CACHE_GROUPS" => "Y",	// Учитывать права доступа
        "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
        "CACHE_TYPE" => "N",	// Тип кеширования
        "COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
        "IBLOCK_ID" => $ID,	// Инфоблок
        "IBLOCK_TYPE" => "content",	// Тип инфоблока
        "SECTION_CODE" => $code,	// Код раздела
        "FILTER" => $filter,	// Код раздела
        "SECTION_FIELDS" => array(	// Поля разделов
            0 => "",
            1 => "",
        ),
        "SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
        "SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
        "SECTION_USER_FIELDS" => array(	// Свойства разделов
            0 => "UF_FILTER_TITLE",
            1 => "",
        ),
        "SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
        "TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
        "DEPTH_LEVEL" => count($codes),
        "VIEW_MODE" => "LINE",	// Вид списка подразделов
    ),
        false
    );

}



function deactivationAgent()
{
    CModule::IncludeModule("iblock");
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM" ,"PROPERTY_*");
    $arFilter = Array(
        "IBLOCK_ID" => array(1,2,3,10,9,8,6,7),
        "ACTIVE"=>"Y",
        "<=DATE_ACTIVE_TO"   => array(false, ConvertTimeStamp(false, "FULL")),
        "!=PROPERTY_HIDDEN_VALUE" => "Y",
        "!=PROPERTY_TARIFF" => false
    );
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        if($arFields['ID']){
            $el = new CIBlockElement;
            $arLoadProductArray = Array(
                "ACTIVE" => "N",
                "DATE_ACTIVE_FROM" => false,
                "DATE_ACTIVE_TO" => false
            );
            $PRODUCT_ID = $arFields['ID'];
            CIBlockElement::SetPropertyValues($PRODUCT_ID, $arFields['IBLOCK_ID'], false, "TARIFF");
            $el->Update($PRODUCT_ID, $arLoadProductArray);
        }
    }

    return "deactivationAgent();";
}


function addPrecent($IBLOCK_ID,$ELEMENT_ID,$balance){

    CModule::IncludeModule("iblock");
    $res = CIBlockElement::GetByID($ELEMENT_ID);
    if($ar_res = $res->GetNext()){
        $nav = CIBlockSection::GetNavChain($IBLOCK_ID, $ar_res['IBLOCK_SECTION_ID']);
        if($res_n = $nav->GetNext()){
            if(in_array($res_n[NAME], AR_REGIONS) && $res_n[DEPTH_LEVEL] == "1"){
                $percent = $balance/100*REGIONS_PERCENT;
                $result = ceil($balance + $percent);
                return $result;
            }else
                return 0;
        }
    }
}


function account_menu($data = null){

    $arMenu = array(
        "main" => "Мои объявления",
        "my-company" => "Мои компании",
        "my-banners" => "Мои баннеры",
        "add-balance" => "Пополнить баланс$data",
        "my-payments" => "Мои платежи",
        "support" => "Техподдержка",
        "settings" => "Настройки",
    );

    return $arMenu;

}


function num2str($num) {
    $nul='ноль';
    $ten=array(
        array('','один','два','три','четыре','пять','шесть','семь', 'восемь','девять'),
        array('','одна','две','три','четыре','пять','шесть','семь', 'восемь','девять'),
    );
    $a20=array('десять','одиннадцать','двенадцать','тринадцать','четырнадцать' ,'пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать');
    $tens=array(2=>'двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят' ,'восемьдесят','девяносто');
    $hundred=array('','сто','двести','триста','четыреста','пятьсот','шестьсот', 'семьсот','восемьсот','девятьсот');
    $unit=array( // Units
        array('копейка' ,'копейки' ,'копеек',	 1),
        array('рубль'   ,'рубля'   ,'рублей'    ,0),
        array('тысяча'  ,'тысячи'  ,'тысяч'     ,1),
        array('миллион' ,'миллиона','миллионов' ,0),
        array('миллиард','милиарда','миллиардов',0),
    );
    //
    list($rub,$kop) = explode('.',sprintf("%015.2f", floatval($num)));
    $out = array();
    if (intval($rub)>0) {
        foreach(str_split($rub,3) as $uk=>$v) { // by 3 symbols
            if (!intval($v)) continue;
            $uk = sizeof($unit)-$uk-1; // unit key
            $gender = $unit[$uk][3];
            list($i1,$i2,$i3) = array_map('intval',str_split($v,1));
            // mega-logic
            $out[] = $hundred[$i1]; # 1xx-9xx
            if ($i2>1) $out[]= $tens[$i2].' '.$ten[$gender][$i3]; # 20-99
            else $out[]= $i2>0 ? $a20[$i3] : $ten[$gender][$i3]; # 10-19 | 1-9
            // units without rub & kop
            if ($uk>1) $out[]= morph($v,$unit[$uk][0],$unit[$uk][1],$unit[$uk][2]);
        } //foreach
    }
    else $out[] = $nul;
    $out[] = morph(intval($rub), $unit[1][0],$unit[1][1],$unit[1][2]); // rub
    $out[] = $kop.' '.morph($kop,$unit[0][0],$unit[0][1],$unit[0][2]); // kop
    return trim(preg_replace('/ {2,}/', ' ', join(' ',$out)));
}

/**
 * Склоняем словоформу
 * @ author runcore
 */
function morph($n, $f1, $f2, $f5) {
    $n = abs(intval($n)) % 100;
    if ($n>10 && $n<20) return $f5;
    $n = $n % 10;
    if ($n>1 && $n<5) return $f2;
    if ($n==1) return $f1;
    return $f5;
}


