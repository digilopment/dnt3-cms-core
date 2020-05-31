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
 * */

namespace DntApi;

use DntLibrary\Base\MessengerBot;

class MessengerPlatformApi
{

    public function run()
    {

        if (isset($_GET['trigger'])) {

            $trigger = $_GET['trigger'];
            $msg = $_GET['msg'];
            $sender_id = $_GET['sender_id'];
            $dntBot = new MessengerBot();
            $dntBot->getResponseTrigger($msg, $sender_id);
        } else {
            $dntBot = new MessengerBot();
            $dntBot->run();
        }
    }

}
