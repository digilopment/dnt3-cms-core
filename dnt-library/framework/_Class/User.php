<?php

/**
 *  class       User
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\Api;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\DntUpload;
use DntLibrary\Base\Image;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class User extends Image
{

	public function __construct(){
		parent::__construct();
		$this->db = new DB();
		$this->dnt = new Dnt();
		$this->vendor = new Vendor();
		$this->rest = new Rest();
		$this->api = new Api;
		$this->dntUpload = new DntUpload;
		
	}
    /**
     * 
     * @return int
     */
    public function limit()
    {
        return 20;
    }

    /**
     * 
     * @param type $type
     * @param type $is_limit
     * @return string
     */
    protected function prepare_query($type, $is_limit)
    {

        if ($type == "admin") {
            return array();
        }

        
        if ($type) {
            $SQL_type = " type = '" . $type . "' AND ";
        } else {
            $SQL_type = "";
        }

        if ($is_limit == false)
            $limit = false;
        else
            $limit = $is_limit;

        $query = "SELECT * FROM `dnt_registred_users` WHERE 
			parent_id = '0' AND
			status > 0 AND
			$SQL_type
			vendor_id = '" . $this->vendor->getId() . "' ORDER BY id_entity desc " . $limit . " ";

        return $query;
    }

    /**
     * 
     * @param type $type
     * @return type
     */
    public function getUserByType($type = false)
    {
        $query = $this->prepare_query($type, false);
        $pocet = $this->db->num_rows($query);
        $limit = $this->limit();

        if (isset($_GET['page']))
            $strana = $_GET['page'];
        else
            $strana = 1;

        $stranok = $pocet / $limit;
        $pociatok = ($strana * $limit) - $limit;

        $prev_page = $strana - 1;
        $next_page = $strana + 1;
        $stranok_round = ceil($stranok);

        $pager = "LIMIT " . $pociatok . ", " . $limit . "";

        $query = $this->prepare_query($type, $pager);
        if ($this->db->num_rows($query) > 0) {
            return $this->db->get_results($query);
        } else {
            return array();
        }
    }

    /**
     * 
     * @param type $id_entity
     * @return type
     */
    public function getUser($id_entity)
    {
        $query = "SELECT * FROM `dnt_registred_users` WHERE 
			vendor_id = '" . $this->vendor->getId() . "' AND
			id_entity = '" . $id_entity . "' 
			ORDER BY id_entity desc";
        if ($this->db->num_rows($query) > 0) {
            return $this->db->get_results($query);
        } else {
            return array();
        }
    }

    /**
     * 
     * @return type
     */
    public function getImage($imageId)
    {
        return $this->getFileImage($imageId);
    }

    /**
     * 
     * @return type
     */
    public function getUserTypes()
    {
        $query = "SELECT DISTINCT type FROM dnt_registred_users WHERE 
		vendor_id = '" . $this->vendor->getId() . "'
		AND type <> 'admin' 
		";
        if ($this->db->num_rows($query) > 0) {
            return $this->db->get_results($query);
        } else {
            return array();
        }
    }

    /**
     * 
     * @param type $type
     * @param type $path
     * @return string
     */
    public function addDefaultUser($type = false, $path = false)
    {
        $query = "SELECT * FROM dnt_registred_users";
        $table = "dnt_registred_users";

        foreach ($this->api->getColumns($query) as $key => $value) {
            if (
                    $value != "id" &&
                    $value != "id_entity" &&
                    $value != "vendor_id"
            ) {
                $insertedData["`" . $value . "`"] = $this->rest->post($value);
                $insertedData["`vendor_id`"] = $this->vendor->getId();
            }
        }

        $this->db->insert($table, $insertedData);
        $post_id = $this->dnt->getLastId($table);

        if ($type) {
            $this->db->update(
                    $table, //table
                    array(//set
                        'vendor_id' => $this->vendor->getId(),
                        'status' => 1,
                        'type' => $type,
                        'datetime_creat' => $this->dnt->datetime(),
                        'datetime_update' => $this->dnt->datetime(),
                        'datetime_publish' => $this->dnt->datetime(),
                    ), array(//where
                'id_entity' => $post_id,
                    )
            );
        } else {
            $this->db->update(
                    $table, //table
                    array(//set
                        'vendor_id' => $this->vendor->getId(),
                        'status' => 1,
                        'datetime_creat' => $this->dnt->datetime(),
                        'datetime_update' => $this->dnt->datetime(),
                        'datetime_publish' => $this->dnt->datetime(),
                    ), array(//where
                'id_entity' => $post_id,
                    )
            );
        }

        $return = "index.php?src=" . $this->rest->get("src") . "&action=edit&post_id=$post_id";

        if ($path) {
            $getPath = $path;
        } else {
            $getPath = "../dnt-view/data/uploads";
        }
        $this->dntUpload->addDefaultImage(
                "userfile", //input type file
                $table, //update table
                "img", //update table column
                "`id_entity`", //where column
                $post_id, //where value
                $getPath  //path
        );

        return $return;
    }

    /**
     * 
     * @param type $type
     * @param type $index
     * @return int
     */
    public function getPage($type, $index)
    {
        

        if (isset($_GET['page'])) {
            $strana = $_GET['page'];
        } else {
            $strana = 1;
        }

        $query = $this->prepare_query($type, false);
        $pocet = $this->db->num_rows($query);
        $limit = $this->limit();
        $stranok = $pocet / $limit;
        $pociatok = ($strana * $limit) - $limit;

        $stranok_round = ceil($stranok);
        $prev_page = $strana - 1;

        if ($index == "next") {
            $next_page = $strana + 1;
            if ($next_page <= $stranok_round) {
                return $next_page;
            } else {
                return $stranok_round;
            }
        } elseif ($index == "prev") {
            if ($prev_page < 1) {
                return 1;
            } else {
                return $prev_page;
            }
        } elseif ($index == "first") {
            return 1;
        } elseif ($index == "last") {

            return $stranok_round;
        } elseif ($index == "current") {
            return $strana;
        }
    }

    /**
     * 
     * @param type $type
     * @param type $index
     * @return type
     */
    public function paginator($type, $index)
    {
        $adresa = explode("?", WWW_FULL_PATH);
        if (isset($_GET['page'])) {
            $adresa_bez_page = explode("&page=" . $_GET['page'] . "", $adresa[1]); //src=obsah&page=2
            $return = $adresa_bez_page[0];
        } else {
            $return = $adresa[1]; //this function return an array
        }

        return WWW_PATH_ADMIN . "index.php?" . $return . "&page=" . $this->getPage($type, $index);
    }

}
