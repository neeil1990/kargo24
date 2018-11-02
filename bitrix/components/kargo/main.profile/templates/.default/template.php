<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
?>

<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>

<script type="text/javascript">
	<!--
	var opened_sections = [<?
$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
if (strlen($arResult["opened"]) > 0)
{
	echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
}
else
{
	$arResult["opened"] = "reg";
	echo "'reg'";
}
?>];
	//-->

	var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
</script>

<section class="title-section order">
	<div class="container">
		<h1 class="title">настройки личного кабинета</h1>
	</div>
</section>
<!-- end title-section -->

<section class="personal-area-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<ul class="personal-area-sidebar-menu">
					<li><a href="/personal/"><span class="menu-text">Мои объявления</span></a></li>
					<li><a href="/personal/my-company/"><span class="menu-text">Мои компании</span></a></li>
					<li class="third"><a href="/personal/my-banners/"><span class="menu-text">Мои баннеры</span></a></li>
					<li><a href="/personal/"><span class="menu-text">Поиск грузов</span></a></li>
					<li><a href="/personal/"><span class="menu-text">Заказы от клиентов</span></a></li>
					<li class="third"><a href="/personal/"><span class="menu-text">Расчет расстояний</span></a></li>
					<li><a href="/personal/"><span class="menu-text">Пополнить баланс: 0 руб</span></a></li>
					<li><a href="/personal/"><span class="menu-text">Мои платежи</span></a></li>
					<li><a href="/personal/settings/" class="active"><span class="menu-text">Настройки</span></a></li>
					<li><a href="/personal/"><span class="menu-text">Техподдержка сайта</span></a></li>
					<li><a href="/?logout=yes"><span class="menu-text">Выйти из личного кабинета</span></a></li>
				</ul>
				<!-- end personal-area-sidebar-menu -->
				<div class="unified-ad-unit desktop">
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
			</div>
			<div class="col-sm-9">
				<form method="post" class="personal-area-settings-form unified-form"  name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
					<?=$arResult["BX_SESSION_CHECK"]?>
					<input type="hidden" name="lang" value="<?=LANG?>" />
					<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

					<?
					$filename = $_SERVER["DOCUMENT_ROOT"].$templateFolder."/pages/".$arResult['SECTION_CODE'].'.php';
					if (file_exists($filename)) {
						include_once $filename;
					} else {
						echo "Страница $arResult[SECTION_CODE] не существует";
					}
					?>

				</form>
				<!-- end uniefed-form -->
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
			</div>
		</div>
	</div>
</section>
<!-- end personal-аrea-section-section -->