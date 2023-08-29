<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\MultyLanguage;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

$rest = new Rest();
$dnt = new Dnt();
$db = new DB();
$multiLanguage = new MultyLanguage();
$vendor = new Vendor();

if ($rest->get('action') == 'edit') {
    include 'edit.php';
} elseif ($rest->get('action') == 'translates') {
    include 'translates.php';
} elseif ($rest->get('action') == 'translate-all') {
    include 'translate-all.php';
} elseif ($rest->get('action') == 'update') {
    include 'update.php';
} elseif ($rest->get('action') == 'update-all') {
    include 'update-all.php';
} elseif ($rest->get('action') == 'del') {
    include 'del.php';
} elseif ($rest->get('action') == 'pridat') {
    include 'add.php';
} elseif ($rest->get('action') == 'show_hide') {
    include 'show_hide.php';
} else {
    include 'tpl.php';
}
