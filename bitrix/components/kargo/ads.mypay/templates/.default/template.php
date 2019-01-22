<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if(count($arResult["ITEMS"]) > 0):?>
<ul class="my-payments-table">
	<? foreach($arResult["ITEMS"] as $arItem):?>
    <li>
		<span class="table-cell">
			Платеж <span class="number">№ <?=$arItem['ID']?></span>
		</span>
		<span class="table-cell">
			<span class="table-cell-content">
				<span class="bold">Способ оплаты:</span>
				<span class="payment-method">
					<span class="payment-method-icon">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/payment/15.png" alt="alt">
					</span>
					<span class="payment-method-title">
						Оплата онлайн
					</span>
				</span>
			</span>
		</span>
		<span class="table-cell">
			<span class="table-cell-row">
				<span class="bold">Сумма:</span>
				<span class="text"><?=$arItem['PROPERTIES']['PRICE']['VALUE']?> руб</span>
			</span>
		</span>
		<span class="table-cell">
			<span class="table-cell-row">
				<span class="bold">Дата:</span><span class="text"><?=$arItem['DATE_C'];?></span>
			</span>
			<span class="table-cell-row">
				<span class="bold">Время:</span><span class="text"><?=$arItem['TIME_C']?></span>
			</span>
		</span>
    </li>
	<? endforeach;?>
</ul>
<? else:?>
	<p>Для оплаты перейдите на страницу <a href="/personal/add-balance/">Пополнить баланс</a>.</p>
<? endif; ?>

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
