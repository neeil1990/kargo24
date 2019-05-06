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
	<title><?$APPLICATION->ShowTitle(false);?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?
	$APPLICATION->ShowHead();

	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/bootstrap.min.css');
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/font.css');
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/font-awesome.css');
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/jquery-ui.css');
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/js/alertifyjs/css/alertify.css');
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/js/alertifyjs/css/themes/default.css');
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/reset.css');
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/style.css');
	?>
	
</head>
<body>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(53368480, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/53368480" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


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
									<span class="line"><img src="<?=SITE_TEMPLATE_PATH?>/img/static/flag/01.jpg" alt="alt"></span>
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
							<a href="/">
								<img src="<?=SITE_TEMPLATE_PATH?>/img/static/logo.png" alt="alt">
							</a>
						</div>
					</div>
					<div class="col-sm-4 col-xs-3">
						<div class="head-personal-account">
							<div class="account-head">
								<a href="/personal/settings/">
									<span class="icon icon-user"></span><span class="text">Личный кабинет</span>
								</a>
							</div>
							<ul class="log-register">
								<?
								global $USER;
								if ($USER->IsAuthorized()):
									$arMenu = account_menu();
									foreach($arMenu as $link => $name):
								?>
										<li><a href="/personal/<?=$link?>/"><?=$name?></a></li>
									<?endforeach;?>
									<li><a href="/?logout=yes">Выйти</a></li>
								<? else:?>
										<li><a href="/register/">Вход</a></li>
										<li><a href="/register/">Регистрация</a></li>
								<?endif;?>
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
								<?$APPLICATION->IncludeComponent("kargo:menu.type", "", Array(
									"IBLOCK_ID" => array("1","2","3","6","7","8","9","10"),	// Инфоблок
									"IBLOCK_TYPE" => "content",	// Тип инфоблока
									"SORT" => "NAME",	// Порядок сортировки тегов
								),
									false
								);?>
							</div>
						</div>
					</div>
					<div class="col-sm-9 col-xs-3">
						<?$APPLICATION->IncludeComponent("bitrix:menu", "top.menu", Array(
							"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
							"CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
							"DELAY" => "N",	// Откладывать выполнение шаблона меню
							"MAX_LEVEL" => "1",	// Уровень вложенности меню
							"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
								0 => "",
							),
							"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
							"MENU_CACHE_TYPE" => "N",	// Тип кеширования
							"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
							"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
							"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
						),
							false
						);?>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- END HEADER -->

	<?
	if(!CSite::InDir('/index.php')):
	$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", Array(
		"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
		"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
	),
		false
	);
	endif;
	?>





	
						