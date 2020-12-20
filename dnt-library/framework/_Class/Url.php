<?php

/**
 *  class       Url
 *  author      Tomas Doubek
 *  framework   Sessions
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\MultyLanguage;
use DntLibrary\Base\Sessions;

class Url
{


	
	public function __construct(){
		$this->db = new DB();
		$this->dnt = new Dnt();
		$this->multiLanguage = new MultyLanguage();
        $this->sessions = new Sessions();
	}
	
    /**
     * 
     * @param type $file
     * @return type
     */
    public function getCss($file)
    {
        $path = WWW_CDN_PATH . "dnt-view/layouts/markiza/css/" . $file;
        return '<link href="' . $path . '" media="screen, tv, projection" rel="stylesheet" type="text/css" />';
    }

    /**
     * 
     * @param type $file
     * @return type
     */
    public function getJs($file)
    {
        $path = WWW_CDN_PATH . "dnt-view/layouts/markiza/js/" . $file;
        return '<script src="' . $path . '" type="text/javascript"></script>';
    }

    /**
     * 
     * @param type $url
     * @return string
     */
    public function get($url)
    {
		$r = false;
        if ($url == "WWW_PATH") {
            $lang =  $this->multiLanguage->getLang();
            if ($lang == DEAFULT_LANG || MULTY_LANGUAGE == false) {
                $lg = false;
            } else {
                $lg = $lang . "/";
            }
            $r = WWW_PATH . "" . $lg;
        } elseif ($url == 'WWW_PATH_FILES') {
            $r = WWW_CDN_PATH . "dnt-view/data/uploads/";
        }

        return $r;
    }

    /**
     * 
     * @return string
     */
    protected function get_img_version()
    {
        return "?125";
    }

    /**
     * 
     * @param type $type
     * @param type $postId
     * @param type $column
     * @return type
     */
    protected function p_query($type, $postId, $column)
    {
  
		$db = false;
        if ($type == false || "dnt_posts") {
            $db = "SELECT " . $column . " FROM dnt_posts WHERE id_entity = '" . $postId . "' LIMIT 1";
        } elseif ($type == "obchod_produkty") {
            $db = "SELECT " . $column . " FROM obchod_produkty  WHERE id_entity = '" . $postId . "' LIMIT 1";
        }

        return $db;
    }

    /**
     * 
     * @param type $type
     * @param type $postId
     * @param type $column
     * @return type
     */
    protected function p_img_property($type, $postId, $column)
    {
        $query = $this->p_query($type, $postId, $column);
        foreach ($this->db->get_results($query) as $row) {
            return $row[$column];
        }
    }

    /**
     * 
     * @param type $type
     * @param type $postId
     * @param type $folder
     * @return type
     * returns post image of post, product, user saved in data/vendor_id/$folder/
     */
    public function get_post_image($type, $postId, $folder = "posts")
    {
        return WWW_CDN_PATH . "" . SYSTEM_NAME . "/data/" . $this->p_img_property($type, $postId, "vendor") . "/" . $folder . "/" . $this->p_img_property($type, $postId, "url_fotka") . "." . $this->p_img_property($type, $postId, "fotka_pripona") . $this->get_img_version();
    }

    /**
     * 
     * @param type $postId
     * @return type
     * returns uploaded image saved in data/vendor_id/uploads/
     */
    public function get_uploaded_image($postId)
    {

        $query = "SELECT vendor, nazov, pripona FROM dnt_uploads WHERE id_entity = '" . $postId . "' LIMIT 1";
        foreach ($this->db->get_results($query) as $row) {
            $vendor = $row['vendor'];
            $nazov = $row['nazov'];
            $pripona = $row['pripona'];
        }

        return WWW_CDN_PATH . "" . SYSTEM_NAME . "/data/" . $vendor . "/uploads/" . $nazov . "." . $pripona . $this->get_img_version();
    }

    /**
     * 
     * @param type $img
     * @return type
     * returns static image saved in layouts/theme_name/images/
     */
    public function get_static_image($img)
    {


        $vendorId = $this->sessions->get_session_data("getVendorId");
        //SELECT LAYOUT ID
        $query = "SELECT layout FROM dnt_vendors WHERE id_entity = '" . $vendorId . "' LIMIT 1";
        foreach ($this->db->get_results($query) as $row) {
            $layout = $row['layout'];
        }

        //SELECT LAYOUT NAMR
        $query = "SELECT url FROM dnt_layouts WHERE id_entity = '" . $layout . "' LIMIT 1";
        foreach ($this->db->get_results($query) as $row) {
            $layoutUrl = $row['url'];
        }

        return WWW_CDN_PATH . "" . SYSTEM_NAME . "/layouts/" . $layoutUrl . "/images/" . $img . $this->get_img_version();
    }

    public function getPostUrl($url)
    {
        if ($this->dnt->in_string("<WWW_PATH>", $url)) {
            return str_replace("<WWW_PATH>", WWW_PATH, $url);
        } elseif ($this->dnt->is_external_url($url)) {
            return $url;
        } else {
            return WWW_FOLDERS . "/" . $url;
        }
    }

}
