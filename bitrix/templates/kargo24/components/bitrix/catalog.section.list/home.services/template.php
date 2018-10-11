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

if (0 < $arResult["SECTIONS_COUNT"]):
?>
	<div class="col-lg-5 col-md-6 col-sm-12">
		<div class="section-title white">
			<?
			$res = CIBlock::GetByID($arParams["IBLOCK_ID"]);
			if($ar_res = $res->GetNext())
				echo $ar_res['NAME'];
			?>
		</div>
		<div class="accompanying-services-content wrapper-unified-column white">
			<? foreach ($arResult['SECTIONS'] as &$arSection):
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
			?>
			<div class="unified-column">
				<div class="unified-unit-service">
					<a href="<? echo $arSection['SECTION_PAGE_URL']; ?>">
						<div class="item-img">
							<img src="<? echo $arSection['PICTURE']['SRC']; ?>" alt="<?=$arSection['NAME']?>">
						</div>
						<div class="item-desc">
							<h3 class="title"><?=$arSection['NAME']?></h3>
						</div>
					</a>
				</div>
			</div>
			<? endforeach; ?>
		</div>
	</div>
<? endif; ?>
