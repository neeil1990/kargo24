<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if(count($arResult['ITEMS']) > 0): ?>
    <div class="special-equipment-content">
        <? foreach ($arResult['ITEMS'] as &$arSection): ?>
            <div class="special-equipment-item">
                <a href="/<?=$arResult['IBLOCK_FOLDER']?>/filter/type-is-<?=mb_strtolower($arSection['UF_XML_ID'])?>/apply/">
                    <div class="item-img">
                        <img src="<?=$arSection['PICTURE'] ?>" alt="<?=$arSection['UF_NAME']?>">
                    </div>
                    <div class="item-desc">
                        <h3 class="title"><?=$arSection['UF_NAME']?></h3>
                    </div>
                </a>
            </div>
        <? endforeach; ?>
    </div>
<? endif; ?>
