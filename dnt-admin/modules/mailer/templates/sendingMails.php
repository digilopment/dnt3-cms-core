<?php

$to_finish = $data['toFinish'];
$sender_email = $data['emails'];
$next_id = $data['lastId'];
$sleep = $data['sleep'];

tpl_sending_mails($to_finish, $sender_email, $next_id, $sleep);

