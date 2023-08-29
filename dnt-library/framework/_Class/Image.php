<?php

/**
 *  class       Image
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Vendor;

class Image
{

    const THUMB = 150;
    const SMALL = 350;
    const MEDIUM = 600;
    const LARGE = 950;

    public function __construct()
    {
        $this->db = new DB();
        $this->dnt = new Dnt();
        $this->vendor = new Vendor();
        $this->settings = new Settings();
    }

    /**
     * 
     * @param type $id
     * @param type $table
     * @return boolean
     */
    public function get($id_entity, $table = null)
    {
        $query = "SELECT img FROM $table WHERE `id_entity` = '" . $id_entity . "' AND vendor_id = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
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
    public function getFileImage($input, $path = true, $format = false)
    {
        if (!is_numeric($input)) {
            return $input;
        }
        $imageId = $input;
        //`show` = '0' or `show` = '1' or `show` = '2'";
        $query = "SELECT name FROM dnt_uploads WHERE 
		`id_entity` = '" . $imageId . "' AND 
		`vendor_id` = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                if ($path == true) {
                    $imageFileFormat = "dnt-view/data/uploads/formats/" . $format . "/" . $row['name'];
                    $imageFile = WWW_PATH . "dnt-view/data/uploads/" . $row['name'];
                    if ($format) {
                        if (file_exists("../" . $imageFileFormat) || file_exists($imageFileFormat)) {
                            return WWW_PATH . $imageFileFormat;
                        } else {
                            return $imageFile;
                        }
                    } else {
                        return $imageFile;
                    }
                } else {
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
    public function getFileImages($ids, $path = true, $format = false)
    {
        if (!is_array($ids)) {
            $ids = explode(",", $ids);
        } else {
            $ids = $ids;
        }

        if (is_array($ids)) {
            foreach ($ids as $imageId) {
                $query = "SELECT name FROM dnt_uploads WHERE 
				`id_entity` = '" . $imageId . "' AND 
				`vendor_id` = '" . $this->vendor->getId() . "' AND 
				" . $this->dnt->showStatus("show") . "";
                if ($this->db->num_rows($query) > 0) {
                    foreach ($this->db->get_results($query) as $row) {
                        $imageFileFormat = "dnt-view/data/uploads/formats/" . $format . "/" . $row['name'];
                        $imageFile = WWW_PATH . "dnt-view/data/uploads/" . $row['name'];
                        if ($format) {
                            if (file_exists("../" . $imageFileFormat) || file_exists($imageFileFormat)) {
                                $return[] = WWW_PATH . $imageFileFormat;
                            } else {
                                $return[] = $imageFile;
                            }
                        } else {
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
    public function getPostImage($id, $table = null, $format = false)
    {
        if ($table == true || $table == false || $table === null) {
            $table = "dnt_posts";
        } else {
            $table = $table;
        }
        $imageId = $this->get($id, $table);
        if ($format) {
            $image = $this->getFileImage($imageId, true, $format);
            if ($image) {
                return $image;
            } else {
                $noImage = $this->settings->getGlobals()->database['keys']['no_img']['value'];
                return $this->getFileImage($noImage);
            }
        } else {
            return $this->getFileImage($imageId);
        }
    }

    /**
     * 
     * @param type $id
     * @param type $table
     * @return type
     */
    public function getColumnByName($file)
    {
        $query = "SELECT * FROM dnt_uploads WHERE name = '" . $file . "' LIMIT 1";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
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
    public function hasVendorDipendency($file)
    {
        if (!is_numeric($file)) {
            $image_id_entity = $this->getColumnByName($file);
        } else {
            $image_id_entity = $file;
        }

        $data = false;

        /**
         * If $image_id_entity
         */
        if ($image_id_entity) {
            $query = "SELECT * FROM dnt_uploads WHERE id_entity = '" . $image_id_entity . "'";
            if ($this->db->num_rows($query) > 1) {
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
    public function hasDipendency($file, $onDelete = true)
    {
        if (!is_numeric($file)) {
            $image_id_entity = $this->getColumnByName($file);
        } else {
            $image_id_entity = $file;
        }

        if ($onDelete == true) {
            $defaultUploadDipendency = 1;
        } else {
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
                if ($this->db->num_rows($query) > $defaultUploadDipendency) {
                    foreach ($this->db->get_results($query) as $row) {
                        $data[] = array(
                            "image" => $image_id_entity,
                            "image_url" => $row['name'],
                            "table" => "dnt_uploads",
                            "column" => "id_entity",
                            "vendor_id" => $row['vendor_id'],
                        );
                    }
                }
            }

            $tables = array(
                "dnt_polls" => "img",
                "dnt_polls_composer" => "img",
                "dnt_posts" => "img",
                "dnt_posts_meta" => "value", //value
                "dnt_registred_users" => "img",
                "dnt_settings" => "value", //value
                "dnt_users" => "img", //value
            );

            foreach ($tables as $table => $column) {
                $query = "SELECT * FROM $table WHERE `$column` = '" . $image_id_entity . "'";
                if ($this->db->num_rows($query) > 0) {
                    foreach ($this->db->get_results($query) as $row) {
                        $data[] = array(
                            "image" => $image_id_entity,
                            "image_url" => $file,
                            "table" => $table,
                            "column" => $column,
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
    public function cleanIndependentFiles()
    {
        $path = "../dnt-view/data/uploads/";
        $files = glob($path . "*");
        foreach ($files as $file) {
            $fileName = str_replace($path, "", $file);
            if (filetype($file) == "file") {
                if (!$this->hasDipendency($fileName, false)) {
                    if (file_exists($path . $fileName)) {
                        unlink($path . $fileName);
                        //echo 'Deleted: <a href="' . $path . '' . $fileName . '">' . $fileName . "</a><br/>";
                    }
                }
            }
        }
    }

}
