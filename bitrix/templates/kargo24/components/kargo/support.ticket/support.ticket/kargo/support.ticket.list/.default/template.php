<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$bDemo = (CTicket::IsDemo()) ? "Y" : "N";
$bAdmin = (CTicket::IsAdmin()) ? "Y" : "N";
$bSupportTeam = (CTicket::IsSupportTeam()) ? "Y" : "N";
$bADS = $bDemo == 'Y' || $bAdmin == 'Y' || $bSupportTeam == 'Y';
?>

<form method="post" action="<?=$arResult["NEW_TICKET_PAGE"]?>">
	<div class="wrapper-submit-btn mod limed-spruce-btn">
		<div class="arrow"></div>
		<input type="submit" class="submit-btn" name="edit" value="<?=GetMessage("SUP_ASK")?>">
	</div>

</form>

<br />


<table class="transport-search-table">
	<thead>
	<tr>
		<th>ID</th>
		<th>Заглавие</th>
		<th></th>
		<th>Изменено</th>
		<th>Кто изменял</th>
		<th>Сообщений</th>
		<th>Статус</th>
	</tr>
	</thead>
	<tbody>

	<? foreach($arResult["ROWS"] as $rows):
		$arUser = (CUser::GetByID($rows['data']['LAST_MESSAGE_USER_ID'])->Fetch());
		?>
	<tr>
		<td><?=$rows['data']['ID']?></td>
		<td><?=$rows['data']['TITLE']?></td>
		<td><a href="<?=$rows['data']['TICKET_EDIT_URL']?>">Посмотреть</a></td>
		<td><?=$rows['data']['TIMESTAMP_X']?></td>
		<td><?=$arUser['NAME']?> <?=$arUser['LAST_NAME']?></td>
		<td><?=$rows['data']['MESSAGES']?></td>
		<td><?=$rows['columns']['LAMP']?></td>
	</tr>
	<?endforeach;?>

	</tbody>
</table>
<!-- end transport-search-table -->
<br/>

<p class="total_ticket">Всего обращений: <?=$arResult["ROWS_COUNT"]?></p>

<ul class="ticket-hint">
	<li><div class="support-lamp-red"></div> - <?=$bADS ? GetMessage("SUP_RED_ALT_SUP") : GetMessage("SUP_RED_ALT_2")?></li>
	<li><div class="support-lamp-yellow"></div> - <?=GetMessage("SUP_YELLOW_ALT_SUP")?></li>
	<li><div class="support-lamp-green"></div> - <?=GetMessage("SUP_GREEN_ALT")?></li>
	<li><div class="support-lamp-green-s"></div> - <?=GetMessage("SUP_GREEN_S_ALT_SUP")?></li>
	<li><div class="support-lamp-grey"></div> - <?=GetMessage("SUP_GREY_ALT")?></li>
</ul>
