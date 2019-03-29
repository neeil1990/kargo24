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
<section class="title-section news">
	<div class="container">
		<h1 class="title"><?=$arResult['NAME']?></h1>
	</div>
</section>

<section class="news-section news-section-mod">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div class="row news-section-content">
					<?foreach($arResult["ITEMS"] as $arItem):?>
						<?
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						?>
					<div class="col-sm-4 col-xs-6 column">
						<article class="news-item">
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
						</article>
					</div>
					<?endforeach;?>
				</div>

				<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
					<?=$arResult["NAV_STRING"]?>
				<?endif;?>
			</div>
			<div class="col-sm-3">
				<div class="sidebar-product-item">
					<div class="logo">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/static/ad-unit-logo.png" alt="alt">
					</div>
					<div class="product-img">
						<a href=""><img src="<?=SITE_TEMPLATE_PATH?>/img/static/construction-machinery/01.png" alt="alt"></a>
					</div>
					<div class="product-desc">
						<h3 class="title">Бульдозер</h3>
						<table class="desc-info">
							<tbody><tr>
								<td>Город:</td>
								<td>Москва</td>
							</tr>
							<tr>
								<td>Цена:</td>
								<td>720 000 руб.</td>
							</tr>
							<tr>
								<td>Контакты: </td>
								<td>7 950 111 11 11 (Алексей)</td>
							</tr>
							</tbody></table>
					</div>
				</div>
				<div class="sidebar-social-network">
					<h3>Нравится сервис? <br>Посоветуйте друзьям!</h3>
					<ul class="social-network">
						<li><a href=""><span class="icon icon-wk"></span></a></li>
						<li><a href=""><span class="icon icon-fb"></span></a></li>
						<li><a href=""><span class="icon icon-odn"></span></a></li>
						<li><a href=""><span class="icon icon-mailru"></span></a></li>
						<li><a href=""><span class="icon icon-tvitter"></span></a></li>
						<li><a href=""><span class="icon icon-google"></span></a></li>
						<li><a href=""><span class="icon icon-skype"></span></a></li>
						<li><a href=""><span class="icon icon-viber"></span></a></li>
						<li><a href=""><span class="icon icon-ws"></span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end news-section -->

