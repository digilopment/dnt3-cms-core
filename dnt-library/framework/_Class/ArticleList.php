<?php
/**
 *  class       ArticleList
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
class ArticleList extends AdminContent {
    
    /**
     * 
     * @param type $is_limit
     * @return string
     */
    protected function prepare_query($is_limit) {
        $db = new Db();

        $UrlCatToId = "novinky";

        if (isset($_GET['search'])) {
            $typ = "AND `name_url` LIKE '%" . Dnt::name_url($_GET['search']) . "%'";
        } else
            $typ = false;

        if ($is_limit == false)
            $limit = false;
        else
            $limit = $is_limit;

        $query = "SELECT * FROM `dnt_posts` WHERE  
			`type` 			= 'article' AND
			`vendor_id` 	= '" . Vendor::getId() . "' AND
			`sub_cat_id` 	= '" . AdminContent::getCatId($UrlCatToId) . "'
			" . $typ . " ORDER BY `order` DESC " . $limit . "";
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
        $limit = self::limit();

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
        return self::prepare_query($pager);
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function getArticleUrl($id) {
        return Url::get("WWW_PATH") . "clanok/" . $id . "/" . $this->getTranslate(array("type" => "name_url", "translate_id" => $id, "table" => "dnt_posts"));
    }

}
