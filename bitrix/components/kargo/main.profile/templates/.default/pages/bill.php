<section class="payment-section">
    <?php
    $template = (isset($_REQUEST['BILL_ID'])) ? ".bill.page" : "";

    $APPLICATION->IncludeComponent(
        "kargo:ads.bill",
        $template,
        Array(
            "IBLOCK_ID" => "20",
            "IBLOCK_TYPE" => "data",
        )
    );?>
</section>

