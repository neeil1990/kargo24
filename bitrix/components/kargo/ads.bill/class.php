<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Component\ParameterSigner;
use Bitrix\Main\Loader;

class CBillAjax extends CBitrixComponent implements Controllerable
{
    public function __construct($component = null)
    {
        Loader::includeModule('iblock');
        parent::__construct($component);
    }


    /**
     * @return array
     */
    public function configureActions()
    {
        return [
            'main' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod(
                        array(ActionFilter\HttpMethod::METHOD_POST)
                    ),
                    new ActionFilter\Csrf(),
                ],
                'postfilters' => []
            ]
        ];
    }

    protected function listKeysSignedParameters(){
        return [
            'IBLOCK_ID',
            'IBLOCK_TYPE',
        ];
    }

    public function executeComponent()
    {

        if($this->arParams['IBLOCK_ID'] && $this->arParams['IBLOCK_TYPE']){
            global $USER;

            $arSelect = Array("ID", "IBLOCK_ID","ACTIVE", "NAME","PREVIEW_PICTURE","PREVIEW_TEXT", "TIMESTAMP_X","DATE_CREATE","CREATED_BY","PROPERTY_*");
            $arFilter = Array("ACTIVE" => "Y", "IBLOCK_ID" => $this->arParams['IBLOCK_ID'],"IBLOCK_TYPE" => $this->arParams['IBLOCK_TYPE'],"CREATED_BY" => $USER->GetID());

            $res = CIBlockElement::GetList(Array("asc" => "id"), $arFilter, false, false, $arSelect);
            while($ob = $res->GetNextElement()){
                $arFields = $ob->GetFields();
                $arProps = $ob->GetProperties();
                $this->arResult["ITEMS"][$arFields["ID"]] = $arFields;
                $this->arResult["ITEMS"][$arFields["ID"]]["PROPERTIES"] = $arProps;
            }

        }

        $this->includeComponentTemplate();
    }

    public function mainAction(
        $price = '',
        $type = '',
        $inn = '',
        $ogrn = '',
        $kpp = '',
        $signedParameters = ''
    )
    {

        $signer = new ParameterSigner;
        $arParams = $signer->unsignParameters($this->__name, $signedParameters);

        $arResult = [
            "PRICE" => $price,
            "TYPE" => $type,
            "INN" => $inn,
            "OGRN" => $ogrn,
            "KPP" => $kpp,
        ];
        foreach ($arResult as $name => &$args) {

            $args = trim(strip_tags($args));

            if(!strlen($args))
                unset($arResult[$name]);
        }

        if(strlen($arResult['INN']) > 0 && $arResult['PRICE']){
            global $USER;

            $el = new CIBlockElement;

            $property_enums = CIBlockPropertyEnum::GetList(Array(), Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "CODE"=>"TYPE", "XML_ID" => $arResult['TYPE']));
            if($enum_fields = $property_enums->GetNext())
            {
                $arResult['TYPE'] = $enum_fields["ID"];
            }

            $PROP = array();
            $PROP['PRICE'] = $arResult['PRICE'];
            $PROP['TYPE'] = Array("VALUE" => $arResult['TYPE']);
            $PROP['INN'] = $arResult['INN'];
            $PROP['OGRN'] = $arResult['OGRN'];
            $PROP['KPP'] = $arResult['KPP'];

            $arLoadProductArray = Array(
                "IBLOCK_SECTION_ID" => false,
                "CREATED_BY"     => $USER->GetID(),
                "IBLOCK_ID"      => $arParams['IBLOCK_ID'],
                "NAME"           => $arResult['INN'],
                "PROPERTY_VALUES"=> $PROP,
                "ACTIVE"         => "Y",
                "PREVIEW_TEXT"   => implode("\n\r",$arResult),
            );

            if($ID = $el->Add($arLoadProductArray)){
                return [
                    'BILL_ID' => $ID,
                ];
            }
        }else
            die("");

    }

}
