<?php
use Bitrix\Main;

if(!\Bitrix\Main\Loader::includeModule('iblock') ) return;
IncludeModuleLangFile(__FILE__);


class CreateSection
{
    public $iblock = array();
    public $section = array();
    private $fhandleCities;
    private $MODULE_ID = "section.city";

    public function main(){}

    public function iblock(){

        $res = CIBlock::GetList(
            Array(),
            Array(
                'ACTIVE'=>'Y',
                "CNT_ACTIVE"=>"Y"
            ), true
        );
        while($ar_res = $res->Fetch())
        {
            $this->iblock[$ar_res['ID']] = $ar_res;
        }
        return $this->iblock;
    }

    public function getSection($IBLOCK_ID = 1){

        $arFilter = Array('IBLOCK_ID' => $IBLOCK_ID, 'GLOBAL_ACTIVE'=>'Y','DEPTH_LEVEL' => 1);
        $db_list = CIBlockSection::GetList(Array('id' => 'desc'), $arFilter, true);
        while($ar_result = $db_list->GetNext())
        {
            $this->section[] = $ar_result;
        }
        return $this->section;
    }

    public function getCity(){
        $arCity = array();
        $CitiesFile = $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$this->MODULE_ID.'/db/cities.txt';
        $this->fhandleCities = fopen($CitiesFile, 'r') or die("Cannot open $CitiesFile");

        rewind($this->fhandleCities);
        while(!feof($this->fhandleCities))
        {
            $str = fgets($this->fhandleCities);
            $arRecord = explode("\t", trim($str));
            $arCity[$arRecord[2]][] = $arRecord[1];
        }
        return $arCity;
    }

    public function setSection($idBlock = 0,$idSection = 0){
        $Section = new CIBlockSection;
        foreach($this->getCity() as $region => $city){

            $regionCode = CUtil::translit($region, "ru", false);
            $arFields = Array(
                "ACTIVE" => "Y",
                "IBLOCK_SECTION_ID" => $idSection,
                "IBLOCK_ID" => $idBlock,
                "NAME" => $region,
                "CODE" => $regionCode,
                "SORT" => 500,
            );
            $ID = $Section->Add($arFields);
            if($ID > 0){
                foreach($city as $c){
                    $cityCode = CUtil::translit($c, "ru", false);
                    $arCity = Array(
                        "ACTIVE" => "Y",
                        "IBLOCK_SECTION_ID" => $ID,
                        "IBLOCK_ID" => $idBlock,
                        "NAME" => $c,
                        "CODE" => $cityCode,
                        "SORT" => 500,
                    );
                    $Section->Add($arCity);
                }
            }
        }
        return true;
    }
}