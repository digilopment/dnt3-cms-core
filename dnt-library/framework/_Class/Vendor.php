<?php

/**
 *  class       Vendor
 *  author      Tomas Doubek
 *  framework   Dnt3
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\DB;

class Vendor
{

    /**
     * 
     * @return type
     */
    public static function getVendorUrl()
    {

        $hosts = explode(".", @$_SERVER['HTTP_HOST']);
        $host = $hosts[0];

        if ($host == "www") {
            $vendorUrl = $hosts[1];
        } elseif ($host == @$_SERVER['HTTP_HOST']) { //ak nie je subdomena, tak vrati false
            $vendorUrl = false;
        } else {
            $vendorUrl = $host;
        }

        return $vendorUrl;
    }

    /**
     * new method
     * @return boolean
     */
    public function getProtocolFromUrl($url)
    {
        $tmp = explode("//", $url);
        $tmp = $tmp[0];
        if ($tmp == "http:" || "https:") {
            return $tmp . "//";
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $url
     * @return boolean
     */
    public function getDomainFromUrl($url)
    {
        $tmp = explode("://", $url);
        if (isset($tmp[1])) {
            return $tmp[1];
        } else {
            return false;
        }
    }

    /**
     * 
     * @return boolean
     */
    public static function getId()
    {
        if ($GLOBALS['VENDOR_ID']) {
            return $GLOBALS['VENDOR_ID'];
        } else {
            $GLOBALS['VENDOR_ID'] = 0;
            return $GLOBALS['VENDOR_ID'];
        }
    }

    /**
     * 
     * @return boolean
     */
    public static function getLayout()
    {
        if ($GLOBALS['VENDOR_LAYOUT']) {
            return $GLOBALS['VENDOR_LAYOUT'];
        }
    }

    /**
     * 
     * @return type
     */
    public function getLayouts()
    {
        $layouts = array();
        $files = scandir('../dnt-view/layouts/');
        foreach ($files as $file) {
            if ($file == "." || $file == "..") {
                continue;
            } else {
                $layouts[] = $file;
            }
        }

        return $layouts;
    }

    /**
     * 
     * @return type
     */
    public function getAll()
    {
        $db = new DB();

        $query = "SELECT * FROM `dnt_vendors` order by id_entity asc";

        if ($db->num_rows($query) > 0) {
            return $db->get_results($query);
        } else {
            return array();
        }
    }

    /**
     * 
     * @param type $column
     * @return boolean
     */
    public function getColumn($column)
    {
        $db = new DB;
        $query = "SELECT `" . $column . "` FROM `dnt_vendors` WHERE 
			`id_entity` = '" . Vendor::getId() . "'
			";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $return = $row[$column];
            }
        } else {
            $return = false;
        }

        return $return;
    }

}
