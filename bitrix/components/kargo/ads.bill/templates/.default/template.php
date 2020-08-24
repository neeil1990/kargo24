<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<div class="payment-section-head">
    <p class="text">
        Сейчас вы можете самостоятельно выставить счет на организацию для оплаты с расчетного счета по безналичному расчету без налога (НДС). Минимальная сумма для оплаты 5000 рублей. Счет будет сформирован в электронном виде.
    </p>
    <h3 class="title">По всем вопросам обращайтесь по телефону:</h3>
    <ul class="contact-list">
        <li>
            <span class="icon icon-phone"></span>
            <a href="tel:+8-800-100-37-97">+7-473-203-01-24</a>
        </li>
        <li>
            <span class="icon icon-mail"></span>
            <a href="mailto:info@kargo24.su">info@kargo24.su </a>
        </li>
    </ul>

    <?if(count($arResult['ITEMS']) > 0):?>
        <h3 class="title">Ваши счета: </h3>
        <ul class="discount-bonus-list">
            <? foreach ($arResult['ITEMS'] as $arItem): ?>
            <li>
                <? if($arItem['PROPERTIES']['PAY_BILL']['VALUE'] == "Y"): ?>
                    <span class="icon-check" title="Оплачен">
                        <span class="path1"></span><span class="path2"></span>
                    </span>
                <? else: ?>
                    <span class="icon-check" title="Ждёт оплаты">
                        <span class="path1"></span>
                    </span>
                <? endif; ?>
                Счет №<?=$arItem['ID']?> от <?=$arItem['DATE_CREATE']?>
                <a href="?BILL_ID=<?=$arItem['ID']?>" target="_blank">Распечатать*</a>.
                <? if($arItem['PROPERTIES']['ACTS_BILL']['VALUE']): ?>
                    <?=$arItem['PROPERTIES']['ACTS_BILL']['NAME']?>: <?=implode(", ", $arItem['PROPERTIES']['ACTS_BILL']['LINK'])?>
                <?endif;?>
            </li>
            <?endforeach;?>
    *Если Вам требуется счет с печатью, сформируйте его и напишите нам на
    <span class="icon icon-mail"></span> <a href="mailto:info@kargo24.su">info@kargo24.su</a>
    <b>Номер счета</b>, мы вышлем его Вам. Все оригиналы отправляются 20 числа каждого месяца, содержат оригиналы: счетов и актов за прошлый месяц. 
        </ul>
    <?endif;?>
 
</div>


<!-- end payment-section-head -->
<form action="/bitrix/services/main/ajax.php?c=kargo:ads.bill&action=main&mode=class&signedParameters=<?=$this->getComponent()->getSignedParameters()?>" method="post" class="order-form order-form-mod bill-form">
    <?=bitrix_sessid_post()?>
    <div class="order-form-head">
        <h2 class="title">Реквизиты организации для выставления счета:</h2>
        <div class="row">
            <div class="col-md-8 col-sm-12">

                <div class="row form-group">
                    <div class="col-sm-5">
                        <span class="input-title">Сумма:</span>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" name="price" class="text-input" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-5">
                        <span class="input-title">Плательщик:<sup>*</sup></span>
                    </div>
                    <div class="col-sm-7">
                        <select class="js-select" name="type" required>
                            <option value="1" selected>ООО</option>
                            <option value="2">ИП</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-5">
                        <span class="input-title">ИНН:</span>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" name="inn" class="text-input" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-5">
                        <span class="input-title">ОГРН/ОГРНИП:</span>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" name="ogrn" class="text-input" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-5">
                        <span class="input-title">КПП:</span>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" name="kpp" class="text-input ">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="order-form-footer order-form-footer-mod">
        <div class="footer-btn">
            <div class="wrapper-submit-btn limed-spruce-btn">
                <span class="arrow"></span>
                <input type="submit" name="submit" class="submit-btn" value="Оплатить">
            </div>
            <div class="another-payment-method-btn">
                <a href="/personal/add-balance/">Выбрать другой способ оплаты</a>
            </div>
        </div>
    </div>
</form>
<!-- end order-form -->
