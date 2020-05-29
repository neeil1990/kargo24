<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? foreach ($arResult['ITEMS'] as $arItem): ?>
    <div class="sidebar-product-item">
        <div class="logo">
            <img src="<?=$templateFolder?>/img/logo.png" alt="<?=$arItem['NAME']?>">
        </div>
        <div class="product-img">
            <a href=""><img src="<?=CFile::GetPath($arItem['PREVIEW_PICTURE'])?>" alt="<?=$arItem['NAME']?>"></a>
        </div>
        <div class="product-desc">
            <h3 class="title"><?=$arItem['TITLE']?></h3>
            <table class="desc-info">
                <tbody><tr>
                    <td>Город:</td>
                    <td><?=$arItem['CITY']?></td>
                </tr>
                <tr>
                    <td>Цена:</td>
                    <td><?=$arItem['PROPERTIES']['PRICE']['VALUE']?> руб.</td>
                </tr>
                <tr>
                    <td>Контакты: </td>
                    <td><?=$arItem['PROPERTIES']['PHONE']['VALUE']?> (<?=$arItem['PROPERTIES']['NAME']['VALUE']?>)</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end my-banners-item -->
<? endforeach; ?>
