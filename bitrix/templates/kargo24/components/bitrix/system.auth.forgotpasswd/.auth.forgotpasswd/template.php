<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

ShowMessage($arParams["~AUTH_RESULT"]);
?>

<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>" class="authorization-form unified-form">
<?
if (strlen($arResult["BACKURL"]) > 0)
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">

    <? if($_REQUEST['forgot_password'] == 'yes'):?>
    <p style="color: green">Сообщение отправлено!</p>
    <?endif;?>

    <p class="text"><?=GetMessage("AUTH_FORGOT_PASSWORD_1")?></p>

    <h3 class="form-title"><?=GetMessage("AUTH_GET_CHECK_STRING")?></h3>

    <div class="form-group">
        <input type="text" class="text-input" name="USER_LOGIN" value="<?=$arResult["LAST_LOGIN"]?>" placeholder="<?=GetMessage("AUTH_LOGIN")?>">
    </div>

    <h3 class="form-title"><?=GetMessage("AUTH_OR")?></h3>

    <div class="form-group">
        <input type="text" class="text-input" name="USER_EMAIL" placeholder="<?=GetMessage("AUTH_EMAIL")?>">
    </div>

    <?if($arResult["USE_CAPTCHA"]):?>
        <div class="form-group">
            <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>">
            <input type="text" class="text-input" name="captcha_word" maxlength="50" value="" placeholder="<?echo GetMessage("system_auth_captcha")?>"/>
            <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
        </div>
    <?endif?>
    <div class="wrapper-submit-btn limed-spruce-btn">
        <span class="arrow"></span>
        <input type="submit" class="submit-btn" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
    </div>

</form>
<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>
