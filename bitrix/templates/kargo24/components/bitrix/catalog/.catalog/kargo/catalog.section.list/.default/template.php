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
                <li><a href="<?=$value['SECTION_PAGE_URL']?>"><?=$value['NAME']?> <?if($value['ELEMENT_CNT']):?>(<?=$value['ELEMENT_CNT']?>)<?endif;?></a> </li>
                <? endforeach; ?>
            </ul>
            <? endforeach; ?>
        </div>
        <? endforeach; ?>
    </div>

</div>
<? endif; ?>
<!-- end category-section-search-region -->

