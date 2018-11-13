<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
?>

<form method="post" class="add-banner-form unified-form" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
    <?=$arResult["BX_SESSION_CHECK"]?>
    <input type="hidden" name="lang" value="<?=LANG?>" />
    <input type="hidden" name="ID" value=<?=$arResult['ITEMS']["ID"]?> />
    <input type="hidden" name="IBLOCK_ID" value=<?=$arResult['ITEMS']["IBLOCK_ID"]?> />

    <h3 class="form-title">ДАнные баннера</h3>
    <div class="row form-box">
        <div class="col-md-7 col-sm-9">
            <div class="row form-group">
                <div class="col-sm-5">
                    <span class="input-title">Заголовок (до 25 символов)<sup>*</sup></span>
                </div>
                <div class="col-sm-7">
                    <input type="text" class="text-input" name="name" value="<?=$arResult['ITEMS']['NAME']?>" required>
                </div>
            </div>


            <div class="row form-group">
                <div class="col-sm-5">
                    <span class="input-title">Выберите категорию услуг<sup>*</sup></span>
                </div>
                <div class="col-sm-7">
                    <select class="js-select-ads" name="iblock">
                        <? foreach($arResult['IBLOCK'] as $iblock):?>
                        <option value="<?=$iblock['ID']?>" <?=($iblock['ID'] == $arResult['ITEMS']['IBLOCK_ID'])?"selected":""?>><?=$iblock['NAME']?></option>
                        <? endforeach; ?>
                    </select>
                </div>
            </div>

            <? foreach($arResult['HIGHLOAD_IBLOCK'] as $id => $h_iblock): ?>
            <div class="row form-group type" data-type-id="<?=$id;?>">
                <div class="col-sm-5"><span class="input-title"></span></div>
                <div class="col-sm-7">
                    <select class="js-select" name="type[<?=$id?>]">
                        <? foreach($h_iblock as $block): ?>
                        <option value="<?=$block['UF_XML_ID']?>" <?=($block['UF_XML_ID'] == $arResult['ITEMS']['PROPERTIES']['TYPE']['VALUE'])?"selected":""?>><?=$block['UF_NAME']?></option>
                        <? endforeach; ?>
                    </select>
                </div>
            </div>
            <? endforeach; ?>

            <h3 class="form-title">Характеристики.</h3>

            <? foreach($arParams['OPTIONS_IBLOCK_ID'] as $id => $array): ?>
                <? foreach($array as $value_id => $option):?>
                <div class="row form-group options" data-option-id="<?=$id;?>">
                    <input type="hidden" name="options_name[<?=$id.'_'.$value_id;?>]" value="<?=$option?>">
                    <div class="col-sm-5">
                        <span class="input-title"><?=$option;?></span>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" name="options_value[<?=$id.'_'.$value_id;?>]" value="<?=$arResult['ITEMS']['PROPERTIES']['OPTIONS']['VALUE'][array_flip(($arResult['ITEMS']['PROPERTIES']['OPTIONS']['DESCRIPTION']))[$option]];?>" class="text-input">
                    </div>
                </div>
                <? endforeach; ?>
            <? endforeach; ?>

            <h3 class="form-title">Контактные данные.</h3>

            <div class="row form-group">
                <div class="col-sm-5">
                    <span class="input-title">Контактное лицо<sup>*</sup></span>
                </div>
                <div class="col-sm-7">
                    <input type="text" class="text-input" name="fio" value="<?=$arResult['ITEMS']['PROPERTIES']['RENTAL_INFO']['VALUE'][array_flip(($arResult['ITEMS']['PROPERTIES']['RENTAL_INFO']['DESCRIPTION']))['man-user']]?>" required>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-5">
                    <span class="input-title">Ваш город.<sup>*</sup></span>
                </div>
                <div class="col-sm-7">
                    <input type="text" name="city" class="text-input" id="city_ads" value="<?=$arResult['ITEMS']['PROPERTIES']['RENTAL_INFO']['VALUE'][array_flip(($arResult['ITEMS']['PROPERTIES']['RENTAL_INFO']['DESCRIPTION']))['pin']]?>" required>
                </div>
                <script>
                    var availableTags = <?=$arResult['LOCATIONS_JS']?>;
                </script>
            </div>

            <div class="row form-group">
                <div class="col-sm-5">
                    <span class="input-title">Ваш телефон<sup>*</sup></span>
                </div>
                <div class="col-sm-7">
                    <input type="tel" class="text-input" name="phone" value="<?=$arResult['ITEMS']['PROPERTIES']['RENTAL_INFO']['VALUE'][array_flip(($arResult['ITEMS']['PROPERTIES']['RENTAL_INFO']['DESCRIPTION']))['phone']]?>" required>
                </div>
            </div>


            <div class="row form-group">
                <div class="col-sm-5">
                    <span class="input-title">Цена<sup>*</sup></span>
                </div>
                <div class="col-sm-7">
                    <input type="text" class="text-input" name="price" value="<?=$arResult['ITEMS']['PROPERTIES']['RENTAL_INFO']['VALUE'][array_flip(($arResult['ITEMS']['PROPERTIES']['RENTAL_INFO']['DESCRIPTION']))['coins']]?>" required>
                </div>
            </div>
        </div>
    </div>
    <div class="form-box form-box-pad mod">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h3 class="form-title">Добавить фото<sup>*</sup></h3>
                <p class="text file-input-text">
                    Поддерживаемые форматы: jpg, png. Размеры фото 300*175 px. Вес до 5 МБ.
                </p>
                <div class="row">
                    <div class="col-md-7 col-sm-12">
                        <label class="input-file input-file-mod">
                            <div class="button"><input type="file" name="file" multiple="" onchange="this.parentNode.nextSibling.value = this.value">Обзор</div><input type="text" class="text-input" readonly placeholder="Загрузите фото с компьютера">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h3 class="form-title mod">Дополнительная информация</h3>
            <textarea class="text-area" placeholder="Дополнительна информация" name="description"><?=$arResult['ITEMS']['PREVIEW_TEXT'];?></textarea>
            <div class="wrapper-submit-btn mod limed-spruce-btn">
                <span class="arrow"></span>
                <input type="submit" name="ads_save" class="submit-btn" value="Опубликовать">
            </div>
        </div>
    </div>

</form>