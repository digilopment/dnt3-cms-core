<?php

use DntLibrary\Base\AdminUser;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Sessions;

$rest = new Rest();
$session = new Sessions();
$dnt = new Dnt();
$adminUser = new AdminUser();
$db = new DB();

if ($rest->get('action') == 'edit' && $rest->get('id')) {
    include 'edit.php';
} elseif ($rest->get('action') == 'add') {
    include 'add.php';
} elseif ($rest->get('action') == 'addData') {
    include 'addData.php';
} elseif ($rest->get('action') == 'update') {
    include 'update.php';
} else {
    include 'tpl.php';
}
