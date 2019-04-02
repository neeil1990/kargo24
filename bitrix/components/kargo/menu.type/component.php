<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arParams['IBLOCK_ID'] && $arParams['IBLOCK_TYPE']){

    CModule::IncludeModule('highloadblock');
    CModule::IncludeModule('iblock');

    $res_block = CIBlock::GetList(
        Array(),
        Array(
            'TYPE' => $arParams['IBLOCK_TYPE'],
            'ID' => $arParams['IBLOCK_ID'],
        ), true
    );
    while($ar_res_block = $res_block->Fetch())
    {

        $arResult['ITEMS'][] = array(
            "UF_NAME" => $ar_res_block['NAME'],
            "UF_XML_ID" => $ar_res_block['CODE'],
            "IS_HOME" => true
        );

        $res_type = CIBlockProperty::GetByID("TYPE", $ar_res_block['ID'],$ar_res_block['IBLOCK_TYPE_ID']);
        if($ar_res_type = $res_type->GetNext())
            $HighloadblockId = (int)str_replace("b_hlbd_h","",$ar_res_type['USER_TYPE_SETTINGS']['TABLE_NAME']);


        $hldata = Bitrix\Highloadblock\HighloadBlockTable::getById($HighloadblockId)->fetch();
        $hlentity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hldata);
        $hlDataClass = $hldata["NAME"] . "Table";

        $result = $hlDataClass::getList(array(
            "select" => array("*"), // Поля для выборки
            "order" => array("UF_SORT" => "ASC"),
            "filter" => array(),
        ));
        while ($res = $result->fetch()) {
            $res['IBLOCK_FOLDER'] = $ar_res_block['CODE'];
            $arResult['ITEMS'][] = $res;
        }
    }
}

$this->IncludeComponentTemplate();
?>


