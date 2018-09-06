<?php

global $DBType;
$module_id = 'section.city';
IncludeModuleLangFile(__FILE__);

CModule::AddAutoloadClasses(
    $module_id,
    array(
        "CreateSection"=> "classes/CreateSection.php",
    )
);

?>