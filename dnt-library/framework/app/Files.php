<?php

namespace DntLibrary\App;

use DntLibrary\Base\DB;
use DntLibrary\Base\Vendor;

class Files
{
    public $postMetaDeta = [];

    public $cookieProductId;

    public function __construct()
    {
        $this->db = new DB();
        $this->vendor = new Vendor();
    }

    public function getImages()
    {
        $limit = '';
        $query = "SELECT * FROM `dnt_uploads` WHERE  `vendor_id` = '" . $this->vendor->getId() . "' ORDER BY `id` DESC " . $limit . '';
        return $query;
    }
}
