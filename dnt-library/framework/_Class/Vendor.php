<?php
/**
 *  class       Vendor
 *  author      Tomas Doubek
 *  framework   Sessions
 *  package     dnt3
 *  date        2017
 */
class Vendor {

    var $vendor_url; //this vendor URL
    var $vendor_id; //this vendor ID

    /**
     * 
     * @return type
     */
    public static function getVendorUrl() {

        $hosts = explode(".", @$_SERVER['HTTP_HOST']);
        $host = $hosts[0];

        if ($host == "www") {
            $this->vendor_url = $hosts[1];
        } elseif ($host == @$_SERVER['HTTP_HOST']) { //ak nie je subdomena, tak vrati false
            $this->vendor_url = false;
        } else {
            $this->vendor_url = $host;
        }

        return $this->vendor_url;
    }

    /**
     * 
     * @return boolean
     */
	 
    public static function getId() {
		if($GLOBALS['VENDOR_ID']){
			return $GLOBALS['VENDOR_ID'];
		}
        $db = new Db;
        $rest = new Rest;
		
		
		if($rest->get("dnt3_get_vendor_id")){
			$vendor_id = $rest->get("dnt3_get_vendor_id");
			$GLOBALS['VENDOR_ID'] = $vendor_id;
			return $vendor_id;
		}
		

		$query = "SELECT `id_entity`,`real_url`, `show_real_url` FROM `dnt_vendors`";
		if ($db->num_rows($query) > 0) {
			$data = WWW_PATH;
			$data = str_replace("www.", "", $data);
			$data = explode("://", $data);
			$ORIGIN_PROTOCOL = "".$data[0]."://";
			$data = explode("/", $data[1]);
			$ORIGIN_DOMAIN = $data[0];
		
            foreach ($db->get_results($query) as $row) {
				if($row['show_real_url'] == 1){
					$data = $row['real_url'];
					$data = str_replace("www.", "", $data);
					$data = explode("://", $data);
					$DB_PROTOCOL = "".$data[0]."://";
					$data = explode("/", $data[1]);
					$DB_DOMAIN = $data[0];
					
					if($ORIGIN_DOMAIN == $DB_DOMAIN){
						$vendor_id = $row['id_entity'];
						$GLOBALS['VENDOR_ID'] = $vendor_id;
						$GLOBALS['ORIGIN_DOMAIN'] = $ORIGIN_DOMAIN;
						$GLOBALS['DB_DOMAIN'] = $DB_DOMAIN;
						$GLOBALS['ORIGIN_PROTOCOL'] = $ORIGIN_PROTOCOL;
						$GLOBALS['DB_PROTOCOL'] = $DB_PROTOCOL;
						return $vendor_id;
					}else{
						$GLOBALS['ORIGIN_DOMAIN'] = $ORIGIN_DOMAIN;
						$GLOBALS['DB_DOMAIN'] = $DB_DOMAIN;
						$GLOBALS['ORIGIN_PROTOCOL'] = $ORIGIN_PROTOCOL;
						$GLOBALS['DB_PROTOCOL'] = $DB_PROTOCOL;
					}
					
				}
			}
		}
			
        $host = explode(".", $_SERVER["HTTP_HOST"]);

        //ak je host[1] existuje subdomena
        if (isset($host[1])) {
            $vendor_url = $host[0];
            $status = "url";
        } else {
            $vendor_url = false;
            $status = "default";
        }

        $query = "SELECT `id_entity` FROM `dnt_vendors` WHERE
		name_url = '" . $vendor_url . "'";

        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $vendor_id = $row['id_entity'];
            }
        } else {
            $query2 = "SELECT `id_entity` FROM `dnt_vendors` WHERE `is_default` = '1'";
            if ($db->num_rows($query2) > 0) {
                foreach ($db->get_results($query2) as $row2) {
                    $vendor_id = $row2['id_entity'];
                }
            } else {
                $vendor_id = false;
            }
        }
		$GLOBALS['VENDOR_ID'] = $vendor_id;
        return $vendor_id;
    }

    /**
     * 
     * @return boolean
     */
    public static function getLayout() {
        $db = new Db;
        $rest = new Rest;
		
		if($rest->get("dnt3_get_layout")){
			return $rest->get("dnt3_get_layout");
		}
		
        $query = "SELECT `layout` FROM `dnt_vendors` WHERE
		id = '" . self::getId() . "'";

        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $layout = $row['layout'];
            }
        } else {
            $layout = false;
        }

        return $layout;
    }
	
	public function getLayouts(){
		$db = new Db;

        $query = "SELECT DISTINCT `layout` FROM `dnt_vendors` ";

        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $layouts[] = $row['layout'];
            }
        } else {
            $layouts[] = array();
        }

        return $layouts;
	}

    /**
     * 
     * @return type
     */
    public function getAll() {
        $db = new Db;

        $query = "SELECT * FROM `dnt_vendors`";

        if ($db->num_rows($query) > 0) {
            return $db->get_results($query);
        } else {
            return array();
        }
    }

    /**
     * 
     * @param type $column
     * @return boolean
     */
    public function getColumn($column) {
        $db = new Db;
        $query = "SELECT `" . $column . "` FROM `dnt_vendors` WHERE 
			`id_entity` = '" . Vendor::getId() . "'
			";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $return = $row[$column];
            }
        } else {
            $return = false;
        }

        return $return;
    }

}
