<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");

$iblock = strip_tags($_REQUEST['IB']);
if(!$iblock)
    return false;

if($iblock){

    if (CModule::IncludeModule('highloadblock')) {

        $property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>$iblock, "CODE"=>"HIDDEN"));
        if($enum_fields = $property_enums->GetNext())
        {
            $enum_fields_id = $enum_fields['ID'];
        }

        $idSection = array();
        $tree = CIBlockSection::GetTreeList(
            $arFilter=Array('IBLOCK_ID' => $iblock,'DEPTH_LEVEL' => 2),
            $arSelect=Array()
        );
        while($section = $tree->GetNext()) {
            $idSection[] = $section['ID'];
        }

        $res = CIBlockProperty::GetByID("TYPE", $iblock, "content");
        if($ar_res = $res->GetNext())
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

            $el = new CIBlockElement;
            $PROP = array();
            $PROP["TYPE"] = array("VALUE" => $res["UF_XML_ID"]);
            $PROP["HIDDEN"] = array("VALUE" => $enum_fields_id);

            $arLoadProductArray = Array(
                "MODIFIED_BY"    => $USER->GetID(),
                "CODE" => $res["ID"],
                "IBLOCK_SECTION" => $idSection,
                "IBLOCK_ID"      => $iblock,
                "PROPERTY_VALUES"=> $PROP,
                "NAME"           => "hidden" . $res["ID"],
                "ACTIVE"         => "Y"
            );

            if($PRODUCT_ID = $el->Add($arLoadProductArray))
                echo "New ID: ".$PRODUCT_ID;
            else
                echo "Error: ".$el->LAST_ERROR;
        }
    }


}