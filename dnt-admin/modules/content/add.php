<?php
$insertedData = array(
					'vendor_id' 		=> Vendor::getId(), 
					'cat_id' 			=> $rest->get("filter"), 
					//'sub_cat_id' 		=> $rest->get("filter"), 
					'`type`' 			=> $rest->get("included"), 
					'datetime_creat' 	=> Dnt::datetime(),
					'datetime_update' 	=> Dnt::datetime(),
					'datetime_publish' 	=> Dnt::datetime(),
					'`show`' 			=> '0' 
				);

$db->dbTransaction();				
$db->insert('dnt_posts', $insertedData);
$lastId = Dnt::getLastId('dnt_posts');
$db->commit();	

	
$redirect = WWW_PATH_ADMIN."index.php?src=content&filter=".$rest->get("filter")."&sub_cat_id=".$rest->get("sub_cat_id")."&post_id=".$lastId."&page=1&action=edit&included=".$rest->get("included")."";


$dnt->redirect($redirect);


//index.php?src=content&filter=296&sub_cat_id=&post_id=13354&page=1&action=edit&included=post