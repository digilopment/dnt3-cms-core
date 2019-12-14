<?php
include "tpl_functions.php";
get_top();
include "top.php";
deleteMssage(AdminMailer::url("del_mail_confirm", $rest->get("filter"), false, false, $rest->get("post_id"), $rest->get("page")), "<br/>Údaje sa úspešne uložili ");
include "bottom.php";
get_bottom();