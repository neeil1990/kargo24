<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
?>

<form method="post" class="order-form unified-form" action="<?=$arResult["FORM_TARGET"]?>" temp="<?=$templateFolder?>" enctype="multipart/form-data">
    <?=$arResult["BX_SESSION_CHECK"]?>
    <input type="hidden" name="lang" value="<?=LANG?>" />
    <input type="hidden" name="ID" value=<?=$arResult['ITEMS']["ID"]?> />
    <input type="hidden" name="IBLOCK_ID" value=<?=$arResult['ITEMS']["IBLOCK_ID"]?> />

    <h3 class="form-title">Данные объявления.</h3>
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
                    <select class="js-select-type" name="type[<?=$id?>]">
                        <? foreach($h_iblock as $block): ?>
                        <option value="<?=$block['UF_XML_ID']?>" <?=($block['UF_XML_ID'] == $arResult['ITEMS']['PROPERTIES']['TYPE']['VALUE'])?"selected":""?>><?=$block['UF_NAME']?></option>
                        <? endforeach; ?>
                    </select>
                </div>
            </div>
            <? endforeach; ?>

            <h3 class="form-title">Характеристики.</h3>

            <? foreach($arResult['HIGHLOAD_IBLOCK'] as $id_iblock => $arOptions): ?>
                <? foreach($arOptions as $arOption): ?>
                    <?
                    if($arOption['UF_OPTIONS']){
                        foreach($arOption['UF_OPTIONS'] as $id => $option){
                            ?>
                            <div class="row form-group options" data-type="<?=$id_iblock.'_'.$arOption['UF_XML_ID']?>">
                                <div class="col-sm-5">
                                    <span class="input-title"><?=$option['NAME']?></span>
                                    <input type="hidden" name="options_name[<?=$id_iblock?>][<?=$arOption['UF_XML_ID']?>][<?=$id?>]" value="<?=$option['NAME']?>">
                                </div>
                                <div class="col-sm-7">
                                    <? switch($option['PROPERTIES']['FIELD_TYPE']['VALUE_XML_ID']){
                                        case "string":
                                            $prefix = $option['PROPERTIES']['PREFIX']['VALUE'];
                                            ?>
                                            <? if($prefix):?>
                                                <div class="wrapper-input">
                                                    <span class="text-placeholder"><?=$prefix?></span>
                                                    <input type="hidden" name="prefix[<?=$id_iblock?>][<?=$arOption['UF_XML_ID']?>][<?=$id?>]" value=" <?=$prefix?>">
                                            <?endif;?>

                                                    <input type="text"
                                                           class="text-input"
                                                           name="options_value[<?=$id_iblock?>][<?=$arOption['UF_XML_ID']?>][<?=$id?>]"
                                                           value="<?=($arResult['ITEMS']['IBLOCK_ID'] == $id_iblock) ? str_replace($prefix,"",$arResult['ITEMS']['PROPERTIES']['OPTIONS']['VALUE'][trim(strip_tags($option['NAME']))]) : "";?>"
                                                    >

                                            <? if($prefix):?>
                                                </div>
                                            <?endif;?>
                                            <?
                                            break;
                                        case "select":
                                            ?>
                                            <select class="js-select" name="options_value[<?=$id_iblock?>][<?=$arOption['UF_XML_ID']?>][<?=$id?>]">
                                                <? foreach($option['PROPERTIES']['SELECT']['VALUE'] as $select):?>
                                                <option
                                                    value="<?=$select?>"
                                                    <?=($arResult['ITEMS']['IBLOCK_ID'] == $id_iblock && $arResult['ITEMS']['PROPERTIES']['OPTIONS']['VALUE'][trim(strip_tags($option['NAME']))] == $select) ? "selected" : "";?>
                                                    ><?=$select?></option>
                                                <? endforeach; ?>
                                            </select>
                                            <?
                                            break;
                                    }?>
                                </div>
                            </div>
                            <?
                        }
                    }
                    ?>
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

            <h3 class="form-title">где находятся ваши услуги</h3>
            <div class="row form-group">
                <div class="col-sm-5">
                    <span class="input-title">Регион<sup>*</sup></span>
                </div>
                <div class="col-sm-7">
                    <select class="js-select location" name="region" required>
                        <? foreach($arResult['LOCATIONS'] as $region => $array):?>
                            <option value="<?=$region?>" <?=($arResult['ITEMS']['REGION'] == $region) ? "selected" : ""?>><?=$region?></option>
                        <? endforeach; ?>
                    </select>
                    <input type="hidden" value="<?=$arResult['ITEMS']['CITY']?>" id="getCity">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p class="text text-city">Показ объявления в городах (Выберите до 15 ближайших городов, в которых могут оказываться Ваши услуги) <sup>*</sup></p>
                    <div class="show-ads-cities desktop category-unified-wrapper-column"></div>
                    <!-- end show-ads-cities desktop -->
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-5">
                    <span class="input-title">Ваш телефон<sup>*</sup></span>
                </div>
                <div class="col-sm-7">
                    <select class="js-select ads" name="phone">
                        <? foreach($arParams["USER"]["UF_PHONES"] as $phone):?>
                            <option value="<?=$phone?>" <?=($phone == $arResult['ITEMS']['PROPERTIES']['RENTAL_INFO']['VALUE'][array_flip(($arResult['ITEMS']['PROPERTIES']['RENTAL_INFO']['DESCRIPTION']))['phone']])?"selected":""?>><?=$phone?></option>
                        <? endforeach; ?>
                    </select>
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
                <img src="<?=CFile::GetPath($arResult['ITEMS']['PREVIEW_PICTURE']);?>" width="300">
                <input type="hidden" name="image" value="<?=$arResult['ITEMS']['PREVIEW_PICTURE'];?>">
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