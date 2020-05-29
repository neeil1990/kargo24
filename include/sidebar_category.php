<div class="sidebar-category">
    <h3 class="title">Для частных объявлений</h3>
    <ul class="sidebar-category-list">
        <li><a href="">Спецтехника</a></li>
        <li><a href="">Cтройоборудование</a></li>
        <li><a href="">Пассажирский транспорт</a></li>
        <li><a href="">Строительные грузы</a></li>
        <li><a href="">Сопутствующие услуги</a></li>
    </ul>
</div>
<!-- end sidebar-category -->

<?$APPLICATION->IncludeComponent(
    "kargo:main.banner",
    ".banner.frontend",
    [
        'FILTER' => [
            "IBLOCK_ID" => "22",
            "ACTIVE" => "Y",
            "?PROPERTY_IBLOCK_ID" => $arParams['BLOCK_ID'],
            "?PROPERTY_SECTION_ID" => $arParams['SECTION_ID'],
            "?PROPERTY_TYPE_XML_ID" => $arParams['TYPE_XML_ID'],
        ]
    ]
);?>

<div class="unified-ad-unit">
    <div class="ad-unit-head">
        <div class="logo">
            <img src="<?=SITE_TEMPLATE_PATH?>/img/static/ad-unit-logo.png" alt="alt">
        </div>
        <span class="logo-text">Диспетчерский интернет-сервис</span>
    </div>
    <div class="ad-unit-img">
        <img src="<?=SITE_TEMPLATE_PATH?>/img/static/ad.png" alt="alt">
    </div>
    <div class="ad-init-footer">
        <span class="title">Узнайте как разместить рекламу</span>
        <a href="" class="limed-spruce-btn white more-info-btn"><span class="text">подробнее</span><span class="arrow"></span></a>
    </div>
</div>
<!-- end unified-ad-unit -->
<div class="sidebar-orders-customers">
    <h3 class="title">Заказы от клиентов</h3>
    <div class="sidebar-orders-customers-item">
        <ul class="item-list">
            <li><span class="left-column">Дата:</span> 22.12.2017</li>
            <li><span class="left-column">Город:</span> Челябинск</li>
            <li><span class="left-column">Заказ перевозки 10т.:</span> Нужен КамАЗ бортовой от 10т. По адресу г. Щелково, <br>Стромынсткая д. 14</li>
            <li><span class="left-column">Контакты:</span> Доступны только для <a href="#input-form-popup" data-toggle="modal">зарегистрированых пользователей.</a></li>
        </ul>
    </div>
    <div class="sidebar-orders-customers-item last">
        <ul class="item-list">
            <li><span class="left-column">Дата:</span> 22.12.2017</li>
            <li><span class="left-column">Город:</span> Челябинск</li>
            <li><span class="left-column">Заказ перевозки 10т.:</span> Нужен КамАЗ бортовой от 10т. По адресу г. Щелково, <br>Стромынсткая д. 14</li>
            <li><span class="left-column">Контакты:</span> Доступны только для <a href="#input-form-popup" data-toggle="modal">зарегистрированых пользователей.</a></li>
        </ul>
    </div>
    <div class="show-all-btn">
        <a href="" class="limed-spruce-btn">Посмотреть все<span class="arrow"></span></a>
    </div>
</div>
