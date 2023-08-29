<?php

use DntLibrary\Base\AdminUser;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Vendor;
use DntLibrary\Base\Voucher;

$rest = new Rest();
$session = new Sessions();
$dnt = new Dnt();
$adminUser = new AdminUser();
$db = new DB();
$vendor = new Vendor();
$voucher = new Voucher();

if ($rest->get('action') == 'edit') {
    include 'edit.php';
} elseif ($rest->get('action') == 'update') {
    include 'update.php';
} elseif ($rest->get('action') == 'del') {
    include 'del.php';
} elseif ($rest->get('action') == 'add') {
    include 'add.php';
} elseif ($rest->get('action') == 'add_data') {
    include 'add_data.php';
} else {
    include 'tpl.php';
}
