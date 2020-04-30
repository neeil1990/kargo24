<?
define("NO_KEEP_STATISTIC", true); // Не собираем стату по действиям AJAX
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$arResult = [];
CModule::IncludeModule("iblock");

if(ROBOKASSA_PWD2){

    // registration info (password #2)
    $mrh_pass2 = ROBOKASSA_PWD2;

    // read parameters
    $out_summ = $_REQUEST["OutSum"];
    $inv_id = $_REQUEST["InvId"];
    $Shp_id = $_REQUEST["Shp_id"];
    $crc = strtoupper($_REQUEST["SignatureValue"]);

    $my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2:Shp_id=$Shp_id"));
    $arResult["ID"] = $Shp_id;

    // check signature
    if ($my_crc != $crc)
    {
        echo "bad sign\n";
        exit();
    }else{
        if($out_summ && $inv_id && $arResult["ID"]){

            $el = new CIBlockElement;
            $PROP = [];
            $PROP["PAY_NUMBER"] = $inv_id;
            $PROP["PRICE"] = round($out_summ, 2);
            $arLoadProductArray = Array(
                "CREATED_BY"    => $arResult["ID"],
                "MODIFIED_BY"    => $arResult["ID"],
                "IBLOCK_SECTION_ID" => false,
                "IBLOCK_ID"      => 19,
                "PROPERTY_VALUES"=> $PROP,
                "NAME"           => $inv_id,
                "ACTIVE"         => "Y",
            );
            if($el->Add($arLoadProductArray)){
                $user = new CUser;
                $rsUser = CUser::GetByID($arResult["ID"]);
                $arUser = $rsUser->Fetch();
                $arUser["UF_BALANCE"] += $out_summ;
                $fields = Array(
                    "UF_BALANCE" => $arUser["UF_BALANCE"],
                );
                if($user->Update($arResult["ID"], $fields)){
                    CEvent::SendImmediate("ADD_BALANCE", SITE_ID, [
                        "NAME" => $arUser['NAME'],
                        "BALANCE" => $out_summ
                    ]);
                    echo "OK$inv_id\n";
                }
            }
        }
    }
}else{
    AddMessage2Log("bad password\n", "ROBOKASSA");
    exit();
}
?>


