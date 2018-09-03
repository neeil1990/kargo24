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

<? if($arResult['ITEM_SECTION_COLS']): ?>

<div class="category-section-search-region">

    <div class="top-panel">
        <h3 class="title">Выберите регион для поиска</h3>
        <div class="input-container">
            <input type="text" class="text-input" placeholder="Поиск">
        </div>
        <span class="text js-show-hide-btn">Скрыть</span>
    </div>

    <div class="category-section-search-content category-unified-wrapper-column">
        <? foreach($arResult['ITEM_SECTION_COLS'] as $key => $parent):?>
        <div class="category-unified-column">
            <? foreach($parent as $country => $city):?>
            <h4 class="category-unified-title"><?=$country?></h4>
            <ul class="category-unified-list">
                <? foreach($city as $value):?>
                <li><a href="<?=$value['SECTION_PAGE_URL']?>"><?=$value['NAME']?> (<?=$value['ELEMENT_CNT']?>)</a> </li>
                <? endforeach; ?>
            </ul>
            <? endforeach; ?>
        </div>
        <? endforeach; ?>
    </div>

</div>
<!-- end category-section-search-region -->

<div class="cargo-transportation-tonnage">
    <h2 class="section-title">Грузоперевозки по тоннажу</h2>
    <div class="wrapper-unified-column">
        <div class="unified-column">
            <div class="unified-unit-service">
                <a href="">
                    <div class="item-img">
                        <img src="img/static/transportations/05.png" alt="alt">
                    </div>
                    <div class="item-desc">
                        <h3 class="title">
                            Грузы до 1 т
                        </h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="unified-column">
            <div class="unified-unit-service">
                <a href="">
                    <div class="item-img">
                        <img src="img/static/transportations/06.png" alt="alt">
                    </div>
                    <div class="item-desc">
                        <h3 class="title">
                            Грузы до 2 т
                        </h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="unified-column">
            <div class="unified-unit-service">
                <a href="">
                    <div class="item-img">
                        <img src="img/static/transportations/07.png" alt="alt">
                    </div>
                    <div class="item-desc">
                        <h3 class="title">
                            Грузы до 3,5 т
                        </h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="unified-column">
            <div class="unified-unit-service">
                <a href="">
                    <div class="item-img">
                        <img src="img/static/transportations/08.png" alt="alt">
                    </div>
                    <div class="item-desc">
                        <h3 class="title">
                            Грузы до 5 т
                        </h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="unified-column">
            <div class="unified-unit-service">
                <a href="">
                    <div class="item-img">
                        <img src="img/static/transportations/09.png" alt="alt">
                    </div>
                    <div class="item-desc">
                        <h3 class="title">
                            Грузы до 10 т
                        </h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="unified-column">
            <div class="unified-unit-service">
                <a href="">
                    <div class="item-img">
                        <img src="img/static/transportations/10.png" alt="alt">
                    </div>
                    <div class="item-desc">
                        <h3 class="title">
                            Грузы до 20 т
                        </h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- end cargo-transportation-tonnage -->
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

<? else: ?>

    <!-- end transportations-section -->
    <section class="special-equipment-section">
        <div class="special-equipment-content">
            <? foreach($arResult['SECTIONS'] as $section): ?>
            <div class="special-equipment-item">
                <a href="<?=$section['SECTION_PAGE_URL']?>">
                    <div class="item-img">
                        <img src="<?=$section['PICTURE']['SRC']?>" alt="alt">
                    </div>
                    <div class="item-desc">
                        <h3 class="title"><?=$section['NAME']?></h3>
                    </div>
                </a>
            </div>
            <? endforeach; ?>
        </div>
    </section>
    <!-- end special-equipment-section -->

<? endif; ?>

