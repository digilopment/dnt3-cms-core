<?php

use DntLibrary\Base\AdminUser;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\DntUpload;
use DntLibrary\Base\FileAdmin;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Vendor;

$rest = new Rest();
$session = new Sessions();
$dnt = new Dnt();
$adminUser = new AdminUser();
$db = new DB();
$vendor = new Vendor();
$fileAdmin = new FileAdmin();
$dntUpload = new DntUpload();

if ($rest->get('action') == 'show_hide') {
    //default article view action add
    include 'show_hide.php';
} elseif ($rest->get('action') == 'add') {
    //default article view action add
    include 'upload.php';
} elseif ($rest->get('action') == 'del') {
    include 'del.php';
} else {
    include 'tpl.php';
}
