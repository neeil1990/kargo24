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
<section class="transportations-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div class="section-title">
					<?
					$res = CIBlock::GetByID($arParams["IBLOCK_ID"]);
					if($ar_res = $res->GetNext())
						echo $ar_res['NAME'];
					?>
				</div>
				<div class="wrapper-unified-column">

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
										<h3 class="title">
											<?=$arSection['NAME']?>
										</h3>
									</div>
								</a>
							</div>
						</div>
					<? endforeach; ?>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="unified-ad-unit">
					<div class="ad-unit-head">
						<div class="logo">
							<img src="img/static/ad-unit-logo.png" alt="alt">
						</div>
						<span class="logo-text">Диспетчерский интернет-сервис</span>
					</div>
					<div class="ad-unit-img">
						<img src="img/static/ad.png" alt="alt">
					</div>
					<div class="ad-init-footer">
						<span class="title">Узнайте как разместить рекламу</span>
						<a href="" class="limed-spruce-btn white more-info-btn"><span class="text">подробнее</span><span class="arrow"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end transportations-section -->

<? endif; ?>
