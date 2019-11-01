<?php

/**
 *  class       Image
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
Class Image {
	
	const THUMB = 150;
	const SMALL = 350;
	const MEDIUM= 600;
	const LARGE = 950;
	
    /**
     * 
     * @param type $id
     * @param type $table
     * @return boolean
     */
    public function get($id_entity, $table = null) {
        $db = new Db;
        $query = "SELECT img FROM $table WHERE `id_entity` = '" . $id_entity . "' AND vendor_id = '" . Vendor::getId() . "'";
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
     * @param type $input
     * @param type $path = true
     * @return boolean
     */
    public function getFileImage($input, $path = true, $format = false) {
        if (!is_numeric($input)) {
            return $input;
        }
		
        $db = new Db;

        $imageId = $input;
        //`show` = '0' or `show` = '1' or `show` = '2'";
        $query = "SELECT name FROM dnt_uploads WHERE 
		`id_entity` = '" . $imageId . "' AND 
		`vendor_id` = '" . Vendor::getId() . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                if($path == true){
					$imageFileFormat = "dnt-view/data/uploads/formats/".$format."/" . $row['name'];
					$imageFile		 = WWW_PATH . "dnt-view/data/uploads/" . $row['name'];
					if($format){
						if(file_exists("../".$imageFileFormat) || file_exists($imageFileFormat)){
							return WWW_PATH . $imageFileFormat;
						}else{
							return $imageFile;
						}
					}else{
						return $imageFile;
					}
                }else{
                    return $row['name'];
                }
            }
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $ids
     * @return boolean
     */
    public function getFileImages($ids, $path = true, $format = false) {
        $db = new Db;
        
		if (!is_array($ids)) {
			$ids = explode(",", $ids);
		}else{
			$ids = $ids;
		}
		
		if (is_array($ids)) {
            foreach ($ids as $imageId) {
                $query = "SELECT name FROM dnt_uploads WHERE 
				`id_entity` = '" . $imageId . "' AND 
				`vendor_id` = '" . Vendor::getId() . "' AND 
				" . Dnt::showStatus("show") . "";
                if ($db->num_rows($query) > 0) {
                    foreach ($db->get_results($query) as $row) {
						$imageFileFormat = "dnt-view/data/uploads/formats/".$format."/" . $row['name'];
						$imageFile		 = WWW_PATH . "dnt-view/data/uploads/" . $row['name'];
						if($format){
							if(file_exists("../".$imageFileFormat) || file_exists($imageFileFormat)){
								$return[] = WWW_PATH . $imageFileFormat;
							}else{
								$return[] = $imageFile;
							}
						}else{
							$return[] = $imageFile;
						}
                        //$return[] = WWW_PATH . "dnt-view/data/uploads/" . $row['name'];
                    }
                } else {
                    $return = array();
                }
            }
        } else {
            $return = array();
        }
        return $return;
    }

    /**
     * 
     * @param type $id
     * @param type $table
     * @return type
     */
    public function getPostImage($id, $table = null, $format = false) {
        $db = new Db;

        if ($table == true || $table == false || $table === null) {
            $table = "dnt_posts";
        } else {
            $table = $table;
        }
        $imageId = self::get($id, $table);
		if($format){
			return self::getFileImage($imageId, true, $format);
		}else{
			return self::getFileImage($imageId);
		}
    }

    /**
     * 
     * @param type $id
     * @param type $table
     * @return type
     */
    public function getColumnByName($file) {
        $db = new Db;

        $query = "SELECT * FROM dnt_uploads WHERE name = '" . $file . "' LIMIT 1";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                return $row['id_entity'];
            }
        } else {
            return false;
        }
    }

	/**
     * 
     * @param type $file
     * 
     * 
     */
    public function hasVendorDipendency($file) {
        $db = new Db();

        if (!is_numeric($file)) {
            $image_id_entity = self::getColumnByName($file);
        } else {
            $image_id_entity = $file;
        }
		
        $data = false;
        
		/**
		* If $image_id_entity
		*/
        if ($image_id_entity) {
			$query = "SELECT * FROM dnt_uploads WHERE id_entity = '" . $image_id_entity . "'";
			if ($db->num_rows($query) > 1) {
				$data = true;
			}
        }
        return $data;
    }
	
    /**
     * 
     * @param type $file
     * @param type $onDelete - pri mazani z vendora je hodnota nastavena na true, alebo nie je nastaveny param
     * @return string
     * funkcia vrati true, ak je obrazok pouzity v niektorej tablukle (ak nie je dypendencia, moze sa fyzicky vymazat)
     * v opacnom pripade sa vrati false
     * 
     */
    public function hasDipendency($file, $onDelete = true) {
        $db = new Db();

        if (!is_numeric($file)) {
            $image_id_entity = self::getColumnByName($file);
        } else {
            $image_id_entity = $file;
        }
        
        if($onDelete == true){
            $defaultUploadDipendency = 1;
        }else{
            $defaultUploadDipendency = 0;
        }
        $data = array();
        
        /**
         * If $image_id_entity
         */
        if ($image_id_entity) {
            
            /**
             * skontroluje, ci sa nachadza v dnt_uploads prave 0, alebo 1 zaznam. 
             * ak ich je viac, ako 1zaznam, web mohol byt skopirovany a subor caka na pouzitie v druhom webe.
             */
            $onDelete = $onDelete + 1 - 1; //to integer
            if ($onDelete != 3) {
                $query = "SELECT * FROM dnt_uploads WHERE id_entity = '" . $image_id_entity . "'";
                if ($db->num_rows($query) > $defaultUploadDipendency) {
                    foreach ($db->get_results($query) as $row) {
                        $data[] = array(
                            "image"      => $image_id_entity,
                            "image_url"  => $row['name'],
                            "table"      => "dnt_uploads",
                            "column"     => "id_entity",
                            "vendor_id"  => $row['vendor_id'],
                        );
                    }
                }
            }
            
            $tables = array(
                "dnt_polls"             => "img",
                "dnt_polls_composer"    => "img",
                "dnt_posts"             => "img",
                "dnt_posts_meta"        => "value", //value
                "dnt_registred_users"   => "img",
                "dnt_settings"          => "value", //value
                "dnt_users"             => "img", //value
            );

            foreach ($tables as $table => $column) {
                $query = "SELECT * FROM $table WHERE `$column` = '" . $image_id_entity . "'";
                if ($db->num_rows($query) > 0) {
                    foreach ($db->get_results($query) as $row) {
                        $data[] = array(
                            "image"     => $image_id_entity,
                            "image_url" => $file,
                            "table"     => $table,
                            "column"    => $column,
                            "vendor_id" => $row['vendor_id'],
                        );
                    }
                }
            }
        }
        return $data;
    }
    
    
    /**
     * vymaze fyzicky subory, ktore nemaju dipendenciu na databazu
     */
    public function cleanIndependentFiles() {
        $image = new Image;
        $path  = "../dnt-view/data/uploads/";
        $files = glob($path . "*");
        foreach ($files as $file) {
            $fileName = str_replace($path, "", $file);
            if (filetype($file) == "file") {
                if (!$image->hasDipendency($fileName, false)) {
                    if (file_exists($path . $fileName)) {
                        unlink($path.$fileName);
                        //echo 'Deleted: <a href="' . $path . '' . $fileName . '">' . $fileName . "</a><br/>";
                    }
                }
            }
        }
    }

}
