<?
IncludeModuleLangFile(__FILE__);

global $MESS, $DOCUMENT_ROOT;

CModule::AddAutoloadClasses(
    'user.bonus',
    array(
        'UserBonus' => 'lib/classes.php'
    )
);
