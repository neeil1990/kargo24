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

		<?$APPLICATION->IncludeComponent(
			"kargo:catalog.section.list",
			"",
			array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"CACHE_TYPE" => "N",
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
				"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
				"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
				"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
				"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
			),
			$component,
			array("HIDE_ICONS" => "Y")
		);
		?>

		<?$APPLICATION->IncludeComponent("kargo:ads.type", "ads.type", Array(
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],	// Инфоблок
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],	// Тип инфоблока
			"SORT" => "NAME",	// Порядок сортировки тегов
			"TYPE" => $_REQUEST['TYPE']
		),
			false
		);?>

		<div class="standard-unified-flights">
			<h2 class="section-title">Последние добавленные рейсы для грузоперевозок</h2>
			<table class="category-unifid-table">
				<thead>
				<tr>
					<th>Название и <span class="max">номер рейса</span></th>
					<th>Город и дата <span class="max">загрузки</span></th>
					<th>Город и дата <span class="max">Выгрузки</span></th>
					<th>Контакты</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>
						<span class="bold">Тентованый, 2 т</span>
						№ 216445
					</td>
					<td>
						<span class="bold">Москва</span>
						Загрузка - <span class="color">.не указано</span>
					</td>
					<td>
						<span class="bold">Тверь</span>
						Выгрузка - 01.01.18
					</td>
					<td>
						Сергей - <a href="tel:89035205899">8 (903) 520 - 58 - 99</a>
					</td>
				</tr>
				<tr>
					<td>
						<span class="bold">Фургон, 5 т</span>
						№ 226870
					</td>
					<td>
						<span class="bold">Москва</span>
						Загрузка - 30.11.17
					</td>
					<td>
						<span class="bold">Санкт-петербург</span>
						Выгрузка - 30.11.17
					</td>
					<td>
						Артур - <a href="tel:89660896663">8 (966) 089 - 66 - 63</a>
					</td>
				</tr>
				<tr>
					<td>
						<span class="bold">Изотермический, 10 т</span>
						№ 216445
					</td>
					<td>
						<span class="bold">Москва</span>
						Загрузка - <span class="color">.не указано</span>
					</td>
					<td>
						<span class="bold">Тверь</span>
						Выгрузка - 01.01.18
					</td>
					<td>
						Сергей - <a href="tel:89035205899">8 (903) 520 - 58 - 99</a>
					</td>
				</tr>
				<tr>
					<td>
						<span class="bold">Цельнометалл, 1 т</span>
						№ 226870
					</td>
					<td>
						<span class="bold">Москва</span>
						Загрузка - 30.11.17
					</td>
					<td>
						<span class="bold">Санкт-петербург</span>
						Выгрузка - 30.11.17
					</td>
					<td>
						Артур - <a href="tel:89660896663">8 (966) 089 - 66 - 63</a>
					</td>
				</tr>
				<tr>
					<td>
						<span class="bold">Фургон, 5 т</span>
						№ 226870
					</td>
					<td>
						<span class="bold">Москва</span>
						Загрузка - 30.11.17
					</td>
					<td>
						<span class="bold">Санкт-петербург</span>
						Выгрузка - 30.11.17
					</td>
					<td>
						Артур - <a href="tel:89660896663">8 (966) 089 - 66 - 63</a>
					</td>
				</tr>
				</tbody>
			</table>
			<div class="standard-unified-flights-slider">
				<div class="standard-unified-flights-item">
					<h4 class="title">Название и номер рейса</h4>
					<ul class="item-list">
						<li>
							<span class="left-column bold">Тентованый, 2 т</span> <span class="right-column">№ 216445</span>
						</li>
						<li>
							<span class="bold">Город и дата загрузки</span>
						</li>
						<li>
							<span class="bold">Москва</span>
							Загрузка - <span class="color">не указано</span>
						</li>
						<li>
							<span class="bold">Город и дата выгрузки</span>
						</li>
						<li>
							<span class="bold">Тверь</span>
							Выгрузка - 01.01.18
						</li>
						<li>
							<span class="bold">Контакты</span>
						</li>
						<li>
							Сергей - <a href="tel:89035205899">8 (903) 520 - 58 - 99</a>
						</li>
					</ul>
				</div>
				<div class="standard-unified-flights-item">
					<h4 class="title">Название и номер рейса</h4>
					<ul class="item-list">
						<li>
							<span class="left-column bold">Тентованый, 2 т</span> <span class="right-column">№ 216445</span>
						</li>
						<li>
							<span class="bold">Город и дата загрузки</span>
						</li>
						<li>
							<span class="bold">Москва</span>
							Загрузка - <span class="color">не указано</span>
						</li>
						<li>
							<span class="bold">Город и дата выгрузки</span>
						</li>
						<li>
							<span class="bold">Тверь</span>
							Выгрузка - 01.01.18
						</li>
						<li>
							<span class="bold">Контакты</span>
						</li>
						<li>
							Сергей - <a href="tel:89035205899">8 (903) 520 - 58 - 99</a>
						</li>
					</ul>
				</div>
				<div class="standard-unified-flights-item">
					<h4 class="title">Название и номер рейса</h4>
					<ul class="item-list">
						<li>
							<span class="left-column bold">Тентованый, 2 т</span> <span class="right-column">№ 216445</span>
						</li>
						<li>
							<span class="bold">Город и дата загрузки</span>
						</li>
						<li>
							<span class="bold">Москва</span>
							Загрузка - <span class="color">не указано</span>
						</li>
						<li>
							<span class="bold">Город и дата выгрузки</span>
						</li>
						<li>
							<span class="bold">Тверь</span>
							Выгрузка - 01.01.18
						</li>
						<li>
							<span class="bold">Контакты</span>
						</li>
						<li>
							Сергей - <a href="tel:89035205899">8 (903) 520 - 58 - 99</a>
						</li>
					</ul>
				</div>
				<div class="standard-unified-flights-item">
					<h4 class="title">Название и номер рейса</h4>
					<ul class="item-list">
						<li>
							<span class="left-column bold">Тентованый, 2 т</span> <span class="right-column">№ 216445</span>
						</li>
						<li>
							<span class="bold">Город и дата загрузки</span>
						</li>
						<li>
							<span class="bold">Москва</span>
							Загрузка - <span class="color">не указано</span>
						</li>
						<li>
							<span class="bold">Город и дата выгрузки</span>
						</li>
						<li>
							<span class="bold">Тверь</span>
							Выгрузка - 01.01.18
						</li>
						<li>
							<span class="bold">Контакты</span>
						</li>
						<li>
							Сергей - <a href="tel:89035205899">8 (903) 520 - 58 - 99</a>
						</li>
					</ul>
				</div>
				<div class="standard-unified-flights-item">
					<h4 class="title">Название и номер рейса</h4>
					<ul class="item-list">
						<li>
							<span class="left-column bold">Тентованый, 2 т</span> <span class="right-column">№ 216445</span>
						</li>
						<li>
							<span class="bold">Город и дата загрузки</span>
						</li>
						<li>
							<span class="bold">Москва</span>
							Загрузка - <span class="color">не указано</span>
						</li>
						<li>
							<span class="bold">Город и дата выгрузки</span>
						</li>
						<li>
							<span class="bold">Тверь</span>
							Выгрузка - 01.01.18
						</li>
						<li>
							<span class="bold">Контакты</span>
						</li>
						<li>
							Сергей - <a href="tel:89035205899">8 (903) 520 - 58 - 99</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="all-lights-btn">
				<a href="" class="limed-spruce-btn">Все рейсы<span class="arrow"></span></a>
			</div>
		</div>
		<!-- end standard-unified-flights -->

		<? if(CModule::IncludeModule("iblock")): ?>
		<div class="unified-text-block-category">
			<?
			$res = CIBlock::GetByID($arParams["IBLOCK_ID"]);
			if($ar_res = $res->GetNext())
				echo $ar_res['~DESCRIPTION'];
			?>
		</div>
		<? endif; ?>
		<!-- end unified-text-block-category -->

	</div>
