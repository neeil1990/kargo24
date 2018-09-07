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
	if($_REQUEST['IBlock'] && $_REQUEST['IBlockSection']){
		$res = $main->setSection($_REQUEST['IBlock'],$_REQUEST['IBlockSection'],$_REQUEST['district']);
		if($res)
		LocalRedirect($APPLICATION->GetCurPage()."?mid=".urlencode($mid)."&lang=".LANGUAGE_ID."&iblock=$_REQUEST[IBlock]&iSection=$_REQUEST[IBlockSection]");
	}
}

if($b = $_GET['iblock'] && $s = $_GET['iSection'])
CAdminMessage::ShowMessage(array("MESSAGE" => "Добавлены города в ИБ $b раздел $s", "TYPE"=>"OK"));

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
			<select name="IBlock" onchange="getSection(this.value)">
				<option value="">Не выбрано</option>
				<? foreach($main->iblock() as $ib): ?>
				<option value="<?=$ib['ID']?>"><?=$ib['NAME']?></option>
				<?endforeach;?>
			</select>
		</td>
	</tr>

	<tr id="IBlockSectionTr">
		<td width="40%" nowrap>
			<label for="">Выбрать раздел</label>
		</td>

		<td width="60%" id="IBlockSection"></td>
	</tr>

	<?$tabControl->Buttons();?>
	<input type="submit" name="Apply" value="<?=GetMessage("MAIN_OPT_APPLY")?>" title="<?=GetMessage("MAIN_OPT_APPLY_TITLE")?>" class="adm-btn-save">
	<?=bitrix_sessid_post();?>
	<?$tabControl->End();?>
</form>

<script type="text/javascript">

	function getSection(el){

		BX.ajax({
			url: "/bitrix/admin/section_ajax.php",
			method: 'POST',
			data: {'id':el},
			dataType: 'json',
			timeout: 30,
			async: true,
			processData: true,
			scriptsRunFirst: true,
			emulateOnload: true,
			start: true,
			cache: false,
			onsuccess: function(data){
				if(document.getElementById("IBlockSectionSelect"))
					document.getElementById("IBlockSectionSelect").remove();

				var tr = document.getElementById('IBlockSectionTr');

				if(data){

					tr.style.display = "contents";

					var td = document.getElementById("IBlockSection");

					var selectList = document.createElement("select");
					selectList.setAttribute("name", "IBlockSection");
					selectList.setAttribute("id", "IBlockSectionSelect");
					td.appendChild(selectList);

					for (var i = 0; i < data.length; i++) {
						var option = document.createElement("option");
						option.setAttribute("value", data[i].ID);
						option.text = data[i].NAME;
						selectList.appendChild(option);
					}
				}else{
					tr.style.display = "none";
					alert("Нет разделов первого уровня.");
				}
			}
		});
	}

</script>

