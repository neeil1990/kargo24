<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if(count($arResult['ITEMS']) > 0):?>
<div class="cargo-transportation-tonnage">
    <h2 class="section-title"><?=$arResult['IBLOCK']['HINT']?></h2>
    <div class="wrapper-unified-column">
        <? foreach($arResult['ITEMS'] as $arItem): ?>
            <div class="unified-column">
            <div class="unified-unit-service">
                <a href="/<?=$arResult['IBLOCK_FOLDER']?>/filter/type-is-<?=mb_strtolower($arItem['UF_XML_ID'])?>/apply/">
                    <div class="item-img">
                        <img src="<?=$arItem['PICTURE'] ?>" alt="<?=$arItem['UF_NAME']?>">
                    </div>
                    <div class="item-desc">
                        <h3 class="title">
                            <?=$arItem['UF_NAME']?>
                        </h3>
                    </div>
                </a>
            </div>
        </div>
        <? endforeach; ?>
    </div>
</div>
<?endif;?>
<!-- end cargo-transportation-tonnage -->



