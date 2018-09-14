<?php
/**
 *  class       Settings
 *  author      Tomas Doubek
 *  framework   Sessions
 *  package     dnt3
 *  date        2017
 */
class Url {

    /**
     * 
     * @param type $file
     * @return type
     */
    public function getCss($file) {
        $path = WWW_CDN_PATH . "dnt-view/layouts/markiza/css/" . $file;
        return '<link href="' . $path . '" media="screen, tv, projection" rel="stylesheet" type="text/css" />';
    }

    /**
     * 
     * @param type $file
     * @return type
     */
    public function getJs($file) {
        $path = WWW_CDN_PATH . "dnt-view/layouts/markiza/js/" . $file;
        return '<script src="' . $path . '" type="text/javascript"></script>';
    }

    /**
     * 
     * @param type $url
     * @return string
     */
    public function get($url) {
        if ($url == "WWW_PATH") {
            $lang = MultyLanguage::getLang();
            if ($lang == DEAFULT_LANG) {
                $lg = false;
            } else {
                $lg = $lang . "/";
            }
            $r = WWW_PATH . "" . $lg;
        } elseif ($url == 'WWW_PATH_FILES') {
            return WWW_CDN_PATH . "dnt-view/data/uploads/";
        }

        return $r;
    }

    /** OLD **/

    var $url;
    var $modul_name;
    var $modul_img;
    var $photo;
    var $photo_pripona;
    var $vendor;
    var $query;
    var $nazov;
    var $pripona;
    var $layoutId;
    var $layout;

    /**
     * 
     * @return string
     */
    protected function get_img_version() {
        return "?125";
    }

    /**
     * 
     * @param type $type
     * @param type $postId
     * @param type $column
     * @return type
     */
    protected function p_query($type, $postId, $column) {
        $dntDb = new DB();

        if ($type == false || "dnt_posts") {
            $this->query = "SELECT " . $column . " FROM dnt_posts WHERE id_entity = '" . $postId . "' LIMIT 1";
        } elseif ($type == "obchod_produkty") {
            $this->query = "SELECT " . $column . " FROM obchod_produkty  WHERE id_entity = '" . $postId . "' LIMIT 1";
        }

        return $this->query;
    }

    /**
     * 
     * @param type $type
     * @param type $postId
     * @param type $column
     * @return type
     */
    protected function p_img_property($type, $postId, $column) {
        $dntDb = new DB();
        $query = $this->p_query($type, $postId, $column);
        foreach ($dntDb->get_results($query) as $row) {
            return $this->vendor = $row[$column];
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
    public function get_post_image($type, $postId, $folder = "posts") {
        return WWW_CDN_PATH . "" . SYSTEM_NAME . "/data/" . $this->p_img_property($type, $postId, "vendor") . "/" . $folder . "/" . $this->p_img_property($type, $postId, "url_fotka") . "." . $this->p_img_property($type, $postId, "fotka_pripona") . $this->get_img_version();
    }

    /**
     * 
     * @param type $postId
     * @return type
     * returns uploaded image saved in data/vendor_id/uploads/
     */
    public function get_uploaded_image($postId) {

        $dntDb = new DB();
        $query = "SELECT vendor, nazov, pripona FROM dnt_uploads WHERE id_entity = '" . $postId . "' LIMIT 1";
        foreach ($dntDb->get_results($query) as $row) {
            $this->vendor = $row['vendor'];
            $this->nazov = $row['nazov'];
            $this->pripona = $row['pripona'];
        }

        return WWW_CDN_PATH . "" . SYSTEM_NAME . "/data/" . $this->vendor . "/uploads/" . $this->nazov . "." . $this->pripona . $this->get_img_version();
    }

    /**
     * 
     * @param type $img
     * @return type
     * returns static image saved in layouts/theme_name/images/
     */
    public function get_static_image($img) {

        //GET INSTANCE
        $dntDb = new DB();
        $dntSs = new Sessions();


        $vendorId = $dntSs->get_session_data("getVendorId");
        //SELECT LAYOUT ID
        $query = "SELECT layout FROM dnt_vendors WHERE id_entity = '" . $vendorId . "' LIMIT 1";
        foreach ($dntDb->get_results($query) as $row) {
            $this->layoutId = $row['layout'];
        }

        //SELECT LAYOUT NAMR
        $query = "SELECT url FROM dnt_layouts WHERE id_entity = '" . $this->layoutId . "' LIMIT 1";
        foreach ($dntDb->get_results($query) as $row) {
            $this->layout = $row['url'];
        }

        return WWW_CDN_PATH . "" . SYSTEM_NAME . "/layouts/" . $this->layout . "/images/" . $img . $this->get_img_version();
    }

}
