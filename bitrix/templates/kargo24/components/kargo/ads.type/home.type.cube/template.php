<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if(count($arResult['ITEMS']) > 0): ?>
    <div class="section-title <?=$arParams['CLASS_TITLE']?>">
        <?
        $res = CIBlock::GetByID($arParams["IBLOCK_ID"]);
        if($ar_res = $res->GetNext())
            echo $ar_res['NAME'];
        ?>
    </div>
    <div class="<?=$arParams['CLASS_BODY']?> wrapper-unified-column <?=$arParams['CLASS_TITLE']?>">
        <? foreach ($arResult['ITEMS'] as &$arSection): ?>
            <div class="unified-column">
                <div class="unified-unit-service">
                    <a href="/<?=$arResult['IBLOCK_FOLDER']?>/filter/type-is-<?=mb_strtolower($arSection['UF_XML_ID'])?>/apply/">
                        <div class="item-img">
                            <img src="<?=$arSection['PICTURE'] ?>" alt="<?=$arSection['UF_NAME']?>">
                        </div>
                        <div class="item-desc">
                            <h3 class="title">
                                <?=$arSection['UF_NAME']?>
                            </h3>
                        </div>
                    </a>
                </div>
            </div>
        <? endforeach; ?>
    </div>
<? endif; ?>
