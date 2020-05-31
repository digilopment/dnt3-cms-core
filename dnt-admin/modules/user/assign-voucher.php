<?php

use DntLibrary\Base\Dnt;
use DntLibrary\Base\Voucher;

$post_id = $rest->get("post_id");
if (Voucher::assignLastVoucher($post_id)) {
    $url = "index.php?src=" . $rest->get("src") . "&type=" . $rest->get("type") . "";
    Dnt::redirect($url);
} else {

    get_top();
    get_top_html();
    error_message_default("Nie je možné pridať voucher. <br/>Pre pridanie vouchera, potrebujete mať naimportovaný zoznam voucherov.");
    get_bottom_html();
    get_bottom();
}
