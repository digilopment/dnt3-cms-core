<?php

use DntLibrary\Base\Dnt;
use DntLibrary\Base\Vendor;

if (isset($_POST['sent'])) {
    $voucherValue = $rest->post("voucher");
    if ($voucherValue) {
        $db->dbTransaction();
        $order = Dnt::getMaxValueFromColumn("dnt_vouchers", "`order`");
        if (!$order) {
            $order = 1;
        } else {
            $order = $order + 1;
        }
        $insertedData = array(
            'vendor_id' => Vendor::getId(),
            'user_id' => "",
            'value' => $voucherValue,
            'file_name' => "",
            'datetime_creat' => Dnt::datetime(),
            'datetime_update' => Dnt::datetime(),
            '`show`' => '1',
            '`order`' => $order
        );

        $db->insert('dnt_vouchers', $insertedData);
        $db->dbcommit();
    }
}
$dnt->redirect(WWW_PATH_ADMIN_2 . "index.php?src=" . $rest->get("src") . "");
