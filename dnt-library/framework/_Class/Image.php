<?php
/**
 *  class       Image
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
Class Image {

    /**
     * 
     * @param type $id
     * @param type $table
     * @return boolean
     */
    public function get($id_entity, $table = null) {
        $db = new Db;
        $query = "SELECT img FROM $table WHERE `id_entity` = '" . $id_entity . "' AND vendor_id = '".Vendor::getId()."'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                return $row['img'];
            }
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $id
     * @return boolean
     */
    public function getFileImage($id) {
        $db = new Db;
        $imageId = $id;
        //`show` = '0' or `show` = '1' or `show` = '2'";
        $query = "SELECT name FROM dnt_uploads WHERE 
		`id_entity` = '" . $imageId . "' AND 
		`vendor_id` = '" . Vendor::getId() . "' AND 
		" . Dnt::showStatus("show") . "";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                return WWW_PATH . "dnt-view/data/uploads/" . $row['name'];
            }
        } else {
            return false;
        }
    }
	
	
	public function getFileImages($ids) {
        $db = new Db;
        $ids = explode(",", $ids);
		if(is_array($ids)){
			foreach($ids as $imageId){
				$query = "SELECT name FROM dnt_uploads WHERE 
				`id_entity` = '" . $imageId . "' AND 
				`vendor_id` = '" . Vendor::getId() . "' AND 
				" . Dnt::showStatus("show") . "";
				if ($db->num_rows($query) > 0) {
					foreach ($db->get_results($query) as $row) {
						$return[] = WWW_PATH . "dnt-view/data/uploads/" . $row['name'];
					}
				} else {
					$return = array(false);
				}
			}
		}else{
			$return = array(false);
		}
		return $return;
    }

    /**
     * 
     * @param type $id
     * @param type $table
     * @return type
     */
    public function getPostImage($id, $table = null) {
        $db = new Db;

        if (null === $table) {
            $table = "dnt_posts";
        } else {
            $table = $table;
        }
        $imageId = self::get($id, $table);
        return self::getFileImage($imageId);
    }

}
