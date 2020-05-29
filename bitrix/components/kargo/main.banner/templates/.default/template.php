<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? foreach ($arResult['ITEMS'] as $arItem): ?>
<div class="my-banners-item">
    <div class="my-banners-item-content">
        <div class="item-column">
            <div class="item-body">
                <div class="top-panel">
                    <h3 class="title"><?=$arItem['PROPERTIES']['NAME']['VALUE']?></h3>
                    <? if($arItem['PROPERTIES']['STATUS']['VALUE_XML_ID'] != 'M'): ?>
                    <a href="" class="delete-btn delete-banner" data-id="<?=$arItem['ID']?>" temp-path="<?=$templateFolder?>">Удалить</a>
                    <? endif; ?>
                </div>
                <div class="status-and-date">
                    <div class="column">
                        <h4 class="title">Статус:</h4>
                        <?php
                        switch ($arItem['PROPERTIES']['STATUS']['VALUE_XML_ID']) {
                            case "P":?>
                                <span class="published">
                                    <span class="icon-check">
                                        <span class="path1"></span><span class="path2"></span>
                                     </span>
                                    <?if($arItem["ACTIVE"] == "Y"): ?>Опубликовано<?else:?>Опубликовано, но не активно<?endif;?>
                                </span>
                                <? break;
                            case "M":?>
                                <span class="published">
                                    <span class="icon-check">
                                        <span class="path1"></span><span class="path2"></span>
                                     </span>
                                    На модерации
                                </span>
                                <? break;
                            case "N":?>
                                <span class="not-published">
                                    <span class="icon-prohibited"></span>
                                    Не показывается
                                </span>
                                <? break;
                            case "O":?>
                                <span class="not-published">
                                    <span class="icon-prohibited"></span>
                                    Отклонено
                                </span>
                                <? break;
                        }
                        ?>
                    </div>
                    <? if($arItem['PROPERTIES']['STATUS']['VALUE_XML_ID'] == 'P'): ?>
                    <div class="column">
                        <h4 class="title">Дата:</h4>
                        <span class="date"><?=$arItem['ACTIVE_FROM']?> - <?=$arItem['ACTIVE_TO']?></span>
                    </div>
                    <?endif;?>
                </div>

                <? if($arItem['PROPERTIES']['STATUS']['VALUE_XML_ID'] != 'M'): ?>
                <a href="/personal/banner/<?=$arItem['ID']?>/" class="edit-btn">Редактировать иформацию и изображение</a>
                <?endif;?>
            </div>
            <div class="item-footer desktop">
                 <?if($arItem['PROPERTIES']['TARIFF']['VALUE']):?>
                     <?
                     $add_percent = addPrecent($arItem['IBLOCK_ID'],$arItem['ID'],(int)$arItem['PROPERTIES']['TARIFF']['VALUE_XML_ID']);
                     $plus_percent = str_replace($arItem['PROPERTIES']['TARIFF']['VALUE_XML_ID'],$add_percent,$arItem['PROPERTIES']['TARIFF']['VALUE']);
                     $arItem['PROPERTIES']['TARIFF']['VALUE'] = ($add_percent) ? $plus_percent : $arItem['PROPERTIES']['TARIFF']['VALUE'];
                     ?>
                     <a class="exten-publication-btn">Оплачен: <?=$arItem['PROPERTIES']['TARIFF']['VALUE']?></a>
                 <?else:?>
                     <a href="" class="exten-publication-btn">Оплатить публикацию</a>
                     <select class="js-select pays" name="pay_banner" data-id="<?=$arItem['ID']?>" temp-path="<?=$templateFolder?>">
                         <option value="">Выберите тариф</option>
                         <? foreach($arItem['PROPERTIES']['TARIFF']['ENUMS'] as $k => $arEnum):?>
                             <?
                             $add_percent = addPrecent($arItem['IBLOCK_ID'],$arItem['ID'],(int)$arItem['PROPERTIES']['TARIFF']['ENUMS'][$k]['XML_ID']);
                             $plus_percent = str_replace($arItem['PROPERTIES']['TARIFF']['ENUMS'][$k]['XML_ID'],$add_percent,$arEnum['VALUE']);
                             $arEnum['VALUE'] = ($add_percent) ? $plus_percent : $arEnum['VALUE'];
                             ?>
                             <option value="<?=$arItem['PROPERTIES']['TARIFF']['IBLOCK_ID']?>;<?=$arEnum['ID']?>"><?=$arEnum['VALUE']?></option>
                         <? endforeach; ?>
                     </select>
                 <? endif; ?>
            </div>
        </div>
        <div class="item-column">
            <div class="sidebar-product-item">
                <div class="logo">
                    <img src="<?=$templateFolder?>/img/logo.png" alt="<?=$arItem['NAME']?>">
                </div>
                <div class="product-img">
                    <a href=""><img src="<?=CFile::GetPath($arItem['PREVIEW_PICTURE'])?>" alt="<?=$arItem['NAME']?>"></a>
                </div>
                <div class="product-desc">
                    <h3 class="title"><?=$arItem['TITLE']?></h3>
                    <table class="desc-info">
                        <tbody><tr>
                            <td>Город:</td>
                            <td><?=$arItem['CITY']?></td>
                        </tr>
                        <tr>
                            <td>Цена:</td>
                            <td><?=$arItem['PROPERTIES']['PRICE']['VALUE']?> руб.</td>
                        </tr>
                        <tr>
                            <td>Контакты: </td>
                            <td><?=$arItem['PROPERTIES']['PHONE']['VALUE']?> (<?=$arItem['PROPERTIES']['NAME']['VALUE']?>)</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="item-footer mobile">

                <!--//... -->
            </div>
        </div>
    </div>
</div>
<!-- end my-banners-item -->
<? endforeach; ?>

<div class="add-advert-btn">
    <a href="/personal/banner/" class="limed-spruce-btn">Купить новый баннер<span class="arrow"></span></a>
</div>
