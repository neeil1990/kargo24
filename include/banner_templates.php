<div class="sidebar-product-item">
    <div class="logo">
        <img src="<?=SITE_TEMPLATE_PATH?>/img/logo.png" alt="<?=$arParams['NAME']?>">
    </div>
    <div class="product-img">
        <a href=""><img src="<?=CFile::GetPath($arParams['PREVIEW_PICTURE'])?>" alt="<?=$arParams['NAME']?>"></a>
    </div>
    <div class="product-desc">
        <h3 class="title"><?=$arParams['TITLE']?></h3>
        <table class="desc-info">
            <tbody><tr>
                <td>Город:</td>
                <td><?=$arParams['CITY']?></td>
            </tr>
            <tr>
                <td>Цена:</td>
                <td><?=$arParams['PROPERTIES']['PRICE']['VALUE']?> руб.</td>
            </tr>
            <tr>
                <td>Контакты: </td>
                <td><?=$arParams['PROPERTIES']['PHONE']['VALUE']?> (<?=$arParams['PROPERTIES']['NAME']['VALUE']?>)</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- end my-banners-item -->
