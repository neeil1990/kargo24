<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();
?>

<?
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
	ShowMessage($arResult['ERROR_MESSAGE']);
?>

<?if($arResult["FORM_TYPE"] == "login"):?>

<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>" class="authorization-form unified-form">

	<?if($arResult["BACKURL"] <> ''):?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
	<?endif?>
	<?foreach ($arResult["POST"] as $key => $value):?>
		<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
	<?endforeach?>
	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="AUTH" />

	<h3 class="form-title">Авторизация</h3>
	<p class="text">Укажите логин и пароль для входа на сайт</p>
	<div class="form-group">
		<input type="text" class="text-input" name="USER_LOGIN" placeholder="Электронная почта">
		<script>
			BX.ready(function() {
				var loginCookie = BX.getCookie("<?=CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"])?>");
				if (loginCookie)
				{
					var form = document.forms["system_auth_form<?=$arResult["RND"]?>"];
					var loginInput = form.elements["USER_LOGIN"];
					loginInput.value = loginCookie;
				}
			});
		</script>
	</div>
	<div class="form-group">
		<input type="password" class="text-input" name="USER_PASSWORD"  placeholder="<?=GetMessage("AUTH_PASSWORD")?>">
	</div>
	<div class="wrapper-submit-btn limed-spruce-btn">
		<span class="arrow"></span>
		<input type="submit" class="submit-btn" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" />
	</div>
</form>
<!-- end authorization-form -->

<?endif?>

