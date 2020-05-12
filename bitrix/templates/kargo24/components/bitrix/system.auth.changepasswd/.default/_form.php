
<form method="post" action="<?=$arResult["AUTH_FORM"]?>" name="bform" class="authorization-form unified-form">
    <?if (strlen($arResult["BACKURL"]) > 0): ?>
        <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
    <? endif ?>
    <input type="hidden" name="AUTH_FORM" value="Y">
    <input type="hidden" name="TYPE" value="CHANGE_PWD">

    <h3 class="form-title"><?=GetMessage("AUTH_CHANGE_PASSWORD")?></h3>

    <? ShowMessage($arParams["~AUTH_RESULT"]); ?>

    <div class="form-group">
        <input type="text" class="text-input" name="USER_LOGIN" value="<?=$arResult["LAST_LOGIN"]?>" placeholder="<?=GetMessage("AUTH_LOGIN")?>">
    </div>

    <div class="form-group">
        <input type="text" class="text-input" name="USER_CHECKWORD" value="<?=$arResult["USER_CHECKWORD"]?>" placeholder="<?=GetMessage("AUTH_CHECKWORD")?>">
    </div>

    <div class="form-group">
        <input type="password" class="text-input" name="USER_PASSWORD" value="<?=$arResult["USER_PASSWORD"]?>" placeholder="<?=GetMessage("AUTH_NEW_PASSWORD_REQ")?>" autocomplete="off">
    </div>

    <div class="form-group">
        <input type="password" class="text-input" name="USER_CONFIRM_PASSWORD" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" placeholder="<?=GetMessage("AUTH_NEW_PASSWORD_CONFIRM")?>" autocomplete="off">
    </div>

    <?if($arResult["USE_CAPTCHA"]):?>
        <div class="form-group">
            <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>">
            <input type="text" class="text-input" name="captcha_word" maxlength="50" value="" placeholder="<?echo GetMessage("system_auth_captcha")?>"/>
            <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
        </div>
    <?endif?>

    <p class="text"><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>

    <div class="wrapper-submit-btn limed-spruce-btn" style="min-width: 260px;">
        <span class="arrow"></span>
        <input type="submit" class="submit-btn" name="change_pwd" value="<?=GetMessage("AUTH_CHANGE")?>" />
    </div>
</form>
