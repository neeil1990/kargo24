<?
define("NO_KEEP_STATISTIC", true); // Не собираем стату по действиям AJAX
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


// registration info (password #2)
$mrh_pass2 = "fR0X08kDgXeZQ5Hg1GKY";

// read parameters
$out_summ = $_REQUEST["OutSum"];
$inv_id = $_REQUEST["InvId"];
$crc = strtoupper($_REQUEST["SignatureValue"]);

$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2"));

// check signature
if ($my_crc != $crc)
{
  echo "bad sign\n";
  exit();
}

AddMessage2Log($_REQUEST, "ROBOKASSA");

// pay OK signature
echo "OK$inv_id\n";
?>


