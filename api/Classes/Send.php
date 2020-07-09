<?php


class Send
{
    public $days;
    public $iBlocks = ["1", "3", "2", "10", "7", "9", "6", "8"];
    public $msgId;
    public $code;
    public $arFilter = [];
    public $select = ["ID", "IBLOCK_ID", "NAME", "CREATED_BY", "ACTIVE_TO"];

    public function __construct($params = false)
    {
        if(!isset($params['days']) && !isset($params['code']) && !isset($params['id']))
            return false;

        $this->days = $params['days'];
        $this->code = $params['code'];
        $this->msgId = $params['id'];
    }

    function init(){

        $res = $this->elementList();
        while($ob = $res->GetNextElement())
        {
            $arFields = $ob->GetFields();
            $arUser = CUser::GetByID($arFields['CREATED_BY'])->Fetch();
            $arFields['USER_NAME'] = $arUser['NAME'];
            $arFields['USER_LAST_NAME'] = $arUser['LAST_NAME'];
            $arFields['USER_EMAIL'] = $arUser['EMAIL'];
            $arFields['DAY'] = str_replace(['-', '+'], '', $this->days);

            $date = DateTime::createFromFormat('d.m.Y', FormatDate("d.m.Y", MakeTimeStamp($arFields['ACTIVE_TO'])));
            $now = new DateTime();
            $dayDiff = $date->diff($now)->format('%R%a');
            
            if($dayDiff == $this->days){

                $property_notify = CIBlockPropertyEnum::GetList(false, Array("IBLOCK_ID" => $arFields['IBLOCK_ID'], "CODE" => $this->code, "XML_ID" => "Y"))->GetNext();

                if(CEvent::SendImmediate("NOTIFI_ACTIVE", "s1", $arFields, "Y", $this->msgId)){
                    if($property_notify)
                        CIBlockElement::SetPropertyValuesEx($arFields['ID'], $arFields['IBLOCK_ID'], array($property_notify['PROPERTY_CODE'] => array("VALUE" => $property_notify['ID'])));
                }
            }
        }
    }

    public function filter(){
        $key_prop = '=PROPERTY_'.$this->code.'_VALUE';

        $this->arFilter['IBLOCK_ID'] = $this->iBlocks;
        $this->arFilter['!=PROPERTY_HIDDEN_VALUE'] = "Y";
        $this->arFilter[$key_prop] = false;
    }

    public function elementList(){

        $this->filter();
        return CIBlockElement::GetList([], $this->arFilter, false, false, $this->select);
    }
}
