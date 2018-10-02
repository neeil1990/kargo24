<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('CarGo24');
?>

        <section class="main-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-4 col-sm-6 col-xs-9">
                        <h1 class="title">
                            Поиск грузового транспорта и спецтехники без диспетчера!
                        </h1>
                        <p class="text">
                            Диспетчерский сервис <span class="bold">«Kargo24»</span> объединил в себе владельцев спецтехники и даёт возможность клиентам самостоятельно найти технику в нужном городе. При этом, обращаясь к владельцу техники напрямую без диспетчера, можно рассчитывать на снижение стоимости услуг до 10%.
                        </p>
                        <div class="service-btn">
                            <a href="" class="limed-spruce-btn">О сервисе<span class="arrow"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end main-section -->

        <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "home.transportation", Array(
            "ADD_SECTIONS_CHAIN" => "Y",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "COUNT_ELEMENTS" => "N",
            "IBLOCK_ID" => "2",
            "IBLOCK_TYPE" => "content",
            "SECTION_CODE" => $_REQUEST["SECTION_CODE"],
            "SECTION_FIELDS" => array(
                0 => "",
                1 => "",
            ),
            "SECTION_ID" => $_REQUEST["SECTION_ID"],
            "SECTION_URL" => "",
            "SECTION_USER_FIELDS" => array(
                0 => "",
                1 => "",
            ),
            "SHOW_PARENT_NAME" => "Y",
            "TOP_DEPTH" => "1",
            "VIEW_MODE" => "LINE",
        ),
            false
        );?>


        <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "home.equipment", Array(
            "ADD_SECTIONS_CHAIN" => "Y",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "COUNT_ELEMENTS" => "N",
            "IBLOCK_ID" => "1",
            "IBLOCK_TYPE" => "content",
            "SECTION_CODE" => $_REQUEST["SECTION_CODE"],
            "SECTION_FIELDS" => array(
                0 => "",
                1 => "",
            ),
            "SECTION_ID" => $_REQUEST["SECTION_ID"],
            "SECTION_URL" => "",
            "SECTION_USER_FIELDS" => array(
                0 => "",
                1 => "",
            ),
            "SHOW_PARENT_NAME" => "Y",
            "TOP_DEPTH" => "1",
            "VIEW_MODE" => "LINE",
        ),
            false
        );?>

        <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "home.equipment-rent", Array(
            "ADD_SECTIONS_CHAIN" => "Y",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "COUNT_ELEMENTS" => "N",
            "IBLOCK_ID" => "3",
            "IBLOCK_TYPE" => "content",
            "SECTION_CODE" => $_REQUEST["SECTION_CODE"],
            "SECTION_FIELDS" => array(
                0 => "",
                1 => "",
            ),
            "SECTION_ID" => $_REQUEST["SECTION_ID"],
            "SECTION_URL" => "",
            "SECTION_USER_FIELDS" => array(
                0 => "",
                1 => "",
            ),
            "SHOW_PARENT_NAME" => "Y",
            "TOP_DEPTH" => "1",
            "VIEW_MODE" => "LINE",
        ),
            false
        );?>

        <section class="accompanyin-passenger-services-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <div class="section-title white">Сопутствующие услуги</div>
                        <div class="accompanying-services-content wrapper-unified-column white">
                            <div class="unified-column">
                                <div class="unified-unit-service">
                                    <a href="">
                                        <div class="item-img">
                                            <img src="img/static/accompanying-services/01.png" alt="alt">
                                        </div>
                                        <div class="item-desc">
                                            <h3 class="title">Сопутствующие услуги</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="unified-column">
                                <div class="unified-unit-service">
                                    <a href="">
                                        <div class="item-img">
                                            <img src="img/static/accompanying-services/02.png" alt="alt">
                                        </div>
                                        <div class="item-desc">
                                            <h3 class="title">Услуги грузчиков и разноробочие</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="unified-column">
                                <div class="unified-unit-service">
                                    <a href="">
                                        <div class="item-img">
                                            <img src="img/static/accompanying-services/03.png" alt="alt">
                                        </div>
                                        <div class="item-desc">
                                            <h3 class="title">Асфальтирование и благоустройство</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="unified-column">
                                <div class="unified-unit-service">
                                    <a href="">
                                        <div class="item-img">
                                            <img src="img/static/accompanying-services/04.png" alt="alt">
                                        </div>
                                        <div class="item-desc">
                                            <h3 class="title">Убока и вывоз снега</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="unified-column">
                                <div class="unified-unit-service">
                                    <a href="">
                                        <div class="item-img">
                                            <img src="img/static/accompanying-services/05.png" alt="alt">
                                        </div>
                                        <div class="item-desc">
                                            <h3 class="title">Строительные бригады</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="unified-column">
                                <div class="unified-unit-service">
                                    <a href="">
                                        <div class="item-img">
                                            <img src="img/static/accompanying-services/06.png" alt="alt">
                                        </div>
                                        <div class="item-desc">
                                            <h3 class="title">Демонтажные работы по сносу</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 right-block">
                        <div class="section-title white">
                            Пассажирские перевозки
                        </div>
                        <div class="passenger-transportation-content wrapper-unified-column white">
                            <div class="unified-column">
                                <div class="unified-unit-service">
                                    <a href="">
                                        <div class="item-img">
                                            <img src="img/static/passenger-transportation/01.png" alt="alt">
                                        </div>
                                        <div class="item-desc">
                                            <h3 class="title">Лимузины</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="unified-column">
                                <div class="unified-unit-service">
                                    <a href="">
                                        <div class="item-img">
                                            <img src="img/static/passenger-transportation/02.png" alt="alt">
                                        </div>
                                        <div class="item-desc">
                                            <h3 class="title">Вахтовки</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="unified-column">
                                <div class="unified-unit-service">
                                    <a href="">
                                        <div class="item-img">
                                            <img src="img/static/passenger-transportation/03.png" alt="alt">
                                        </div>
                                        <div class="item-desc">
                                            <h3 class="title">Теплоходы, яхты и катера</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="unified-column">
                                <div class="unified-unit-service">
                                    <a href="">
                                        <div class="item-img">
                                            <img src="img/static/passenger-transportation/04.png" alt="alt">
                                        </div>
                                        <div class="item-desc">
                                            <h3 class="title">Пассажирские перевозки</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="unified-column">
                                <div class="unified-unit-service">
                                    <a href="">
                                        <div class="item-img">
                                            <img src="img/static/passenger-transportation/05.png" alt="alt">
                                        </div>
                                        <div class="item-desc">
                                            <h3 class="title">Автобусы</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="unified-column">
                                <div class="unified-unit-service">
                                    <a href="">
                                        <div class="item-img">
                                            <img src="img/static/passenger-transportation/06.png" alt="alt">
                                        </div>
                                        <div class="item-desc">
                                            <h3 class="title">Микроавтобусы</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="unified-column">
                                <div class="unified-unit-service">
                                    <a href="">
                                        <div class="item-img">
                                            <img src="img/static/passenger-transportation/07.png" alt="alt">
                                        </div>
                                        <div class="item-desc">
                                            <h3 class="title">Услуги такси и частные таксисты</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end accompanyin-passenger-services-section -->
        <section class="construction-materials-section">
            <div class="container">
                <div class="section-title">
                    Строительные материалы с доставкой
                </div>
                <div class="construction-materials-content wrapper-unified-column">
                    <div class="unified-column">
                        <div class="unified-unit-service">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/construction-materials/01.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Грунт</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="unified-column">
                        <div class="unified-unit-service">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/construction-materials/02.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Арматура и металопрокат</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="unified-column">
                        <div class="unified-unit-service">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/construction-materials/03.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Вода</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="unified-column">
                        <div class="unified-unit-service">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/construction-materials/04.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Стройматериалы с доставкой</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="unified-column">
                        <div class="unified-unit-service">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/construction-materials/05.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Кирпич</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="unified-column">
                        <div class="unified-unit-service">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/construction-materials/06.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Бетон</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="unified-column">
                        <div class="unified-unit-service">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/construction-materials/07.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Керамзит</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="unified-column">
                        <div class="unified-unit-service">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/construction-materials/08.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Цемент и сухие смеси</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="unified-column">
                        <div class="unified-unit-service">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/construction-materials/09.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Пеноблоки</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="unified-column">
                        <div class="unified-unit-service">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/construction-materials/10.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Пиломатериалы</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="unified-column">
                        <div class="unified-unit-service">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/construction-materials/11.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Песок</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="unified-column">
                        <div class="unified-unit-service">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/construction-materials/12.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Торф и чернозём</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="unified-column">
                        <div class="unified-unit-service">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/construction-materials/13.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Щебень и гравий</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end construction-materials-section -->

        <?$APPLICATION->IncludeComponent("bitrix:news.list", "advantage.list.home", Array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
            "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
            "AJAX_MODE" => "N",	// Включить режим AJAX
            "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
            "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
            "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
            "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
            "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
            "CACHE_GROUPS" => "Y",	// Учитывать права доступа
            "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
            "CACHE_TYPE" => "A",	// Тип кеширования
            "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
            "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
            "DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
            "DISPLAY_DATE" => "Y",	// Выводить дату элемента
            "DISPLAY_NAME" => "Y",	// Выводить название элемента
            "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
            "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
            "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
            "FIELD_CODE" => array(	// Поля
                0 => "",
                1 => "",
            ),
            "FILTER_NAME" => "",	// Фильтр
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
            "IBLOCK_ID" => "5",	// Код информационного блока
            "IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
            "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
            "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
            "NEWS_COUNT" => "20",	// Количество новостей на странице
            "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
            "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
            "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
            "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
            "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
            "PAGER_TITLE" => "Новости",	// Название категорий
            "PARENT_SECTION" => "",	// ID раздела
            "PARENT_SECTION_CODE" => "",	// Код раздела
            "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
            "PROPERTY_CODE" => array(	// Свойства
                0 => "NAME_ICON",
                1 => "",
            ),
            "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
            "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
            "SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
            "SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
            "SET_STATUS_404" => "N",	// Устанавливать статус 404
            "SET_TITLE" => "N",	// Устанавливать заголовок страницы
            "SHOW_404" => "N",	// Показ специальной страницы
            "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
            "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
            "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
            "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
            "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
        ),
            false
        );?>
        <!-- end advantages-section -->

        <section class="service-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="sidebar-product-item mobile">
                            <div class="logo">
                                <img src="img/static/ad-unit-logo.png" alt="alt">
                            </div>
                            <div class="product-img">
                                <a href=""><img src="img/static/construction-machinery/03.png" alt="alt"></a>
                            </div>
                            <div class="product-desc">
                                <h3 class="title">мини-погрузчик</h3>
                                <table class="desc-info">
                                    <tr>
                                        <td>Город:</td>
                                        <td>Уфа</td>
                                    </tr>
                                    <tr>
                                        <td>Цена:</td>
                                        <td>3 400 000 руб.</td>
                                    </tr>
                                    <tr>
                                        <td>Контакты: </td>
                                        <td>89080934871 (Алек)</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="section-title">О сервисе kARGO24</div>
                        <div class="service-text-item">
                            <h3 class="title">Поиск грузового транспорта и спецтехники без диспетчера! </h3>
                            <p class="text">
                                Не секрет, что для клиентов, которым требуются услуги спецтехники или перевозка грузов, в стоимость заказа включается процент диспетчера за поиск техники. Проблема заключается в том, что техника есть, но в настоящий момент она занята на другом объекте или просто сломалась. Поэтому диспетчеру нужно держать связь со многими владельцами техники и быстро реагировать на запросы клиентов. Диспетчерский сервис «Перевозка 24» объединил в себе владельцев спецтехники и даёт возможность клиентам самостоятельно найти технику в нужном городе. При этом, обращаясь к владельцу техники напрямую без диспетчера, можно рассчитывать на снижение стоимости услуг до 10%
                            </p>
                        </div>
                        <div class="service-text-item">
                            <h3 class="title">Как сэкономить на заказе спецтехники и грузоперевозках? </h3>
                            <p class="text">
                                Любые предложения о снижении цены должны быть обоснованы. Если при крупном заказе можно рассчитывать на скидку, то при маленьком объёме сложно снизить стоимость услуг. Но есть один вариант! На сайте «Перевозка 24» фиксируется геолокация стоянок спецтехники и грузовиков. Получается, что если техника находится рядом с проведением работ, то можно дополнительно сэкономить на стоимости доставки. Ведь владельцу техники тоже выгодно выполнить работу рядом, чем тратить время на пробки. Поэтому самостоятельный поиск ближайшей спецтехники позволит снизить стоимость услуг.
                            </p>
                        </div>
                        <div class="service-text-item">
                            <h3 class="title">Статистика сервиса: </h3>
                            <ul class="service-list">
                                <li>
										<span class="icon-check">
											<span class="path1"></span><span class="path2"></span>
										</span>
                                    Уже зарегистрировано 13714 транспортных компаний и частных владельцев спецтехники.
                                </li>
                                <li>
										<span class="icon-check">
											<span class="path1"></span><span class="path2"></span>
										</span>
                                    Добавлено более 190 тысяч объявлений с описанием услуг и характеристик техники.
                                </li>
                                <li>
										<span class="icon-check">
											<span class="path1"></span><span class="path2"></span>
										</span>
                                    Более чем 6500 заказчиков ежемесячно размещают здесь свои заявки.
                                </li>
                            </ul>
                        </div>
                        <div class="service-text-item">
                            <h3 class="title">Быстро найти спецтехнику легко! </h3>
                            <p class="text">
                                В отличие от бесплатных досок объявлений, онлайн-диспетчер «Перевозка 24» даёт возможность сократить время на поиск спецтехники. Вам не придётся обзванивать все объявления подряд. Достаточно просто оставить заявку, чтобы владельцы свободной техники сами смогли предложить вам подходящие варианты. Останется лишь выбрать оптимальное предложение и согласовать детали заказа. Стоит отметить, что сайт не берёт комиссию с заказа и с владельцами техники можно договориться напрямую.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="sidebar-product-item desktop">
                            <div class="logo">
                                <img src="img/static/ad-unit-logo.png" alt="alt">
                            </div>
                            <div class="product-img">
                                <a href=""><img src="img/static/construction-machinery/03.png" alt="alt"></a>
                            </div>
                            <div class="product-desc">
                                <h3 class="title">мини-погрузчик</h3>
                                <table class="desc-info">
                                    <tr>
                                        <td>Город:</td>
                                        <td>Уфа</td>
                                    </tr>
                                    <tr>
                                        <td>Цена:</td>
                                        <td>3 400 000 руб.</td>
                                    </tr>
                                    <tr>
                                        <td>Контакты: </td>
                                        <td>89080934871 (Алек)</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="sidebar-social-network">
                            <h3 class="title">Нравится сервис? <br>Посоветуйте друзьям!</h3>
                            <ul class="social-network">
                                <li><a href=""><span class="icon icon-wk"></span></a></li>
                                <li><a href=""><span class="icon icon-fb"></span></a></li>
                                <li><a href=""><span class="icon icon-odn"></span></a></li>
                                <li><a href=""><span class="icon icon-mailru"></span></a></li>
                                <li><a href=""><span class="icon icon-tvitter"></span></a></li>
                                <li><a href=""><span class="icon icon-google"></span></a></li>
                                <li><a href=""><span class="icon icon-skype"></span></a></li>
                                <li><a href=""><span class="icon icon-viber"></span></a></li>
                                <li><a href=""><span class="icon icon-ws"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end service-section -->
        <section class="top-companies-section">
            <div class="container">
                <div class="section-title white">Топ-10 компаний нашего сервиса</div>
                <div class="row top-companies-content">
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 column">
                        <div class="top-companie-item">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/top-companie/01.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Мастер-СтройМеталл</h3>
                                    <p class="text">
                                        Специализация:
                                        <span class="color">Аренда спецтехники</span>
                                        Участвует в сервисе:
                                        <span class="color">2 года 7 месяцев</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 column">
                        <div class="top-companie-item">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/top-companie/your-logo.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Мастер-СтройМеталл</h3>
                                    <p class="text">
                                        Специализация:
                                        <span class="color">Аренда спецтехники</span>
                                        Участвует в сервисе:
                                        <span class="color">2 года 7 месяцев</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 column">
                        <div class="top-companie-item">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/top-companie/error.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Мастер-СтройМеталл</h3>
                                    <p class="text">
                                        Специализация:
                                        <span class="color">Аренда спецтехники</span>
                                        Участвует в сервисе:
                                        <span class="color">2 года 7 месяцев</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 column">
                        <div class="top-companie-item">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/top-companie/01.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Мастер-СтройМеталл</h3>
                                    <p class="text">
                                        Специализация:
                                        <span class="color">Аренда спецтехники</span>
                                        Участвует в сервисе:
                                        <span class="color">2 года 7 месяцев</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 column">
                        <div class="top-companie-item">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/top-companie/your-logo.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Мастер-СтройМеталл</h3>
                                    <p class="text">
                                        Специализация:
                                        <span class="color">Аренда спецтехники</span>
                                        Участвует в сервисе:
                                        <span class="color">2 года 7 месяцев</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 column">
                        <div class="top-companie-item">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/top-companie/error.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Мастер-СтройМеталл</h3>
                                    <p class="text">
                                        Специализация:
                                        <span class="color">Аренда спецтехники</span>
                                        Участвует в сервисе:
                                        <span class="color">2 года 7 месяцев</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 column">
                        <div class="top-companie-item">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/top-companie/01.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Мастер-СтройМеталл</h3>
                                    <p class="text">
                                        Специализация:
                                        <span class="color">Аренда спецтехники</span>
                                        Участвует в сервисе:
                                        <span class="color">2 года 7 месяцев</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 column">
                        <div class="top-companie-item">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/top-companie/your-logo.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Мастер-СтройМеталл</h3>
                                    <p class="text">
                                        Специализация:
                                        <span class="color">Аренда спецтехники</span>
                                        Участвует в сервисе:
                                        <span class="color">2 года 7 месяцев</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 column">
                        <div class="top-companie-item">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/top-companie/error.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Мастер-СтройМеталл</h3>
                                    <p class="text">
                                        Специализация:
                                        <span class="color">Аренда спецтехники</span>
                                        Участвует в сервисе:
                                        <span class="color">2 года 7 месяцев</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 column">
                        <div class="top-companie-item">
                            <a href="">
                                <div class="item-img">
                                    <img src="img/static/top-companie/01.png" alt="alt">
                                </div>
                                <div class="item-desc">
                                    <h3 class="title">Мастер-СтройМеталл</h3>
                                    <p class="text">
                                        Специализация:
                                        <span class="color">Аренда спецтехники</span>
                                        Участвует в сервисе:
                                        <span class="color">2 года 7 месяцев</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="rate-btn">
                    <a href="" class="limed-spruce-btn">Рейтинг<span class="arrow"></span></a>
                </div>
            </div>
        </section>
        <!-- end top-companies-section -->
        <?$APPLICATION->IncludeComponent("bitrix:news.list", "news.list.home", Array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
            "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
            "AJAX_MODE" => "N",	// Включить режим AJAX
            "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
            "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
            "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
            "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
            "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
            "CACHE_GROUPS" => "Y",	// Учитывать права доступа
            "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
            "CACHE_TYPE" => "A",	// Тип кеширования
            "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
            "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
            "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
            "DISPLAY_DATE" => "Y",	// Выводить дату элемента
            "DISPLAY_NAME" => "Y",	// Выводить название элемента
            "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
            "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
            "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
            "FIELD_CODE" => array(	// Поля
                0 => "",
                1 => "",
            ),
            "FILTER_NAME" => "",	// Фильтр
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
            "IBLOCK_ID" => "4",	// Код информационного блока
            "IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
            "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
            "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
            "NEWS_COUNT" => "5",	// Количество новостей на странице
            "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
            "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
            "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
            "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
            "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
            "PAGER_TITLE" => "Новости",	// Название категорий
            "PARENT_SECTION" => "",	// ID раздела
            "PARENT_SECTION_CODE" => "",	// Код раздела
            "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
            "PROPERTY_CODE" => array(	// Свойства
                0 => "",
                1 => "",
            ),
            "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
            "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
            "SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
            "SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
            "SET_STATUS_404" => "N",	// Устанавливать статус 404
            "SET_TITLE" => "N",	// Устанавливать заголовок страницы
            "SHOW_404" => "N",	// Показ специальной страницы
            "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
            "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
            "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
            "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
            "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
        ),
            false
        );?>


<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>