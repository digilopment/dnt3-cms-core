<?php

use DntLibrary\Base\AdminUser;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Image;
use DntLibrary\Base\Polls;
use DntLibrary\Base\PollsFrontend;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Vendor;

$rest = new Rest();
$session = new Sessions();
$dnt = new Dnt();
$adminUser = new AdminUser();
$db = new DB();
$polls = new Polls();
$pollsFrontend = new PollsFrontend();
$image = new Image();
$vendor = new Vendor();

if ($rest->get('action') == 'add_poll') {
    include 'add_poll.php';
} elseif ($rest->get('action') == 'add_poll_action') {
    include 'add_poll_action.php';
} elseif ($rest->get('action') == 'edit_poll') {
    include 'edit_poll.php';
} elseif ($rest->get('action') == 'edit_poll_action') {
    include 'edit_poll_action.php';
} elseif ($rest->get('action') == 'add_question') {
    include 'add_question.php';
} elseif ($rest->get('action') == 'del_question') {
    include 'del_question.php';
} elseif ($rest->get('action') == 'del_winning_combination') {
    include 'del_winning_combination.php';
} elseif ($rest->get('action') == 'winning_combination') {
    include 'winning_combination.php';
} else {
    include 'tpl.php';
}
