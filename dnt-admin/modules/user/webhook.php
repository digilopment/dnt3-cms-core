<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Vendor;
use DntLibrary\Base\FileAdmin;

$rest = new Rest;
$session = new Sessions;
$dnt = new Dnt;
$db = new DB();
$fileAdmin = new FileAdmin();
$vendor = new Vendor();
if ($rest->get("action") == "update") {
    include "update.php";
} elseif ($rest->get("action") == "edit") {
    include "edit.php";
} elseif ($rest->get("action") == "assign-voucher") {
    include "assign-voucher.php";
} elseif ($rest->get("action") == "del") {
    include "del.php";
} elseif ($rest->get("action") == "add") {
    $query = "SELECT * FROM dnt_registred_users";
    if ($db->num_rows($query) == 0) {
        $insertedData["`vendor_id`"] = $vendor->getId();
        $insertedData["`type`"] = "user";
        $db->insert("dnt_registred_users", $insertedData);
    }
    include "add.php";
} elseif ($rest->get("action") == "add_data") {
    include "add_data.php";
} else {
    include "tpl.php";
}