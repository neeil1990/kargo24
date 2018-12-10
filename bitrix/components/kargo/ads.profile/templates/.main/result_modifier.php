<?php
foreach($arResult['ITEMS'] as &$arItem){
    if(is_array($arItem['PROPERTIES']['TARIFF'])){
        $property_enums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID" => $arItem['PROPERTIES']['TARIFF']['IBLOCK_ID'], "CODE" => $arItem['PROPERTIES']['TARIFF']['CODE']));
        while($enum_fields = $property_enums->GetNext())
        {
            $arItem['PROPERTIES']['TARIFF']['ENUMS'][$enum_fields['ID']] = $enum_fields;
        }
    }
}
