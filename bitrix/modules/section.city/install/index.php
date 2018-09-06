<?php
global $MESS;
$strPath2Lang = str_replace("\\", "/", __FILE__);
$strPath2Lang = substr($strPath2Lang, 0, strlen($strPath2Lang)-strlen("/install/index.php"));
include(GetLangFileName($strPath2Lang."/lang/", "/install/index.php"));

Class section_city extends CModule
{

    var $MODULE_ID = "section.city";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;

    function section_city(){
        $arModuleVersion = array();

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        include($path."/version.php");

        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }

        $this->MODULE_NAME = "Автоматическое создание разделов с городами";
        $this->MODULE_DESCRIPTION = "Автоматическое создание разделов с городами";
        $this->PARTNER_NAME = "";
        $this->PARTNER_URI = "";
    }


    function InstallDB($arParams = array())
    {
        global $DB, $APPLICATION, $errors;
        return true;
    }

    function UnInstallDB($arParams = array())
    {
        global $APPLICATION, $DB, $errors;
        return true;
    }

    function InstallEvents($arParams = array()){
        return true;
    }

    function UnInstallEvents($arParams = array()){
        return true;
    }

    function InstallFiles($arParams = array()){
        CopyDirFiles($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$this->MODULE_ID.'/install/admin', $_SERVER['DOCUMENT_ROOT']."/bitrix/admin");
        return true;
    }

    function UnInstallFiles($arParams = array()){
        global $APPLICATION,$DB;
        DeleteDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/'.$this->MODULE_ID.'/install/admin", $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin");
        return true;
    }

    function DoInstall()
    {
        global $APPLICATION,$errors;
        $errors = false;
        $this->InstallFiles();
        RegisterModule($this->MODULE_ID);
        $APPLICATION->IncludeAdminFile(GetMessage("MOD_INST_OK"), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/step.php");
    }

    function DoUninstall()
    {
        global $APPLICATION, $DB, $errors, $step;
        $this->UnInstallFiles();
        UnRegisterModule($this->MODULE_ID);
        $APPLICATION->IncludeAdminFile(GetMessage("MOD_UNINST_OK"), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/unstep.php");
    }


}
?>