<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Страница забытого пароля");
?>
<section class="title-section order">
    <div class="container">
        <h1 class="title">Страница забытого пароля</h1>
    </div>
</section>
<!-- end title-section -->
<section class="personal-area-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?$APPLICATION->IncludeComponent("bitrix:system.auth.forgotpasswd", ".auth.forgotpasswd", Array(),
                    false
                );?>
            </div>
        </div>
    </div>
</section>
<!-- end personal-аrea-section-section -->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
