<?php

/**
 *  class       AdminUser
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Image;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Vendor;
use DntLibrary\Base\XMLgenerator;

class AdminUser extends Image
{

	public function __construct()
    {
        $this->db = new DB();
        $this->dnt = new Dnt();
        $this->image = new Image();
        $this->sessions = new Sessions();
        $this->vendor = new Vendor();
        $this->xml = new XMLgenerator();
    }
	
    public function validProcessLogin($type, $email, $pass)
    {
        $query = "SELECT pass FROM dnt_users WHERE type = '$type' AND email = '" . $email . "' AND vendor_id = '" . Vendor::getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $db_pass = $row['pass'];
            }
            if ($db_pass == md5($pass)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function updateDatetime($vendor_id, $email)
    {
        $this->db->update(
                "dnt_users", //table
                array(//set
                    'datetime_update' => $this->dnt->datetime()
                ), array(//where
            'vendor_id' => $vendor_id,
            'email' => $email
                )
        );
    }

    public function emailExists($email, $vendor_id)
    {
        $query = "SELECT email FROM dnt_users WHERE email = '" . $email . "' AND vendor_id = '" . $vendor_id . "'";
        if ($this->db->num_rows($query) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePassword($vendor_id, $email, $pass)
    {
        $this->db->update(
                "dnt_users", //table
                array(//set
                    'pass' => md5($pass)
                ), array(//where
            'vendor_id' => $vendor_id,
            'email' => $email
                )
        );
    }

    public function getUserTypes()
    {
        $query = "SELECT * FROM dnt_post_type WHERE 
		admin_cat = 'user' AND
		vendor_id = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            return $this->db->get_results($query);
        } else {
            return array(false);
        }
    }

    public function getUserColumns()
    {
        return $this->xml->getTableColumns("dnt_users", "*");
    }

    public function data($type, $column)
    {
        $query = "SELECT $column FROM dnt_users WHERE type = '$type' AND email = '" . $this->sessions->get("admin_id") . "' AND vendor_id = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                return $row[$column];
            }
        } else {
            return false;
        }
    }

    public function avatar()
    {
        $imageId = $this->data("admin", "img");
        return $this->getFileImage($imageId);
    }

    public function dataById($type = false, $column, $email)
    {
        if ($type) {
            $andType = "AND type = '" . $type . "'";
        } else {
            $andType = false;
        }
        $query = "SELECT $column FROM dnt_users WHERE email = '" . $email . "' " . $andType . " AND vendor_id = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                return $row[$column];
            }
        } else {
            return false;
        }
    }

    public function avatarById($id)
    {
        $imageId = $this->dataById("admin", "img", $id);
        return $this->getFileImage($imageId);
    }

}
