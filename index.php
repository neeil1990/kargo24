<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty("title", "Title");
$APPLICATION->SetTitle("Kargo24.su - портал объявлений от частных лиц и компаний в сфере спецтехники и грузоперевозок");
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
                            <a href="/about/" class="limed-spruce-btn">О сервисе<span class="arrow"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end main-section -->

    <section class="transportations-section">
        <div class="container">
            <div class="row">

                <div class="col-sm-9">
                    <div class="section-title">
                        <?= tplvar('title_ib2', true);?>
                    </div>
                    <?$APPLICATION->IncludeComponent("kargo:ads.type", "home.type.cube", Array(
                        "IBLOCK_ID" => "2",	// Инфоблок
                        "IBLOCK_TYPE" => "content",	// Тип инфоблока
                        "SORT" => "NAME",	// Порядок сортировки тегов
                        "ADDITIONAL_BLOCK" => array(
                            array("IMG" => "/upload/main_images/2/1.png","LINK" => "/gruzovye-perevozki/","NAME" => "ГРУЗОВЫЕ ПЕРЕВОЗКИ"),
                        ),
                        ),
                        false
                    );?>
                </div>

                <div class="col-sm-3">
                    <?
                    $APPLICATION->IncludeFile("/include/usefull_ads.php", [], Array(
                        "MODE"      => "html",
                        "NAME"      => "Редактирование включаемой области раздела"
                    ));
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end transportations-section -->

    <section class="special-equipment-section">
        <div class="container">
            <div class="section-title">
                <?= tplvar('title_ib1', true);?>
            </div>

            <?$APPLICATION->IncludeComponent("bitrix:news.line", "Iblock.list", Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
                "CACHE_GROUPS" => "N",	// Учитывать права доступа
                "CACHE_TIME" => "300",	// Время кеширования (сек.)
                "CACHE_TYPE" => "A",	// Тип кеширования
                "DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
                "FIELD_CODE" => array(	// Поля
                    0 => "",
                    1 => "",
                ),
                "IBLOCKS" => array(	// Код информационного блока
                    0 => "1",
                    1 => "9",
                    2 => "10",
                ),
                "IBLOCK_TYPE" => "content",	// Тип информационного блока
                "NEWS_COUNT" => "0",	// Количество новостей на странице
                "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
                "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
                "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
                "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
            ),
                false
            );?>


            <?$APPLICATION->IncludeComponent("kargo:ads.type", "home.type", Array(
                "IBLOCK_ID" => "1",	// Инфоблок
                "IBLOCK_TYPE" => "content",	// Тип инфоблока
                "SORT" => "NAME",	// Порядок сортировки тегов
            ),
                false
            );?>

        </div>
    </section>
    <!-- end special-equipment-section -->

    <section class="equipment-rent-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <? $arRandBanners = getRandBanners(["IBLOCK_ID" => 22, "ACTIVE" => "Y"], 3);

                    if(count($arRandBanners) == 3)
                        $arRandLastBanner = array_pop($arRandBanners);
                    ?>

                    <?
                    foreach ($arRandBanners as $arItem)
                        $APPLICATION->IncludeFile("/include/banner_templates.php", $arItem);
                    ?>
                </div>
                <div class="col-sm-9">
                    <div class="section-title">
                        <?= tplvar('title_ib3', true);?>
                    </div>
                    <?$APPLICATION->IncludeComponent("kargo:ads.type", "home.type.cube", Array(
                        "IBLOCK_ID" => "3",	// Инфоблок
                        "IBLOCK_TYPE" => "content",	// Тип инфоблока
                        "SORT" => "NAME",	// Порядок сортировки тегов
                        "ADDITIONAL_BLOCK" => array(
                            array("IMG" => "/upload/main_images/3/1.png","LINK" => "/arenda-stroitelnogo-oborudovaniya/","NAME" => "Аренда строй-оборудования"),
                        ),
                    ),
                        false
                    );?>
                </div>
            </div>
        </div>
    </section>
    <!-- end equipment-rent-section -->


    <section class="accompanyin-passenger-services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="section-title white">
                        <?= tplvar('title_ib6', true);?>
                    </div>
                    <?$APPLICATION->IncludeComponent("kargo:ads.type", "home.type.cube", Array(
                        "IBLOCK_ID" => "6",	// Инфоблок
                        "IBLOCK_TYPE" => "content",	// Тип инфоблока
                        "SORT" => "NAME",	// Порядок сортировки тегов
                        "CLASS_BODY" => "accompanying-services-content",
                        "ADDITIONAL_BLOCK" => array(
                            array("IMG" => "/upload/main_images/6/1.png","LINK" => "/services/","NAME" => "СОПУТСТВУЮЩИЕ УСЛУГИ"),
                        ),
                    ),
                        false
                    );?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 right-block">
                    <div class="section-title white">
                        <?= tplvar('title_ib7', true);?>
                    </div>
                    <?$APPLICATION->IncludeComponent("kargo:ads.type", "home.type.cube", Array(
                        "IBLOCK_ID" => "7",	// Инфоблок
                        "IBLOCK_TYPE" => "content",	// Тип инфоблока
                        "SORT" => "NAME",	// Порядок сортировки тегов
                        "CLASS_BODY" => "passenger-transportation-content",
                        "ADDITIONAL_BLOCK" => array(
                            array("IMG" => "/upload/main_images/7/1.png","LINK" => "/passenger/","NAME" => "ПАССАЖИРСКИЕ ПЕРЕВОЗКИ"),
                        ),
                    ),
                        false
                    );?>
                </div>
            </div>
        </div>
    </section>
    <!-- end accompanyin-passenger-services-section -->


    <section class="construction-materials-section">
        <div class="container">
            <div class="section-title">
                <?= tplvar('title_ib8', true);?>
            </div>
            <?$APPLICATION->IncludeComponent("kargo:ads.type", "home.type.cube", Array(
                "IBLOCK_ID" => "8",	// Инфоблок
                "IBLOCK_TYPE" => "content",	// Тип инфоблока
                "SORT" => "NAME",	// Порядок сортировки тегов
                "CLASS_BODY" => "construction-materials-content",
                "ADDITIONAL_BLOCK" => array(
                    array("IMG" => "/upload/main_images/8/1.png","LINK" => "/materials/","NAME" => "СТРОИТЕЛЬНЫЕ МАТЕРИАЛЫ"),
                ),
            ),
                false
            );?>
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

                        <div class="section-title">О сервисе kARGO24</div>
                        <div class="service-text-item">
                            <h3 class="title">Заказ любого вида транспорта без диспетчера</h3>
                            <p class="text">
                                 В настоящее время многие крупные и маленькие строительные компании не имеют своей спецтехники. Сайты по продаже спецтехники реализуют ее по высокой стоимости. Купив ее, фирма может использовать ее лишь в ограниченный период времени, а содержать и обслуживать машины дорого. Поэтому такой популярной стала аренда дорожно-строительной, коммунально-уборочной, подъемной и других видов техники. Это выгодный и разумный способ сэкономить свои финансы. Но как это найти технические средства рационально и быстро.
                            </p>
							<p class="text">
                                 Многие руководители фирм работают по старинке – ищут аренду на бесплатных досках объявлений, обзванивая каждое из них; через поиск транспорта онлайн и пользуются услугами диспетчера перевозок онлайн, за которые необходимо платить 10-15% стоимости от каждого заказа. Это некачественное решение проблемы только усугубляет положение, ведь на поиски и в первом, и во втором случае уходит много времени, тратится больше денег, а в конечном итоге могут быть сорванные графики работ. Конечно, сейчас в интернете множество сервисов аренды спецтехники, и сложно разобраться - какой из них лучше.
                            </p>
							<p class="text">
                                 Онлайн сервис перевозок (kargo24.su) без участия диспетчера поможет решить задачу аренды эффективным путем.
                            </p>
                        </div>
                        <div class="service-text-item">
                            <h3 class="title">Лучший онлайн сервис для поиска транспорта</h3>
                            <p class="text">
                                Именно наш сайт в рейтинге лучшие сайты для размещения спецтехники в аренду занимает первую позицию. На данный момент сайт аренды спецтехники объединил 13715 транспортных компаний и частных владельцев специальной техники. Сервис является солидным посредником между потенциальными заказчиками и владельцами специального транспорта. Портал аренды спецтехники не вмешивается в составление договоров.  Потенциальные клиенты самостоятельно  ищут в базе данных нужный оптимальный вариант. Сервис оказывает услуги:
                            </p>
                            <ul class="service-list">
                                <li>
										<span class="icon-check">
											<span class="path1"></span><span class="path2"></span>
										</span>
                                    аренды спецтехники, строительного оборудования;
                                </li>
                                <li>
										<span class="icon-check">
											<span class="path1"></span><span class="path2"></span>
										</span>
                                    продажи спецтехники - порталы;
                                </li>
                                <li>
										<span class="icon-check">
											<span class="path1"></span><span class="path2"></span>
										</span>
                                    сопутствующих предложений;
                                </li>
								                               <li>
										<span class="icon-check">
											<span class="path1"></span><span class="path2"></span>
										</span>
                                    пассажирских перевозок-онлайн;
                                </li>
								                               <li>
										<span class="icon-check">
											<span class="path1"></span><span class="path2"></span>
										</span>
                                    строительных материалов с доставкой.
                                </li>
                            </ul>
                        </div>
						<div class="service-text-item">
                            <p class="text">
                                 Очень выгодно на одной платформе заказать, например автобетононасос, автокран, бульдозер, трактор и услуги грузчиков, разнорабочих, целых строительных бригад, которые выполняют демонтаж, уборку снега. Удобно при этом, не перелистывая страницы бесчисленного количества интернет-магазинов, здесь же найти инфо о пеноблоках, кирпиче, бетоне и других стройматериалах. Оказываются услуги такси и автобусы для экскурсий.
                            </p>
							<p class="text">
                                 Частные лица для торжественных мероприятий могут заказать лимузины и яхты, а не искать долго в интернете не всегда надежные сайты перевозок. Можно рассчитать стоимость пути.
                            </p>
							<p class="text">
                                 Мы доступны всем регионам и городам России. Плюсы очевидны – легкий и понятный интерфейс, всегда актуальные данные, возможность сократить термины поиска необходимой службы и финансов.
                            </p>
                        </div>
                        <div class="service-text-item">
                            <h3 class="title">Как заказать услугу</h3>
                            <p class="text">
                                Необходимо открыть нашу главную страницу, зарегистрироваться и оставить заявку. Публикация объявлений платная.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <?
                        if($arRandLastBanner)
                            $APPLICATION->IncludeFile("/include/banner_templates.php", $arRandLastBanner);
                        ?>
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
        <!--
        <section class="top-companies-section">
            <div class="container">
                <div class="section-title white">Топ-10 компаний нашего сервиса</div>
                <div class="row top-companies-content">
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
                </div>
                <div class="rate-btn">
                    <a href="" class="limed-spruce-btn">Рейтинг<span class="arrow"></span></a>
                </div>
            </div>
        </section>
        -->
        <!-- end top-companies-section -->
        <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"news.list.home",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "8",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "news.list.home"
	),
	false
);?>


<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
