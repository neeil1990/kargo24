<?php
/** @var array $arParams */
/** @var array $arItem */
?>
<div class="adversting-item">
    <div class="row">
        <div class="col-md-4">
            <h3 class="title"><?echo $arItem["NAME"]?></h3>
            <ul class="adversting-list">
                <?foreach($arItem["PROPERTIES"]["OPTION"]["~VALUE"] as $option):?>
                    <li>
                    <span class="icon-check">
                        <span class="path1"></span><span class="path2"></span>
                    </span>
                        <?=$option?>
                    </li>
                <? endforeach; ?>
            </ul>
        </div>
        <div class="col-md-8">
            <h4 class="title">Пример объявления:</h4>
            <div class="example-advertisement-item">
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?echo $arItem["NAME"]?>">
            </div>
        </div>
    </div>
</div>
