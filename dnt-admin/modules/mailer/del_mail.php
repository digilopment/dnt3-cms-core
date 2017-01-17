<?php
include "tpl_functions.php";
get_top();
include "top.php";
deleteMssage(AdminMailer::url("del_mail_confirm", false, false, false, $rest->get("post_id"), false), "<br/>Údaje sa úspešne uložili ");
include "bottom.php";
get_bottom();