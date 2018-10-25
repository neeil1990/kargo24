<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arParams['IBLOCK_ID'] && $arParams['IBLOCK_TYPE']){

    if (CModule::IncludeModule('highloadblock') && CModule::IncludeModule('iblock')) {

        $ID = $arParams['IBLOCK_ID'];

        $res = CIBlockProperty::GetByID("TYPE", $ID, $arParams['IBLOCK_TYPE']);
        if($ar_res = $res->GetNext())
            $arResult['IBLOCK'] = $ar_res;

        $HighloadblockId = (int)str_replace("b_hlbd_h","",$ar_res['USER_TYPE_SETTINGS']['TABLE_NAME']);

        $hldata = Bitrix\Highloadblock\HighloadBlockTable::getById($HighloadblockId)->fetch();
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


