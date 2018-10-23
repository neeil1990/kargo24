<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if(!$arParams["TYPE"]):?>
<!-- end transportations-section -->
<section class="special-equipment-section">
    <div class="special-equipment-content">
        <? foreach($arResult['ITEMS'] as $arItem): ?>
            <div class="special-equipment-item">
                <a href="?TYPE=<?=mb_strtolower($arItem['UF_XML_ID'])?>">
                    <div class="item-img">
                        <img src="<?=$arItem['PICTURE'] ?>" alt="alt">
                    </div>
                    <div class="item-desc">
                        <h3 class="title"><?=$arItem['UF_NAME']?></h3>
                    </div>
                </a>
            </div>
        <? endforeach; ?>
    </div>
</section>
<!-- end special-equipment-section -->
<? else: ?>

<?
    if($type = $arResult['ITEMS'][$arParams["TYPE"]]):?>

        <?=$type['UF_FULL_DESCRIPTION'];?>

    <? endif; ?>

<? endif; ?>
