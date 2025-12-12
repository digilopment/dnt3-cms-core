<?php

/**
 *  class       Post
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2019
 */

namespace DntLibrary\App;

use DntLibrary\Base\DB;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class Post extends Client
{
    public array $postsModel = [];
    public array $postsNavigation = [];
    public array $postsSubNavigation = [];

    protected Rest $rest;
    protected DB $db;
    protected Vendor $vendor;

    public function __construct()
    {
        parent::__construct();
        $this->rest = new Rest();
        $this->db = new DB();
        $this->vendor = new Vendor();
    }

    /**
     * @param array $data
     * @param string $column
     * @param string $sort
     * @return array
     */
    protected function order(array $data, string $column = 'id', string $sort = 'ASC'): array
    {
        $sortArray = array();
        foreach ($data as $item) {
            foreach ($item as $key => $value) {
                if (!isset($sortArray[$key])) {
                    $sortArray[$key] = array();
                }
                $sortArray[$key][] = $value;
            }
            if ($column == 'datetime_publish') {
                $sortArray['datetime'][] = strtotime($item[$column]);
                $orderby = 'datetime';
            }
        }

        $orderby = $column;

        if ($sort == 'ASC' || $sort == 'asc') {
            array_multisort($sortArray[$orderby], SORT_ASC, $data);
        } else {
            array_multisort($sortArray[$orderby], SORT_DESC, $data);
        }
        return $data;
    }

    protected function postsModel(): void
    {
        $query = "SELECT * FROM `dnt_posts` WHERE vendor_id = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            $this->postsModel = $this->db->get_results($query, true);
        }
    }

    protected function postsNavigation(): void
    {
        foreach ($this->postsModel as $model) {
            if ($model->type == 'sitemap' && ($model->show >= 1 && $model->show <= 2) && $model->sub_cat_id == '') {
                $this->postsNavigation[] = $model;
            }
        }
        if (!empty($this->postsNavigation)) {
            $this->postsNavigation = $this->order($this->postsNavigation, 'order', 'desc');
        }
    }

    protected function postsSubNavigation(): void
    {
        foreach ($this->postsModel as $model) {
            if ($model->type == 'sitemap' && ($model->show >= 1 && $model->show <= 2) && $model->sub_cat_id != '') {
                $this->postsSubNavigation[] = $model;
            }
        }
        if (!empty($this->postsSubNavigation)) {
            $this->postsSubNavigation = $this->order($this->postsSubNavigation, 'order', 'desc');
        }
    }

    /**
     * @param string|int $nameUrlOrId
     * @param string|false $service
     * @return object|false
     */
    public function getPost($nameUrlOrId, $service = false)
    {

        if ($service) {
            $AND_SRV = " AND service = '" . $service . "'";
        } else {
            $AND_SRV = false;
        }

        if (is_numeric($nameUrlOrId)) {
            $identify = "`id_entity` = '$nameUrlOrId'";
        } else {
            $identify = "`name_url` = '$nameUrlOrId'";
        }
        $query = 'SELECT * FROM dnt_posts WHERE ' . $identify . " AND vendor_id = '" . $this->vendor->getId() . "' " . $AND_SRV . '';
        if ($this->db->num_rows($query) > 0) {
            $data = $this->db->get_results($query, true);
            return $data[0];
        }
    }

    public function getPosts($confArray)
    {

        $show = isset($confArray['show']) ? $confArray['show'] : false;
        $order = isset($confArray['order']) ? $confArray['order'] : false;
        $ofset = isset($confArray['ofset']) ? $confArray['ofset'] : false;
        $type = isset($confArray['type']) ? $confArray['type'] : false;
        $posts = [];
        foreach ($this->postsModel as $model) {
            if ($show) {
                if ($model->show > 0) {
                    $posts[] = $model;
                }
            }
            if ($type) {
                if ($model->type == $type) {
                    $posts[] = $model;
                }
            }
        }
        return $posts;
    }

    public function init()
    {
        $this->postsModel();
        $this->postsNavigation();
        $this->postsSubNavigation();
    }
}
