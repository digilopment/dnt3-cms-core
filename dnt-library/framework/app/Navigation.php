<?php

namespace DntLibrary\App;

use DntLibrary\Base\DB;
use DntLibrary\Base\Vendor;

class Navigation
{
    protected $posts = [];

    public function __construct()
    {
        $this->db = new DB();
        $this->vendor = new Vendor();
    }

    protected function model()
    {
        $query = "SELECT * FROM dnt_posts WHERE type = 'sitemap' AND cat_id = '290' AND vendor_id = '" . $this->vendor->getId() . "' AND `show` >= '0' ORDER BY `order` DESC";
        if ($this->db->num_rows($query) > 0) {
            $this->posts = $this->db->get_results($query);
        }
    }

    public function menuItems()
    {
        $return = [];
        foreach ($this->posts as $post) {
            if ($post['show'] == 1) {
                $return[] = $post;
            }
        }
        return $return;
    }

    public function activeItems()
    {
        $return = [];
        foreach ($this->posts as $post) {
            if ($post['show'] > 0) {
                $return[] = $post;
            }
        }
        return $return;
    }

    public function init()
    {
        $this->model();
    }
}
