<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
if(count($arResult["ITEMS"]) > 0): ?>

    <div class="add-advert-btn border_btn">
        <a href="/personal/ads/" class="limed-spruce-btn">Добавить объявление<span class="arrow"></span></a>
    </div>

    <? foreach($arResult["ITEMS"] as $arItem):
        if($arItem['PROPERTIES']['HIDDEN']['VALUE'] == "Y")
            continue;
        ?>
    <div class="ready-made-ads-item <?=($arItem["ACTIVE"] == "Y") ? 'active' : '';?>" data-id="<?=$arItem['ID']?>" data-iblock="<?=$arItem['IBLOCK_ID']?>" temp-path="<?=$templateFolder?>">
        <div class="row top-panel">
            <div class="col-lg-8">
                <div class="status-and-date">
                    <div class="cell">
                        <h4 class="title">№ Объявления</h4>
                        <span class="date">
                            <?=$arItem["ID"];?>
                        </span>
                    </div>
                    <div class="cell">
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
                    <div class="cell">
                        <h4 class="title">Дата:</h4>
                        <span class="date">
                            <? if($arItem["ACTIVE"] == "Y"):?>
                                <?=strstr($arItem['DATE_ACTIVE_FROM']," ",true);?> - <?=strstr($arItem['DATE_ACTIVE_TO'], " ",true);?>
                                <span class="color">(активно)</span>
                            <? else: ?>
                                <?=strstr($arItem["DATE_CREATE"]," ",true);?> <span class="color">(создано)</span>
                            <?endif;?>
                        </span>
                    </div>
                    <div class="cell"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <? if($arItem['PROPERTIES']['STATUS']['VALUE_XML_ID'] != 'M'):?>
                <div class="ads-btn">
                    <a href="/personal/ads/<?=$arItem['ID']?>/" class="edit-btn">Редактировать</a>
                    <a href="" class="delete-btn delete-ads" data-id="<?=$arItem['ID']?>" temp-path="<?=$templateFolder?>">Удалить</a>
                </div>
                <?endif;?>
            </div>
        </div>
        <!-- end top-panel -->
        <div class="unified-transport-unit">
            <div class="item-img <?=(!$arItem['PREVIEW_PICTURE'])?"no-photo":""?>">
                <?if($image = $arItem['PREVIEW_PICTURE']):?>
                    <img src="<?=CFile::GetPath($image);?>" alt="<?=$arItem['NAME']?>">
                <? else: ?>
                    <p class="no-photo-text">Фотография подставляется из общей базы, рекомендуем залить своё изображение для повышения доверия к объявлению.</p>
                <? endif; ?>
            </div>
            <div class="item-desc">
                <div class="title-and-number">
                    <span class="number">№ <?=$arItem['ID']?></span>
                    <h3 class="title"><?=$arItem['NAME']?></h3>
                </div>
                <p class="text"><?=strip_tags($arItem['PREVIEW_TEXT'])?></p>
                <ul class="rental-info">
                    <? foreach($arItem['PROPERTIES']['RENTAL_INFO']['VALUE'] as $desc => $value): ?>
                    <li>
                        <span class="icon icon-<?=$arItem['PROPERTIES']['RENTAL_INFO']['DESCRIPTION'][$desc]?>"></span>
                        <?=$value?>
                    </li>
                    <? endforeach; ?>
                </ul>

                <?
                $option_division = ceil(count($arItem['PROPERTIES']['OPTIONS']['VALUE'])/2);
                $arOptions = array_chunk($arItem['PROPERTIES']['OPTIONS']['VALUE'],$option_division,true);
                foreach($arOptions as $key => $options):
                ?>
                <table class="characteristics-table">
                    <tbody>
                    <? foreach($options as $key => $option): ?>
                    <tr>
                        <td><?=$arItem['PROPERTIES']['OPTIONS']['DESCRIPTION'][$key]?></td>
                        <td><?=$option?></td>
                    </tr>
                    <? endforeach; ?>
                    </tbody>
                </table>
                <? endforeach; ?>
            </div>
        </div>
        <!-- end unified-transport-unit -->
        <div class="item-footer">
            <div class="footer-ads-btn">
                <div class="row">

                    <div class="col-md-3">
                        <a href="" class="limed-spruce-btn go-over-btn up-ads" up-price="<?=($up_percent = addPrecent($arItem['IBLOCK_ID'],$arItem['ID'],UP_ADS_PAY)) ? $up_percent : UP_ADS_PAY?>">поднять<span class="arrow"></span></a>
                    </div>
                    <div class="col-md-3">
                    <?if($arItem["ACTIVE"] == "Y"): ?>
                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" target="_blank" class="limed-spruce-btn go-over-btn">Посмотреть<span class="arrow"></span></a>
                    <?endif;?>
                    </div>

                    <?if($arItem['PROPERTIES']['TARIFF']['VALUE']):?>
                        <div class="col-md-6">
                            <?
                            $add_percent = addPrecent($arItem['IBLOCK_ID'],$arItem['ID'],(int)$arItem['PROPERTIES']['TARIFF']['VALUE_XML_ID']);
                            $plus_percent = str_replace($arItem['PROPERTIES']['TARIFF']['VALUE_XML_ID'],$add_percent,$arItem['PROPERTIES']['TARIFF']['VALUE']);
                            $arItem['PROPERTIES']['TARIFF']['VALUE'] = ($add_percent) ? $plus_percent : $arItem['PROPERTIES']['TARIFF']['VALUE'];
                            ?>
                            <a class="add-announcement-btn">Оплачен: <?=$arItem['PROPERTIES']['TARIFF']['VALUE']?></a>
                        </div>
                    <?else:?>
                        <div class="col-md-3 delete-pay">
                            <a href="" class="add-announcement-btn">Оплатить объявление</a>
                        </div>
                        <div class="col-md-3">
                            <select class="js-select pay-ads pays" name="pay_ads" data-id="<?=$arItem['ID']?>" temp-path="<?=$templateFolder?>">
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
                        </div>
                    <? endif; ?>

                </div>
            </div>
        </div>
        <!-- end item-footer -->
    </div>
    <!-- end ready-made-ads-item -->
    <? endforeach; ?>
    <div class="add-advert-btn">
        <a href="/personal/ads/" class="limed-spruce-btn">Добавить объявление<span class="arrow"></span></a>
    </div>


