<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("СОПУТСТВУЮЩИЕ УСЛУГИ");
?>

    <section class="title-section category">
        <div class="container">
            <h1 class="title">
                <?=$APPLICATION->ShowTitle(false);?>
            </h1>
        </div>
    </section>
    <!-- end title-section -->


    <section class="category-section">
        <div class="container">
            <div class="row">

                <?$APPLICATION->IncludeComponent(
                    "bitrix:catalog",
                    ".catalog",
                    array(
                        "ACTION_VARIABLE" => "action",
                        "ADD_ELEMENT_CHAIN" => "Y",
                        "ADD_PICT_PROP" => "-",
                        "ADD_PROPERTIES_TO_BASKET" => "N",
                        "ADD_SECTIONS_CHAIN" => "Y",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "BASKET_URL" => "/personal/basket.php",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "COMPATIBLE_MODE" => "Y",
                        "DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
                        "DETAIL_BACKGROUND_IMAGE" => "-",
                        "DETAIL_BRAND_USE" => "N",
                        "DETAIL_BROWSER_TITLE" => "-",
                        "DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
                        "DETAIL_DETAIL_PICTURE_MODE" => "IMG",
                        "DETAIL_DISPLAY_NAME" => "Y",
                        "DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
                        "DETAIL_IMAGE_RESOLUTION" => "16by9",
                        "DETAIL_META_DESCRIPTION" => "-",
                        "DETAIL_META_KEYWORDS" => "-",
                        "DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
                        "DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
                        "DETAIL_PROPERTY_CODE" => array(
                            0 => "",
                            1 => "",
                        ),
                        "DETAIL_SET_CANONICAL_URL" => "N",
                        "DETAIL_SHOW_POPULAR" => "Y",
                        "DETAIL_SHOW_SLIDER" => "N",
                        "DETAIL_SHOW_VIEWED" => "Y",
                        "DETAIL_STRICT_SECTION_CHECK" => "Y",
                        "DETAIL_USE_COMMENTS" => "N",
                        "DETAIL_USE_VOTE_RATING" => "N",
                        "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                        "DISPLAY_BOTTOM_PAGER" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "ELEMENT_SORT_FIELD" => "sort",
                        "ELEMENT_SORT_FIELD2" => "id",
                        "ELEMENT_SORT_ORDER" => "asc",
                        "ELEMENT_SORT_ORDER2" => "desc",
                        "FILE_404" => "",
                        "FILTER_HIDE_ON_MOBILE" => "N",
                        "FILTER_VIEW_MODE" => "HORIZONTAL",
                        "IBLOCK_ID" => "6",
                        "IBLOCK_TYPE" => "content",
                        "INCLUDE_SUBSECTIONS" => "A",
                        "INSTANT_RELOAD" => "N",
                        "LABEL_PROP" => "-",
                        "LAZY_LOAD" => "N",
                        "LINE_ELEMENT_COUNT" => "3",
                        "LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
                        "LINK_IBLOCK_ID" => "",
                        "LINK_IBLOCK_TYPE" => "",
                        "LINK_PROPERTY_SID" => "",
                        "LIST_BROWSER_TITLE" => "-",
                        "LIST_META_DESCRIPTION" => "-",
                        "LIST_META_KEYWORDS" => "-",
                        "LIST_PROPERTY_CODE" => array(
                            0 => "RENTAL_INFO",
                            1 => "OPTIONS",
                            2 => "",
                        ),
                        "LOAD_ON_SCROLL" => "N",
                        "MESSAGE_404" => "",
                        "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                        "MESS_BTN_BUY" => "Купить",
                        "MESS_BTN_COMPARE" => "Сравнение",
                        "MESS_BTN_DETAIL" => "Подробнее",
                        "MESS_BTN_SUBSCRIBE" => "Подписаться",
                        "MESS_NOT_AVAILABLE" => "Нет в наличии",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Товары",
                        "PAGE_ELEMENT_COUNT" => "30",
                        "PARTIAL_PRODUCT_PROPERTIES" => "N",
                        "PRICE_CODE" => array(
                        ),
                        "PRICE_VAT_INCLUDE" => "N",
                        "PRICE_VAT_SHOW_VALUE" => "N",
                        "PRODUCT_ID_VARIABLE" => "id",
                        "PRODUCT_PROPERTIES" => array(
                        ),
                        "PRODUCT_PROPS_VARIABLE" => "prop",
                        "PRODUCT_QUANTITY_VARIABLE" => "quantity",
                        "SEARCH_CHECK_DATES" => "Y",
                        "SEARCH_NO_WORD_LOGIC" => "Y",
                        "SEARCH_PAGE_RESULT_COUNT" => "50",
                        "SEARCH_RESTART" => "N",
                        "SEARCH_USE_LANGUAGE_GUESS" => "Y",
                        "SECTIONS_SHOW_PARENT_NAME" => "Y",
                        "SECTIONS_VIEW_MODE" => "LINE",
                        "SECTION_BACKGROUND_IMAGE" => "-",
                        "SECTION_COUNT_ELEMENTS" => "Y",
                        "SECTION_ID_VARIABLE" => "SECTION_ID",
                        "SECTION_TOP_DEPTH" => "1",
                        "SEF_FOLDER" => "/services/",
                        "SEF_MODE" => "Y",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "Y",
                        "SHOW_404" => "N",
                        "SHOW_DEACTIVATED" => "N",
                        "SHOW_PRICE_COUNT" => "1",
                        "SHOW_TOP_ELEMENTS" => "N",
                        "SIDEBAR_DETAIL_SHOW" => "N",
                        "SIDEBAR_PATH" => "",
                        "SIDEBAR_SECTION_SHOW" => "Y",
                        "TEMPLATE_THEME" => "blue",
                        "TOP_ELEMENT_COUNT" => "9",
                        "TOP_ELEMENT_SORT_FIELD" => "sort",
                        "TOP_ELEMENT_SORT_FIELD2" => "id",
                        "TOP_ELEMENT_SORT_ORDER" => "asc",
                        "TOP_ELEMENT_SORT_ORDER2" => "desc",
                        "TOP_LINE_ELEMENT_COUNT" => "3",
                        "TOP_PROPERTY_CODE" => array(
                            0 => "",
                            1 => "",
                        ),
                        "TOP_VIEW_MODE" => "SECTION",
                        "USER_CONSENT" => "N",
                        "USER_CONSENT_ID" => "0",
                        "USER_CONSENT_IS_CHECKED" => "Y",
                        "USER_CONSENT_IS_LOADED" => "N",
                        "USE_COMPARE" => "N",
                        "USE_ELEMENT_COUNTER" => "Y",
                        "USE_ENHANCED_ECOMMERCE" => "N",
                        "USE_FILTER" => "Y",
                        "USE_MAIN_ELEMENT_SECTION" => "Y",
                        "USE_PRICE_COUNT" => "N",
                        "USE_PRODUCT_QUANTITY" => "N",
                        "USE_STORE" => "N",
                        "COMPONENT_TEMPLATE" => ".catalog",
                        "FILTER_NAME" => "",
                        "FILTER_FIELD_CODE" => array(
                            0 => "",
                            1 => "",
                        ),
                        "FILTER_PROPERTY_CODE" => array(
                            0 => "TYPE",
                            1 => "",
                        ),
                        "FILTER_PRICE_CODE" => array(
                        ),
                        "SEF_URL_TEMPLATES" => array(
                            "sections" => "",
                            "section" => "#SECTION_CODE_PATH#/",
                            "element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
                            "compare" => "compare.php?action=#ACTION_CODE#",
                            "smart_filter" => "#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
                        ),
                        "VARIABLE_ALIASES" => array(
                            "compare" => array(
                                "ACTION_CODE" => "action",
                            ),
                        )
                    ),
                    false
                );?>

                <div class="col-sm-3">
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
                    <div class="unified-ad-unit">
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
                    <!-- end unified-ad-unit -->
                    <div class="sidebar-orders-customers">
                        <h3 class="title">Заказы от клиентов</h3>
                        <div class="sidebar-orders-customers-item">
                            <ul class="item-list">
                                <li><span class="left-column">Дата:</span> 22.12.2017</li>
                                <li><span class="left-column">Город:</span> Щелково</li>
                                <li><span class="left-column">Заказ перевозки 10т.:</span> Нужен КамАЗ бортовой от 10т. По адресу г. Щелково, <br>Стромынсткая д. 14</li>
                                <li><span class="left-column">Контакты:</span> Доступны только для <a href="#input-form-popup" data-toggle="modal">зарегистрированых пользователей.</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-orders-customers-item">
                            <ul class="item-list">
                                <li><span class="left-column">Дата:</span> 22.12.2017</li>
                                <li><span class="left-column">Город:</span> Челябинск</li>
                                <li><span class="left-column">Заказ перевозки 10т.:</span> Нужен КамАЗ бортовой от 10т. По адресу г. Щелково, <br>Стромынсткая д. 14</li>
                                <li><span class="left-column">Контакты:</span> Доступны только для <a href="#input-form-popup" data-toggle="modal">зарегистрированых пользователей.</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-orders-customers-item">
                            <ul class="item-list">
                                <li><span class="left-column">Дата:</span> 22.12.2017</li>
                                <li><span class="left-column">Город:</span> Щелково</li>
                                <li><span class="left-column">Заказ перевозки 10т.:</span> Нужен КамАЗ бортовой от 10т. По адресу г. Щелково, <br>Стромынсткая д. 14</li>
                                <li><span class="left-column">Контакты:</span> Доступны только для <a href="#input-form-popup" data-toggle="modal">зарегистрированых пользователей.</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-orders-customers-item">
                            <ul class="item-list">
                                <li><span class="left-column">Дата:</span> 22.12.2017</li>
                                <li><span class="left-column">Город:</span> Челябинск</li>
                                <li><span class="left-column">Заказ перевозки 10т.:</span> Нужен КамАЗ бортовой от 10т. По адресу г. Щелково, <br>Стромынсткая д. 14</li>
                                <li><span class="left-column">Контакты:</span> Доступны только для <a href="#input-form-popup" data-toggle="modal">зарегистрированых пользователей.</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-orders-customers-item">
                            <ul class="item-list">
                                <li><span class="left-column">Дата:</span> 22.12.2017</li>
                                <li><span class="left-column">Город:</span> Щелково</li>
                                <li><span class="left-column">Заказ перевозки 10т.:</span> Нужен КамАЗ бортовой от 10т. По адресу г. Щелково, <br>Стромынсткая д. 14</li>
                                <li><span class="left-column">Контакты:</span> Доступны только для <a href="#input-form-popup" data-toggle="modal">зарегистрированых пользователей.</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-orders-customers-item">
                            <ul class="item-list">
                                <li><span class="left-column">Дата:</span> 22.12.2017</li>
                                <li><span class="left-column">Город:</span> Челябинск</li>
                                <li><span class="left-column">Заказ перевозки 10т.:</span> Нужен КамАЗ бортовой от 10т. По адресу г. Щелково, <br>Стромынсткая д. 14</li>
                                <li><span class="left-column">Контакты:</span> Доступны только для <a href="#input-form-popup" data-toggle="modal">зарегистрированых пользователей.</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-orders-customers-item">
                            <ul class="item-list">
                                <li><span class="left-column">Дата:</span> 22.12.2017</li>
                                <li><span class="left-column">Город:</span> Щелково</li>
                                <li><span class="left-column">Заказ перевозки 10т.:</span> Нужен КамАЗ бортовой от 10т. По адресу г. Щелково, <br>Стромынсткая д. 14</li>
                                <li><span class="left-column">Контакты:</span> Доступны только для <a href="#input-form-popup" data-toggle="modal">зарегистрированых пользователей.</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-orders-customers-item">
                            <ul class="item-list">
                                <li><span class="left-column">Дата:</span> 22.12.2017</li>
                                <li><span class="left-column">Город:</span> Челябинск</li>
                                <li><span class="left-column">Заказ перевозки 10т.:</span> Нужен КамАЗ бортовой от 10т. По адресу г. Щелково, <br>Стромынсткая д. 14</li>
                                <li><span class="left-column">Контакты:</span> Доступны только для <a href="#input-form-popup" data-toggle="modal">зарегистрированых пользователей.</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-orders-customers-item">
                            <ul class="item-list">
                                <li><span class="left-column">Дата:</span> 22.12.2017</li>
                                <li><span class="left-column">Город:</span> Щелково</li>
                                <li><span class="left-column">Заказ перевозки 10т.:</span> Нужен КамАЗ бортовой от 10т. По адресу г. Щелково, <br>Стромынсткая д. 14</li>
                                <li><span class="left-column">Контакты:</span> Доступны только для <a href="#input-form-popup" data-toggle="modal">зарегистрированых пользователей.</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-orders-customers-item">
                            <ul class="item-list">
                                <li><span class="left-column">Дата:</span> 22.12.2017</li>
                                <li><span class="left-column">Город:</span> Челябинск</li>
                                <li><span class="left-column">Заказ перевозки 10т.:</span> Нужен КамАЗ бортовой от 10т. По адресу г. Щелково, <br>Стромынсткая д. 14</li>
                                <li><span class="left-column">Контакты:</span> Доступны только для <a href="#input-form-popup" data-toggle="modal">зарегистрированых пользователей.</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-orders-customers-item">
                            <ul class="item-list">
                                <li><span class="left-column">Дата:</span> 22.12.2017</li>
                                <li><span class="left-column">Город:</span> Щелково</li>
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
                    <!-- end sidebar-orders-customers -->
                </div>
                <div class="col-sm-12">
                    <div class="popular-cities">
                        <h3 class="title">Популярные города</h3>
                        <div class="category-unified-wrapper-column">
                            <div class="category-unified-column">
                                <h4 class="category-unified-title">Центральный </h4>
                                <ul class="category-unified-list">
                                    <li><a href="">Москва (252)</a></li>
                                    <li><a href="">Московская область (3391)</a></li>
                                    <li><a href="">Белгородская область (520)</a></li>
                                    <li><a href="">Ивановская область (218)</a></li>
                                    <li><a href="">Калужская область (404)</a></li>
                                    <li><a href="">Костромская область (245)</a></li>
                                    <li><a href="">Курская область (255)</a></li>
                                    <li><a href="">Рязанская область (277)</a></li>
                                    <li><a href="">Смоленская область (299)</a></li>
                                    <li><a href="">Тамбовская область (204)</a></li>
                                    <li><a href="">Тверская область (449)</a></li>
                                    <li><a href="">Тульская область (539)</a></li>
                                    <li><a href="">Ярославская область (419)</a></li>
                                </ul>
                                <ul class="category-unified-list mod">
                                    <li><a href="">Крым (655)</a></li>
                                </ul>
                            </div>
                            <div class="category-unified-column">
                                <h4 class="category-unified-title">Северо-Западный</h4>
                                <ul class="category-unified-list">
                                    <li><a href="">Санкт-Петербург (108)</a> </li>
                                    <li><a href="">Архангельская область (237)</a> </li>
                                    <li><a href="">Вологодская область (334)</a> </li>
                                    <li><a href="">Калининградская область (167)</a> </li>
                                    <li><a href="">Карелия (218)</a> </li>
                                    <li><a href="">Мурманская область (181)</a> </li>
                                    <li><a href="">Псковская область (167)</a> </li>
                                </ul>
                                <h4 class="category-unified-title">Сибирский </h4>
                                <ul class="category-unified-list">
                                    <li><a href="">Алтайский край (652)</a> </li>
                                    <li><a href="">Бурятия (207)</a> </li>
                                    <li><a href="">Иркутская область (738)</a> </li>
                                    <li><a href="">Кемеровская область (648)</a> </li>
                                    <li><a href="">Красноярский край (1012)</a> </li>
                                    <li><a href="">Омская область (572)</a> </li>
                                    <li><a href="">Хакасия (144)</a> </li>
                                </ul>
                            </div>
                            <div class="category-unified-column">
                                <h4 class="category-unified-title">Приволжский </h4>
                                <ul class="category-unified-list">
                                    <li><a href="">Башкортостан (1010)</a> </li>
                                    <li><a href="">Кировская область (365)</a> </li>
                                    <li><a href="">Марий Эл (122)</a> </li>
                                    <li><a href="">Нижегородская область (1190)</a> </li>
                                    <li><a href="">Пермский край (809)</a> </li>
                                    <li><a href="">Самарская область (1026)</a> </li>
                                    <li><a href="">Саратовская область (594)</a> </li>
                                    <li><a href="">Татарстан (1283)</a> </li>
                                    <li><a href="">Удмуртия (330)</a> </li>
                                </ul>
                                <h4 class="category-unified-title">Уральский </h4>
                                <ul class="category-unified-list">
                                    <li><a href="">Свердловская область (1599)</a> </li>
                                    <li><a href="">Тюменская область (617)</a> </li>
                                    <li><a href="">Ханты-Мансийский АО (518)</a> </li>
                                    <li><a href="">Челябинская область (1225)</a> </li>
                                </ul>
                            </div>
                            <div class="category-unified-column">
                                <h4 class="category-unified-title">Южный</h4>
                                <ul class="category-unified-list">
                                    <li><a href="">Волгоградская область (645)</a> </li>
                                    <li><a href="">Краснодарский край (2867)</a> </li>
                                    <li><a href="">Ростовская область (1568)</a> </li>
                                </ul>
                                <h4 class="category-unified-title">Дальневосточный </h4>
                                <ul class="category-unified-list">
                                    <li><a href="">Амурская область (183)</a> </li>
                                    <li><a href="">Приморский край (339)</a> </li>
                                    <li><a href="">Саха (Якутия) (143)</a> </li>
                                    <li><a href="">Хабаровский край (322)</a> </li>
                                    <li><a href="">Чукотский АО (33)</a> </li>
                                </ul>
                                <h4 class="category-unified-title">Северо-Кавказский</h4>
                                <ul class="category-unified-list">
                                    <li><a href="">Дагестан (183)</a> </li>
                                    <li><a href="">Чеченская республика (71)</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end popular-cities -->
                </div>
            </div>
        </div>
    </section>
    <!-- end category-section -->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>