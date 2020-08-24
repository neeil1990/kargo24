<?
global $APPLICATION;
global $USER;
$APPLICATION->RestartBuffer();

if(empty($arResult) && $USER->GetID() != $arResult['CREATED_BY'])
    die("Счёт не найден!");

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title>Счет: №  <?=$arResult['ID'];?></title>
    <meta http-equiv=content-type content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <style type="text/css">
        @media print {
            *{-webkit-print-color-adjust:exact;}
            @page{margin:1cm;}
            a,a:visited{color:#000;outline:0 none;}
            .no_print,.warning,.button_small {display:none !important;}
            select {	border: none; background: transparent; -webkit-appearance: none; -moz-appearance: none; appearance: none; }
            .frame_form {
                margin: 0;
                padding: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
        @media screen {
            .landscape { width:297mm; }
            .book { width:210mm; }
            .frame_form {
                padding: 0.3cm;
                background: white;
                margin: 60px auto;
                border: 1px #D3D3D3 solid;
                border-radius: 5px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }
            .frame_form .frame_form {
                margin: 0;
                padding: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
        .frame_form {counter-reset:section;}
        .counter{counter-increment:section;}
        .counter:before{content:counter(section) " ";}
        select{position:absolute;margin-top:-6px;background:transparent;font-size:1em;}
        select,.button.green,.remove{cursor:pointer;}
        .invoice_menu,.invoice_menu_mass{position:fixed;z-index:99;background-color:#f5f5f5;-webkit-box-shadow:0 0 6px 0 rgba(50,50,50,0.58);-moz-box-shadow:0 0 6px 0 rgba(50,50,50,0.58);box-shadow:0 0 6px 0 rgba(50,50,50,0.58);width:97%;left:0;right:0;top:0;margin:0 auto;padding:13px 10px;text-align:center;}
        .orders-alert{position:absolute;width:210px;height:47px;text-align:center;top:0;line-height:3.2;left:0;right:0;background:#aaa;margin:0 auto;}
        .top-item-one:nth-child(1){text-align:center;flex-basis:47%;min-width:47%;border:1px solid;}
        .top-item-one:nth-child(1) div{display:inline-block;padding:0 0 0 5px;}
        .top-item-one:nth-child(1) div:nth-child(2),.top-item-one:nth-child(1) div:nth-child(4){width:80%;text-align:left;}
        .top-item-one:nth-child(1) div:nth-child(3){border-left:1px solid;}
        .top-item-one:nth-child(1) div:nth-child(1),.top-item-one:nth-child(1) div:nth-child(3){width:20%;font-weight:700;}
        .top-item-one:nth-child(2){flex-basis:7.5%;min-width:7.5%;border:1px solid;border-left:none;border-right:none;}
        .top-item-one:nth-child(3){text-align:center;flex-basis:43%;min-width:43%;border:1px solid;font-weight:700;}
        .top-item-two:nth-child(1){flex-basis:47%;min-width:47%;border-left:1px solid;font-weight:700;}
        .top-item-two:nth-child(2){text-align:right;flex-basis:7.5%;min-width:7.5%;border-left:1px solid;border-right:1px solid;}
        .top-item-three:nth-child(1){flex-basis:47%;min-width:47%;border-left:1px solid;}
        .top-item-three:nth-child(2){text-align:right;flex-basis:7.5%;min-width:7.5%;font-weight:700;border-left:1px solid;border-right:1px solid;}
        .top-item-four:nth-child(1){flex-basis:47%;min-width:47%;font-weight:700;border-top:1px solid;border-left:1px solid;border-bottom:none;}
        .top-item-four:nth-child(2){text-align:right;flex-basis:7.5%;min-width:7.5%;font-weight:700;border:1px solid;border-bottom:none;}
        .top-item-four:nth-child(3){flex-basis:43%;min-width:43%;border-top:1px solid;border-right:1px solid;}
        .top-item-five:nth-child(1){flex-basis:47%;min-width:47%;border-left:1px solid;border-bottom:1px solid;}
        .top-item-five:nth-child(2){text-align:right;flex-basis:7.5%;min-width:7.5%;font-weight:700;border:1px solid;}
        .top-item-five:nth-child(3){flex-basis:43%;min-width:43%;border:1px solid;border-left:none;}
        .top-column{display:flex;flex-direction:column;padding:0 0 5px;}
        .item-top-column:nth-child(2){border-bottom:1px solid;font-weight:700;padding:4px 0 0 4px;}
        .title{display:flex;flex-direction:column;}
        .item-title-line-title:nth-child(1){font-size:2em;font-weight:700;border-bottom:3px solid;line-height:1.2;white-space:nowrap;padding:0 5px;}
        .item-title-line-title:nth-child(2){flex-basis:100%;font-size:2em;font-weight:700;border-bottom:3px solid;line-height:1.2;white-space:nowrap;padding:0 5px;}
        .item-line-title:nth-child(1){flex-basis:90px;text-align:right;font-weight:700;padding:0 3px 0 0;}
        .item-line-title:nth-child(2){flex-basis:100%;border-bottom:1px solid;}
        .top-one,.top-two,.top-three,.top-four,.top-five{display:flex;justify-content:center;}
        .top-item-one,.top-item-two,.top-item-three,.top-item-four,.top-item-five{padding:2px;}
        .top-item-two:nth-child(3),.top-item-three:nth-child(3){flex-basis:43%;min-width:43%;border-right:1px solid;}
        .item-top-column:nth-child(3),.item-top-column:nth-child(4),.item-top-column:nth-child(5){border-bottom:1px solid;padding:4px 0 0 4px;}
        .item-invoice-total:nth-child(1){white-space:nowrap;font-weight:700;padding:0 5px 0 0;}
        .item-invoice-total:nth-child(2){flex-basis:100%;}
        .invoice-total:nth-child(2) .item-invoice-total:nth-child(1){border-bottom:1px solid;flex-basis:100%;}
        .block-bottom{display:flex;justify-content:space-between;padding:10px 0 0 10px;}
        .item-bottom:nth-child(1){flex-basis:340px;text-align:right;}
        .item-bottom:nth-child(2){border-bottom:1px solid;flex-basis:100%;text-align:center;margin:0 10px;}
        .item-bottom:nth-child(3){border-bottom:1px solid;flex-basis:100%;text-align:center;}
        .block-bottom:nth-child(2),.block-bottom:nth-child(4),.block-bottom:nth-child(6){padding:0 0 0 10px;}
        .block-bottom:nth-child(2) .item-bottom:nth-child(2),.block-bottom:nth-child(2) .item-bottom:nth-child(3),.block-bottom:nth-child(4) .item-bottom:nth-child(2),.block-bottom:nth-child(4) .item-bottom:nth-child(3),.block-bottom:nth-child(6) .item-bottom:nth-child(2),.block-bottom:nth-child(6) .item-bottom:nth-child(3){font-size:.7em;border:none;}
        .order-items table{margin-bottom:1px;width:100%;}
        .order-items th,.order-items td{border:1px solid;}
        .order-items th:nth-child(2){width:100%;}
        .order-items th{font-size:.8em;}
        .order-items th:nth-child(6) div:nth-child(1){border-bottom:1px solid;}
        .order-items th:nth-child(6) span:nth-child(2){border-right:1px solid;}
        .order-items td{border:1px solid;padding:1px 2px;white-space: nowrap;}
        .order-items td:nth-child(1){text-align:center;font-weight:700;}
        .order-items td:nth-child(5){text-align:right;}
        .order-items td:nth-child(6){text-align:center;width:50px;}
        .invoice_table_bottom td:nth-child(1){border:none;text-align:right;font-weight:100;padding:0 2px;}
        .invoice_table_bottom td:nth-child(2){text-align:right;width:50px;white-space:nowrap;}
        .order-items td:nth-child(6) span{font-size:.6em;white-space: nowrap;vertical-align: middle;}
        .remove{position:absolute;cursor:pointer;margin:-3px 0 0 -25px;}
        .remove img{width:20px;}
        .paid-stamp img{width:135px;left:0;top:0;}
        .invoice_table_bottom td:nth-child(1) .button {font-size: 10px !important;padding: 1px 5px 3px !important;height: 11px !important;line-height: 1 !important;text-align: center;position: absolute;}
        .stamp_src,.faximile_src{cursor:move;position:absolute;}
        .top-item-one,.invoice-total{display:flex;justify-content:space-between;}
        .item-top-column:nth-child(1) p,.bottom_text p{margin: 0;line-height: 1;}
        .bottom_text{text-align:center;margin:10px 0 0;}
        .item-top-column:nth-child(1),.order-items td:nth-child(3),.order-items td:nth-child(4){text-align:center;}
        .line-title,.title-line-title{display:flex;padding:4px;}
        .order-items td:nth-child(7),.order-items td:nth-child(8){text-align:right;width:48px;}
        @media print { @page { margin:5mm; } }
        body { font-size:14px; }
        .order-items th { background-color:#eed; color:#000; }
        .faximile_src {
            width:40mm;
            height:mm;
            left: 200px;
            bottom: -115pxpx;
        }
        .stamp_src {
            width:35mm;
            height:mm;
            left: 300px;
            bottom: -115pxpx;
        }
    </style>
</head>
<body>
<div class="invoice_menu no_print">
    <span class="button green translate" onclick="window.print();">РАСПЕЧАТАТЬ</span>
</div>
<div class="frame_form landscape">
    <div class="hend-top">
        <div class="top-column">
            <div class="item-top-column inline_edit"  >
                <p>
                    <img src="<?=SITE_TEMPLATE_PATH;?>/img/static/logo.png" alt="" style="float: left; margin: 0px 10px 10px 0px;">
                </p><p>
                    Внимание! Счет действителен 5 календарных дней.
                </p><p style="margin-left: 180px;">
                    Оплата данного счета означает согласие с условиями предоставления сервиса.</p>

                   <p> ИП Виленская Ю.А.применяет УСН, счет-фактура не предоставляется.</p>
                <p style="margin-left: 180px;"><br></p><p style="margin-left: 180px;"><br>
                </p><p style="margin-left: 180px;">
                    <span></span>
                </p>
                <p><br></p>
            </div>
        </div>
    </div>
    <div class="hend-bottom">
        <div class="top-one">
            <div class="top-item-one">
                <div>ИНН:</div><div class="inline_edit"  >362903774541</div>
                <div>КПП:</div><div class="inline_edit"  ></div>
            </div>
            <div class="top-item-one"></div>
            <div class="top-item-one"></div>
        </div>
        <div class="top-two">
            <div class="top-item-two">Получатель</div>
            <div class="top-item-two"></div>
            <div class="top-item-two"></div>
        </div>
        <div class="top-three">
            <div class="top-item-three inline_edit"  >Индивидуальный Предприниматель Виленская Юлия Андреевна</div>
            <div class="top-item-three">Р/счет</div>
            <div class="top-item-three inline_edit"  >40802810300000019189</div>
        </div>
        <div class="top-four">
            <div class="top-item-four">Банк получателя</div>
            <div class="top-item-four">БИК</div>
            <div class="top-item-four inline_edit"  >044525974</div>
        </div>
        <div class="top-five">
            <div class="top-item-five inline_edit"  >Банк АО «Тинькофф Банк»</div>
            <div class="top-item-five">К/счет</div>
            <div class="top-item-five inline_edit"  >30101810145250000974</div>
        </div>
    </div>
    <div class="hend-title">
        <div class="title">
            <div class="item-title">
                <div class="title-line-title">
                    <div class="item-title-line-title">Счет:</div>
                    <div class="item-title-line-title inline_edit"  >№  K-<?=$arResult['ID'];?> от <?=$arResult['DATE']?></div>
                </div>
            </div>
            <div class="item-title">
                <div class="line-title">
                    <div class="item-line-title">Поставщик:</div>
                    <div class="item-line-title inline_edit"  >Индивидуальный Предприниматель Виленская Юлия Андреевна, 394030 г.Воронеж, ул. Революции 1905 года, 31Е-174, ИНН: 362903774541 , тел: +7-473-203-01-24 , info@kargo24.su</div>
                </div>
            </div>

            <div class="item-title">
                <div class="line-title">
                    <div class="item-line-title">Плательщик:</div>
                    <div class="item-line-title inline_edit"  >
                        <?=$arResult['PROPERTIES']['TYPE']['VALUE']?>
                        <?=$USER->GetFullName();?>,
                        ИНН: <?=$arResult['PROPERTIES']['INN']['VALUE']?>,
                        ОГРН/ОГРНИП: <?=$arResult['PROPERTIES']['OGRN']['VALUE']?>,
                        КПП: <?=$arResult['PROPERTIES']['KPP']['VALUE']?>
                    </div>
                </div>
            </div>
            <div class="item-title">
                <div class="line-title">
                    <div class="item-line-title">Основание:</div>
                    <div class="item-line-title inline_edit"  >Оплата заказа: №  <?=$arResult['ID'];?> от <?=$arResult['DATE']?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="order-items">
        <table border="0" cellpadding="0" cellspacing="0" class="tablesorter">
            <thead>
            <tr>
                <th>№</th>
                <th>Наименование товара, работ, услуг</th>
                <th>Ед.<br>изм.</th>
                <th>Кол-<br>во</th>
                <th>Цена</th>
                <th>Сумма<br> с НДС</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td><div class="counter"></div></td>
                <td class="inline_edit"  >Оплата информационных услуг</td>
                <td class="inline_edit"  > - </td>
                <td class="inline_edit"  > - </td>
                <td class="inline_edit"  ><?=number_format($arResult['PROPERTIES']['PRICE']['VALUE'], 2, '.', ' ');?></td>

                <td class="inline_edit" ><?=number_format($arResult['PROPERTIES']['PRICE']['VALUE'], 2, '.', ' ');?></td>
            </tr>

            </tbody>
            <!---------------------------------------------->
            <tbody class="RowAdd_1343"></tbody>
            <!---------------------------------------------->

            <tbody class="invoice_table_bottom">
            <tr>
                <td colspan="5">
                    <span>Итого без НДС:</span>
                </td>

                <td colspan="1" class="inline_edit"  >
                    <?=number_format($arResult['PROPERTIES']['PRICE']['VALUE'], 2, '.', ' ');?>
                </td>
            </tr>
            <tr>
                <td colspan="5">Итого НДС:</td>
                <td colspan="1" class="inline_edit"  >0,00</td>
            </tr>

            <tr>
                <td colspan="5" class='price text_right'>Всего к оплате:</td>
                <td colspan="1" class='amount text_right inline_edit font_weight700'  ><?=number_format($arResult['PROPERTIES']['PRICE']['VALUE'], 2, '.', ' ');?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="invoice_total">
        <div class="invoice-total">
            <div class="item-invoice-total">Всего наименований:</div>
            <div class="item-invoice-total inline_edit"  >
                1,
                на сумму: <?=number_format($arResult['PROPERTIES']['PRICE']['VALUE'], 2, '.', ' ');?> руб.,
                без НДС
            </div>
        </div>
        <div class="invoice-total">
            <div class="item-invoice-total">
                <?=num2str(number_format($arResult['PROPERTIES']['PRICE']['VALUE'], 2, '.', ''))?>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="block-bottom">
            <div class="item-bottom">Руководитель</div>
            <div class="item-bottom inline_edit"  ></div>
            <div class="item-bottom inline_edit"  >Виленская Юлия Андреевна</div>
        </div>
        <div class="block-bottom">
            <div class="item-bottom"></div>
            <div class="item-bottom">(подпись)</div>
            <div class="item-bottom">(расшифровка подписи)</div>
        </div>
        <div class="block-bottom">
            <div class="item-bottom">Бухгалтер</div>
            <div class="item-bottom inline_edit"  ></div>
            <div class="item-bottom inline_edit"  > </div>
        </div>
        <div class="block-bottom">
            <div class="item-bottom"></div>
            <div class="item-bottom">(подпись)</div>
            <div class="item-bottom">(расшифровка подписи)</div>
        </div>
        <div class="block-bottom">
            <div class="item-bottom">Менеджер</div>
            <div class="item-bottom inline_edit"  ></div>
            <div class="item-bottom">
                <div class="inline_edit"  ></div>
            </div>
        </div>
        <div class="block-bottom">
            <div class="item-bottom"></div>
            <div class="item-bottom">(подпись)</div>
            <div class="item-bottom">(расшифровка подписи)</div>
        </div>
    </div>
</div>

</body>
</html>


<? die(); ?>

