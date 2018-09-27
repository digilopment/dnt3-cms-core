<?php
/**
 *  class       AdminUser
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
class User extends Image {
	
	public function getUserByType($type = false){
		
		if($type == "admin"){
			return array(false);
		}
		
		$db = new Db;
		if($type){
			$SQL_type = " type = '".$type."' AND ";
		}else{
			$SQL_type = " type <> 'admin' AND ";
		}
		
		
		$query = "SELECT * FROM `dnt_users` WHERE 
			parent_id = '0' AND
			$SQL_type
			vendor_id = '".Vendor::getId()."' ORDER BY id_entity desc"; 
			if($db->num_rows($query)>0){
                   	return $db->get_results($query);
			}else{
				return array(false);
			}
	}
	
	public function getUser($id_entity){
		
		$db = new Db;
		$query = "SELECT * FROM `dnt_users` WHERE 
			vendor_id = '".Vendor::getId()."' AND
			id_entity = '".$id_entity."' 
			ORDER BY id_entity desc"; 
			if($db->num_rows($query)>0){
                   	return $db->get_results($query);
			}else{
				return array(false);
			}
	}
	
	 /**
     * 
     * @return type
     */
    public function getImage($imageId) {
        return self::getFileImage($imageId);
    }
	
	 public function getUserTypes() {
        $db = new Db;
        $query = "SELECT DISTINCT type FROM dnt_users WHERE 
		vendor_id = '" . Vendor::getId() . "'
		AND type <> 'admin' 
		";
        if ($db->num_rows($query) > 0) {
            return $db->get_results($query);
        } else {
            return array(false);
        }
    }
	
}
