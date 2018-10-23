<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arParams['IBLOCK_ID'] && $arParams['IBLOCK_TYPE']){

    if (CModule::IncludeModule('highloadblock')) {

        $ID = $arParams['IBLOCK_ID'];

        $hldata = Bitrix\Highloadblock\HighloadBlockTable::getById($ID)->fetch();
        $hlentity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hldata);
        $hlDataClass = $hldata["NAME"] . "Table";

        $result = $hlDataClass::getList(array(
            "select" => array("*"), // Поля для выборки
            "order" => array("UF_SORT" => "ASC"),
            "filter" => array(),
        ));

        while ($res = $result->fetch()) {
            $arResult["ITEMS"][mb_strtolower($res["UF_XML_ID"])] = $res;
            $arResult["ITEMS"][mb_strtolower($res["UF_XML_ID"])]["PICTURE"] = CFile::GetPath($res['UF_FILE']);
        }
    }
}
$this->IncludeComponentTemplate();
?>


