<?php
/**
 *  class       AdminUser
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
class AdminUser extends Image {
    
    /**
     * 
     * @param type $type
     * @param type $email
     * @param type $pass
     * @return boolean
     */
    public function validProcessLogin($type, $email, $pass) {
        $db = new Db;
        $query = "SELECT pass FROM dnt_users WHERE type = '$type' AND email = '" . $email . "' AND vendor_id = '" . Vendor::getId() . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $db_pass = $row['pass'];
            }
            if ($db_pass == md5($pass)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
	
	 public function updateDatetime($vendor_id, $email){
		$db = new Db;
		
	    $db->update(
			"dnt_users",	//table
			array(	//set
				'datetime_update' => Dnt::datetime()
				), 
			array( 	//where
				'vendor_id' 	=> $vendor_id, 
				'email' 		=> $email
			)
		);
	}
	
	 public function emailExists($email, $vendor_id) {
        $db = new Db;
        $query = "SELECT email FROM dnt_users WHERE email = '" . $email . "' AND vendor_id = '" . $vendor_id . "'";
        if ($db->num_rows($query) > 0) {
			return true;
        } else {
            return false;
        }
    }
	
	
	public function updatePassword($vendor_id, $email, $pass) {
        $db = new Db;
		
	    $db->update(
			"dnt_users",	//table
			array(	//set
				'pass' => md5($pass)
				), 
			array( 	//where
				'vendor_id' 	=> $vendor_id, 
				'email' 		=> $email
			)
		);
    }
    
    /**
     * 
     * @return type
     */
    public function getUserTypes() {
        $db = new Db;
        $query = "SELECT * FROM dnt_post_type WHERE 
		admin_cat = 'user' AND
		vendor_id = '" . Vendor::getId() . "'";
        if ($db->num_rows($query) > 0) {
            return $db->get_results($query);
        } else {
            return array(false);
        }
    }
    
    /**
     * 
     * @return type
     */
    public function getUserColumns() {
        $columns = new XMLgenerator;
        return $columns->getTableColumns("dnt_users", "*");
    }
    
    /**
     * 
     * @param type $type
     * @param type $column
     * @return boolean
     */
    public function data($type, $column) {
        $db = new Db;
        $session = new Sessions();
        $query = "SELECT $column FROM dnt_users WHERE type = '$type' AND email = '" . $session->get("admin_id") . "' AND vendor_id = '" . Vendor::getId() . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                return $row[$column];
            }
        } else {
            return false;
        }
    }
    
    /**
     * 
     * @return type
     */
    public function avatar() {
        $imageId = self::data("admin", "img");
        return self::getFileImage($imageId);
    }
    
    /**
     * 
     * @param type $type
     * @param type $column
     * @param type $id
     * @return boolean
     */
    public function dataById($type, $column, $email) {
        $db = new Db;
        $session = new Sessions();
        $query = "SELECT $column FROM dnt_users WHERE type = '$type' AND email = '" . $email . "' AND vendor_id = '" . Vendor::getId() . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                return $row[$column];
            }
        } else {
            return false;
        }
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function avatarById($id) {
        $imageId = self::dataById("admin", "img", $id);
        return self::getFileImage($imageId);
    }

}
