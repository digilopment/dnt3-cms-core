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

include 'tpl.php';
