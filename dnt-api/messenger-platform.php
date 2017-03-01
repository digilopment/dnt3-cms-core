<?php
/**
 * DntBot is application for Facebook Messenegr 
 * This application is developed by Tomas Doubek
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package Designdnt3
 * @subpackage DntBot
 * @since 2016
**/

define("IS_INIT", false);
define("HUB_VERIFY_TOKEN", "TOKEN_dnt_bot_partak_2016_heroku");
define("ACCESS_TOKEN", "EAAZAep9FZCRqUBAOJl8cW2rfgZANRvO39weQMcuaqcrMtoRmnZCr7gfs89ELGb5zwV6diIe2sFGsZAIIwSCXBe3bZAZCFpgn5VBmo76xKaw0NwRVCIaknNIQqUrtmQa06JMZCSAnBiAkCWgZCLIYvmUqZBxaL37fI5u4mJFarnaxPAFAZDZD");

include "../dnt-library/framework/_Class/Autoload.php";
$path			= "../";
Autoload::load($path);

if (is_init()) {
    include "root.php";
} elseif (isset($_GET['trigger'])) {
    
    $trigger   = $_GET['trigger'];
    $msg       = $_GET['msg'];
    $sender_id = $_GET['sender_id'];
    $dntBot    = new MessengerBot;
    $dntBot->getResponseTrigger($msg, $sender_id);
} else {
    $dntBot = new MessengerBot;
    $dntBot->run();
}
