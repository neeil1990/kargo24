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
<div class="special-equipment-title">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<a href="/<?=$arItem['CODE']?>/">
			<div class="equipment-title-item">
				<div class="equipment-title-img">
					<img src="<?=$arItem['PICTURE']?>">
				</div>
				<div class="equipment-title-content">
					<?=$arItem['NAME']?>
				</div>
			</div>
		</a>
	<?endforeach;?>
</div>
