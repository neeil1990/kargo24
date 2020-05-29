<?

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>

	<footer class="main-footer">
		<div class="container">
			<div class="main-footer-content">
				<div class="content-footer-left">
					<div class="footer-column">
						<div class="footer-inner-column">
							<h3 class="footer-title"><?= tplvar('service_footer', true);?></h3>
                            <?$APPLICATION->IncludeComponent("bitrix:menu", "footer.menu", Array(
                                "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                                "CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
                                "DELAY" => "N",	// Откладывать выполнение шаблона меню
                                "MAX_LEVEL" => "1",	// Уровень вложенности меню
                                "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                                    0 => "",
                                ),
                                "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                                "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                                "MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
                                "ROOT_MENU_TYPE" => "service_col_1_footer",	// Тип меню для первого уровня
                                "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                            ),
                                false
                            );?>
						</div>
						<div class="footer-inner-column">
                            <?$APPLICATION->IncludeComponent("bitrix:menu", "footer.menu", Array(
                                "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                                "CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
                                "DELAY" => "N",	// Откладывать выполнение шаблона меню
                                "MAX_LEVEL" => "1",	// Уровень вложенности меню
                                "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                                    0 => "",
                                ),
                                "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                                "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                                "MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
                                "ROOT_MENU_TYPE" => "service_col_2_footer",	// Тип меню для первого уровня
                                "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                            ),
                                false
                            );?>
						</div>
					</div>
					<div class="footer-column">
						<h3 class="footer-title"><?= tplvar('usefull_footer', true);?></h3>
                        <?$APPLICATION->IncludeComponent("bitrix:menu", "footer.menu", Array(
                            "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                            "CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
                            "DELAY" => "N",	// Откладывать выполнение шаблона меню
                            "MAX_LEVEL" => "1",	// Уровень вложенности меню
                            "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                                0 => "",
                            ),
                            "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                            "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                            "MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
                            "ROOT_MENU_TYPE" => "usefull_footer",	// Тип меню для первого уровня
                            "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                        ),
                            false
                        );?>
						<div class="top-panel mobile">
							<div class="top-panel-column">
								<h3 class="footer-title"><?= tplvar('for_users_footer', true);?></h3>
                                <?$APPLICATION->IncludeComponent("bitrix:menu", "footer.menu", Array(
                                    "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                                    "CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
                                    "DELAY" => "N",	// Откладывать выполнение шаблона меню
                                    "MAX_LEVEL" => "1",	// Уровень вложенности меню
                                    "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                                        0 => "",
                                    ),
                                    "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                                    "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                                    "MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
                                    "ROOT_MENU_TYPE" => "for_users_footer",	// Тип меню для первого уровня
                                    "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                                ),
                                    false
                                );?>
							</div>
							<div class="top-panel-column">
								<h3 class="footer-title"><?= tplvar('for_business_footer', true);?></h3>
                                <?$APPLICATION->IncludeComponent("bitrix:menu", "footer.menu", Array(
                                    "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                                    "CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
                                    "DELAY" => "N",	// Откладывать выполнение шаблона меню
                                    "MAX_LEVEL" => "1",	// Уровень вложенности меню
                                    "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                                        0 => "",
                                    ),
                                    "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                                    "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                                    "MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
                                    "ROOT_MENU_TYPE" => "for_business_footer",	// Тип меню для первого уровня
                                    "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                                ),
                                    false
                                );?>
							</div>
						</div>
					</div>
				</div>
				<div class="content-footer-right">
					<div class="top-panel desktop">
						<div class="top-panel-column">
							<h3 class="footer-title"><?= tplvar('for_users_footer', true);?></h3>
                            <?$APPLICATION->IncludeComponent("bitrix:menu", "footer.menu", Array(
                                "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                                "CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
                                "DELAY" => "N",	// Откладывать выполнение шаблона меню
                                "MAX_LEVEL" => "1",	// Уровень вложенности меню
                                "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                                    0 => "",
                                ),
                                "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                                "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                                "MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
                                "ROOT_MENU_TYPE" => "for_users_footer",	// Тип меню для первого уровня
                                "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                            ),
                                false
                            );?>
						</div>
						<div class="top-panel-column">
							<h3 class="footer-title"><?= tplvar('for_business_footer', true);?></h3>
                            <?$APPLICATION->IncludeComponent("bitrix:menu", "footer.menu", Array(
                                "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                                "CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
                                "DELAY" => "N",	// Откладывать выполнение шаблона меню
                                "MAX_LEVEL" => "1",	// Уровень вложенности меню
                                "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                                    0 => "",
                                ),
                                "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                                "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                                "MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
                                "ROOT_MENU_TYPE" => "for_business_footer",	// Тип меню для первого уровня
                                "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                            ),
                                false
                            );?>
						</div>
					</div>
					<div class="footer-counter-and-info">
						<div class="footer-counter">
							<ul class="footer-counter-list">
								<li>
 <? if(!$DBDebug): ?>
