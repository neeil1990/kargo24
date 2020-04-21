<?
/** @global CUser $USER */
/** @global CMain $APPLICATION */
/** @global string $mid */
use \Bitrix\Main\Loader;
if(!$USER->IsAdmin())
	return;

IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/options.php");
IncludeModuleLangFile(__FILE__);

$id_module = 'user.bonus';
Loader::includeModule( 'iblock' );
Loader::includeModule( $id_module );
CJSCore::Init( array(
    "jquery"
) );

$userBonus = new UserBonus();
if($_REQUEST['bonus_delete_db'] == "Y"){
    if($userBonus->delete())
        LocalRedirect("/bitrix/admin/settings.php?mid=user.bonus&lang=ru");
}

if($_SERVER["REQUEST_METHOD"] == "POST" && check_bitrix_sessid()) {

    if(!($_REQUEST['date_from'] && $_REQUEST['date_to']) && !($_REQUEST['bonus_from'] && $_REQUEST['bonus_to']))
        return false;

    if($_REQUEST['date_from'] && $_REQUEST['date_to']){

        $filter = array(
            "DATE_REGISTER_1" => $DB->FormatDate($_REQUEST['date_from'], "YYYY-MM-DD", "d.m.Y H:i:s"),
            "DATE_REGISTER_2" => $DB->FormatDate($_REQUEST['date_to'], "YYYY-MM-DD", "d.m.Y H:i:s"),
            "ACTIVE" => 'Y',
        );

        $add_inc = 0;
        $elementsResult = CUser::GetList(($by = "ID"), ($order = "asc"), $filter, ['SELECT' => ['UF_BONUS']]);
        while ($rsUser = $elementsResult->Fetch())
        {
            $bonus = rand($_REQUEST['bonus_from'], $_REQUEST['bonus_to']);
            $user = new CUser;
            $rsUser['UF_BONUS'] += (int)$bonus;
            if($user->Update($rsUser["ID"], ["UF_BONUS" => $rsUser['UF_BONUS']])){
                $userBonus->add($rsUser["ID"], $rsUser["NAME"], $bonus);
                $add_inc++;
            }
        }

        if($add_inc)
            CAdminMessage::ShowMessage(array("MESSAGE" => "Добавлено $add_inc", "TYPE" => "OK"));

    }else{
        $add_inc = 0;
        $elementsResult = CUser::GetList(($by = "ID"), ($order = "asc"), ["ACTIVE" => 'Y'], ['SELECT' => ['UF_BONUS']]);
        while ($rsUser = $elementsResult->Fetch())
        {
            $bonus = rand($_REQUEST['bonus_from'], $_REQUEST['bonus_to']);
            $user = new CUser;
            $rsUser['UF_BONUS'] += (int)$bonus;
            if($userBonus->is_empty($rsUser["ID"])){
                if($user->Update($rsUser["ID"], ["UF_BONUS" => $rsUser['UF_BONUS']]))
                    $userBonus->add($rsUser["ID"], $rsUser["NAME"], $bonus);

                $add_inc++;
            }
        }
        if($add_inc)
            CAdminMessage::ShowMessage(array("MESSAGE" => "Добавлено $add_inc", "TYPE" => "OK"));
    }
}


$aTabs = array(
	array("DIV" => "edit1", "TAB" => GetMessage("MAIN_TAB_SET"), "ICON" => "ib_settings", "TITLE" => "Бонусы"),
);
$tabControl = new CAdminTabControl("tabControl", $aTabs);


$tabControl->Begin();
?>

<form method="post" action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=urlencode($mid)?>&amp;lang=<?echo LANGUAGE_ID?>">
	<?$tabControl->BeginNextTab();?>

	<tr>
		<td width="40%" nowrap>
			<label for="">Бонусы</label>
		</td>

		<td width="60%">
            c <input type="text" name="bonus_from" value="100" size="3">
            до <input type="text" name="bonus_to" value="1000" size="3">
		</td>
	</tr>

    <tr>
        <td width="40%" nowrap>
            <label for="">Дата регистрации</label>
        </td>

        <td width="60%">
            c <input type="date" name="date_from" value="<?=$_REQUEST['date_from']?>">
            до <input type="date" name="date_to" value="<?=$_REQUEST['date_to']?>">
        </td>
    </tr>

    <tr>
        <td colspan="2" align="center">
            <?echo BeginNote('align="left"');?>
            Если указаны даты бонусы будут добавлены для всех пользователей в указанном диапазоне.<br/>
            Если даты не указаны бонусы будут добавлены всем пользователям которые отсутствуют в БД Бонусов.
            <code style="display:block;margin: 10px auto;max-height: 150px;overflow: auto;">
                <?
                if($arBonus = $userBonus->get()){
                    foreach ($arBonus as $bonus){
                        print "$bonus[DATE_CREATE] :: ID:$bonus[USER_ID] :: $bonus[USER_NAME] :: $bonus[BONUS] <br>";
                    }
                }
                ?>
            </code>
            <a href="?mid=user.bonus&bonus_delete_db=Y&lang=ru" onclick="return confirm('Вы уверены?');">Удалить все</a>
            <?echo EndNote();?>
        </td>
    </tr>

	<?$tabControl->Buttons();?>
	<input type="submit" name="Apply" value="<?=GetMessage("MAIN_OPT_APPLY")?>" title="<?=GetMessage("MAIN_OPT_APPLY_TITLE")?>" class="adm-btn-save">
	<?=bitrix_sessid_post();?>
	<?$tabControl->End();?>
</form>

