<?php

use Bitrix\Main;
use Bitrix\Iblock;
use Bitrix\Main\Localization\Loc;
use Bitrix\MessageService;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
Loc::loadMessages(__FILE__);
CModule::IncludeModule("iblock");

class AdsProfileComponent extends CBitrixComponent
{

    private $iBlock_id;
    private $iBlock_type;
    private $iBlock_result;


    public function setIBlock($iBlock_id,$iBlock_type)
    {
        $this->iBlock_id = $iBlock_id;
        $this->iBlock_type = $iBlock_type;
    }

    public function getIBlockResult()
    {
        return $this->iBlock_result;
    }


    public function getCategoryService(){
        $res = CIBlock::GetList(
            Array(),
            Array(
                'ID' => $this->iBlock_id,
                'TYPE' => $this->iBlock_type,
                'SITE_ID' => SITE_ID,
                'ACTIVE' => 'Y',
            ), true
        );
        $this->iBlock_result = array();
        while($ar_res = $res->Fetch())
        {
            $this->iBlock_result[] = $ar_res;
        }
    }

    public function getHighloadblock($ID){
        $res = CIBlockProperty::GetByID("TYPE", $ID, $this->iBlock_type);
        if($ar_res = $res->GetNext())
            $HighloadblockId = (int)str_replace("b_hlbd_h","",$ar_res['USER_TYPE_SETTINGS']['TABLE_NAME']);

        $hldata = Bitrix\Highloadblock\HighloadBlockTable::getById($HighloadblockId)->fetch();
        $hlentity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hldata);
        $hlDataClass = $hldata["NAME"] . "Table";

        $result = $hlDataClass::getList(array(
            "select" => array("*"), // Поля для выборки
            "order" => array("UF_SORT" => "ASC"),
        ));
        $resultHighload = array();
        while($res = $result->fetch()) {
            $resultHighload[$res[ID]] = $res;
            if($res['UF_OPTIONS']){
                $resultHighload[$res[ID]]['UF_OPTIONS'] = $this->getElements(Array("SECTION_ID" => $res['UF_OPTIONS']));
            }
        }
        return $resultHighload;
    }

    public function getElements($arFilter){
        $arSelect = Array("ID", "IBLOCK_ID", "NAME","PROPERTY_*");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        $arResult = array();
        while($ob = $res->GetNextElement()){
            $arFields = $ob->GetFields();
            $arProps = $ob->GetProperties();
            $arResult[$arFields[ID]] = $arFields;
            $arResult[$arFields[ID]]['PROPERTIES'] = $arProps;
        }
        return $arResult;
    }

    public function getSectionIDByName($IBLOCK_ID,$name){

            $arFilter = Array('IBLOCK_ID' => $IBLOCK_ID, 'GLOBAL_ACTIVE'=>'Y', 'NAME' => $name);
            $db_list = CIBlockSection::GetList(Array("asc" => "name"), $arFilter, true);
            if($ar_result = $db_list->GetNext())
            {
                return $ar_result['ID'];
            }
        return false;

    }


}