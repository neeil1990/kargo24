<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if($arResult): ?>
    <div class="my-company-content">
    <h2>Мои компании</h2>
    <div class="row top-panel">
        <div class="col-lg-7">
            <div class="number-and-date">
                <div class="cell">
                    <h4 class="title">Дата создания:</h4>
                    <span class="date"><?=$arResult['CREATED_DATE']?> </span>
                </div>
                <? if($arResult['ADS_CNT']): ?>
                <div class="cell">
                    <h4 class="title">Опубликованные объявления:</h4>
                    <span class="number"><?=$arResult['ADS_CNT']?> шт <a href="/personal/main/" class="edit-btn mod">Изменить</a></span>
                </div>
                <? endif; ?>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="ads-btn">
                <a href="/personal/company/<?=$arResult['ID']?>/" class="edit-btn">Редактировать</a>
                <a href="" class="delete-btn delete-company" data-id="<?=$arResult['ID']?>" temp-path="<?=$templateFolder?>">Удалить</a>
            </div>
        </div>
    </div>
    <div class="my-company-item">
        <div class="title-and-rate">
            <h3 class="title"><?=$arResult['NAME']?></h3>
            <div class="rate-panel">
                <span class="text">В рейтинге <strong>№1</strong></span>
                <div class="rate">
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                </div>
            </div>
        </div>
        <div class="item-img">
            <a href=""><img src="<?=CFile::GetPath($arResult['PREVIEW_PICTURE'])?>" alt="alt"></a>
        </div>
        <div class="item-desc">
            <div class="row">
                <div class="col-sm-6">
                    <table class="table-info">
                        <tbody><tr>
                            <td>Рейтинг:</td>
                            <td>--- баллов</td>
                        </tr>
                        <? if($arResult['ADS_CNT']): ?>
                        <tr>
                            <td>Опубликовано объявлений: </td>
                            <td><?=$arResult['ADS_CNT']?></td>
                        </tr>
                        <? endif; ?>
                        <tr>
                            <td>Специализация: </td>
                            <td><?=$arResult['TITLE']?></td>
                        </tr>
                        <tr>
                            <td>Участвует в сервисе: </td>
                            <td><?=FormatDate("Q", MakeTimeStamp($arParams['USER']['DATE_REGISTER']))?></td>
                        </tr>
                        <tr>
                            <td>Режим работы: </td>
                            <td><?=$arResult['PROPERTIES']['WORK_HOURS']['VALUE']?></td>
                        </tr>
                        <tr>
                            <td>Средняя цена: </td>
                            <td><?=$arResult['PROPERTIES']['PRICE']['VALUE']?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6">
                    <ul class="contact-list">
                        <li><span class="icon icon-phone"></span><a href="tel:<?=$arResult['PROPERTIES']['PHONE']['VALUE']?>"><?=$arResult['PROPERTIES']['PHONE']['VALUE']?></a></li>
                        <li><span class="icon icon-mail"></span><a href="mailto:master-stroimetall@mail.ru"><?=$arResult['PROPERTIES']['EMAIL']['VALUE']?></a></li>
                        <li><span class="icon icon-pin"></span><?=$arResult['CITY']?></li>
                    </ul>
                </div>
            </div>
            <h4 class="subtitle">Дополнительная информация</h4>
            <br/>
            <p class="text"><?=$arResult['DETAIL_TEXT']?></p>

        </div>
    </div>
</div>
<?else:?>
    <div class="add-advert-btn">
        <a href="/personal/company/" class="limed-spruce-btn">Добавить компанию<span class="arrow"></span></a>
    </div>
<? endif; ?>
<!-- end my-company-content -->
