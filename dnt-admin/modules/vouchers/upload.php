<?php

use DntLibrary\Base\Dnt;
use DntLibrary\Base\DntUpload;
use DntLibrary\Base\Vendor;
use DntLibrary\Base\Xlsx;

$dnt = new Dnt;
if (isset($_POST['sent'])) {
    $dntUpload = new DntUpload;
    $path = "../dnt-view/data/uploads";

    if ($_FILES['userfile']['tmp_name'][0] != "") {
        $files = $_FILES['userfile'];
        $file = $dntUpload->multypleUpload($files, $path);
        if (isset($file['name'])) {
            $fileName = $path . "/" . $file['name'];
        } else {
            $fileName = false;
        }

        $parsedData = $xlsx->toArray(false, false, $fileName);

        $db->dbTransaction();

        $order = $dnt->getMaxValueFromColumn("dnt_vouchers", "`order`");
        if (!$order) {
            $order = 1;
        } else {
            $order = $order + 1;
        }
        foreach ($parsedData as $row) {
            $insertedData = array(
                'vendor_id' => $vendor->getId(),
                'user_id' => "",
                'value' => $row,
                'file_name' => $file['name'],
                'datetime_creat' => $dnt->datetime(),
                'datetime_update' => $dnt->datetime(),
                '`show`' => '1',
                '`order`' => $order
            );

            $db->insert('dnt_vouchers', $insertedData);
            $order++;
        }
        $db->dbcommit();
    }
    $dnt->redirect(WWW_PATH_ADMIN_2 . "index.php?src=" . $rest->get("src") . "");
} else {
    $dnt->redirect(WWW_PATH_ADMIN_2 . "index.php?src=" . DEFAULT_MODUL_ADMIN);
}
