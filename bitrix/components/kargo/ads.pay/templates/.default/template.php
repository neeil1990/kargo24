<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
?>
<div class="add-balance-form unified-form" action="<?=$arResult["FORM_TARGET"]?>" temp="<?=$templateFolder?>" pay-number="<?=$arResult['PAYMENT_NUMBER']?>">
    <div class="row form-box">
        <div class="col-md-12 col-sm-9">
            <h3 class="form-title">Ваш баланс на данный момент: <span class="price"><?=$arParams["BALANCE"]?> руб</span></h3>
            <div class="row form-group">
                <div class="col-md-12">
                    <script type='text/javascript' src='https://paymaster.ru/ru-RU/widget/Basic/1?LMI_MERCHANT_ID=<?=$arResult['IN_VOICE_ID']?>&LMI_PAYMENT_AMOUNT=100&LMI_PAYMENT_DESC=Test+payment&LMI_CURRENCY=RUB&LMI_PAYMENT_NO=<?=$arResult['PAYMENT_NUMBER']?>'></script>


                        <ul class="select-payment-method-content">
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


                </div>
            </div>
        </div>
    </div>
</div>

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