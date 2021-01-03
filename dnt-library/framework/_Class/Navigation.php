<?php

/**
 *  class       Navigation
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\AdminContent;
use DntLibrary\Base\DB;
use DntLibrary\Base\Vendor;

class Navigation
{

    public function __construct()
    {
        $this->db = new DB();
        $this->vendor = new Vendor();
        $this->adminContent = new AdminContent();
    }

    /**
     * 
     * @return type
     */
    public function getParents()
    {
        $query = "SELECT * FROM dnt_posts WHERE 
		type = 'sitemap' AND 
		cat_id = '" . $this->adminContent->getCatId("sitemap") . "' AND 
		vendor_id = '" . $this->vendor->getId() . "' AND 
		`show` = '1' ORDER BY `order` DESC";
        if ($this->db->num_rows($query) > 0) {
            return $this->db->get_results($query);
        } else {
            return array(false);
        }
    }

    /**
     * 
     * @param type $parentId
     * @return boolean
     */
    public function hasChild($parentId)
    {
        $query = "SELECT * FROM `dnt_posts` WHERE 
		type = 'sitemap' AND 
		`show` = '1' AND 
		sub_cat_id = '" . $parentId . "' 
		AND vendor_id = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $parentId
     * @return type
     */
    public function getChildren($parentId)
    {
        $query = "SELECT * FROM `dnt_posts` WHERE 
		type = 'sitemap' AND 
		`show` = '1' AND 
		sub_cat_id = '" . $parentId . "' 
		AND vendor_id = '" . $this->vendor->getId() . "'  ORDER BY `order` DESC";
        if ($this->db->num_rows($query) > 0) {
            return $this->db->get_results($query);
        } else {
            return array(false);
        }
    }

}
