<?php
$session = new Sessions;
$dnt = new Dnt;
$session->remove("admin_logged");
$session->remove("admin_id");
$dnt->redirect(WWW_PATH_ADMIN);

