<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
?>

<?if($USER->IsAuthorized()):?>
	<?
	LocalRedirect($arParams['SUCCESS_PAGE']);
	?>
<?else:?>

<? if (count($arResult["ERRORS"]) > 0):
	foreach ($arResult["ERRORS"] as $key => $error)
		if (intval($key) == 0 && $key !== 0)
			$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);

	ShowError(implode("<br />", $arResult["ERRORS"]));

elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
	?>
	<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
<?endif?>

<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data" class="registration-form unified-form">
	<input type="hidden" id="login" name="REGISTER[LOGIN]" value="<?=$arResult["VALUES"]["EMAIL"]?>">
	<?
	if($arResult["BACKURL"] <> ''):
		?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<?
	endif;
	?>

	<h3 class="form-title">Еще нет аккаунта? Пройтиде быструю регистрацию!</h3>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<input type="text" name="REGISTER[NAME]" class="text-input" placeholder="Ваше имя" value="<?=$arResult["VALUES"]["NAME"]?>" required>
			</div>
			<div class="form-group">
				<input type="email" onkeyup="javascript:document.getElementById('login').value = this.value" name="REGISTER[EMAIL]" class="text-input" placeholder="Электронная почта" value="<?=$arResult["VALUES"]["EMAIL"]?>" required>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<input type="password" name="REGISTER[PASSWORD]" class="text-input" placeholder="<?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?>" value="<?=$arResult["VALUES"]["PASSWORD"]?>" autocomplete="off" required>
			</div>
			<div class="form-group">
				<input type="password" name="REGISTER[CONFIRM_PASSWORD]" class="text-input" placeholder="Повторите пароль еще раз" value="<?=$arResult["VALUES"]["CONFIRM_PASSWORD"]?>" autocomplete="off" required>
			</div>
		</div>
		<div class="col-sm-12">
			<label class="wrapper-checkbox">
				<input name="RULE" value="Y" type="checkbox" required>
					<span class="text">
						Регистрируясь на сайте, я ознакомлен(а) и принимаю все условия договора-оферты по использованию сервиса.
					</span>
			</label>
			<div class="wrapper-submit-btn limed-spruce-btn">
				<span class="arrow"></span>
				<input type="submit" class="submit-btn" name="register_submit_button" value="<?=GetMessage("AUTH_REGISTER")?>" />
			</div>
		</div>
	</div>
</form>

<?endif?>
