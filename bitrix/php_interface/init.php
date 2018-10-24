<?php
session_start();
CModule::AddAutoloadClasses(
    '',
    array(
        'IPGeoBase' => '/bitrix/templates/kargo24/vendor/ipgeobase/ipgeobase.php'
    )
);


function getTypeAdsText($ID,$type){

    $type = explode('-',$type);
    $hldata = Bitrix\Highloadblock\HighloadBlockTable::getById($ID)->fetch();
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