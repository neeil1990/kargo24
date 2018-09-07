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
        <section class="advantages-section">
            <div class="container">
                <div class="section-title white">Преимущества нашего сервиса</div>
                <ul class="advantages-content-list">
                    <li class="advantages-item">
                        <span class="item-icon icon-adv-1"></span>
                        <div class="item-desc">
                            <h3 class="title">Всегда актуально</h3>
                            <p class="text">
                                Актуальность информации гарантируется платной формой публикации объявлений.
                            </p>
                        </div>
                    </li>
                    <li class="advantages-item">
                        <span class="item-icon icon-adv-2"></span>
                        <div class="item-desc">
                            <h3 class="title">Скорость и удобство</h3>
                            <p class="text">
                                Быстрая доступность сайта для просмотра из всех регионов и городов России
                            </p>
                        </div>
                    </li>
                    <li class="advantages-item">
                        <span class="item-icon icon-adv-3"></span>
                        <div class="item-desc">
                            <h3 class="title">Легкость поиска</h3>
                            <p class="text">
                                Понятная структура объявлений по всем видам спецтехники и услугам грузоперевозок.
                            </p>
                        </div>
                    </li>
                    <li class="advantages-item">
                        <span class="item-icon icon-adv-4"></span>
                        <div class="item-desc">
                            <h3 class="title">Постоянный он-лайн</h3>
                            <p class="text">
                                Высокая посещаемость сайта владельцами спецтехники и их заказчиками.
                            </p>
                        </div>
                    </li>
                    <li class="advantages-item">
                        <span class="item-icon icon-adv-5"></span>
                        <div class="item-desc">
                            <h3 class="title">Быстрый заказ</h3>
                            <p class="text">
                                Заказчики могут, как оставить заказ на сайте, так и связаться напрямую.
                            </p>
                        </div>
                    </li>
                    <li class="advantages-item">
                        <span class="item-icon icon-adv-6"></span>
                        <div class="item-desc">
                            <h3 class="title">Больше никаких простоев</h3>
                            <p class="text">
                                Мы поможем Вам планировать предоставление услуг заблаговременно.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
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
        <section class="news-section">
            <div class="container">
                <div class="section-title">новости</div>
                <div class="row news-section-content">
                    <div class="col-sm-3 col-xs-6 column">
                        <div class="news-item">
                            <div class="item-img">
                                <a href=""><img src="img/static/news/01.png" alt="alt"></a>
                            </div>
                            <div class="item-desc">
                                <span class="date">23/09/2017</span>
                                <h3 class="title">
                                    <a href="">Поиск грузового транспорта и спецтехники без диспетчера! </a>
                                </h3>
                                <p class="text">
                                    Не секрет, что для клиентов, которым требуются услуги спецтехники или перевозка грузов, в стоимость заказа включается процент диспетчера за поиск техники.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6 column">
                        <div class="news-item">
                            <div class="item-img">
                                <a href=""><img src="img/static/news/02.png" alt="alt"></a>
                            </div>
                            <div class="item-desc">
                                <span class="date">27/06/2017</span>
                                <h3 class="title">
                                    <a href="">Поиск грузового транспорта и спецтехники! </a>
                                </h3>
                                <p class="text">
                                    Не секрет, что для клиентов, которым требуются услуги спецтехники или перевозка грузов, в стоимость заказа включается процент диспетчера за поиск техники.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6 column">
                        <div class="news-item">
                            <div class="item-img">
                                <a href=""><img src="img/static/news/03.png" alt="alt"></a>
                            </div>
                            <div class="item-desc">
                                <span class="date">07/10/2017</span>
                                <h3 class="title">
                                    <a href="">транспорт и спецтехника без диспетчера! </a>
                                </h3>
                                <p class="text">
                                    Не секрет, что для клиентов, которым требуются услуги спецтехники или перевозка грузов, в стоимость заказа включается процент диспетчера за поиск техники.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6 column">
                        <div class="news-item">
                            <div class="item-img">
                                <a href=""><img src="img/static/news/04.png" alt="alt"></a>
                            </div>
                            <div class="item-desc">
                                <span class="date">23/09/2017</span>
                                <h3 class="title">
                                    <a href="">Поиск грузового транспорта и спецтехники без диспетчера!</a>
                                </h3>
                                <p class="text">
                                    Не секрет, что для клиентов, которым требуются услуги спецтехники или перевозка грузов, в стоимость заказа включается процент диспетчера за поиск техники.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end news-section -->

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>