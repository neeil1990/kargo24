<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

		<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
			<?foreach($arResult["HIDDEN"] as $arItem):?>
			<input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
			<?endforeach;?>
				<?
				foreach($arResult["ITEMS"] as $key=>$arItem)
				{
					if(
						empty($arItem["VALUES"])
						|| isset($arItem["PRICE"])
					)
						continue;

					if (
						$arItem["DISPLAY_TYPE"] == "A"
						&& (
							$arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0
						)
					)
						continue;
					?>
							<?
							$arCur = current($arItem["VALUES"]);

							switch ($arItem["DISPLAY_TYPE"])
							{
								case "F":
									?>
									<ul class="categori-list-menu">
										<li>
											<input
												class="btn btn-link"
												type="submit"
												id="del_filter"
												name="del_filter"
												value="<?=GetMessage("CT_BCSF_DEL_FILTER")?>"
												hidden
												/>
											<a href="javascript:void(0)" onclick="$('#del_filter').click()" class="<?=($arParams['SMART_FILTER_PATH'] == 'clear' || !$arParams['SMART_FILTER_PATH'])?'active':'';?>">Все</a>
										</li>
										<?foreach($arItem["VALUES"] as $val => $ar):?>
											<li>
												<input
													type="checkbox"
													value="<? echo $ar["HTML_VALUE"] ?>"
													name="<? echo $ar["CONTROL_NAME"] ?>"
													id="<? echo $ar["CONTROL_ID"] ?>"
													<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
													onclick="smartFilter.click(this)"
													hidden
													/>
												<a href="javascript:void(0)" onclick="$('#<? echo $ar["CONTROL_ID"] ?>').click();$(this).toggleClass('active')" class="<? echo $ar["CHECKED"] ? 'active': '' ?>">
													<?=$ar["VALUE"];?>
												</a>
											</li>
										<?endforeach;?>

										<li>
											<input
												class="btn btn-themes"
												type="submit"
												id="set_filter"
												name="set_filter"
												value="<?=GetMessage("CT_BCSF_SET_FILTER")?>"
												hidden
												/>

											<div class="" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?> style="display: inline-block;">
												<a href="<?echo $arResult["FILTER_URL"]?>" target="" class="" style="background: #FFF;border: 3px solid #6d96ab;color: #d62b21;line-height: 33px;font-weight: bold;">
													<?echo GetMessage("CT_BCSF_FILTER_SHOW")?>
													<span id="modef_num"><?=intval($arResult["ELEMENT_COUNT"])?></span>
													объявления
												</a>
											</div>
										</li>

									</ul>
									<?
									break;
									?>

							<?
							}
							?>
				<?
				}
				?>

			<div class="clb"></div>

		</form>

<script type="text/javascript">
	var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>