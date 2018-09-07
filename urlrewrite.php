<?php
$arUrlRewrite=array (
  1 => 
  array (
    'CONDITION' => '#^/equipment/#',
    'RULE' => 'SECTION_CODE=$1',
    'ID' => 'bitrix:catalog',
    'PATH' => '/equipment/index.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
);
