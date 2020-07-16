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

<?
$arFilterBanners = [];
$arFilterBanners['FILTER']['IBLOCK_ID'] = "22";
$arFilterBanners['FILTER']['ACTIVE'] = "Y";
$arFilterBanners['FILTER']['?PROPERTY_IBLOCK_ID'] = $arParams['BLOCK_ID'];
$arFilterBanners['FILTER']['?PROPERTY_SECTION_ID'] = $arParams['SECTION_ID'];



if($arParams['TYPE_XML_ID'])
    $arFilterBanners['FILTER']['?PROPERTY_TYPE_XML_ID'] = $arParams['TYPE_XML_ID'];
else{
    $arFilterBanners['COUNT']['nTopCount'] = 5;
    $arFilterBanners['RANDOM']['RAND'] = "ASC";
}

if($arParams['SECTION_ID']){

    $arSectionChildCity = false;
    $rsSection = CIBlockSection::GetTreeList(['IBLOCK_ID' => $arParams['BLOCK_ID'], 'SECTION_ID' => $arParams['SECTION_ID'], 'ACTIVE' => 'Y'], ['ID']);
    while($arSection = $rsSection->Fetch())
        $arSectionChildCity[] = $arSection['ID'];

    if($arSectionChildCity)
        $arFilterBanners['FILTER']['?PROPERTY_SECTION_ID'] = $arSectionChildCity;

    $APPLICATION->IncludeComponent(
        "kargo:main.banner",
        ".banner.frontend",
        $arFilterBanners
    );
}
?>

<?
//var_dump($arFilterBanners);
if(!$arParams['SECTION_ID']){

    $arRandBanners = getRandBanners(["IBLOCK_ID" => 22, "ACTIVE" => "Y", "?PROPERTY_IBLOCK_ID" => $arParams['BLOCK_ID']], 3);
    foreach ($arRandBanners as $arItem)
        $APPLICATION->IncludeFile("/include/banner_templates.php", $arItem);
}
?>

<?
$APPLICATION->IncludeFile("/include/usefull_ads.php", [], Array(
    "MODE"      => "html",
    "NAME"      => "Редактирование включаемой области раздела"
));
?>
<!-- end unified-ad-unit -->




