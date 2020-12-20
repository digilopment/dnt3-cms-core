<?php

/**
 *  class       Meta
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

class Meta
{


	public function __construct(){
		$this->db = new DB();
		$this->dnt = new Dnt();
		$this->vendor = new Vendor();
		$this->rest = new Rest();
	}
    /**
     * 
     * @return type
     */
    public function getMapLocation()
    {
        $string = $this->getCompetitionMeta('map_location');
        $string = explode("@", $string);
        $position = $string[1];
        $position = explode("z/data", $position);
        $position = $position[0];
        $position = explode(",", $position);
        return $position;
    }

    /**
     * 
     * @return boolean
     */
    public function getRealDomain()
    {
        $query = "SELECT `real_url` FROM dnt_microsites WHERE 
			`vendor_id` = '" . $this->vendor->getId() . "' AND active = 1
			";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $realUrlArr[] = $row['real_url'];
            }
        } else {
            $realUrlArr = false;
        }
        return $realUrlArr;
    }

    /**
     * 
     * @param type $column
     * @param type $domain
     * @return boolean
     */
    public function getColumnByDomain($column, $domain)
    {
        $query = "SELECT `" . $column . "` FROM dnt_microsites WHERE `real_url` = '" . $domain . "' AND `vendor_id` = '" . $this->vendor->getId() . "' LIMIT 1";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $return = $row[$column];
            }
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * 
     * @return boolean
     */
    function competitionId()
    {
        //ADMIN
        if ($this->rest->isAdmin()) {
            return $this->rest->get("id");
        } else {
            //EXTERNALL URL
            if (in_array(str_replace("www.", "", WWW_PATH), $this->getRealDomain())) {
                $get = $this->getColumnByDomain("url", WWW_PATH);
            }
            //INTERNAL URL
            elseif ($this->rest->getModul() == "microsites" && $this->rest->webhook(2)) {
                $get = $this->rest->webhook(2);
            }

            $query = "SELECT `id_entity` FROM dnt_microsites WHERE 
		`vendor_id` = '" . $this->vendor->getId() . "' AND 
		`url` = '" . $this->rest->webhook(2) . "'";
            if ($this->db->num_rows($query) > 0) {
                foreach ($this->db->get_results($query) as $row) {
                    $return = $row['id_entity'];
                }
            } else {
                $return = false;
            }
            return $return;
        }
    }

    /**
     * 
     * @param type $column
     * @return boolean
     */
    public function getCompetitionColumn($column)
    {
        $query = "SELECT `" . $column . "` FROM dnt_microsites WHERE 
			`vendor_id` = '" . $this->vendor->getId() . "' AND 
			`id_entity` = '" . $this->competitionId() . "'
			";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $return = $row[$column];
            }
        } else {
            $return = false;
        }

        return $return;
    }

    /**
     * 
     * @param type $column
     * @param type $competition_id
     * @return boolean
     */
    public function getCompetitionColumnByInput($column, $competition_id)
    {
        $query = "SELECT `" . $column . "` FROM dnt_microsites WHERE 
			`vendor_id` = '" . $this->vendor->getId() . "' AND 
			`id_entity` = '" . $competition_id . "'
			";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $return = $row[$column];
            }
        } else {
            $return = false;
        }

        return $return;
    }

    /**
     * 
     * @param type $column
     * @param type $id
     * @return boolean
     */
    public function getCompetitionColumnId($column, $id_entity)
    {
        $query = "SELECT `" . $column . "` FROM dnt_microsites WHERE 
			`vendor_id` = '" . $this->vendor->getId() . "' AND 
			`id_entity` = '" . $id_entity . "'
			";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $return = $row[$column];
            }
        } else {
            $return = false;
        }

        return $return;
    }

    /**
     * 
     * @param type $key
     * @return boolean
     */
    public function getCompetitionMetaExists($key)
    {
        $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
			`vendor_id` = '" . $this->vendor->getId() . "' AND 
			`competition_id` = '" . $this->competitionId() . "' AND
			`meta` = '" . $key . "' AND
			`zobrazenie` = '1'
			";
        if ($this->db->num_rows($query) > 0) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * 
     * @param type $key
     * @return boolean
     */
    public function getCompetitionMeta($key)
    {
        if ($this->getCompetitionMetaExists($key)) {
            $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
				`vendor_id` = '" . $this->vendor->getId() . "' AND 
				`competition_id` = '" . $this->competitionId() . "' AND
				`meta` = '" . $key . "'
				";
            if ($this->db->num_rows($query) > 0) {
                foreach ($this->db->get_results($query) as $row) {
                    $return = $row['value'];
                }
            } else {
                $return = false;
            }
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * 
     * @param type $key
     * @return boolean
     */
    public function getCompetitionMetaImportant($key)
    {
        $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
				`vendor_id` = '" . $this->vendor->getId() . "' AND 
				`competition_id` = '" . $this->competitionId() . "' AND
				`meta` = '" . $key . "'
				";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $return = $row['value'];
            }
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * 
     * @param type $key
     * @param type $id
     * @return boolean
     */
    public function getCompetitionMetaById($key, $id_entity)
    {
        $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
				`vendor_id` = '" . $this->vendor->getId() . "' AND 
				`competition_id` = '" . $id_entity . "' AND
				
				`meta` = '" . $key . "'
				";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $return = $row['value'];
            }
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * 
     * @param type $key
     * @param type $competition_id
     * @return boolean
     */
    public function getCompetitionMetaByInput($key, $competition_id)
    {
        
        $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
				`vendor_id` = '" . $this->vendor->getId() . "' AND 
				`competition_id` = '" . $competition_id . "' AND
				`meta` = '" . $key . "'
				";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $return = $row['value'];
            }
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * 
     * @param type $key
     * @param type $competition_id
     * @return boolean
     */
    public function getCompetitionMetaByInputExists($key, $competition_id)
    {
        $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
				`vendor_id` = '" . $this->vendor->getId() . "' AND 
				`zobrazenie` = '1' AND 
				`competition_id` = '" . $competition_id . "' AND
				`meta` = '" . $key . "'
				";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $return = true;
            }
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * 
     * @return boolean
     */
    public function getMenuItems()
    {
        $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
			`vendor_id` = '" . $this->vendor->getId() . "' AND 
			`zobrazenie` = '1' AND
			`competition_id` = '" . $this->competitionId() . "' AND
			`meta` LIKE '%_menu_name%' ORDER BY `poradie` ASC
			";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $return[] = $row['value'];
            }
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * 
     * @return boolean
     */
    public function getModulItems()
    {
        $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
			`vendor_id` = '" . $this->vendor->getId() . "' AND 
			`zobrazenie` = '0' AND
			`meta` LIKE '%_menu_name%' AND
			`competition_id` = '" . $this->competitionId() . "'
			 ORDER BY `poradie` ASC
			";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $return[] = $row['value'];
            }
            $return = array_merge($this->getMenuItems(), $return);
        } else {
            $return = array(false);
        }
        return $return;
    }

    /**
     * 
     * @param type $number
     * @return boolean
     */
    public function getSmallGallery($number)
    {
        $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
			`vendor_id` = '" . $this->vendor->getId() . "' AND 
			`competition_id` = '" . $this->competitionId() . "' AND 
			`zobrazenie` = '1' AND
			`meta` LIKE '%_menu_" . $number . "_image%'
			";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $return[] = $row['value'];
            }
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * 
     * @return boolean
     */
    public function getFormBaseFields()
    {
        $query = "SELECT * FROM `dnt_microsites_composer` WHERE 
			`vendor_id` = '" . $this->vendor->getId() . "' AND 
			`competition_id` = '" . $this->competitionId() . "' AND
			`zobrazenie` = '1' AND
			`meta` LIKE '%form_base%'
			";
        if ($this->db->num_rows($query) > 0) {
            $i = 1;
            foreach ($this->db->get_results($query) as $row) {
                $indexes[] = $row['meta'];
                $values[] = $row['value'];
                $i ++;
            }

            $return = array_combine($indexes, $values);
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
    public function creat_hash($data)
    {
        return md5($data);
    }

    /**
     * 
     * @param type $data
     * @return type
     */
    public function creat_key($data)
    {
        $nasobic = 10 * $data;
        return md5($nasobic);
    }

    /**
     * 
     * @param type $hash
     * @param type $key
     * @return boolean
     */
    public function is_form_valid($hash, $key)
    {
        $query = "SELECT `id` FROM dnt_microsites WHERE 
			`vendor_id` = '" . $this->vendor->getId() . "' AND 
			`hash` = '" . $hash . "'
			";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $id = $row['id'];
            }

            if ($key = $this->creat_key($hash)) {
                $return = true;
            } else {
                $return = false;
            }
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * 
     * @param type $hash
     * @return boolean
     */
    public function competitionIdByHash($hash)
    {
        $query = "SELECT `id` FROM dnt_microsites WHERE 
			`vendor_id` = '" . $this->vendor->getId() . "' AND 
			`hash` = '" . $hash . "'
			";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $return = $row['id'];
            }
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * 
     * @param type $catId
     * @return string
     */
    public function competition_id_query($catId)
    {
        $query = "SELECT * FROM `dnt_microsites_composer` WHERE `cat_id` = '" . $catId . "' AND `vendor_id` = '" . $this->vendor->getId() . "' AND `competition_id` = '" . $this->competitionId() . "'";
        return $query;
    }

    /**
     * 
     * @return type
     */
    public function all_meta_competition()
    {
        $id = $this->rest->get('id');
        return "SELECT * FROM `dnt_microsites_composer` WHERE `vendor_id` = '" . $this->vendor->getId() . "' AND  `competition_id` = '" . $id . "'";
    }

    /**
     * 
     * @param type $value
     * @param type $meta
     */
    public function setMetaStatus($value, $meta)
    {
        if ($value == 1) {
            $ano = 'selected';
            $color = "3C763D";
            $nie = false;
        } else {
            $nie = 'selected';
            $color = "ff0000";
            $ano = false;
        }
        echo '<select class="form-control" name="zobrazit_' . $meta . '" style="border: 2px #' . $color . ' solid;">
            <option value="1" ' . $ano . '>Áno</option>
            <option value="0" ' . $nie . '>Nie</option>
        </select>';
    }

    /**
     * 
     * @param type $input
     * @return type
     */
    public function link_format($input)
    {
        $input = str_replace("http://", "", $input);
        $input = str_replace("https://", "", $input);
        $input = str_replace("", "", $input);
        return $input;
    }

    /**
     * 
     * @return type
     * LANGUAGES
     */
    public function competition_languages()
    {
        return array(
            "sk_SK" => "Slovenský",
            "cs_CZ" => "Česky",
            "en_EN" => "Anglický",
            "de_DE" => "Nemecký",
        );
    }

    /**
     * 
     * @param type $layout
     */
    public function getCompetitionLanguage($layout)
    {
        $layouts = $this->competition_languages();
        $selected = "";
        echo '<select name="_language" style="padding: 5px;">';

        foreach ($layouts as $layoutIndex => $layoutName) {
            if ($layout == $layoutIndex) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            echo '<option value="' . $layoutIndex . '" ' . $selected . ' >' . $layoutName . '</option>';
        }
        echo '</select>';
    }

    //LAYOUTS

    /**
     * 
     * @return type
     * LAYOUTS
     * en_EN
     */
    public function competition_layout()
    {
        return array(
            "dnt_first" => "1.st theme",
            "dnt_second" => "2.nd theme",
        );
    }

    /**
     * 
     * @param type $layout
     */
    public function getCompetitionLayout($layout)
    {
        $layouts = $this->competition_layout();
        $selected = "";
        echo '<select name="layout" style="padding: 5px;">';

        foreach ($layouts as $layoutIndex => $layoutName) {
            if ($layout == $layoutIndex) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            echo '<option value="' . $layoutIndex . '" ' . $selected . ' >' . $layoutName . '</option>';
        }
        echo '</select>';
    }

    /**
     * 
     * @return type
     * FONTS
     */
    public function competition_fonts()
    {
        return array(
            "roboto" => "Roboto",
            "Arial" => "Arial",
            "Georgia" => "Georgia",
            "Calibri" => "Calibri",
            "Cambria" => "Cambria",
            "Lucida Sans Unicode" => "Lucida Sans Unicode",
            "Myriad Pro Regular " => "Myriad Pro Regular",
            "Tahoma" => "Tahoma",
            "Verdana" => "Verdana",
                //"Times New Roman" 	=> "Times New Roman",
                //"bebas_neueregular" 	=> "Bebas",
                //"impact" 	=> "Impact",
        );
    }

    /**
     * 
     * @param type $font
     */
    public function getCompetitionFont($font)
    {
        $fonts = $this->competition_fonts();
        $selected = "";
        echo '<select name="_font" style="padding: 5px;">';

        foreach ($fonts as $fontIndex => $fontName) {
            if ($font == $fontIndex) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            echo '<option value="' . $fontIndex . '" ' . $selected . ' >' . $fontName . '</option>';
        }
        echo '</select>';
    }

    /**
     * 
     * @param type $data
     * @return type
     */
    public function hyperlinkParser($data)
    {
        if ($this->dnt->in_string("|", $data)) {
            $dataArr = explode("|", $data);
            if (count($dataArr) == 2) {
                return $dataArr;
            } else {
                return array($data, $data);
            }
        } else {
            return array($data, $data);
        }
    }

}
