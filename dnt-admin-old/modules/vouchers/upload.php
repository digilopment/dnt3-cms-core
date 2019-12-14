<?php

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

        $parsedData = Xlsx::toArray(false, false, $fileName);

        $db->dbTransaction();

        $order = Dnt::getMaxValueFromColumn("dnt_vouchers", "`order`");
        if (!$order) {
            $order = 1;
        } else {
            $order = $order + 1;
        }
        foreach ($parsedData as $row) {
            $insertedData = array(
                'vendor_id' => Vendor::getId(),
                'user_id' => "",
                'value' => $row,
                'file_name' => $file['name'],
                'datetime_creat' => Dnt::datetime(),
                'datetime_update' => Dnt::datetime(),
                '`show`' => '1',
                '`order`' => $order
            );

            $db->insert('dnt_vouchers', $insertedData);
            $order++;
        }
        $db->dbcommit();
    }
    $dnt->redirect(WWW_PATH_ADMIN . "index.php?src=" . $rest->get("src") . "");
} else {
    $dnt->redirect(WWW_PATH_ADMIN . "index.php?src=" . DEFAULT_MODUL_ADMIN);
}
