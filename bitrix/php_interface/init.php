<?php
define("PAY_BLOCK", 19);

/*Регионы и процент который на них распространяется*/
define('AR_REGIONS', array("Московская область", "Ленинградская область"));
define("REGIONS_PERCENT", 10);
/*END Регионы и процент который на них распространяется END*/


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


