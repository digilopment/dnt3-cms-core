<?php
/**
 *  class       ArticleView
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
class ArticleView extends AdminContent {
    
    /**
     * 
     * @param type $post_type
     * @return type
     */
    public function getPosts($post_type) {
        //$post_type = "personal";
        $db = new Db;
        $query = "SELECT * FROM dnt_posts WHERE 
            `type`      = 'post' AND 
            `show`      = '1' AND 
            `cat_id`    = '" . self::getCatId($post_type) . "' AND 
            `vendor_id` = '" . Vendor::getId() . "'";

        if ($db->num_rows($query) > 0) {
            return $db->get_results($query);
        } else {
            return array(false);
        }
    }

    /**
     * 
     * @return type
     */
    public function getSitemap() {
        //$post_type = "personal";
        $db = new Db;
        $query = "SELECT * FROM dnt_posts WHERE 
            `type`      = 'sitemap' AND 
            `cat_id`    = '" . AdminContent::getCatId("sitemap") . "' AND 
            `show`      = '1'";

        if ($db->num_rows($query) > 0) {
            return $db->get_results($query);
        } else {
            return array(false);
        }
    }
    
    /**
     * 
     * @param type $column
     * @param type $name_url
     * @return boolean
     */
    public function StaticViewParam($column, $name_url) {
        $rest = new Rest;
        $db = new Db;
        $query = "SELECT `$column` FROM dnt_posts WHERE `name_url` = '$name_url' AND vendor_id = '" . Vendor::getId() . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                return $row[$column];
            }
        } else {
            $query = "SELECT `translate_id` FROM dnt_translates WHERE `type` = 'name_url' AND translate = '" . $name_url . "' AND vendor_id = '" . Vendor::getId() . "'";
            if ($db->num_rows($query) > 0) {
                foreach ($db->get_results($query) as $row) {
                    return $row['translate_id'];
                }
            } else {
                return false;
            }
        }
    }
    
    /**
     * 
     * @return type
     */
    public function getStaticId() {
        $rest = new Rest;
        return $this->StaticViewParam("id", $rest->webhook(1));
    }
    
    /**
     * 
     * @return type
     */
    public function getArticleId() {
        $rest = new Rest;
        return $rest->webhook(2);
    }

    /**
     * 
     * @param type $post_id
     * @return type
     * returns array of tags
     */
    public function getPostTags($post_id) {
        $arr = array();
        if (count($this->showTags($this->getPostParam("tags", $post_id))) > 0) {
            foreach ($this->showTags($this->getPostParam("tags", $post_id)) as $tag) {
                $arr[] = $tag;
            }
            return $arr;
        } else {
            return $arr;
        }
    }
    
    /**
     * 
     * @param type $column
     * @param type $post_id
     * @param type $full_url
     * @param type $default
     * @return boolean
     */
    public function getPostParam($column, $post_id, $full_url = false, $default = false) {
        //return "aaa";
        $db = new Db;
        $query = "SELECT `$column` FROM dnt_posts WHERE id = '$post_id' AND vendor_id = '" . Vendor::getId() . "'";

        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                //return $row[$column];

                if (Dnt::is_external_url($this->getTranslate(array("type" => $column, "translate_id" => $post_id, "table" => "dnt_posts")))) {
                    return $this->getTranslate(array(
                        "type" => $column,
                        "translate_id" => $post_id,
                        "table" => "dnt_posts",
                        "default" => $default,
                    ));
                } elseif ($full_url == false && $column == "name_url") {
                    return $this->getTranslate(array("type" => $column, "translate_id" => $post_id, "table" => "dnt_posts"));
                } else {
                    if ($column == "name_url") {
                        return Url::get("WWW_PATH") . $this->getTranslate(array(
                            "type" => $column,
                            "translate_id" => $post_id,
                            "table" => "dnt_posts",
                            "default" => $default,
                        ));
                    } else {
                        return $this->getTranslate(array(
                            "type" => $column,
                            "translate_id" => $post_id,
                            "table" => "dnt_posts",
                            "default" => $default,
                        ));
                    }
                }
            }
        } else {
            return false;
        }
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function getPostImage($id) {
        $image = new Image;
        return $image->getPostImage($id);
    }

}
