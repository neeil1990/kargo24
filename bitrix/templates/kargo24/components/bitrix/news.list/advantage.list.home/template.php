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
$this->setFrameMode(true);
?>
<section class="advantages-section">
	<div class="container">
		<div class="section-title white"><?=$arResult['NAME']?></div>
		<ul class="advantages-content-list">
			<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<li class="advantages-item">
				<span class="item-icon <?echo $arItem["PROPERTIES"]["NAME_ICON"]["VALUE"];?>"></span>
				<div class="item-desc">
					<h3 class="title"><?echo $arItem["NAME"]?></h3>
					<p class="text">
						<?echo $arItem["PREVIEW_TEXT"];?>
					</p>
				</div>
			</li>
			<?endforeach;?>
		</ul>
	</div>
</section>