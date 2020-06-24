<?php
define("NO_KEEP_STATISTIC", true); // Не собираем стату по действиям AJAX
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


$data = array();
global $USER;
$USER_ID = $USER->GetID();

switch ($_REQUEST['step']) {

    case "send":
        if($phone = filter_var($_REQUEST['phone'],FILTER_SANITIZE_NUMBER_INT)){
            session_start();

            $confirm_phone_code = rand(1000, 9999);
            $_SESSION['CONFIRM_PHONE_CODE'] = $confirm_phone_code;
            $_SESSION['CONFIRM_PHONE'] = $phone;
            $text = "Код подтверждения: $confirm_phone_code";

            $data["login"] = "z1542789679327";
            $data["password"] = "5PH4Dolujrbc";
            $data["messages"][] = array(
                "phone" => $phone,
                "text" => $text,
                "clientId" => "1",
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://api.iqsms.ru/messages/v2/send.json");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response  = curl_exec($ch);
            curl_close($ch);

            return print $response;
        }
        break;

    case "check":

        if($_REQUEST['code'] == $_SESSION['CONFIRM_PHONE_CODE']){
            $rsUser = CUser::GetList($by, $order, array("ID" => $USER_ID ), array("SELECT" => array("UF_PHONES")));
            if($arUser = $rsUser->Fetch())
            {
                $user = new CUser;
                $fields["UF_PHONES"] = $arUser['UF_PHONES'];
                $fields["UF_PHONES"][] = $_SESSION['CONFIRM_PHONE'];
                $user->Update($USER_ID, $fields);
            }
            $data['status'] = "ok";
        }else{
            $data['status'] = "not";
        }

        return print json_encode($data);

        break;

    case "delete":
        if($phone = $_REQUEST['phone_delete']){
            $rsUser = CUser::GetList($by, $order, array("ID" => $USER_ID ), array("SELECT" => array("UF_PHONES")));
            if($arUser = $rsUser->Fetch())
            {
                $user = new CUser;
                $key = array_search($phone, $arUser['UF_PHONES']);
                if(isset($key)){
                    unset($arUser['UF_PHONES'][$key]);
                    $fields["UF_PHONES"] = $arUser['UF_PHONES'];
                    if($user->Update($USER_ID, $fields)){
                        return print json_encode(array('status' => true));
                    }

                }
            }
        }
        break;
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>