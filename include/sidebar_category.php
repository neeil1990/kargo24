<div class="sidebar-category">
    <h3 class="title">Для частных объявлений</h3>
    <ul class="sidebar-category-list">
        <li><a href="">Спецтехника</a></li>
        <li><a href="">Cтройоборудование</a></li>
        <li><a href="">Пассажирский транспорт</a></li>
        <li><a href="">Строительные грузы</a></li>
        <li><a href="">Сопутствующие услуги</a></li>
    </ul>
</div>
<!-- end sidebar-category -->

<? $APPLICATION->IncludeComponent(
    "kargo:main.banner",
    ".banner.frontend",
    [
        'FILTER' => [
            "IBLOCK_ID" => "22",
            "ACTIVE" => "Y",
            "?PROPERTY_IBLOCK_ID" => $arParams['BLOCK_ID'],
			"?PROPERTY_SECTION_ID" => ($arParams['SECTION_ID']) ?: '0',
			"?PROPERTY_TYPE_XML_ID" => ($arParams['TYPE_XML_ID']) ?: '0',
        ]
    ]
);?>

<?
$APPLICATION->IncludeFile("/include/usefull_ads.php", [], Array(
    "MODE"      => "html",
    "NAME"      => "Редактирование включаемой области раздела"
));
?>
<!-- end unified-ad-unit -->

