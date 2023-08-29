<?php

namespace DntAdmin\App;

use DntLibrary\Base\Vendor;

class NavigationAdmin
{
    public function __construct()
    {
        $this->vendor = new Vendor();
    }

    public function menu()
    {

        $query = "SELECT * FROM `dnt_admin_menu` WHERE 
				`parent_id` = '0' AND 
				`show` = '1' AND
				`type` = 'menu' AND vendor_id = " . $this->vendor->getId() . '';
        $data = $db->get_results($query);
    }
}
