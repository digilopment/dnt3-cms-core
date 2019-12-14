<?php
$where = array( 'id_entity' => $rest->get("post_id"), 'vendor_id' => Vendor::getId() );
$db->delete( 'dnt_mailer_mails', $where, 1 );
$dnt->redirect(WWW_PATH_ADMIN_2."?src=mailer&filter=".$rest->get("filter"));