<?php
session_start();
CModule::AddAutoloadClasses(
    '',
    array(
        'IPGeoBase' => '/bitrix/templates/kargo24/vendor/ipgeobase/ipgeobase.php'
    )
);