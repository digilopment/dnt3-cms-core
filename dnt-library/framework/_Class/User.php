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

    /**
     * 
     * @return int
     */
    public function limit()
    {
        return 30;
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

        $db = new DB;
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
			vendor_id = '" . Vendor::getId() . "' ORDER BY id_entity desc " . $limit . " ";

        return $query;
    }

    /**
     * 
     * @param type $type
     * @return type
     */
    public function getUserByType($type = false)
    {

        $db = new DB;

        $query = self::prepare_query($type, false);
        $pocet = $db->num_rows($query);
        $limit = self::limit();

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

        $query = self::prepare_query($type, $pager);
        if ($db->num_rows($query) > 0) {
            return $db->get_results($query);
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

        $db = new DB;
        $query = "SELECT * FROM `dnt_registred_users` WHERE 
			vendor_id = '" . Vendor::getId() . "' AND
			id_entity = '" . $id_entity . "' 
			ORDER BY id_entity desc";
        if ($db->num_rows($query) > 0) {
            return $db->get_results($query);
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
        return self::getFileImage($imageId);
    }

    /**
     * 
     * @return type
     */
    public function getUserTypes()
    {
        $db = new DB;
        $query = "SELECT DISTINCT type FROM dnt_registred_users WHERE 
		vendor_id = '" . Vendor::getId() . "'
		AND type <> 'admin' 
		";
        if ($db->num_rows($query) > 0) {
            return $db->get_results($query);
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
        $user = new Api;
        $rest = new Rest;
        $db = new DB;

        foreach ($user->getColumns($query) as $key => $value) {
            if (
                    $value != "id" &&
                    $value != "id_entity" &&
                    $value != "vendor_id"
            ) {
                $insertedData["`" . $value . "`"] = $rest->post($value);
                $insertedData["`vendor_id`"] = Vendor::getId();
            }
        }

        $db->insert($table, $insertedData);
        $post_id = Dnt::getLastId($table);

        if ($type) {
            $db->update(
                    $table, //table
                    array(//set
                        'vendor_id' => Vendor::getId(),
                        'status' => 1,
                        'type' => $type,
                        'datetime_creat' => Dnt::datetime(),
                        'datetime_update' => Dnt::datetime(),
                        'datetime_publish' => Dnt::datetime(),
                    ), array(//where
                'id_entity' => $post_id,
                    )
            );
        } else {
            $db->update(
                    $table, //table
                    array(//set
                        'vendor_id' => Vendor::getId(),
                        'status' => 1,
                        'datetime_creat' => Dnt::datetime(),
                        'datetime_update' => Dnt::datetime(),
                        'datetime_publish' => Dnt::datetime(),
                    ), array(//where
                'id_entity' => $post_id,
                    )
            );
        }

        $return = "index.php?src=" . $rest->get("src") . "&action=edit&post_id=$post_id";

        if ($path) {
            $getPath = $path;
        } else {
            $getPath = "../dnt-view/data/uploads";
        }
        $dntUpload = new DntUpload;
        $dntUpload->addDefaultImage(
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
        $db = new DB;

        if (isset($_GET['page'])) {
            $strana = $_GET['page'];
        } else {
            $strana = 1;
        }

        $query = self::prepare_query($type, false);
        $pocet = $db->num_rows($query);
        $limit = self::limit();
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

        return WWW_PATH_ADMIN . "index.php?" . $return . "&page=" . self::getPage($type, $index);
    }

}
