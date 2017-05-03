<?php
/**
 *  class       MultyLanguage
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
class MultyLanguage {

    /**
     * 
     * @param type $is_limit
     * @return string
     */
    protected function prepare_query($is_limit) {
        $db = new Db();


        if (isset($_GET['search'])) {
            $typ = "AND `translate_id` LIKE '%" . str_replace("-", "_", Dnt::name_url($_GET['search'])) . "%'";
        } else
            $typ = "AND type = 'static'";

        if ($is_limit == false)
            $limit = false;
        else
            $limit = $is_limit;

        $query = "SELECT * FROM dnt_translates WHERE 
			 lang_id = '" . DEAFULT_LANG . "' AND
			 vendor_id = '" . Vendor::getId() . "'
			 " . $typ . " ORDER BY `id` DESC " . $limit . "";

        return $query;
    }

    /**
     * 
     * @return type
     */
    public function query() {
        $db = new Db;

        if (isset($_GET['page'])) {
            $returnPage = "&page=" . $_GET['page'];
        } else {
            $returnPage = false;
        }

        $query = self::prepare_query(false);
        $pocet = $db->num_rows($query);
        $limit = 20;

        if (isset($_GET['page']))
            $strana = $_GET['page'];
        else
            $strana = 1;

        $stranok = $pocet / $limit;
        $pociatok = ($strana * $limit) - $limit;

        $prev_page = $strana - 1;
        $next_page = $strana + 1;
        $stranok_round = ceil($stranok);

        $pager = "LIMIT " . $pociatok . ", " . $limit . "";
        return array("query" => self::prepare_query($pager), "pages" => $stranok_round);
    }

    /**
     * 
     * @return type
     */
    public function getLang() {
        $rest = new Rest;
        return $rest->webhook(0);
    }

    /**
     * 
     * @param type $frontend
     * @return type
     */
    public function getLangs($frontend = false) {
        if ($frontend == true) {
            return "SELECT * FROM dnt_languages WHERE `show` = '1' AND vendor_id = '" . Vendor::getId() . "'";
        } else {
            return "SELECT * FROM dnt_languages WHERE `home_lang` = '0' AND `show` = '1' AND vendor_id = '" . Vendor::getId() . "'";
        }
    }

    /**
     * 
     * @param type $id
     * @param type $table
     * @param type $column
     * @return boolean
     */
    public function getDefault($id, $table, $column) {
        $db = new Db;

        $query = "SELECT `$column` FROM $table WHERE id = '$id' AND vendor_id = '" . Vendor::getId() . "'";
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
     * @param type $lang
     * @return type
     */
    public function changeLanguage($lang) {

        $rest = new Rest;
        $scale = explode("/" . self::getLang(), WWW_WEBHOOKS);
        if (isset($scale[1])) {
            $after_lang = $scale[1];
        } else {
            $scale = explode(WWW_PATH, WWW_FULL_PATH);
            $after_lang = $scale[1];
        }

        $return_url = WWW_PATH . "" . $lang . "/" . $after_lang;
        $return_url = str_replace("///", "/", $return_url);
        $return_url = str_replace("//", "/", $return_url);
        $return_url = str_replace(":/", "://", $return_url);
        return $return_url;
    }

    /**
     * 
     * @param type $data
     * @return boolean
     */
    public function getTranslateLang($data) {
        $translate_id = isset($data['translate_id']) ? $data['translate_id'] : false;
        $type = isset($data['type']) ? $data['type'] : false;
        $table = isset($data['table']) ? $data['table'] : false;
        //$default 		= isset($data['default']) ? $data['default'] : false;
        $lang_id = isset($data['lang_id']) ? $data['lang_id'] : false;
        
        $db = new Db;

        $query = "SELECT `translate` FROM `dnt_translates` WHERE
			`parent_id` = '0' AND
			`vendor_id` = '" . Vendor::getId() . "' AND
			`lang_id` = '" . $lang_id . "' AND
			`translate_id` = '" . $translate_id . "' AND
			`type` = '" . $type . "' AND
			`table` = '" . $table . "'
			";
        //$default = $this->getDefault($translate_id, $table, $type);
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $return = $row['translate'];
            }
        } else {
            $return = false;
        }
        return $return;
    }
    /**
     * 
     * @param type $data
     * @return type
     */
    public function getTranslate($data) {
        //return "aa";
        $translate_id = isset($data['translate_id']) ? $data['translate_id'] : false;
        $type = isset($data['type']) ? $data['type'] : false;
        $table = isset($data['table']) ? $data['table'] : false;
        $default = isset($data['default']) ? $data['default'] : false;

        $db = new Db;
        $return = false;

        if ($type == "static") {
            $query = "SELECT `translate` FROM `dnt_translates` WHERE
			`parent_id` = '0' AND
			`vendor_id` = '" . Vendor::getId() . "' AND
			`lang_id` = '" . $this->getLang() . "' AND
			`translate_id` = '" . $translate_id . "' AND
			`type` = '" . $type . "'
			";
            $default = false;
        } else {
            $query = "SELECT `translate` FROM `dnt_translates` WHERE
			`parent_id` = '0' AND
			`vendor_id` = '" . Vendor::getId() . "' AND
			`lang_id` = '" . $this->getLang() . "' AND
			`translate_id` = '" . $translate_id . "' AND
			`type` = '" . $type . "' AND
			`table` = '" . $table . "'
			";

            if ($default) {
                $default = $default;
            } else {
                $default = $this->getDefault($translate_id, $table, $type);
            }
        }

        if (($this->getLang() == DEAFULT_LANG) && ($default != false)) {
            return $default;
        } else {
            if ($db->num_rows($query) > 0) {
                foreach ($db->get_results($query) as $row) {
                    if ($row['translate'] == "") {
                        $return = $default;
                    } else {
                        $return = $row['translate'];
                    }
                }
            } else {
                $return = $default;
            }
        }
        return $return;
    }

}
