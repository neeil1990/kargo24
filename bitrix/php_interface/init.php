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