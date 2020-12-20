<?php

/**
 *  class       ArticleList
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\AdminContent;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class ArticleList extends AdminContent
{


		public function __construct(){
			$this->articleView = new ArticleView();
			$this->frontend = new Frontend();
			$this->rest = new Rest();
			$this->db = new DB();
			$this->dnt = new Dnt();
			$this->vendor = new Vendor();
		}
    /**
     * 
     * @param type $is_limit
     * @return string
     */
    public function prepare_query($is_limit, $postId = false, $servicesIDsStatic = false)
    {

        $servicesIDs = $this->frontend->get();


        $servicesIDs = $servicesIDs['article']['service_id'];
        $servicesIDs = str_replace(",", "', '", $servicesIDs);
        if ($servicesIDsStatic) {
            $servicesIDs = $servicesIDsStatic;
        }

        if (isset($_GET['search'])) {
            $typ = "AND `name_url` LIKE '%" . $this->dnt->name_url($_GET['search']) . "%'";
        } elseif ($this->rest->get("q")) {
            $pharse = str_replace("-", "", $this->dnt->name_url(urldecode($this->rest->get("q"))));
            $typ = "AND `dnt_posts`.`search` LIKE '%" . $pharse . "%'";
        } else {
            $typ = "AND `dnt_post_type`.`id_entity` IN('" . $servicesIDs . "')";
        }

        if ($is_limit == false)
            $limit = false;
        else
            $limit = $is_limit;

        //AUTOREDIRECT URL
        if ($postId == false)
            $typArticle = false;
        else {
            $typArticle = " AND `dnt_posts`.`id_entity` IN('" . $postId . "') ";
            $typ = false;
        }

        $query = "
            SELECT 
                    `dnt_posts`.`id_entity` AS id, 
                    `dnt_posts`.`tags` AS tags, 
                    `dnt_posts`.`search` AS search, 
                    `dnt_posts`.`vendor_id` AS vendor_id , 
                    `dnt_posts`.`type` AS type, 
                    `dnt_posts`.`name_url` AS name_url,
                    `dnt_posts`.`name` AS name,
                    `dnt_posts`.`show` AS `show`,
                    `dnt_posts`.`content` AS content,
                    `dnt_posts`.`perex` AS perex,
                    `dnt_posts`.`service` AS service,
                    `dnt_posts`.`datetime_creat` AS datetime_creat,
                    `dnt_posts`.`datetime_publish` AS datetime_publish,
                    `dnt_posts`.`datetime_update` AS datetime_update,
                    `dnt_post_type`.`cat_id` AS cat_id,
                    `dnt_post_type`.`name_url` AS cat_name_url,
                    `dnt_post_type`.`id_entity` AS dnt_post_type_id
            FROM 
                    `dnt_posts` 
            LEFT JOIN 
                    `dnt_post_type` 
            ON 
                    `dnt_posts`.`cat_id` = `dnt_post_type`.`id_entity` 
            WHERE 
                    `dnt_posts`.`vendor_id` 	= '" . $this->vendor->getId() . "' AND 
                    `dnt_post_type`.`vendor_id` = '" . $this->vendor->getId() . "' 
            AND
                    `dnt_posts`.`show` <> '0'
            " . $typArticle . " 
            " . $typ . " 
            GROUP BY 
                    `dnt_posts`.`id_entity`
            ORDER BY 
                    `dnt_posts`.`datetime_publish` DESC, `dnt_posts`.`order` DESC " . $limit . "";
        return $query;
    }

    /**
     * 
     * @return type
     */
    public function query($postId = false, $servicesIDsStatic = false)
    {
 
        if (isset($_GET['page'])) {
            $returnPage = "&page=" . $_GET['page'];
        } else {
            $returnPage = false;
        }

        if ($postId) {
            $query = $this->prepare_query(false, $postId, $servicesIDsStatic);
            return $query;
        }

        $query = $this->prepare_query(false, $postId, $servicesIDsStatic);
        $pocet = $this->db->num_rows($query);
        $limit = $this->limit();

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
        return $this->prepare_query($pager, $postId, $servicesIDsStatic);
    }

    /**
     * AUTOREDIRECT QUERY
     * @param type $postId
     * @return boolean
     */
    public function getArticleUrl($postId, $fullPath = true, $type = false)
    {


        $query = $this->query($postId);
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                if ($fullPath) {
                    if ($type) {
                        $url = $this->articleView->detailUrl($row['cat_name_url'], $row['id'], $row['name_url'], $type);
                    } else {
                        $url = $this->articleView->detailUrl($row['cat_name_url'], $row['id'], $row['name_url']);
                    }
                } else {
                    $url = $row['name_url'];
                }
            }
        } else {
            $url = false;
        }
        return $url;
    }

    /**
     * 
     * @param type $postId
     * @param type $servicesIDsStatic
     * @return type
     */
    public function data($postId, $servicesIDsStatic)
    {

        $query = $this->query($postId, $servicesIDsStatic);
        if ($this->db->num_rows($query) > 0) {
            return $this->db->get_results($query);
        } else {
            return array();
        }
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    /* public function getArticleUrl($id) {
      return Url::get("WWW_PATH") . "clanok/" . $id . "/" . $this->getTranslate(array("type" => "name_url", "translate_id" => $id, "table" => "dnt_posts"));
      }
     */
}
