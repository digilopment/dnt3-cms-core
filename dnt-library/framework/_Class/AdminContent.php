<?php

namespace DntLibrary\Base;

use DntLibrary\Base\AdminContent;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\MultyLanguage;
use DntLibrary\Base\Vendor;
use DntLibrary\Base\DB;

/**
 *  class       AdminContent
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
class AdminContent extends MultyLanguage
{

    /**
     * 
     * @return int
     */
    public function limit()
    {
        return 20;
    }

    /**
     * 
     * @return type
     */
    public function primaryCat()
    {
        return array(
            "post" => "Obsah",
            "sitemap" => "Sitemapa",
            "article" => "Články",
            "video" => "Video",
            "gallery" => "Galérie",
            "product" => "Produkt",
        );
    }

    /**
     * 
     * @param type $type
     * @return boolean
     */
    public function getCatId($type)
    {
        $db = new DB;
        $query = "SELECT id_entity FROM dnt_post_type WHERE name_url = '" . $type . "' AND `vendor_id` = '" . Vendor::getId() . "'";
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
     * @param type $type
     * @return boolean
     */
    public function getCatData($id_entity)
    {
        $db = new DB;
        $query = "SELECT * FROM dnt_post_type WHERE id_entity = '" . $id_entity . "' AND `vendor_id` = '" . Vendor::getId() . "'";
        if ($db->num_rows($query) > 0) {
            return $db->get_results($query);
        } else {
            return array();
        }
    }

    /**
     * 
     * @param type $is_limit
     * @return string
     */
    protected function prepare_query($is_limit)
    {
        $db = new DB();

        if (isset($_GET['included']) && $_GET['included'] == "article") {
            $typ = "AND sub_cat_id = '" . $_GET['filter'] . "'";
        } elseif (isset($_GET['included']) && isset($_GET['filter'])) {
            $typ = "AND cat_id = '" . $_GET['filter'] . "'";
        } elseif (isset($_GET['included'])) {
            $typ = "AND type = '" . $_GET['included'] . "'";
        } elseif (isset($_GET['search'])) {
            $typ = "AND `name_url` LIKE '%" . Dnt::name_url($_GET['search']) . "%'";
        } else {
            $typ = false;
        }
        if ($is_limit == false)
            $limit = false;
        else
            $limit = $is_limit;

        /* if (isset($_GET['included']) && $_GET['included'] == "article") {
          $typ = "AND sub_cat_id = '" . $_GET['filter'] . "'";
          } elseif (isset($_GET['included']) && $_GET['included'] == "sitemap-sub") {
          $typ = "AND cat_id = '" . $_GET['filter'] . "'";
          } elseif (isset($_GET['included']) && $_GET['included'] == "sitemap") {
          $typ = "AND cat_id = '" . $_GET['filter'] . "'";
          } elseif (isset($_GET['included']) && $_GET['included'] == "post") {
          $typ = "AND cat_id = '" . $_GET['filter'] . "'";
          } elseif (isset($_GET['included']) && $_GET['included'] != "") {
          $typ = "AND cat_id = '" . $_GET['filter'] . "'";
          } elseif (isset($_GET['filter']))
          $typ = "AND sub_cat_id = '" . $_GET['filter'] . "'";

          elseif (isset($_GET['search'])) {
          $typ = "AND `name_url` LIKE '%" . Dnt::name_url($_GET['search']) . "%'";
          } else
          $typ = false;

          if ($is_limit == false)
          $limit = false;
          else
          $limit = $is_limit;
         */

        $query = "SELECT * FROM `dnt_posts` WHERE  `vendor_id` = '" . Vendor::getId() . "' " . $typ . " ORDER BY `order` DESC " . $limit . "";
        return $query;
    }

    /**
     * 
     * @return type
     */
    public function query()
    {
        $db = new DB;

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
     * @param type $index
     * @return int
     */
    public function getPage($index)
    {
        $db = new DB;

        if (isset($_GET['page'])) {
            $strana = $_GET['page'];
        } else {
            $strana = 1;
        }

        $query = self::prepare_query(false);
        $pocet = $db->num_rows($query);
        $limit = self::limit();
        $stranok = $pocet / $limit;
        $pociatok = ($strana * $limit) - $limit;

        $stranok_round = ceil($stranok);
        $prev_page = $strana - 1;

        if ($index == "next") {
            $next_page = $strana + 1;
            if ($next_page <= $stranok_round) {
                return $next_page;
            } else {
                return $stranok_round;
            }
        } elseif ($index == "prev") {
            if ($prev_page < 1) {
                return 1;
            } else {
                return $prev_page;
            }
        } elseif ($index == "first") {
            return 1;
        } elseif ($index == "last") {

            return $stranok_round;
        } elseif ($index == "current") {
            return $strana;
        }
    }

    /**
     * 
     * @param type $index
     * @return type
     */
    public function paginator($index)
    {
        $adresa = explode("?", WWW_FULL_PATH);
        if (isset($_GET['page'])) {
            $adresa_bez_page = explode("&page=" . $_GET['page'] . "", $adresa[1]); //src=obsah&page=2
            $return = $adresa_bez_page[0];
        } else {
            $return = $adresa[1]; //this function return an array
        }

        return WWW_PATH_ADMIN . "index.php?" . $return . "&page=" . self::getPage($index);
    }

    /**
     * 
     * @param type $action
     * @param type $cat_id
     * @param type $sub_cat_id
     * @param type $type
     * @param type $post_id
     * @param type $page
     * @return type
     */
    public function url($action, $cat_id, $sub_cat_id, $type, $post_id, $page)
    {

        if ($action == "filter") {
            return "index.php?src=content&filter=$cat_id&sub_cat_id=$sub_cat_id&included=$type";
        } else {
            if (isset($_GET['filter'])) {
                //return "aa";
                return "index.php?src=content&filter=$cat_id&sub_cat_id=$sub_cat_id&post_id=$post_id&page=$page&action=$action&included=$type";
            } else {
                return "index.php?src=content&post_id=$post_id&page=$page&action=$action&included=$type";
            }
        }
    }

    /**
     * 
     * @param type $column
     * @param type $post_id
     * @return boolean
     */
    public function getPostParam($column, $post_id)
    {
        $db = new DB;

        $query = "SELECT `$column` FROM dnt_posts WHERE id_entity = '$post_id' AND vendor_id = '" . Vendor::getId() . "'";
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
     * @return type
     */
    public function showOrder()
    {
        return (AdminContent::getPage("current") * AdminContent::limit()) - AdminContent::limit() + 1;
    }

    /**
     * 
     * @param type $tags
     * @return type
     * tags
     */
    public function databseTagsString($tags)
    {
        $tags = str_replace(", ", ",", $tags);
        $tags = str_replace(" ,", ",", $tags);
        $tags = str_replace(", ", ",", $tags);
        $tags = str_replace(" ", "-", $tags);
        return $tags;
    }

    /**
     * 
     * @param type $data
     * @return type
     */
    public function showTags($data)
    {
        return explode(",", $data);
    }

    /**
     * 
     * @param type $data
     * @return type
     */
    public function showTagName($data)
    {
        $data = str_replace("-", " ", $data);
        return ucfirst($data);
    }

}
