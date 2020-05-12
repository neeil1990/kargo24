<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="title-section order">
    <div class="container">
        <h1 class="title"><?$APPLICATION->ShowTitle(false);?></h1>
    </div>
</section>
<!-- end title-section -->
<section class="personal-area-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?
                $temp = '_form.php';
                try{
                    if(!file_exists(__DIR__.'/'.$temp))
                        throw new Exception('oops ;)');
                    else
                        include_once($temp);

                }catch (Exception $exception){
                    print $exception->getMessage();
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- end personal-аrea-section-section -->

<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>

