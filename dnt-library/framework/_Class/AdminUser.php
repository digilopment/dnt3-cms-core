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
    protected Dnt $dnt;
    protected Sessions $sessions;
    protected Vendor $vendor;
    protected XMLgenerator $xml;
    protected DB $db;

    public function __construct()
    {
        $this->dnt = new Dnt();
        $this->sessions = new Sessions();
        $this->vendor = new Vendor();
        $this->xml = new XMLgenerator();
        $this->db = new DB();
    }

    /**
     * @param string $type
     * @param string $email
     * @param string $pass
     * @return bool
     */
    public function validProcessLogin(string $type, string $email, string $pass): bool
    {
        if (empty($type) || empty($email) || empty($pass)) {
            return false;
        }

        $emailEscaped = $this->db->escape($email);
        $typeEscaped = $this->db->escape($type);
        $vendorId = $this->vendor->getId();
        
        $query = "SELECT pass FROM dnt_users WHERE type = '" . $typeEscaped . "' AND email = '" . $emailEscaped . "' AND vendor_id = '" . $vendorId . "' LIMIT 1";
        
        $db_pass = null;
        if ($this->db->num_rows($query) > 0) {
            $results = $this->db->get_results($query);
            if (!empty($results)) {
                $db_pass = $results[0]['pass'] ?? null;
            }
        }
        
        if ($db_pass !== null && $db_pass === md5($pass)) {
            return true;
        }
        
        return false;
    }

    /**
     * @param int $vendor_id
     * @param string $email
     * @return bool
     */
    public function updateDatetime(int $vendor_id, string $email): bool
    {
        return $this->db->update(
            'dnt_users',
            [
                'datetime_update' => $this->dnt->datetime(),
            ],
            [
                'vendor_id' => $vendor_id,
                'email' => $this->db->escape($email),
            ]
        );
    }

    /**
     * @param string $email
     * @param int $vendor_id
     * @return bool
     */
    public function emailExists(string $email, int $vendor_id): bool
    {
        $emailEscaped = $this->db->escape($email);
        $query = "SELECT email FROM dnt_users WHERE email = '" . $emailEscaped . "' AND vendor_id = '" . $vendor_id . "' LIMIT 1";
        return $this->db->num_rows($query) > 0;
    }

    public function updatePassword($vendor_id, $email, $pass)
    {
        $this->db->update(
            'dnt_users', //table
            array(//set
                    'pass' => md5($pass),
                ),
            array(//where
            'vendor_id' => $vendor_id,
            'email' => $email,
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
        return $this->xml->getTableColumns('dnt_users', '*');
    }

    public function data($type, $column)
    {
        $query = "SELECT $column FROM dnt_users WHERE type = '$type' AND email = '" . $this->sessions->get('admin_id') . "' AND vendor_id = '" . $this->vendor->getId() . "'";
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
        $imageId = $this->data('admin', 'img');
        return $this->getFileImage($imageId);
    }

    public function dataById($type = false, $column = false, $email = false)
    {
        if ($type) {
            $andType = "AND type = '" . $type . "'";
        } else {
            $andType = false;
        }

        if ($column) {
            $getColumn = $column;
        } else {
            $getColumn = '*';
        }

        $query = "SELECT $getColumn FROM dnt_users WHERE email = '" . $email . "' " . $andType . " AND vendor_id = '" . $this->vendor->getId() . "'";
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
        $imageId = $this->dataById('admin', 'img', $id);
        return $this->getFileImage($imageId);
    }
}
