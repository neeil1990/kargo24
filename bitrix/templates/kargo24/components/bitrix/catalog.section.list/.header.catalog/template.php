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
<section class="title-section category">
	<div class="container">
		<h1 class="title">
			<?=($arResult['TITLE']) ? $arResult['TITLE'] : $APPLICATION->GetProperty("title");?>
		</h1>
	</div>
</section>
<!-- end title-section -->
