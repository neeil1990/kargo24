<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

$this->setFrameMode(true);
global $APPLICATION;
?>
<div class="col-sm-9">


		<?
		if (!isset($arParams['FILTER_VIEW_MODE']) || (string)$arParams['FILTER_VIEW_MODE'] == '')
			$arParams['FILTER_VIEW_MODE'] = 'VERTICAL';
		$arParams['USE_FILTER'] = (isset($arParams['USE_FILTER']) && $arParams['USE_FILTER'] == 'Y' ? 'Y' : 'N');
		$verticalGrid = ('Y' == $arParams['USE_FILTER'] && $arParams["FILTER_VIEW_MODE"] == "VERTICAL");

		if ($arParams['USE_FILTER'] == 'Y')
		{
			$arFilter = array(
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"ACTIVE" => "Y",
				"GLOBAL_ACTIVE" => "Y",
			);
			if (0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
			{
				$arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
			}
			elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"])
			{
				$arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];
			}

			$obCache = new CPHPCache();
			if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
			{
				$arCurSection = $obCache->GetVars();
			}
			elseif ($obCache->StartDataCache())
			{
				$arCurSection = array();
				if (Loader::includeModule("iblock"))
				{
					$dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID","DEPTH_LEVEL"));

					if(defined("BX_COMP_MANAGED_CACHE"))
					{
						global $CACHE_MANAGER;
						$CACHE_MANAGER->StartTagCache("/iblock/catalog");

						if ($arCurSection = $dbRes->Fetch())
						{
							$CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);
						}
						$CACHE_MANAGER->EndTagCache();
					}
					else
					{
						if(!$arCurSection = $dbRes->Fetch())
							$arCurSection = array();
					}

				}
				$obCache->EndDataCache($arCurSection);
			}
			if (!isset($arCurSection))
			{
				$arCurSection = array();
			}
			?>

			<?

			$cat_filter = $APPLICATION->IncludeComponent(
			"bitrix:catalog.smart.filter",
			"",
			array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"SECTION_ID" => $arCurSection['ID'],
				"FILTER_NAME" => $arParams["FILTER_NAME"],
				"PRICE_CODE" => $arParams["PRICE_CODE"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"SAVE_IN_SESSION" => "N",
				"FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
				"XML_EXPORT" => "Y",
				"SECTION_TITLE" => "NAME",
				"SECTION_DESCRIPTION" => "DESCRIPTION",
				'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
				"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
				'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
				'CURRENCY_ID' => $arParams['CURRENCY_ID'],
				"SEF_MODE" => $arParams["SEF_MODE"],
				"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
				"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
				"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
			),
			$component,
			array('HIDE_ICONS' => 'Y')
		);?>
		<?
		}
		?>


		<?
		if($arResult["VARIABLES"]["SMART_FILTER_PATH"]){
			$SMART_FILTER_PATH = $arResult["VARIABLES"]["SMART_FILTER_PATH"];
		}else{
			if(preg_match("/filter/",$arResult["VARIABLES"]["SECTION_CODE_PATH"])){
				$variables = explode('/',$arResult["VARIABLES"]["SECTION_CODE_PATH"]);
				$SMART_FILTER_PATH = $variables[1];
			}else{
				$SMART_FILTER_PATH = false;
			}
		}



		$APPLICATION->IncludeComponent(
			"bitrix:catalog.section.list",
			"",
			array(
				"SMART_FILTER_PATH" => $SMART_FILTER_PATH,
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
				"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
				"CACHE_TYPE" => "N",
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
				"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
				"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
				"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
				"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
			),
			$component,
			array("HIDE_ICONS" => "Y")
		);?>

	<?
	$intSectionID = 0;
	?>

	<?
	if (Loader::includeModule("iblock"))
	{
		$dbRes = CIBlockSection::GetList(array(), array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y","GLOBAL_ACTIVE" => "Y","ID" => $arResult["VARIABLES"]["SECTION_ID"]), false, array("ID","DEPTH_LEVEL","DESCRIPTION"));
		if(!$arSectionDepth = $dbRes->Fetch())
			$arSectionDepth = array();
	}

	switch((int)$arSectionDepth['DEPTH_LEVEL']){
		case 1:
			include('include/flights.php');

			if(!$SMART_FILTER_PATH)
			include('include/calculation.php');

			break;
	}




	if($arResult["VARIABLES"]["SECTION_ID"]){
		include('include/section.php');
	}else{
		$type = getTypeAdsText($arParams["IBLOCK_ID"],$SMART_FILTER_PATH);
		?>
		<div class="unified-text-block-category">
			<?=$type['UF_FULL_DESCRIPTION'];?>
		</div>
		<?
	}


	?>
	<div class="unified-text-block-category">
		<?$APPLICATION->ShowViewContent('sotbit_seometa_bottom_desc');?>
	</div>
	<!-- end unified-text-block-category -->

	<?
	$APPLICATION->IncludeComponent(
		"sotbit:seo.meta",
		".default",
		Array(
			"FILTER_NAME" => $arParams["FILTER_NAME"],
			"SECTION_ID" => $arCurSection['ID'],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
		)
	);
	?>


	<?
	$GLOBALS['CATALOG_CURRENT_SECTION_ID'] = $intSectionID;
	?>

</div>
