<?php
IncludeModuleLangFile(__FILE__);

class UserBonus {

    private $db = 'b_user_bonus';
    public $id_module = 'user.bonus';

    function add($id, $name, $bonus){
        if(!$id)
            return false;

        global $DB;
        return $DB->Insert('b_user_bonus', [
            'DATE_CREATE' => $DB->GetNowFunction(),
            'USER_ID' => "'".trim($id)."'",
            'USER_NAME' => "'".trim($name)."'",
            'BONUS' => "'".trim($bonus)."'",
        ]);
    }

    function is_empty($id){
        global $DB, $APPLICATION;
        $sql = "SELECT COUNT(USER_ID) as row FROM $this->db WHERE USER_ID = '$id'";
        $query = $DB->Query($sql, true);
        if($res = $query->Fetch())
            if(!$res['row'])
                return true;

        return false;
    }

    function get(){
        global $DB, $APPLICATION;
        $sql = "SELECT * FROM $this->db ORDER BY ID DESC";
        $query = $DB->Query($sql, true);
        $arBonus = [];
        while($res = $query->Fetch())
            $arBonus[] = $res;

        if($arBonus)
            return $arBonus;

        return false;
    }

    function delete(){
        global $DB;
        $sql = "DELETE FROM $this->db";
        return $DB->Query($sql, true);
    }

    function add_bonus_reg(&$arFields){
        if($arFields["ID"] > 0){
            $bonus_reg = COption::GetOptionString('user.bonus', "bonus_reg", "N");
            if($bonus_reg == 'Y'){
                $bonus_from = COption::GetOptionString('user.bonus', "bonus_from", null);
                $bonus_to = COption::GetOptionString('user.bonus', "bonus_to", null);
                $bonus = rand($bonus_from, $bonus_to);

                $user = new CUser;
                if($user->Update($arFields["ID"], ["UF_BONUS" => $bonus])){
                    self::add($arFields["ID"], $arFields["NAME"], $bonus);
                }
            }
        }
    }

}
