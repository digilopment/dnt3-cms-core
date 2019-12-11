<?php
include "plugins/webhook/tpl_functions.php";
get_top();
include "plugins/webhook/top.php";
deleteMssage(AdminMailer::url("del_mail_confirm", $rest->get("filter"), false, false, $rest->get("post_id"), $rest->get("page")), "<br/>Údaje sa úspešne uložili ");
include "plugins/webhook/bottom.php";
get_bottom();