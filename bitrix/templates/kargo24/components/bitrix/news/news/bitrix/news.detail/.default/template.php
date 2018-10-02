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
<div class="col-sm-9">
	<article class="news-item-detailed">
		<div class="top-panel">
			<h2 class="title"><?=$arResult["NAME"]?></h2>
			<span class="date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
		</div>
		<figure class="item-img">
			<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="alt">
		</figure>
		<p class="text">
			<?echo $arResult["DETAIL_TEXT"];?>
		</p>

		<div class="all-news-btn">
			<a href="<?=$arResult['LIST_PAGE_URL']?>" class="limed-spruce-btn">Все новости<span class="arrow"></span></a>
		</div>
	</article>
</div>


