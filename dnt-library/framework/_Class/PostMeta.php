<?php
/**
 *  class       PostMeta
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
class PostMeta {

    /**
     * 
     * @return type
     */
	public function setApproval($idEntityCheck, $serviceCheck) {
			
		$webhook 	= new Webhook;
		$db 		= new Db;
		
		$db->dbTransaction();
		$dbQuery = $webhook->services(0);
		$dbService = $webhook->services(0, true);
		
		
		if($dbQuery[$serviceCheck]['sql']){
			$db->query($dbService['config']['sql']." ".$dbQuery[$serviceCheck]['sql']);

			$query = "SELECT * FROM dnt_posts_meta WHERE 
				`id_entity` = '0' AND 
				`service` = '$serviceCheck' ORDER BY id_entity asc";

			$queryCheck = "SELECT * FROM dnt_posts_meta WHERE 
						`id_entity` = '$idEntityCheck' AND 
						`service` = '$serviceCheck' ORDER BY id_entity asc";
			
			$arr = false;	
			
			if ($db->num_rows($queryCheck) > 0) {
				
				foreach ($db->get_results($query) as $row) {
					foreach ($db->get_results($queryCheck) as $rowCheck) {
						if($row['id_entity'] == 0 && 
							$row['key'] == $rowCheck['key'] && 
							$row['service'] == $rowCheck['service']){
							$arr[] = $row['id_entity'];
						}
					}
				}
				
				if(is_array($arr)){
					$IN = implode(",",$arr);
					//echo $IN."<br/><br/>";
					$query = "SELECT * FROM dnt_posts_meta WHERE 
						`id_entity` NOT IN ($IN) AND
						`id_entity` = '0' AND 
						`service` = '$serviceCheck' ORDER BY id_entity asc";
					foreach ($db->get_results($query) as $row) {
						//echo $row['id']."<br/>";
						$insertedData = array(
							'`id_entity`' 		=> $idEntityCheck,
							'`service`' 		=> $row['service'],
							'`vendor_id`' 		=> Vendor::getId(),
							'`key`' 			=> $row['key'],
							'`value`' 			=> $row['value'],
							'`description`' 	=> $row['description'],
							'`content_type`' 	=> $row['content_type'],
							'`cat_id`' 			=> $row['cat_id'],
							'`show`' 			=> $row['show'],
						);
						$db->insert('dnt_posts_meta', $insertedData);	
					}	
				}

				$db->query("DELETE FROM dnt_posts_meta WHERE id_entity = '0'");
				$db->dbCommit();
				
			}
		}//END IF SQLL
	}
	
	public function homogen(){
		$db 			= new Db;
		$webhook 		= new Webhook;
		//$db->query("DELETE FROM dnt_posts_meta WHERE id_entity = '0'");
		$query = "SELECT DISTINCT id_entity FROM dnt_posts_meta WHERE
		vendor_id = '".Vendor::getId()."'";
		foreach ($db->get_results($query) as $row) {
			foreach($webhook->services() as $key => $serviceIndex){
				$this->setApproval($row['id_entity'], $key);
			}
		}
		$db->query("DELETE FROM dnt_posts_meta WHERE id_entity = '0'");
		
	}
	
}
