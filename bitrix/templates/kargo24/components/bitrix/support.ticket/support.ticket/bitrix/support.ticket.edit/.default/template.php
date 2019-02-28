<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$APPLICATION->AddHeadScript($this->GetFolder() . '/ru/script.js');
?>
<?=ShowError($arResult["ERROR_MESSAGE"]);?>


<? if (!empty($arResult["TICKET"])):
	?>
	<h2>Обращение №<?=$arResult["TICKET"]["ID"]?> <?=$arResult["TICKET"]["TITLE"]?></h2>

	<?foreach ($arResult["MESSAGES"] as $arMessage):?>
		<div class="sales-orders-item">
			<div class="item-img">
				<i class="icon icon-user icon-4x"></i>
			</div>
			<div class="item-desc">
				<div class="desc-top-panel">
					<ul class="date-and-city">
						<li>
							<span class="color"><?=GetMessage("SUP_TIME")?>:</span>
							<span class="city-text"><?=$arMessage["DATE_CREATE"]?></span>
						</li>
						<li>
							<span class="color"><?=GetMessage("SUP_FROM")?>:</span>
							<?=$arMessage["OWNER_SID"]?>
							<?if (intval($arMessage["OWNER_USER_ID"])>0):?>
								<?=$arMessage["OWNER_NAME"]?>
							<?endif?>
						</li>
					</ul>
					<span class="number">№ <?=$arMessage['ID']?></span>
				</div>
				<p class="text">
					<?=$arMessage["MESSAGE"]?>
				</p>
			</div>
		</div>
	<?endforeach?>

	<?=$arResult["NAV_STRING"]?>

<?endif;?>

<form name="support_edit" method="post" action="/personal/support/" enctype="multipart/form-data" class="unified-form">
	<?=bitrix_sessid_post()?>
	<input type="hidden" name="set_default" value="Y" />
	<input type="hidden" name="ID" value=<?=(empty($arResult["TICKET"]) ? 0 : $arResult["TICKET"]["ID"])?> />
	<input type="hidden" name="lang" value="<?=LANG?>" />
	<input type="hidden" name="edit" value="1" />
	<input type="hidden" name="support_edit" value="1" />


	<div class="row form-box">
		<div class="col-md-7 col-sm-9">

			<?if (empty($arResult["TICKET"])):?>

				<div class="row">
					<div class="col-md-12 col-sm-12">
						<h3 class="form-title"><?=GetMessage("SUP_TITLE")?></h3>
						<input type="text" name="TITLE" class="text-input" value="<?=htmlspecialcharsbx($_REQUEST["TITLE"])?>" size="48" maxlength="255" />
					</div>
				</div>

			<?endif?>
		</div>
	</div>



	<?if (strlen($arResult["TICKET"]["DATE_CLOSE"]) <= 0):?>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h3 class="form-title"><?=GetMessage("SUP_MESSAGE")?></h3>
				<textarea class="text-area" placeholder="<?=GetMessage("SUP_MESSAGE")?>" name="MESSAGE" id="MESSAGE" wrap="virtual">
					<?=htmlspecialcharsbx($_REQUEST["MESSAGE"])?>
				</textarea>
			</div>
		</div>
	<?endif?>

	<div class="wrapper-submit-btn limed-spruce-btn">
		<span class="arrow"></span>
		<input type="submit" name="save" class="submit-btn" value="<?=GetMessage("SUP_SAVE")?>">
	</div>
	<input type="hidden" value="Y" name="apply" />

	<script type="text/javascript">
		BX.ready(function(){
			var buttons = BX.findChildren(document.forms['support_edit'], {attr:{type:'submit'}});
			for (i in buttons)
			{
				BX.bind(buttons[i], "click", function(e) {
					setTimeout(function(){
						var _buttons = BX.findChildren(document.forms['support_edit'], {attr:{type:'submit'}});
						for (j in _buttons)
						{
							_buttons[j].disabled = true;
						}

					}, 30);
				});
			}
		});
	</script>

</form>
