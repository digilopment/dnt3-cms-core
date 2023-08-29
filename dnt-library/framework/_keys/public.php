<?php
$YOUR_SEND_GRID_API_KEY_INSERT_HERE = false;
$YOUR_SEND_GRID_API_TEMPLATE_ID = false;
$YOUR_MESSNGER_HUB_VERIFY_TOKEN = false;
$YOUR_MESSNGER_ACCESS_TOKEN = false;
$YOUR_GEO_IP_SERVICE = false;

$secred_keys = $path . 'dnt-library/framework/_keys/secred.php';
if (file_exists($secred_keys)) {
    include $secred_keys;
}
