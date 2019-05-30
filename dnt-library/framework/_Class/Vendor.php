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
    /* public static function getId() {
      if ($GLOBALS['VENDOR_ID']) {
      return $GLOBALS['VENDOR_ID'];
      }
      $db = new Db;
      $rest = new Rest;


      if ($rest->get("dnt3_get_vendor_id")) {
      $vendor_id = $rest->get("dnt3_get_vendor_id");
      $GLOBALS['VENDOR_ID'] = $vendor_id;
      return $vendor_id;
      }


      $query = "SELECT `id_entity`,`real_url`, `show_real_url` FROM `dnt_vendors`";
      if ($db->num_rows($query) > 0) {

      //ORIGIN DOMAIN PARSER
      $data = WWW_PATH;
      $data = str_replace("www.", "", $data);
      $data = explode("://", $data);
      $ORIGIN_PROTOCOL = "" . $data[0] . "://";
      $data = explode("/", $data[1]);
      $ORIGIN_DOMAIN = $data[0] . "" . WWW_FOLDERS . "/" . $rest->webhook(0);
      $ORIGIN_DOMAIN_LNG = $rest->webhook(0);

      foreach ($db->get_results($query) as $row) {
      if ($row['show_real_url'] == 1) {
      //DB DOMAIN PARSER
      $data = $row['real_url'];
      $data = str_replace("www.", "", $data);
      $data = explode("://", $data);
      $fd = $data[1];
      $DB_PROTOCOL = "" . $data[0] . "://";
      $data = explode("/", $data[1]);
      $DB_DOMAIN = $data[0] . "" . WWW_FOLDERS;
      $DB_DOMAIN_FULL = $fd;

      if ($ORIGIN_DOMAIN == $DB_DOMAIN_FULL) {
      $vendor_id = $row['id_entity'];
      $GLOBALS['VENDOR_ID'] = $vendor_id;
      $GLOBALS['ORIGIN_DOMAIN'] = $ORIGIN_DOMAIN;
      $GLOBALS['DB_DOMAIN'] = $DB_DOMAIN;
      $GLOBALS['ORIGIN_PROTOCOL'] = $ORIGIN_PROTOCOL;
      $GLOBALS['DB_PROTOCOL'] = $DB_PROTOCOL;
      return $vendor_id;
      } else {
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
      } */

    /**
     * new method
     * @return boolean
     */
    public function getProtocolFromUrl($url) {
        $tmp = explode("//", $url);
        $tmp = $tmp[0];
        if ($tmp == "http:" || "https:") {
            return $tmp . "//";
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $url
     * @return boolean
     */
    public function getDomainFromUrl($url) {
        $tmp = explode("://", $url);
        if (isset($tmp[1])) {
            return $tmp[1];
        } else {
            return false;
        }
    }

    /**
     * 
     * @return boolean
     */
    public static function getId() {
        if ($GLOBALS['VENDOR_ID']) {
            return $GLOBALS['VENDOR_ID'];
        }
        $db = new Db;
        $rest = new Rest;
        if ($rest->get("dnt3_get_vendor_id")) {
            $vendor_id = $rest->get("dnt3_get_vendor_id");
            $GLOBALS['VENDOR_ID'] = $vendor_id;
            return $vendor_id;
        }


        $data = WWW_PATH;
        $data = str_replace("www.", "", $data);
        $data = explode("://", $data);
        $ORIGIN_PROTOCOL = "" . $data[0] . "://";
        $data = explode("/", $data[1]);
        $ORIGIN_DOMAIN = HTTP_PROTOCOL . $data[0] . "" . WWW_FOLDERS . "";
        $ORIGIN_DOMAIN_NP = $data[0] . "" . WWW_FOLDERS . "";

        if ($rest->webhook(0)) {
            $ORIGIN_DOMAIN_LNG = HTTP_PROTOCOL . $data[0] . "" . WWW_FOLDERS . "/" . $rest->webhook(0);
            $ORIGIN_DOMAIN_LNG_NP = $data[0] . "" . WWW_FOLDERS . "/" . $rest->webhook(0);
        } else {
            $ORIGIN_DOMAIN_LNG = HTTP_PROTOCOL . $data[0] . "" . WWW_FOLDERS . "";
            $ORIGIN_DOMAIN_LNG_NP = $data[0] . "" . WWW_FOLDERS . "";
        }
		
        if ($ORIGIN_DOMAIN == $ORIGIN_DOMAIN_LNG) {
            $query = "SELECT `id_entity`,`real_url`, `show_real_url` FROM `dnt_vendors` WHERE 
				real_url LIKE 'http://www." . $ORIGIN_DOMAIN_NP . "' || 
				real_url LIKE 'https://www." . $ORIGIN_DOMAIN_NP . "' || 
				real_url LIKE 'http://" . $ORIGIN_DOMAIN_NP . "' || 
				real_url LIKE 'https://" . $ORIGIN_DOMAIN_NP . "' 
				
			AND show_real_url = 1";
            if ($db->num_rows($query) > 0) {
                foreach ($db->get_results($query) as $row) {
                    $vendor_id = $row['id_entity'];
                    $dbProtocol = $row['real_url'];
                }
            } else {
                $host = explode(".", $_SERVER["HTTP_HOST"]);
                //ak je host[1] existuje subdomena
                if (isset($host[1])) {
                    $vendor_url = $host[0];
                    $dbProtocol = false;
                } else {
                    $vendor_url = false;
                    $dbProtocol = false;
                }

                $query = "SELECT `id_entity`, `real_url` FROM `dnt_vendors` WHERE name_url = '" . $vendor_url . "'";
                if ($db->num_rows($query) > 0) {
                    foreach ($db->get_results($query) as $row) {
                        $vendor_id = $row['id_entity'];
                        $dbProtocol = $row['real_url'];
                    }
                } else {
                    $query2 = "SELECT `id_entity`, `real_url` FROM `dnt_vendors` WHERE `is_default` = '1'";
                    if ($db->num_rows($query2) > 0) {
                        foreach ($db->get_results($query2) as $row2) {
                            $vendor_id = $row2['id_entity'];
                            $dbProtocol = $row['real_url'];
                        }
                    } else {
                        $vendor_id = false;
                        $dbProtocol = false;
                    }
                }
            }
        } else {
            $query = "SELECT `id_entity`,`real_url`, `show_real_url` FROM `dnt_vendors` WHERE real_url LIKE '%" . $ORIGIN_DOMAIN_LNG_NP . "'";
            //V PRIPADE, ZE SA JEDNA O JAZYKOVU MUTACIU SO SLUGOM
            if ($db->num_rows($query) > 0) {
                foreach ($db->get_results($query) as $row) {
                    $vendor_id = $row['id_entity'];
                    $dbProtocol = $row['real_url'];
                }
            } else { //V PRIPADE, ZE SA JEDNA O JAZYKOVU MUTACIU DEFAULTNEHO JAZYKU SO SLUGOM
                $query = "SELECT `id_entity`,`real_url`, `show_real_url` FROM `dnt_vendors` WHERE real_url LIKE '%" . $ORIGIN_DOMAIN_NP . "'";
                if ($db->num_rows($query) > 0) {
                    foreach ($db->get_results($query) as $row) {
                        $vendor_id = $row['id_entity'];
                        $dbProtocol = $row['real_url'];
                    }
                } else {
                    $vendor_id = false;
                    $dbProtocol = false;
                }
            }
        }

        $GLOBALS['ORIGIN_DOMAIN_LNG'] = $ORIGIN_DOMAIN_LNG;
        $GLOBALS['DB_DOMAIN'] = self::getDomainFromUrl($dbProtocol);
        $GLOBALS['ORIGIN_DOMAIN'] = self::getDomainFromUrl($ORIGIN_DOMAIN);
        $GLOBALS['VENDOR_ID'] = $vendor_id;
        $GLOBALS['DB_PROTOCOL'] = self::getProtocolFromUrl($dbProtocol);
        $GLOBALS['ORIGIN_PROTOCOL'] = $ORIGIN_PROTOCOL;
        return $vendor_id;
		
    }

    /**
     * 
     * @return boolean
     */
    public static function getLayout() {
		if ($GLOBALS['VENDOR_LAYOUT']) {
            return $GLOBALS['VENDOR_LAYOUT'];
        }
        /*$db = new Db;
        $rest = new Rest;

        if ($rest->get("dnt3_get_layout")) {
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

        return $layout;*/
    }

    /**
     * 
     * @return type
     */
    public function getLayouts() {
        $layouts = array();
        $files = scandir('../dnt-view/layouts/');
        foreach ($files as $file) {
            if ($file == "." || $file == "..") {
                continue;
            } else {
                $layouts[] = $file;
            }
        }

        return $layouts;
    }

    /**
     * 
     * @return type
     */
    public function getAll() {
        $db = new Db;

        $query = "SELECT * FROM `dnt_vendors` order by id_entity asc";

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
