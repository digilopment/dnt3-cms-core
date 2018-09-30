<?php
/**
 *  class       Settings
 *  author      Tomas Doubek
 *  framework   Sessions
 *  package     dnt3
 *  date        2017
 */
class Settings {

    /**
     * 
     * @param type $key
     * @return boolean
     */
    public static function get($key) {
        $db = new Db;
        $query = "SELECT value FROM dnt_settings WHERE `key` = '" . $key . "' AND `vendor_id` = '" . Vendor::getId() . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                return $row['value'];
            }
        } else {
            return false;
        }
    }
	
	public function customMeta() {
        $db = new Db;
        $query = "SELECT * FROM dnt_settings WHERE `type` = 'custom' AND `vendor_id` = '" . Vendor::getId() . "'";
        if ($db->num_rows($query) > 0) {
             return $db->get_results($query);
        } else {
            return false;
        }
    }
	
	public function getMetaData() {
		$db = new Db;
        $query = "SELECT * FROM dnt_settings WHERE `type` = 'custom' AND `vendor_id` = '" . Vendor::getId() . "'";
		
		if($db->num_rows($query)>0){
		   foreach($db->get_results($query) as $row){
			   $arr['keys'][$row['key']]['show'] = $row['show'];
			   $arr['keys'][$row['key']]['value'] = $row['value'];			   
		   }
		   return $arr;
		}
		return array(false);
    }

    /**
     * 
     * @param type $key
     * @return boolean
     */
    public static function getImage($key) {

        $db = new Db;
		if(is_numeric ($key)){
			$imageId = $key;
		}else{
			$imageId = Settings::get($key);	
		}

        $query = "SELECT name FROM dnt_uploads WHERE `id_entity` = '" . $imageId . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                return Url::get("WWW_PATH_FILES") . "" . $row['name'];
            }
        } else {
            return false;
        }
    }

    /**
     * 
     * @return type
     */
    public static function showStatus() {
        return array(
            "0" => "Vymazať",
            "1" => "Publikovať post",
            "2" => "Povoliť na webe (nezobrazí sa v menu alebo listingu)",
            "3" => "Skryť z webu",
        );
    }

}
