<?php

/**
 *  class       MultyLanguage
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class MultyLanguage
{
    public $countActiveLangs = false;

    public function __construct()
    {
        $this->db = new DB();
        $this->dnt = new Dnt();
        $this->rest = new Rest();
        $this->vendor = new Vendor();
    }

    /**
     *
     * @return array
     */
    public function activeVendorLangsQuery()
    {
        if (count($GLOBALS['ACTIVE_LANGS_ARR']) > 0) {
            return $GLOBALS['ACTIVE_LANGS_ARR'];
        } else {
            //$q = "SELECTs * FROMs dnt_languages WHEREs `show` = '1' AND vendor_id = '" . $this->vendor->getId() . "'";
            $q = "SELECT * FROM dnt_languages WHERE `show` = '1' AND vendor_id = '" . $this->vendor->getId() . "' ORDER BY slug asc";
            if ($this->db->num_rows($q) > 0) {
                foreach ($this->db->get_results($q) as $row) {
                    $data[] = $row['slug'];
                }
            } else {
                $data[] = array();
            }

            $GLOBALS['ACTIVE_LANGS_ARR'] = $data;
            return $data;
        }
    }

    /**
     *
     * @return type
     */
    public function activeVendorLangs()
    {
        return $this->activeVendorLangsQuery();
    }

    /**
     *
     * @param type $is_limit
     * @return string
     */
    protected function prepare_query($is_limit)
    {
        if (isset($_GET['search'])) {
            $typ = "AND (`translate_id` LIKE '%" . str_replace('-', '_', $this->dnt->name_url($_GET['search'])) . "%' OR `translate` LIKE '%" . str_replace('-', '_', urldecode($_GET['search'])) . "%') ";
        } else {
            $typ = "AND type = 'static'";
        }

        if ($is_limit == false) {
            $limit = false;
        } else {
            $limit = $is_limit;
        }
        //DEAFULT_LANG
        $query = "SELECT * FROM dnt_translates WHERE 
			 lang_id = '" . $GLOBALS['ORIGIN_DOMAIN_LNG'] . "' AND
			 vendor_id = '" . $this->vendor->getId() . "'
			 " . $typ . ' ORDER BY `id` DESC ' . $limit . '';

        return $query;
    }

    /**
     *
     * @return type
     */
    public function query()
    {
        if (isset($_GET['page'])) {
            $returnPage = '&page=' . $_GET['page'];
        } else {
            $returnPage = false;
        }

        $query = $this->prepare_query(false);
        $pocet = $this->db->num_rows($query);
        $limit = 20;

        if (isset($_GET['page'])) {
            $strana = $_GET['page'];
        } else {
            $strana = 1;
        }

        $stranok = $pocet / $limit;
        $pociatok = ($strana * $limit) - $limit;

        $prev_page = $strana - 1;
        $next_page = $strana + 1;
        $stranok_round = ceil($stranok);

        $pager = 'LIMIT ' . $pociatok . ', ' . $limit . '';
        return array('query' => $this->prepare_query($pager), 'pages' => $stranok_round);
    }

    /**
     *
     * @return type
     */
    public function getLang()
    {
        return $this->rest->webhook(0);
    }

    /**
     *
     * @return boolean
     */
    public function getTranslates()
    {
        $query = "SELECT * FROM dnt_translates WHERE type = 'static' AND vendor_id = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            return $this->db->get_results($query);
        } else {
            return false;
        }
    }

    /**
     *
     * @param type $data
     * @param type $key
     * @param type $value
     * @return boolean
     */
    public function translate($data, $key, $value)
    {
        $lang = $this->getLang();
        $return = false;
        foreach ($data['translates'] as $translate) {
            if ($lang == 0) {
                if ($translate['translate_id'] == $key && $translate['lang_id'] == DEAFULT_LANG) {
                    return $translate[$value];
                }
            } else {
                if ($translate['translate_id'] == $key && $translate['lang_id'] == $lang) {
                    return $translate[$value];
                }
            }
        }
        return $return;
    }

    /**
     *
     * @param type $frontend
     * @return type
     */
    public function getLangs($frontend = false)
    {
        if (MULTY_LANGUAGE == false) {
            return "SELECT * FROM dnt_languages WHERE `slug` = '" . $GLOBALS['ORIGIN_DOMAIN_LNG'] . "' AND vendor_id = '" . $this->vendor->getId() . "'";
        } else {
            if ($frontend == true) {
                return "SELECT * FROM dnt_languages WHERE `show` = '1' AND vendor_id = '" . $this->vendor->getId() . "'";
            } else {
                return "SELECT * FROM dnt_languages WHERE `home_lang` = '0' AND `show` = '1' AND vendor_id = '" . $this->vendor->getId() . "'";
            }
        }
    }

    /**
     *
     * @param type $frontend
     * @return type
     */
    public function getLanguages($frontend = false)
    {
        if ($frontend == true) {
            $query = "SELECT * FROM dnt_languages WHERE `show` = '1' AND vendor_id = '" . $this->vendor->getId() . "'";
        } else {
            $query = "SELECT * FROM dnt_languages WHERE `home_lang` = '0' AND `show` = '1' AND vendor_id = '" . $this->vendor->getId() . "'";
        }
        if ($this->db->num_rows($query) > 0) {
            return $this->db->get_results($query);
        } else {
            return false;
        }
    }

    public function countActiveLangs()
    {
        $query = $this->getLangs($frontend);
        $this->countActiveLangs = $this->db->num_rows($query);
    }

    /**
     *
     * @param type $id
     * @param type $table
     * @param type $column
     * @return boolean
     */
    public function getDefault($id_entity, $table, $column)
    {
        $query = "SELECT `$column` FROM $table WHERE id_entity = '$id_entity' AND vendor_id = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
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
    public function changeLanguage($lang)
    {
        $scale = explode('/' . $this->getLang(), WWW_WEBHOOKS);
        if (isset($scale[1])) {
            $after_lang = $scale[1];
        } else {
            $scale = explode(WWW_PATH, WWW_FULL_PATH);
            $after_lang = $scale[1];
        }

        $return_url = WWW_PATH . '' . $lang . '/' . $after_lang;
        $return_url = str_replace('///', '/', $return_url);
        $return_url = str_replace('//', '/', $return_url);
        $return_url = str_replace(':/', '://', $return_url);
        return $return_url;
    }

    /**
     *
     * @param type $data
     * @return boolean
     */
    public function getTranslateLang($data, $column = false)
    {
        $translate_id = isset($data['translate_id']) ? $data['translate_id'] : false;
        $type = isset($data['type']) ? $data['type'] : false;
        $table = isset($data['table']) ? $data['table'] : false;
        //$default      = isset($data['default']) ? $data['default'] : false;
        $lang_id = isset($data['lang_id']) ? $data['lang_id'] : false;

        if ($column) {
            $dbColumn = $column;
        } else {
            $dbColumn = 'translate';
        }
        $query = "SELECT `$dbColumn` FROM `dnt_translates` WHERE
			`parent_id` = '0' AND
			`vendor_id` = '" . $this->vendor->getId() . "' AND
			`lang_id` = '" . $lang_id . "' AND
			`translate_id` = '" . $translate_id . "' AND
			`type` = '" . $type . "' AND
			`table` = '" . $table . "'
			";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $return = $row[$dbColumn];
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
    public function getTranslate($data)
    {
        $translate_id = isset($data['translate_id']) ? $data['translate_id'] : false;
        $type = isset($data['type']) ? $data['type'] : false;
        $table = isset($data['table']) ? $data['table'] : false;
        $default = isset($data['default']) ? $data['default'] : false;

        $db = new DB();
        $return = false;

        if ($type == 'static') {
            $query = "SELECT `translate` FROM `dnt_translates` WHERE
			`parent_id` = '0' AND
			`vendor_id` = '" . $this->vendor->getId() . "' AND
			`lang_id` = '" . $this->getLang() . "' AND
			`translate_id` = '" . $translate_id . "' AND
			`type` = '" . $type . "'
			";
            $default = false;
        } else {
            $query = "SELECT `translate` FROM `dnt_translates` WHERE
			`parent_id` = '0' AND
			`vendor_id` = '" . $this->vendor->getId() . "' AND
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
            if ($this->db->num_rows($query) > 0) {
                foreach ($this->db->get_results($query) as $row) {
                    if ($row['translate'] == '') {
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
