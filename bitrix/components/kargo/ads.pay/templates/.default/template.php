<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
?>
<form action="#" method="post" class="add-balance-form unified-form" temp="<?=$templateFolder?>">
    <div class="row form-box">
        <div class="col-md-7 col-sm-9">
            <h3 class="form-title">Ваш баланс на данный момент: <span class="price"><?=$arParams["BALANCE"]?> руб</span></h3>
            <div class="row form-group">
                <? if(ROBOKASSA_LOGIN && ROBOKASSA_PWD1): ?>
                <div class="col-sm-12">
                    <?
                    $mrh_login = ROBOKASSA_LOGIN;
                    $mrh_pass1 = ROBOKASSA_PWD1;
                    $inv_id = 0;
                    $inv_desc = "ROBOKASSA";
                    $def_sum = "100";
                    $IsTest = ROBOKASSA_TEST;
                    $crc = md5("$mrh_login::$inv_id:$mrh_pass1");
                    print "<script language=JavaScript ".
                        "src='https://auth.robokassa.ru/Merchant/PaymentForm/FormFLS.js?".
                        "MerchantLogin=$mrh_login&DefaultSum=$def_sum&InvoiceID=$inv_id".
                        "&Description=$inv_desc&SignatureValue=$crc&IsTest=$IsTest'></script>";
                    ?>
                </div>
                <? endif; ?>
            </div>
        </div>
    </div>
    <div class="select-payment-method mod">
        <h2 class="title">Выберите способ оплаты</h2>
        <ul class="select-payment-method-content mod">
            <li>
                <a href="/personal/bill/">
                    <span class="select-payment-method-item">
                        <span class="text">
                        Безнали<span class="dash">-</span><span class="max">чный расчет</span>
                        </span>
                        <span class="item-icon">
                            <img src="<?=SITE_TEMPLATE_PATH;?>/img/icons/payment/15.png" alt="alt">
                        </span>
                    </span>
                </a>
            </li>

        </ul>
        <!-- end select-payment-method-content -->
    </div>
    <!-- end select-payment-method -->
</form>

<div class="unified-ad-unit mobile">
    <div class="ad-unit-head">
        <div class="logo">
            <img src="img/static/ad-unit-logo.png" alt="alt">
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