<!-- Yandex.Metrika informer -->
<a href="https://metrika.yandex.ru/stat/?id=53368480&amp;from=informer"
target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/53368480/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="53368480" data-lang="ru" /></a>
<!-- /Yandex.Metrika informer -->

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
<? endif; ?>
</li>
								<li>

</li>
							</ul>
						</div>
						<div class="footer-bottom-info">
							<div class="copyright"><?= tplvar('copyright_footer', true);?></div>
							<p class="text"><?= tplvar('text_footer', true);?></p>
							<p class="text"></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- end main-footer -->
	<div class="scroll-to-top"></div>

</div>
<!-- END GLOBAL-WRAPPER -->

	<div id="input-form-popup" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<form action="#" class="unified-pop-up-form login-form">
				<h3 class="form-title">
					Данная информация доступна <span class="max">только участникам сервиса</span>
				</h3>
				<div class="row form-field">
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" name="login" class="text-input" placeholder="Логин" required/>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<input type="pasword" name="pasword" class="text-input" placeholder="Пароль" />
						</div>
					</div>
				</div>
				<div class="wrapper-form-btn limed-spruce-btn">
					<span class="arrow"></span>
					<input type="submit" value="Войти" class="submit-btn" />
				</div>
				<div class="form-footer">
					<div class="wrapper-text-account">
						<span class="text-account">У Вас нет своего аккаунта?</span>
					</div>
					<a href="" class="register-btn">Зарегистрироваться!</a>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<span class="icon-close"></span>
				</button>
			</form>
		</div>
	</div>
	<!-- end input-form-popup -->
	<div id="form-complain-popup" class="modal fade in" role="dialog">
		<div class="modal-dialog">
			<form action="#" class="unified-pop-up-form form-complain">
				<h3 class="form-title">
					Пожаловаться
				</h3>
				<div class="form-group">
					<input type="text" name="name" class="text-input" placeholder="ФИО" required="">
				</div>
				<div class="form-group">
					<input type="tel" name="phone" class="text-input" placeholder="Телефон" required="">
				</div>
				<div class="form-group">
					<input type="email" name="email" class="text-input" placeholder="E-mail" required="">
				</div>
				<div class="form-group">
					<textarea class="text-area" placeholder="Причина жалобы" reguired=""></textarea>
				</div>
				<div class="wrapper-form-btn limed-spruce-btn">
					<span class="arrow"></span>
					<input type="submit" value="Отправить" class="submit-btn">
				</div>

				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<span class="icon-close"></span>
				</button>
			</form>
		</div>
	</div>
	<!-- end form-complain-popup -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script>
		window.jQuery || document.write('<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.min.js"><\/script>')
	</script>

	<script src="<?=SITE_TEMPLATE_PATH?>/js/modernizr-2.8.3.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/bootstrap.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.maskedinput.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.selectric.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/slick.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/easySearch/dist/jquery.easysearch.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-ui-1.12.1.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/alertifyjs/alertify.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/hideAndPeek.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/main.js"></script>

</body>
</html>
