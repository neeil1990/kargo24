<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Ошибка 404, Страница не найдена");
$APPLICATION->AddChainItem("Ошибка 404, Страница не найдена", "#");
?>

    <style>
        .page-404 .rows-404{
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            margin: 100px auto;
        }
        .page-404 .item-404{
            flex: 1;
            max-width: 400px;
        }
        .page-404 .title-404{
            font-size: 26px;
            font-family: "OpenSans-Bold";
            text-transform: uppercase;
            color: #374650;
            margin-bottom: 20px;
        }
        .page-404 .text-404{
            font-size: 15px;
            font-family: "OpenSans-Semibold";
            color: #374650;
            margin-bottom: 30px;
        }
        .page-404 .item-404 span{
            font-size: 13px;
            vertical-align: text-top;
            margin-left: 15px;
        }
        .page-404 .item-404 span a{
            text-decoration: underline;
        }

    </style>

<section class="page-404">

    <div class="container">
        <div class="rows-404">
            <div class="item-404">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/404.png">
            </div>
            <div class="item-404">
                <div class="title-404">Ошибка!</div>
                <p class="text-404">Похоже, мы не можем найти нужную вам страницу.</p>
                <a href="/" class="limed-spruce-btn go-over-btn" style="min-width: 165px;">Назад<span class="arrow"></span></a>
                <span>Вернуться на <a href="/">Главную</a></span>
            </div>
        </div>
    </div>

</section>

<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>