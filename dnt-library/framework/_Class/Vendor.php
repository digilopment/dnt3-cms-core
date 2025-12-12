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

        $hosts = explode('.', @$_SERVER['HTTP_HOST']);
        $host = $hosts[0];

        if ($host == 'www') {
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
     * @param string $url
     * @return string|false
     */
    public function getProtocolFromUrl(string $url)
    {
        $tmp = explode('//', $url);
        $protocol = $tmp[0] ?? '';
        if ($protocol === 'http:' || $protocol === 'https:') {
            return $protocol . '//';
        }
        return false;
    }

    /**
     *
     * @param string $url
     * @return string|false
     */
    public function getDomainFromUrl(string $url)
    {
        $tmp = explode('://', $url);
        if (isset($tmp[1])) {
            return $tmp[1];
        } else {
            return false;
        }
    }

    /**
     *
     * @return int
     */
    public static function getId(): int
    {
        if (isset($GLOBALS['VENDOR_ID']) && $GLOBALS['VENDOR_ID']) {
            return (int)$GLOBALS['VENDOR_ID'];
        }
        $GLOBALS['VENDOR_ID'] = 0;
        return 0;
    }

    /**
     *
     * @return string|false
     */
    public static function getLayout()
    {
        if (isset($GLOBALS['VENDOR_LAYOUT']) && $GLOBALS['VENDOR_LAYOUT']) {
            return $GLOBALS['VENDOR_LAYOUT'];
        }
        return false;
    }

    /**
     *
     * @return array
     */
    public function getLayouts(): array
    {
        $layouts = [];
        $dir = '../dnt-view/layouts/';
        if (!is_dir($dir)) {
            return $layouts;
        }
        $files = scandir($dir);
        if ($files === false) {
            return $layouts;
        }
        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }
            if (is_dir($dir . $file)) {
                $layouts[] = $file;
            }
        }

        return $layouts;
    }

    /**
     *
     * @return array
     */
    public function getAll(): array
    {
        $db = new DB();

        $query = 'SELECT * FROM `dnt_vendors` order by id_entity asc';

        if ($db->num_rows($query) > 0) {
            return $db->get_results($query);
        }
        return [];
    }

    /**
     *
     * @param string $column
     * @return mixed|false
     */
    public function getColumn(string $column)
    {
        $db = new DB();
        $query = 'SELECT `' . $db->escape($column) . "` FROM `dnt_vendors` WHERE 
			`id_entity` = '" . $this->getId() . "'
			";
        $return = false;
        if ($db->num_rows($query) > 0) {
            $results = $db->get_results($query);
            if (!empty($results)) {
                $return = $results[0][$column] ?? false;
            }
        }

        return $return;
    }
}
