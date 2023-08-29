<?php

use DntLibrary\Base\AdminUser;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Settings;
use DntLibrary\Base\Vendor;

$rest = new Rest();
$session = new Sessions();
$dnt = new Dnt();
$db = new DB();
$settings = new Settings();
$vendor = new Vendor();
$adminUser = new AdminUser();

include 'export.php';

/*
if($rest->get("action") == "update")
{
    include "update.php";
}
elseif($rest->get("action") == "add")
{
    //empty
}
else{
    include "tpl.php";
}
*/
