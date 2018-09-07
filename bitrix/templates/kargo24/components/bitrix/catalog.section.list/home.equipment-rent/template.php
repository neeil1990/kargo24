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

<section class="equipment-rent-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="sidebar-product-item">
						<div class="logo">
							<img src="img/static/ad-unit-logo.png" alt="alt">
						</div>
						<div class="product-img">
							<a href=""><img src="img/static/construction-machinery/01.png" alt="alt"></a>
						</div>
						<div class="product-desc">
							<h3 class="title">Бульдозер</h3>
							<table class="desc-info">
								<tr>
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
							</table>
						</div>
					</div>
					<div class="sidebar-product-item desktop">
						<div class="logo">
							<img src="img/static/ad-unit-logo.png" alt="alt">
						</div>
						<div class="product-img">
							<a href=""><img src="img/static/construction-machinery/02.png" alt="alt"></a>
						</div>
						<div class="product-desc">
							<h3 class="title">Автогрейдер</h3>
							<table class="desc-info">
								<tr>
									<td>Город:</td>
									<td>Челябинск</td>
								</tr>
								<tr>
									<td>Цена:</td>
									<td>2 300 000 руб.</td>
								</tr>
								<tr>
									<td>Контакты: </td>
									<td>89080660033 (Руслан)</td>
								</tr>
							</table>
						</div>
					</div>
				</div>

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
											<h3 class="title"><?=$arSection['NAME']?></h3>
										</div>
									</a>
								</div>
							</div>
						<? endforeach; ?>
					</div>
					<div class="sidebar-product-item mobile">
						<div class="logo">
							<img src="img/static/ad-unit-logo.png" alt="alt">
						</div>
						<div class="product-img">
							<a href=""><img src="img/static/construction-machinery/02.png" alt="alt"></a>
						</div>
						<div class="product-desc">
							<h3 class="title">Автогрейдер</h3>
							<table class="desc-info">
								<tr>
									<td>Город:</td>
									<td>Челябинск</td>
								</tr>
								<tr>
									<td>Цена:</td>
									<td>2 300 000 руб.</td>
								</tr>
								<tr>
									<td>Контакты: </td>
									<td>89080660033 (Руслан)</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- end equipment-rent-section -->
<? endif; ?>
