<?php

/**
 *  class       Gallery
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\ArticleView;
use DntLibrary\Base\DB;
use DntLibrary\Base\Vendor;

class Gallery extends ArticleView
{
    public function __construct()
    {
        $this->db = new DB();
        $this->vendor = new Vendor();
    }

    public function getGalleriesIds($postId = false)
    {
        $data = array();
        $query = "SELECT value FROM dnt_posts_meta WHERE 
            `service` = 'gallery_list' AND 
            `vendor_id` = '" . $this->vendor->getId() . "' AND `show` > 0
			ORDER by `order` asc";

        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $data[] = $row['value'];
            }
            $tmp = join(',', $data);
            return explode(',', $tmp);
        } else {
            return array();
        }
    }
}
