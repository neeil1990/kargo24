<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?>

    <section class="title-section order">
        <div class="container">
            <h1 class="title">Личный кабинет</h1>
        </div>
    </section>
    <!-- end title-section -->
    <section class="personal-area-section">
        <div class="container">
            <div class="row">

                <div class="col-sm-4">
                    <?$APPLICATION->IncludeComponent("bitrix:system.auth.form", ".auth.form", Array(
                        "FORGOT_PASSWORD_URL" => "",	// Страница забытого пароля
                        "PROFILE_URL" => "/personal/",	// Страница профиля
                        "REGISTER_URL" => "/register/",	// Страница регистрации
                        "SHOW_ERRORS" => "Y",	// Показывать ошибки
                    ),
                        false
                    );?>
                </div>

                <div class="col-sm-8">
                    <?$APPLICATION->IncludeComponent("bitrix:main.register", ".main.register", Array(
                        "AUTH" => "Y",	// Автоматически авторизовать пользователей
                        "REQUIRED_FIELDS" => array(	// Поля, обязательные для заполнения
                            0 => "EMAIL",
                            1 => "NAME",
                        ),
                        "SET_TITLE" => "Y",	// Устанавливать заголовок страницы
                        "SHOW_FIELDS" => array(	// Поля, которые показывать в форме
                            0 => "EMAIL",
                            1 => "NAME",
                        ),
                        "SUCCESS_PAGE" => "/personal/settings/",	// Страница окончания регистрации
                        "USER_PROPERTY" => "",	// Показывать доп. свойства
                        "USER_PROPERTY_NAME" => "",	// Название блока пользовательских свойств
                        "USE_BACKURL" => "Y",	// Отправлять пользователя по обратной ссылке, если она есть
                        "COMPONENT_TEMPLATE" => ".default"
                    ),
                        false
                    );?>
                </div>
            </div>
        </div>
    </section>
    <!-- end personal-аrea-section-section -->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>