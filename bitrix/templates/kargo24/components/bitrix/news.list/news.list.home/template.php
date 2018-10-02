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
<section class="news-section">
	<div class="container">
		<div class="section-title"><?=$arResult['NAME']?></div>
		<div class="row news-section-content">
			<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="col-sm-3 col-xs-6 column">
				<div class="news-item">
					<div class="item-img">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="alt"></a>
					</div>
					<div class="item-desc">
						<span class="date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
						<h3 class="title">
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
						</h3>
						<p class="text">
							<?echo $arItem["PREVIEW_TEXT"];?>
						</p>
					</div>
				</div>
			</div>
			<?endforeach;?>
		</div>
	</div>
</section>
<!-- end news-section -->