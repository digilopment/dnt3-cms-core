<?php
$insertedData = array(
					'vendor_id' 		=> Vendor::getId(), 
					'cat_id' 			=> $rest->get("cat_id"), 
					'sub_cat_id' 		=> $rest->get("filter"), 
					'`type`' 			=> $rest->get("included"), 
					'datetime_creat' 	=> Dnt::datetime(),
					'datetime_update' 	=> Dnt::datetime(),
					'datetime_publish' 	=> Dnt::datetime(),
					'`show`' 			=> '0' 
				);

$db->insert('dnt_posts', $insertedData);
$dnt->redirect(WWW_PATH_ADMIN."index.php?src=content&filter=".$rest->get("filter")."&sub_cat_id=".$rest->get("included")."&post_id=".$db->lastid()."&page=1&action=edit&type=".$rest->get("included")."");