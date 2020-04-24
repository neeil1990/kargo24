<?php
/** @var array $arParams */
/** @var array $arItem */
?>
<div class="adversting-item">
    <div class="row">
        <div class="col-md-9">
            <h3 class="title"><?=$arItem['NAME']?></h3>
            <ul class="adversting-list">
                <? foreach($arItem["PROPERTIES"]["BAG"]["~VALUE"] as $option){
                    print $option['TEXT'];
                }?>
            </ul>
            <p class="text"><?=$arItem['PREVIEW_TEXT']?></p>
        </div>
    </div>
</div>
