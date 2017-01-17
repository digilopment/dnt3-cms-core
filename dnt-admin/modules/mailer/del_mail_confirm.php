<?php
$where = array( 'id' => $rest->get("post_id"), 'vendor_id' => Vendor::getId() );
$db->delete( 'dnt_mailer_mails', $where, 1 );
$dnt->redirect(WWW_PATH_ADMIN."?src=mailer");