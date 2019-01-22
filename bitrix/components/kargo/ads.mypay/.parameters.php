<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if (!CModule::IncludeModule("iblock"))
	return;
$arIBlockType = CIBlockParameters::GetIBlockTypes();
$rsIBlock = CIBlock::GetList(array(
	"sort" => "asc",
), array(
	"TYPE" => $arCurrentValues["IBLOCK_TYPE"],
	"ACTIVE" => "Y",
));
while ($arr = $rsIBlock->Fetch())
	$arIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];

	$result =\Bitrix\Iblock\SectionTable::getList(array( 
		'select' => array('ID','NAME'), 
		'filter' => array('IBLOCK_ID' => $arCurrentValues['IBLOCK_ID']) 
	)); 
	while ($Section = $result->fetch()) 
	{ 
		$arSections[$Section["ID"]] = "[".$Section["ID"]."] ".$Section["NAME"];
	} 
	
$arComponentParameters = array(
"GROUPS" => array(),
"PARAMETERS" => array(
		"IBLOCK_TYPE" => array(
				"PARENT" => "BASE",
				"NAME" => GetMessage("SM_IBLOCK_TYPE"),
				"TYPE" => "LIST",
				"VALUES" => $arIBlockType,
				"REFRESH" => "Y",
		),
		"IBLOCK_ID" => array(
				"PARENT" => "BASE",
				"NAME" => GetMessage("SM_IBLOCK_IBLOCK"),
				"TYPE" => "LIST",
				"ADDITIONAL_VALUES" => "Y",
				"VALUES" => $arIBlock,
				"REFRESH" => "Y",
		),
	),
);   
?>