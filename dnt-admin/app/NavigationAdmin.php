<?php

class NavigationAdmin
{

    public function menu()
    {

        $query = "SELECT * FROM `dnt_admin_menu` WHERE 
				`parent_id` = '0' AND 
				`show` = '1' AND
				`type` = 'menu' AND vendor_id = " . Vendor::getId() . "";
        $data = $db->get_results($query);
    }

}
