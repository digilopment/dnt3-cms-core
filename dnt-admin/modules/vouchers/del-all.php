<?php

use DntLibrary\Base\Vendor;

$where = array('vendor_id' => $vendor->getId());
$db->delete('dnt_vouchers', $where);
$dnt->redirect(WWW_PATH_ADMIN_2 . "index.php?src=" . $rest->get("src") . "");
