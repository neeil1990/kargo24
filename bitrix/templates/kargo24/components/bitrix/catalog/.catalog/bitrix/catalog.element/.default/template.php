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
    <div class="ads-section-head">
        <div class="ads-section-head-img">
            <div class="slider-ad-large-img js-big-slider-img">
                <div class="item-img">
                    <img  src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>" />
                </div>
                <? if(count($arResult["PROPERTIES"]["GALLERY"]["VALUE"]) > 0): ?>
                    <? foreach ($arResult["PROPERTIES"]["GALLERY"]["VALUE"] as $gallery):?>
                        <div class="item-img">
                            <img  src="<?=CFile::GetPath($gallery)?>" alt="<?=$arResult['NAME']?>" />
                        </div>
                    <? endforeach;?>
                <?endif;?>
            </div>
            <!-- end container-large-img -->
            <ul class="slider-ad-small-img js-miniature-pictures">
                <li>
                    <img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>" />
                </li>
                <? if(count($arResult["PROPERTIES"]["GALLERY"]["VALUE"]) > 0): ?>
                    <? foreach ($arResult["PROPERTIES"]["GALLERY"]["VALUE"] as $gallery):?>
                        <li>
                            <img src="<?=CFile::GetPath($gallery)?>" alt="<?=$arResult['NAME']?>" />
                        </li>
                    <? endforeach;?>
                <?endif;?>
            </ul>
            <!-- end container-small-img -->
        </div>
        <!-- end ad-section-head-img -->
        <div class="ads-section-head-desc">
            <!--<h2 class="title"><?/*=$arResult["NAME"]*/?></h2>-->
            <? if(count($arResult["PROPERTIES"]["OPTIONS"]["VALUE"]) > 0 && is_array($arResult["PROPERTIES"]["OPTIONS"]["VALUE"])):?>
            <table class="desc-table">
                <? foreach ($arResult["PROPERTIES"]["OPTIONS"]["VALUE"] as $name => $option):?>
                <tr>
                    <td><?=$arResult["PROPERTIES"]["OPTIONS"]["DESCRIPTION"][$name]?></td>
                    <td><?=$option?></td>
                </tr>
                <? endforeach;?>
            </table>
            <?endif;?>
            <ul class="rental-info">
                <? foreach($arResult['PROPERTIES']['RENTAL_INFO']['VALUE'] as $desc => $value):?>
                    <li>
                        <? if($desc = $arResult['PROPERTIES']['RENTAL_INFO']['DESCRIPTION'][$desc]): ?>
                            <span class="icon icon-<?=$desc?>"></span>
                        <? endif; ?>
                        <?=$value?>
                    </li>
                <? endforeach; ?>
                <!--<li class="last"><span class="icon icon-shopping-list"></span><a href="" class="all-add-btn">Все объявления этого пользователя</a></li>
                <li class="last"><span class="icon icon-danger"></span>
                    <a href="#form-complain-popup" data-toggle="modal" class="complain-btn">Пожаловаться</a>
                </li>-->
            </ul>

        </div>
    </div>
    <!-- end ad-section-head -->
    <div class="ads-section-body">
        <div class="section-title">Описание</div>
        <p class="text"><?=$arResult['PREVIEW_TEXT']?></p>
    </div>
</div>