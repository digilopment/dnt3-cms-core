<?php

use DntLibrary\Base\AdminMailer;
use DntLibrary\Base\Rest;

$rest = new Rest();
get_top();
get_top_html();
deleteMssage(AdminMailer::url("del_mail_confirm", $rest->get("filter"), false, false, $rest->get("post_id"), $rest->get("page")), "<br/>Údaje sa úspešne vymazali ");
get_bottom_html();
get_bottom();

