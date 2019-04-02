<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if(count($arResult['ITEMS']) > 0): ?>
    <? foreach($arResult['ITEMS'] as $arItem): ?>
    <div class="drop-down-menu-column">
        <ul class="drop-down-menu-list hide-mobile">
            <? foreach($arItem as $key => $arMenu):
                ?>
                <?if($arMenu['IS_HOME']):?>
                    <?if(array_keys($arItem)[0] != $key):?>
                        </ul><ul class="drop-down-menu-list">
                    <?endif;?>
                    <li class="title-list-menu">
                        <?=$arMenu['UF_NAME']?>
                    </li>
                <? else: ?>
                    <li>
                        <a href="/<?=$arMenu['IBLOCK_FOLDER']?>/filter/type-is-<?=mb_strtolower($arMenu['UF_XML_ID'])?>/apply/"><?=$arMenu['UF_NAME']?></a>
                    </li>
                <? endif;?>
            <? endforeach; ?>
        </ul>
    </div>
    <? endforeach; ?>
<? endif; ?>