<? else: ?>
<div class="personal-area-text-item first">
    <h3 class="title">Если вы заказчик</h3>
    <ul class="text-item-list">
        <li>
										<span class="icon-check">
											<span class="path1"></span><span class="path2"></span>
										</span>
            <a href="">Оставьте свой заказ</a> и ждите предложений от владельцев техники.
        </li>
        <li>
										<span class="icon-check">
											<span class="path1"></span><span class="path2"></span>
										</span>
            <a href="">найдите объявления</a> и свяжитесь напрямую по указанным телефонам.
        </li>
    </ul>
</div>
<!-- end personal-area-text-item -->
<div class="personal-area-text-item">
    <h3 class="title">Если вы владелец спецтехники</h3>
    <ul class="text-item-list">
        <li>
										<span class="icon-check">
											<span class="path1"></span><span class="path2"></span>
										</span>
            <a href="/personal/ads/">Добавьте объявление</a> и заказчики смогут связаться с Вами напрямую.
        </li>
        <li>
										<span class="icon-check">
											<span class="path1"></span><span class="path2"></span>
										</span>
            <a href="">Посмотрите заказы</a> и сделайте предложение по указанным контактам.
        </li>
    </ul>
</div>
<!-- end personal-area-text-item -->
<div class="personal-area-text-item last">
    <h3 class="title">Если вы владелец грузового транспорта</h3>
    <ul class="text-item-list">
        <li>
										<span class="icon-check">
											<span class="path1"></span><span class="path2"></span>
										</span>
            <a href="/personal/ads/">Добавте объявление</a> и заказчики смогут связаться с Вами напрямую.
        </li>
        <li>
										<span class="icon-check">
											<span class="path1"></span><span class="path2"></span>
										</span>
            <a href="">Найдите грузы</a> и сделайте предложение по указанным контактам.
        </li>
    </ul>
</div>
<!-- end personal-area-text-item -->
<div class="technical-support-service">
    <div class="row">
        <div class="col-sm-7">
            <h3 class="title">Служба технической поддержки</h3>
            <ul class="contact-list">
                <li>
                    <span class="icon icon-old-phone"></span>
                    <strong>Телефон:</strong>
                    +7 (495) 920-77-37
                </li>
                <li>
                    <span class="icon icon-phone"></span>
                    <strong>Моб.телефоны: </strong>
                    <a href="tel:+79166705523">+7 (916) 670-55-23</a> (Валерий Агафонов) <br>
                    <a href="tel:+79166705523">+7 (926) 230-10-84</a> (Кирилл Макаров)
                </li>
                <li>
                    <span class="icon icon-phone"></span>
                    <strong>Бухгалтер:</strong>
                    <a href="tel:+79166705523">+7 (916) 670-55-23</a> (Валерий Агафонов)
                </li>
                <li>
                    <span class="icon icon-calendar"></span>
                    <strong>Режим работы:</strong>
                    пн-пт с 10:00 до 20:00 (по московскому времени)
                </li>
                <li>
                    <span class="icon icon-mail"></span>
                    <strong>Email:</strong>
                    <a href="mailto:gruz@perevozka24.ru">gruz@perevozka24.ru</a>
                </li>
                <li>
                    <span class="icon icon-pin"></span>
                    <strong>Адрес офиса: </strong>
                    Московская область, город Долгопрудный, ул. Заводская, д. 7, №8
                </li>
            </ul>
        </div>
        <div class="col-sm-5 col-mod-left">
            <div class="map-container">
                <img src="img/static/adversting/map.jpg" alt="alt">
            </div>
        </div>
    </div>
</div>
<!-- end technical-support-service -->
<div class="unified-ad-unit mobile">
    <div class="ad-unit-head">
        <div class="logo">
            <img src="/bitrix/templates/kargo24/img/static/adsin-unit-logo.png" alt="alt">
        </div>
        <span class="logo-text">Диспетчерский интернет-сервис</span>
    </div>
    <div class="ad-unit-img">
        <img src="img/static/ad.png" alt="alt">
    </div>
    <div class="ad-init-footer">
        <span class="title">Узнайте как разместить рекламу</span>
        <a href="" class="limed-spruce-btn white more-info-btn"><span class="text">подробнее</span><span class="arrow"></span></a>
    </div>
</div>
<? endif; ?>
