<?php

use DntLibrary\Base\AdminUser;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Sessions;

$rest = new Rest;
$session = new Sessions;
$dnt = new Dnt;
$adminUser = new AdminUser;
$db = new DB();

if ($rest->get("action") == "update") {
    include "update.php";
} elseif ($rest->get("action") == "add") {
    include "add.php";
} elseif ($rest->get("action") == "del") {
    include "del.php";
} elseif ($rest->get("action") == "add_data") {
    include "add_data.php";
} elseif ($rest->get("action") == "import") {
    include "import.php";
} elseif ($rest->get("action") == "upload") {
    include "upload.php";
} else {
    include "tpl.php";
}


