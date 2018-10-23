<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/section.city/include.php");
/** @global CUser $USER */
/** @global CMain $APPLICATION */
/** @global string $mid */
if(!$USER->IsAdmin())
	return;

IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/options.php");
IncludeModuleLangFile(__FILE__);

$main = new CreateSection();

$aTabs = array(
	array("DIV" => "edit1", "TAB" => GetMessage("MAIN_TAB_SET"), "ICON" => "ib_settings", "TITLE" => GetMessage("MAIN_TAB_TITLE_SET")),
);
$tabControl = new CAdminTabControl("tabControl", $aTabs);

if($_SERVER["REQUEST_METHOD"] == "POST" && strlen($Update.$Apply.$RestoreDefaults)>0 && check_bitrix_sessid())
{
	if($_REQUEST['IBlock']){
		$res = $main->setSection($_REQUEST['IBlock'],$_REQUEST['district']);
		if($res)
		LocalRedirect($APPLICATION->GetCurPage()."?mid=".urlencode($mid)."&lang=".LANGUAGE_ID."&iblock=$_REQUEST[IBlock]");
	}
}

if($_GET['iblock'])
CAdminMessage::ShowMessage(array("MESSAGE" => "Добавлены города в ИБ $_GET[iblock]", "TYPE"=>"OK"));

$tabControl->Begin();
?>
<style>
	#IBlockSectionTr{
		display: none;
	}
</style>

<form method="post" action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=urlencode($mid)?>&amp;lang=<?echo LANGUAGE_ID?>">
	<?$tabControl->BeginNextTab();?>

	<tr>
		<td width="40%" nowrap>
			<label for="">Федеральный округ</label>
		</td>

		<td width="60%">
			<select name="district[]" multiple="multiple">
				<option value="">Не выбрано</option>
				<? foreach($main->getDistrict() as $district): ?>
					<? if($district): ?>
					<option value="<?=$district?>"><?=$district?></option>
					<? endif; ?>
				<?endforeach;?>
			</select>
		</td>
	</tr>

	<tr>
		<td width="40%" nowrap>
			<label for="">Выбрать инфоблок</label>
		</td>

		<td width="60%">
			<select name="IBlock">
				<option value="">Не выбрано</option>
				<? foreach($main->iblock() as $ib): ?>
				<option value="<?=$ib['ID']?>"><?=$ib['NAME']?></option>
				<?endforeach;?>
			</select>
		</td>
	</tr>

	<?$tabControl->Buttons();?>
	<input type="submit" name="Apply" value="<?=GetMessage("MAIN_OPT_APPLY")?>" title="<?=GetMessage("MAIN_OPT_APPLY_TITLE")?>" class="adm-btn-save">
	<?=bitrix_sessid_post();?>
	<?$tabControl->End();?>
</form>

