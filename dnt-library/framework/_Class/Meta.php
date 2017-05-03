<?php

Class Meta {
    /* modul competition */

    public static function getMapLocation() {
        $string = self::getCompetitionMeta('map_location');
        $string = explode("@", $string);
        $position = $string[1];
        $position = explode("z/data", $position);
        $position = $position[0];
        $position = explode(",", $position);
        return $position;
    }

    public static function getRealDomain() {
		 $db = new Db;
        $query = "SELECT `real_url` FROM dnt_microsites WHERE 
			`vendor_id` = '" . Vendor::getId() . "' AND active = 1
			";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $realUrlArr[] = $row['real_url'];
            }
        } else {
            $realUrlArr = false;
        }
        return $realUrlArr;
    }

    public static function getColumnByDomain($column, $domain) {
		 $db = new Db;
        $query = "SELECT `" . $column . "` FROM dnt_microsites WHERE `real_url` = '" . $domain . "' AND `vendor_id` = '".Vendor::getId()."' LIMIT 1";
         if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $return = $row[$column];
            }
        } else {
            $return = false;
        }
        return $return;
    }

function competitionId(){	
    
    $rest 	= new Rest;
    $db 	= new Db;
	
	//ADMIN
    if($rest->isAdmin()){
        return $rest->get("id");
    }else{
		//EXTERNALL URL
		if(in_array(str_replace("www.", "", WWW_PATH), self::getRealDomain())){
			$get = self::getColumnByDomain("url", WWW_PATH);
		}
		//INTERNAL URL
		elseif($rest->getModul() == "microsites" && $rest->webhook(2)){
			$get = $rest->webhook(2);
		}
		
		$query = "SELECT `id` FROM dnt_microsites WHERE 
		`vendor_id` = '".Vendor::getId()."' AND 
		`url` = '".$rest->webhook(2)."'";
		if ($db->num_rows($query) > 0) {
			foreach ($db->get_results($query) as $row) {
				$return = $row['id'];
			}
		}
		else{
			$return = false;
		}
		return $return;
	}
		//EXTERNALL URL

		
		/*
		//$addr = new Addr();
		//$addr->getModuleUrl();
		$WWW_PATH = str_replace("www.", "", WWW_PATH);
		
		if(in_array(str_replace("www.", "", $WWW_PATH), getRealDomain())){
			$get = getColumnByDomain("url", $WWW_PATH);
		}
		elseif(isset($_GET['type'])){
			$get = GET('type');
		}
		elseif(isset($_GET['src'])){
			$get = $addr->module[0];
		}
		else{
			$get = GET('type');
		}
		
		if($get){
			$query = mysql_query("SELECT `id` FROM dnt_microsites WHERE 
				`vendor_id` = '".VENDOR_ID."' AND 
				`url` = '".$get."'
				");
			if(mysql_num_rows($query)>0){
				while($row = mysql_fetch_array($query)){
					 $return = $row['id'];
				}
			}
			else{
				$return = false;
			}
		}
		else{
			$return = false;
		}
		return $return;
		*/
	}
	
	
	public static function getCompetitionColumn($column){	
	 $db = new Db;
		$query = "SELECT `".$column."` FROM dnt_microsites WHERE 
			`vendor_id` = '".Vendor::getId()."' AND 
			`id` = '".self::competitionId()."'
			";
		 if ($db->num_rows($query) > 0) {
                foreach ($db->get_results($query) as $row) {
				 $return = $row[$column];
			}
		}
		else{
			$return = false;
		}

		return $return;
	}

    public static function getCompetitionColumnByInput($column, $competition_id) {
		 $db = new Db;
        $query = "SELECT `" . $column . "` FROM dnt_microsites WHERE 
			`vendor_id` = '" . Vendor::getId() . "' AND 
			`id` = '" . $competition_id . "'
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

    public static function getCompetitionColumnId($column, $id) {
		 $db = new Db;
        $query = "SELECT `" . $column . "` FROM dnt_microsites WHERE 
			`vendor_id` = '" . Vendor::getId() . "' AND 
			`id` = '" . $id . "'
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

    public static function getCompetitionMetaExists($key) {
        $db = new Db;
        $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
			`vendor_id` = '" . Vendor::getId() . "' AND 
			`competition_id` = '".self::competitionId()."' AND
			`meta` = '" . $key . "' AND
			`zobrazenie` = '1'
			";
        if ($db->num_rows($query) > 0) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public static function getCompetitionMeta($key) {
        $db = new Db;
        if (self::getCompetitionMetaExists($key)) {
            $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
				`vendor_id` = '" . Vendor::getId() . "' AND 
				`competition_id` = '".self::competitionId()."' AND
				`meta` = '" . $key . "'
				";
            if ($db->num_rows($query) > 0) {
                foreach ($db->get_results($query) as $row) {
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
    public static function getCompetitionMetaImportant($key) {
        $db = new Db;
        $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
				`vendor_id` = '" . Vendor::getId() . "' AND 
				`competition_id` = '".self::competitionId()."' AND
				`meta` = '" . $key . "'
				";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
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
    public static function getCompetitionMetaById($key, $id) {
        $db = new Db;
        $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
				`vendor_id` = '" . Vendor::getId() . "' AND 
				`competition_id` = '" . $id . "' AND
				
				`meta` = '" . $key . "'
				";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
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
    public static function getCompetitionMetaByInput($key, $competition_id) {
 $db = new Db;
        $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
				`vendor_id` = '" . Vendor::getId() . "' AND 
				`competition_id` = '" . $competition_id . "' AND
				`meta` = '" . $key . "'
				";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
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
    public static function getCompetitionMetaByInputExists($key, $competition_id) {
		$db = new Db;
        $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
				`vendor_id` = '" . Vendor::getId() . "' AND 
				`zobrazenie` = '1' AND 
				`competition_id` = '" . $competition_id . "' AND
				`meta` = '" . $key . "'
				";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
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
    public static function getMenuItems() {
        $db = new Db;
        $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
			`vendor_id` = '" . Vendor::getId() . "' AND 
			`zobrazenie` = '1' AND
			`competition_id` = '".self::competitionId()."' AND
			`meta` LIKE '%_menu_name%' ORDER BY `poradie` ASC
			";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
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
    public static function getModulItems() {
        $db = new Db;
        $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
			`vendor_id` = '" . Vendor::getId() . "' AND 
			`zobrazenie` = '0' AND
			`meta` LIKE '%_menu_name%' AND
			`competition_id` = '".self::competitionId()."'
			 ORDER BY `poradie` ASC
			";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $return[] = $row['value'];
            }
            $return = array_merge(self::getMenuItems(), $return);
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
    public static function getSmallGallery($number) {
        $db = new Db;
        $query = "SELECT `value` FROM `dnt_microsites_composer` WHERE 
			`vendor_id` = '" . Vendor::getId() . "' AND 
			`competition_id` = '" . self::competitionId() . "' AND 
			`zobrazenie` = '1' AND
			`meta` LIKE '%_menu_" . $number . "_image%'
			";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
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
    public static function getFormBaseFields() {
        $db = new Db;
        $query = "SELECT * FROM `dnt_microsites_composer` WHERE 
			`vendor_id` = '" . Vendor::getId() . "' AND 
			`competition_id` = '".self::competitionId()."' AND
			`zobrazenie` = '1' AND
			`meta` LIKE '%form_base%'
			";
        if ($db->num_rows($query) > 0) {
            $i = 1;
            foreach ($db->get_results($query) as $row) {
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

    public static function creat_hash($data) {
        return md5($data);
    }

    public static function creat_key($data) {
		$nasobic = 10 * $data;
        return md5($nasobic);
    }

    public static function is_form_valid($hash, $key) {
        $db = new Db;
        $query = "SELECT `id` FROM dnt_microsites WHERE 
			`vendor_id` = '" . Vendor::getId() . "' AND 
			`hash` = '" . $hash . "'
			";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $id = $row['id'];
            }

            if ($key = self::creat_key($hash)) {
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
    public static function competitionIdByHash($hash) {
        $db = new Db;
        $query = "SELECT `id` FROM dnt_microsites WHERE 
			`vendor_id` = '" . Vendor::getId() . "' AND 
			`hash` = '" . $hash . "'
			";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $return = $row['id'];
            }
        } else {
            $return = false;
        }
        return $return;
    }

    public static function competition_id_query($catId) {
        //$id = GET('id');
        $query = "SELECT * FROM `dnt_microsites_composer` WHERE `cat_id` = '" . $catId . "' AND `vendor_id` = '" . Vendor::getId() . "' AND `competition_id` = '".self::competitionId()."'";
        return $query;
    }

    public static function all_meta_competition() {
		$rest = new Rest;
       $id = $rest->get('id');
        return "SELECT * FROM `dnt_microsites_composer` WHERE `vendor_id` = '" . Vendor::getId() . "' AND  `competition_id` = '" . $id . "'";
    }

    public static function setMetaStatus($value, $meta) {
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

    public static function link_format($input) {
        $input = str_replace("http://", "", $input);
        $input = str_replace("https://", "", $input);
        $input = str_replace("", "", $input);
        return $input;
    }

    //LANGUAGES
    public static function competition_languages() {
        return array(
            "sk_SK" => "Slovenský",
            "cs_CZ" => "Česky",
            "en_EN" => "Anglický",
            "de_DE" => "Nemecký",
        );
    }

    public static function getCompetitionLanguage($layout) {
        $layouts = self::competition_languages();
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

    //en_EN
    //LAYOUTS
    public static function competition_layout() {
        return array(
            "dnt_first" => "1.st theme",
            "dnt_second" => "2.nd theme",
        );
    }

    public static function getCompetitionLayout($layout) {
        $layouts = self::competition_layout();
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

    //FONTS
    public static function competition_fonts() {
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

    public static function getCompetitionFont($font) {
        $fonts = self::competition_fonts();
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

    public static function hyperlinkParser($data) {

        if (Dnt::in_string("|", $data)) {
            $dataArr = explode("|", $data);
            if (count($dataArr) == 2)
                return $dataArr;
            else
                return array($data, $data);
        }else {
            return array($data, $data);
        }
    }

}
