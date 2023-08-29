<?php

use DntLibrary\Base\AdminUser;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Vendor;

$rest = new Rest();
$session = new Sessions();
$dnt = new Dnt();
$adminUser = new AdminUser();
$db = new DB();
$vendor = new Vendor();


if ($rest->get('action') == 'request') {
    include 'request.php';
} elseif (isset($_POST['sent']) && $rest->get('action') == 'confirm') {
    include 'confirm-action.php';
} elseif ($rest->get('action') == 'confirm') {
    include 'confirm.php';
} else {
    include 'tpl.php';
}
