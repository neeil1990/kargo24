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
<?
if($arResult['ITEMS']):?>
	<div class="freight-transportation">
		<div class="section-title"><?=$arResult['NAME']?></div>
		<? foreach($arResult['ITEMS'] as $arItem):?>
			<div class="unified-transport-unit">
				<div class="item-img">
					<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="alt">
				</div>
				<div class="item-desc">
					<div class="title-and-number">
						<span class="number">№ <?=$arItem['ID']?></span>
						<h3 class="title"><?=$arItem['NAME']?></h3>
					</div>
					<p class="text">
						<?=$arItem['PREVIEW_TEXT']?>
					</p>
					<ul class="rental-info">
						<? foreach($arItem['PROPERTIES']['RENTAL_INFO']['VALUE'] as $desc => $value):?>
						<li>
							<? if($desc = $arItem['PROPERTIES']['RENTAL_INFO']['DESCRIPTION'][$desc]): ?>
							<span class="icon icon-<?=$desc?>"></span>
							<? endif; ?>
							<?=$value?>
						</li>
						<? endforeach; ?>
						<li>
							<span class="icon icon-danger"></span>
							<a href="#form-complain-popup" data-toggle="modal" class="complain">Пожаловаться</a>
						</li>
					</ul>
					<?
					$arOtions = array();
					$option_count = count($arItem['PROPERTIES']['OPTIONS']['VALUE']);
					foreach($arItem['PROPERTIES']['OPTIONS']['VALUE'] as $key => $value){
						$arOtions[(round($option_count/2) > $key) ? 0 : 1][] = array("VALUE" => $value,"DESCRIPTION" => $arItem['PROPERTIES']['OPTIONS']['DESCRIPTION'][$key]);
					}
					?>
					<? foreach($arOtions as $tabs): ?>
					<table class="characteristics-table">
						<? foreach($tabs as $opt): ?>
						<tr>
							<td><?=$opt['DESCRIPTION']?></td>
							<td><?=$opt['VALUE']?></td>
						</tr>
						<? endforeach; ?>
					</table>
					<? endforeach; ?>
				</div>
			</div>
			<!-- end unified-transport-unit -->
		<? endforeach; ?>
	</div>
<? endif;?>


<?
if($arParams['SMART_FILTER_PATH'] == "clear" && !$arParams['SMART_FILTER_PATH']): ?>
	<div class="unified-text-block-category">
		<?=$arResult["DESCRIPTION"]?>
	</div>
	<!-- end unified-text-block-category -->
<?endif;?>
