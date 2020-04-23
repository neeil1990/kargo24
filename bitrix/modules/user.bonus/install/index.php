<?php
global $MESS;
$strPath2Lang = str_replace("\\", "/", __FILE__);
$strPath2Lang = substr($strPath2Lang, 0, strlen($strPath2Lang)-strlen("/install/index.php"));
include(GetLangFileName($strPath2Lang."/lang/", "/install/index.php"));

Class user_bonus extends CModule
{

    var $MODULE_ID = "user.bonus";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;

    function user_bonus(){
        $arModuleVersion = array();

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        include($path."/version.php");

        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }

        $this->MODULE_NAME = "Бонусы пользователя";
        $this->MODULE_DESCRIPTION = "";
        $this->PARTNER_NAME = "";
        $this->PARTNER_URI = "";
    }


    function InstallDB($arParams = array())
    {
        global $DB, $APPLICATION;
        $EMPTY = false;
        $errors = false;
        if (!$DB->Query("SELECT 'x' FROM b_user_bonus", true))
        {
            $EMPTY = true;
        }

        if ($EMPTY)
        {
            $errors = $DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/user.bonus/install/db/'.strtolower($DB->type).'/install.sql');
        }

        if (is_array($errors))
        {
            $APPLICATION->ThrowException(implode(' ', $errors));
            return false;
        }
    }

    function UnInstallDB($arParams = array())
    {
        global $DB, $APPLICATION;
        $errors = false;

        if(array_key_exists("savedata", $arParams) && $arParams["savedata"] != "Y")
        {
            $errors = $DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/user.bonus/install/db/'.strtolower($DB->type).'/uninstall.sql');
        }

        if (is_array($errors))
        {
            $APPLICATION->ThrowException(implode(' ', $errors));
            return false;
        }
    }

    function InstallEvents($arParams = array()){
        return true;
    }

    function UnInstallEvents($arParams = array()){
        return true;
    }

    function DoInstall()
    {
        global $APPLICATION,$errors;
        $errors = false;
        $this->InstallDB();
        RegisterModule($this->MODULE_ID);
        RegisterModuleDependences('main', 'OnAfterUserAdd', $this->MODULE_ID, 'UserBonus','add_bonus_reg');
        $APPLICATION->IncludeAdminFile(GetMessage("MOD_INST_OK"), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/step.php");
    }

    function DoUninstall()
    {
        global $APPLICATION, $DB, $errors, $step;
        $this->UnInstallDB();
        UnRegisterModule($this->MODULE_ID);
        UnRegisterModuleDependences('main', 'OnAfterUserAdd', $this->MODULE_ID, 'UserBonus','add_bonus_reg');
        $APPLICATION->IncludeAdminFile(GetMessage("MOD_UNINST_OK"), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/unstep.php");
    }


}
?>
