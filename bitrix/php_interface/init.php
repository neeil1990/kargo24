<?php
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