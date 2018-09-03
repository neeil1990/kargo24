<?
use Bitrix\Main\Context,
	Bitrix\Main\Page\Asset;

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>

<!DOCTYPE html>
<!--[if IE 9 ]><html class="no-js ie ie9" lang="en"><![endif]-->
<html class="no-js" lang="ru">
<!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?$APPLICATION->ShowTitle();?></title>

	<?
	$APPLICATION->ShowHead();

	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/bootstrap.min.css');
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/font.css');
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/font-awesome.css');
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/reset.css');
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/style.css');
	?>
	
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<!--[if lt IE 10]>
<p class="browsehappy"><br>Вы используете <sliong>устаревший</sliong> браузер.
	Пожалуйста, <a href="http://browsehappy.com/">обновите его</a> для корректного
	отображения сайтов.</p>
<![endif]-->
<div class="global-wrapper">
	<header class="ui-head">
		<div class="main-head">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-xs-3">
						<ul class="head-switch-lang desktop">
							<li class="active"><a href=""><img src="<?=SITE_TEMPLATE_PATH?>/img/static/flag/01.jpg" alt="alt"></a></li>
							<li><a href=""><img src="<?=SITE_TEMPLATE_PATH?>/img/static/flag/02.jpg" alt="alt"></a></li>
							<li><a href=""><img src="<?=SITE_TEMPLATE_PATH?>/img/static/flag/03.jpg" alt="alt"></a></li>
							<li><a href=""><img src="<?=SITE_TEMPLATE_PATH?>/img/static/flag/04.jpg" alt="alt"></a></li>
						</ul>
						<div class="head-switch-lang mobile">
							<div class="sort">
								<div class="current-sort mod">
									<span class="line"><img src="img/static/flag/01.jpg" alt="alt"></span>
									<span class="icon"></span>
									<ul class="current-list">
										<li class="text">Выберите страну</li>
										<li><img src="<?=SITE_TEMPLATE_PATH?>/img/static/flag/01.jpg" alt="alt">Россия</li>
										<li><img src="<?=SITE_TEMPLATE_PATH?>/img/static/flag/02.jpg" alt="alt">Украина</li>
										<li><img src="<?=SITE_TEMPLATE_PATH?>/img/static/flag/03.jpg" alt="alt">Казахстан</li>
										<li><img src="<?=SITE_TEMPLATE_PATH?>/img/static/flag/04.jpg" alt="alt">Беларусь</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-xs-6">
						<div class="head-logo">
							<a href="">
								<img src="<?=SITE_TEMPLATE_PATH?>/img/static/logo.png" alt="alt">
							</a>
						</div>
					</div>
					<div class="col-sm-4 col-xs-3">
						<div class="head-personal-account">
							<div class="account-head"><span class="icon icon-user"></span><span class="text">Личый кабинет</span></div>
							<ul class="log-register">
								<li><a href="">Вход</a></li>
								<li><a href="">Регистрация</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="head-panel">
			<div class="container">
				<div class="row">
					<div class="col-sm-3 col-xs-9">
						<div class="head-catalog-menu">
									<span class="catalog-menu-text">
										<span class="icon icon-truck"></span>
										наши услуги
										<i class="fa fa-angle-down"></i>
									</span>
							<div class="drop-down-menu">
								<div class="drop-down-menu-column">
									<ul class="drop-down-menu-list">
										<li class="title-list-menu">Грузовые перевозки</li>
										<li><a href="">Грузы до 1 т</a></li>
										<li><a href="">Грузы до 2 т</a></li>
										<li><a href="">Грузы до 3,5 т</a></li>
										<li><a href="">Грузы до 5 т</a></li>
										<li><a href="">Грузы до 10 т</a></li>
										<li><a href="">Грузы до 20 т</a></li>
									</ul>
									<ul class="drop-down-menu-list list-title-link">
										<li><a href="">Попутный транспорт</a></li>
										<li><a href="">Поиск грузов</a></li>
										<li><a href="">Расчёт пути</a></li>
										<li><a href="">Продажа спецтехники</a></li>
										<li><a href="">Запчасти и ремонт</a></li>
									</ul>
								</div>
								<div class="drop-down-menu-column">
									<ul class="drop-down-menu-list mod">
										<li class="title-list-menu">Аренда спецтехника</li>
										<li><a href="">Автобетононасосы</a></li>
										<li><a href="">Автовышки</a></li>
										<li><a href="">Автокраны</a></li>
										<li><a href="">Ассенизаторы и илососы</a></li>
										<li><a href="">Бензовозы</a></li>
										<li><a href="">Бетеновозы</a></li>
										<li><a href="">Бульдозеры</a></li>
										<li><a href="">Гидромолоты</a></li>
										<li><a href="">Грейдеры</a></li>
										<li><a href="">Грейферы</a></li>
										<li><a href="">Дорожные катки</a></li>
										<li><a href="">Манируляторы</a></li>
										<li><a href="">Мини-погрузчики</a></li>
										<li><a href="">Мини-экскаваторы</a></li>
										<li><a href="">Низкорамные тралы</a></li>
									</ul>
								</div>
								<div class="drop-down-menu-column">
									<ul class="drop-down-menu-list hide-mobile">
										<li><a href="">Поливомоечные машини</a></li>
										<li><a href="">Самосвалы и тонары</a></li>
										<li><a href="">Тракторы</a></li>
										<li><a href="">Фронтальные погрузчики</a></li>
										<li><a href="">Эвакуаторы</a></li>
										<li><a href="">Экскаваторы</a></li>
										<li><a href="">Экскаваторы-погрузчики</a></li>
										<li><a href="">Ямобуры и сваебои</a></li>
										<li><a href="">Мусоровозы и бункеровозы</a></li>
									</ul>
									<ul class="drop-down-menu-list mod">
										<li class="title-list-menu ">Сопутствующие услуги</li>
										<li><a href="">Асфальтирование и благоустройство</a></li>
										<li><a href="">Вывоз мусора и бытовых отходов</a></li>
									</ul>
								</div>
								<div class="drop-down-menu-column">
									<ul class="drop-down-menu-list hide-mobile">
										<li><a href="">Демонтажные работы по сносу</a></li>
										<li><a href="">Строительные бригады</a></li>
										<li><a href="">Уборка и вывоз снега</a></li>
										<li><a href="">Услуги грузчиков и разнорабочие</a></li>
									</ul>
									<ul class="drop-down-menu-list">
										<li class="title-list-menu">Аренда строительного оборудования </li>
										<li><a href="">Бетономешалки</a></li>
										<li><a href="">Бытовки и блок-контейнеры</a></li>
										<li><a href="">Генераторы</a></li>
										<li><a href="">Компресоры</a></li>
										<li><a href="">Мачтовые подъёмники</a></li>
										<li><a href="">Насосы и мотопомпы</a></li>
										<li><a href="">Опалубка</a></li>
									</ul>
								</div>
								<div class="drop-down-menu-column">
									<ul class="drop-down-menu-list hide-mobile">
										<li><a href="">Подъёмные башенные краны</a></li>
										<li><a href="">Сварочные аппараты</a></li>
										<li><a href="">Строительные люльки</a></li>
										<li><a href="">Фасадные леса и вышки тура</a></li>
										<li><a href="">Электростанции и подстанции</a></li>
									</ul>
									<ul class="drop-down-menu-list">
										<li class="title-list-menu">Пассажирские перевозки</li>
										<li><a href="">Автобусы</a></li>
										<li><a href="">Вахтовки</a></li>
										<li><a href="">Лимузины</a></li>
										<li><a href="">Микроватобусы</a></li>
										<li><a href="">Теплоходы, яхты и катера</a></li>
										<li><a href="">Услуги такси и частные таксисты</a></li>
									</ul>
								</div>
								<div class="drop-down-menu-column">
									<ul class="drop-down-menu-list">
										<li class="title-list-menu">Строительные материалы с  доставкой</li>
										<li><a href="">Арматура и металопрокат</a></li>
										<li><a href="">Бетон</a></li>
										<li><a href="">Вода</a></li>
										<li><a href="">Грунт</a></li>
										<li><a href="">Керамзит</a></li>
										<li><a href="">Кирпич</a></li>
										<li><a href="">Пеноблоки</a></li>
										<li><a href="">Песок</a></li>
										<li><a href="">Пиломатериалы</a></li>
										<li><a href="">Торф и чернозём</a></li>
										<li><a href="">Цемент и сухие смеси</a></li>
										<li><a href="">Щебень и гравий</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-9 col-xs-3">
						<nav class="head-nav">
							<ul class="head-nav-menu">
								<li><a href="">Главная</a></li>
								<li><a href="">О сервисе</a></li>
								<li><a href="">новости</a></li>
								<li><a href="">заказы от клиентов</a></li>
								<li><a href="">Предоставить услугу</a></li>
								<li><a href="">получить услугу</a></li>
								<li class="close-menu js-close-menu">&#215;</li>
							</ul>
						</nav>
						<button class="head-toggle-menu mobile">
							<span class="icon icon-list"></span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- END HEADER -->

	<div class="breadcrumbs">
		<div class="container">
			<ul class="breadcrumbs-list">
				<li><a href="">Главная</a></li>
				<li> Грузовые перевозки по России</li>
			</ul>
		</div>
	</div>



	
						