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

    /**
     * 
     * @return type
     */
    public function getParents()
    {
        $db = new DB;
        $query = "SELECT * FROM dnt_posts WHERE 
		type = 'sitemap' AND 
		cat_id = '" . AdminContent::getCatId("sitemap") . "' AND 
		vendor_id = '" . Vendor::getId() . "' AND 
		`show` = '1' ORDER BY `order` DESC";
        if ($db->num_rows($query) > 0) {
            return $db->get_results($query);
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
        $db = new DB;
        $query = "SELECT * FROM `dnt_posts` WHERE 
		type = 'sitemap' AND 
		`show` = '1' AND 
		sub_cat_id = '" . $parentId . "' 
		AND vendor_id = '" . Vendor::getId() . "'";
        if ($db->num_rows($query) > 0) {
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
        $db = new DB;
        $query = "SELECT * FROM `dnt_posts` WHERE 
		type = 'sitemap' AND 
		`show` = '1' AND 
		sub_cat_id = '" . $parentId . "' 
		AND vendor_id = '" . Vendor::getId() . "'  ORDER BY `order` DESC";
        if ($db->num_rows($query) > 0) {
            return $db->get_results($query);
        } else {
            return array(false);
        }
    }

}
