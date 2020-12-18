<?php

/**
 *  class       FileAdmin
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\AdminContent;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Vendor;
use DntLibrary\Base\DB;

class FileAdmin
{



	public function __construct(){
			$this->db = new DB();
			$this->dnt = new Dnt();
			$this->adminContent = new AdminContent();
			$this->vendor = new Vendor();
		}
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
     * @param type $is_limit
     * @return string
     */
    protected function prepare_query($is_limit)
    {

        if (isset($_GET['search'])) {
            $typ = "AND `name` LIKE '%" . $this->dnt->name_url($_GET['search']) . "%'";
        } else {
            $typ = false;
        }

        if ($is_limit == false)
            $limit = false;
        else
            $limit = $is_limit;

        $query = "SELECT * FROM `dnt_uploads` WHERE  `vendor_id` = '" . $this->vendor->getId() . "' " . $typ . " ORDER BY `id` DESC " . $limit . "";
        return $query;
    }

    /**
     * 
     * @return type
     */
    public function query($noLimit = false)
    {

        if (isset($_GET['page'])) {
            $returnPage = "&page=" . $_GET['page'];
        } else {
            $returnPage = false;
        }

        $query = $this->prepare_query(false);
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

        if ($noLimit) {
            $pager = false;
        } else {
            $pager = "LIMIT " . $pociatok . ", " . $limit . "";
        }
        return $this->prepare_query($pager);
    }

    /**
     * 
     * @param type $index
     * @return int
     */
    public function getPage($index)
    {

        if (isset($_GET['page'])) {
            $strana = $_GET['page'];
        } else {
            $strana = 1;
        }

        $query = $this->prepare_query(false);
        $pocet = $this->db->num_rows($query);
        $limit = $this->limit();
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
            $adresa_bez_page = explode("&page=" . $_GET['page'] . "", $adresa[1]);
            $return = $adresa_bez_page[0];
        } else {
            $return = $adresa[1];
        }

        return WWW_PATH_ADMIN . "index.php?" . $return . "&page=" . $this->getPage($index);
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
            return WWW_PATH_ADMIN . "index.php?src=files&filter=$cat_id&sub_cat_id=$sub_cat_id&type=$type";
        } else {
            if (isset($_GET['filter'])) {
                return WWW_PATH_ADMIN . "index.php?src=files&filter=$cat_id&sub_cat_id=$sub_cat_id&post_id=$post_id&page=$page&action=$action&type=$type";
            } else {
                return WWW_PATH_ADMIN . "index.php?src=files&post_id=$post_id&page=$page&action=$action&type=$type";
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

        $query = "SELECT `$column` FROM dnt_uploads WHERE id = '$post_id'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
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
        return ($this->adminContent->getPage("current") * $this->adminContent->limit()) - $this->adminContent->limit() + 1;
    }

}
