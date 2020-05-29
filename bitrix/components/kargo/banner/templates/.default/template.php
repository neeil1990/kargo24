<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true  || $arResult['STATUS'] == 'M')
    die();
?>

<form method="post" class="add-banner-form unified-form" action="<?=$arResult["FORM_TARGET"]?>" temp="<?=$templateFolder?>" enctype="multipart/form-data">
    <?=bitrix_sessid_post();?>
    <input type="hidden" name="lang" value="<?=LANG?>" />

    <h3 class="form-title">Данные баннера</h3>
    <div class="row form-box">
        <div class="col-md-7 col-sm-9">

            <div class="row form-group">
                <div class="col-sm-5">
                    <span class="input-title">Выберите категорию услуг<sup>*</sup></span>
                </div>
                <div class="col-sm-7">
                    <select class="js-select-banner" name="IBLOCK_ID">
                        <? foreach($arResult['IBLOCK'] as $id => $name):?>
                            <option value="<?=$id?>" <? if($arResult['IBLOCK_ID_SELECTED'] == $id):?>selected<?endif;?>><?=$name?></option>
                        <? endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="replace-form">
                <div class="row form-group">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-7">
                        <select class="js-select" name="TYPE_XML_ID">
                            <? foreach($arResult['TYPE'] as $id => $name):?>
                                <option value="<?=$id?>" <? if($arResult['TYPE_XML_ID'] == $id):?>selected<?endif;?>><?=$name?></option>
                            <? endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-5">
                        <span class="input-title">Город<sup>*</sup></span>
                    </div>
                    <div class="col-sm-7">
                        <select class="js-select" name="SECTION_ID">
                            <? foreach ($arResult['CITY'] as $id => $name): ?>
                                <option value="<?=$id?>" <? if($arResult['SECTION_ID'] == $id):?>selected<?endif;?>><?=$name?></option>
                            <? endforeach;?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-5">
                    <span class="input-title">Цена<sup>*</sup></span>
                </div>
                <div class="col-sm-7">
                    <input type="text" name="PRICE" class="text-input" value="<?=$arResult['PRICE']?>" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-5">
                    <span class="input-title">Ваш телефон<sup>*</sup></span>
                </div>
                <div class="col-sm-7">
                    <input type="tel" name="PHONE" class="text-input" value="<?=($arResult['PHONE']) ?: $arParams['PHONE']?>" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-5">
                    <span class="input-title">Контактное лицо<sup>*</sup></span>
                </div>
                <div class="col-sm-7">
                    <input type="text" name="NAME" class="text-input" value="<?=($arResult['NAME']) ?: $arParams['NAME']?>" required>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12 col-sm-12">
            <h3 class="form-title">Добавить фото<sup>*</sup></h3>
            <p class="text file-input-text">
                Поддерживаемые форматы: jpg, png. Размеры фото 300*175 px. Вес до 5 МБ.
            </p>
            <div class="row">
                <? if($arResult['PREVIEW_PICTURE']): ?>
                <div class="col-md-7 col-sm-12" style="margin-bottom: 20px">
                    <img src="<?=$arResult['PREVIEW_PICTURE']?>" width="300">
                </div>
                <? endif; ?>
                <div class="col-md-7 col-sm-12">
                    <label class="input-file pad-mobile">
                        <div class="button"><input type="file" name="file" multiple="" onchange="this.parentNode.nextSibling.value = this.value">Обзор</div><input type="text" class="text-input" readonly placeholder="Загрузите фото с компьютера">
                    </label>
                    <div class="wrapper-submit-btn mod limed-spruce-btn">
                        <span class="arrow"></span>
                        <input type="submit" name="banner_save" class="submit-btn" value="Опубликовать">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

