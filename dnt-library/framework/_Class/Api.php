<?php

/**
 *  class       Api
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\DB;
use DntLibrary\Base\Vendor;
use SimpleXMLElement;

class Api
{

    protected $columns;

    /**
     * 
     * @return type
     */
    public function getAll()
    {
        $db = new DB();
        $query = "SELECT * FROM dnt_api WHERE vendor_id = '" . Vendor::getId() . "'";
        if ($db->num_rows($query) > 0) {
            return $db->get_results($query);
        } else {
            return array();
        }
    }

    /**
     * 
     * @param type $query
     * @return boolean
     */
    public function getColumns($query)
    {
        $db = new DB();
        $i = 1;
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $childArr) {
                if ($i == 1) {
                    foreach ($childArr as $key => $value) {
                        $arr[] = $key;
                    }
                    $i++;
                }
            }
            $this->columns = $arr;
        } else {
            $this->columns = false;
        }
    }

    /**
     * 
     * @param type $name_url
     * @param type $id
     * @param type $getQuery
     * @return boolean
     */
    public function getQuery($name_url, $id, $getQuery)
    {
        if ($getQuery) {
            return urldecode($getQuery);
        } else {
            $db = new DB();
            $query = "SELECT query FROM dnt_api WHERE `id_entity` = '$id' AND `name_url` = '$name_url' AND vendor_id = '" . Vendor::getId() . "'";
            if ($db->num_rows($query) > 0) {
                foreach ($db->get_results($query) as $row) {
                    return $row['query'];
                }
            } else {
                return false;
            }
        }
    }

    /**
     * 
     * @param type $query
     */
    public function getXmlData($query)
    {
        $xml = new SimpleXMLElement('<items/>');
        $db = new DB;
        $this->getColumns($query);
        $count = $db->num_rows($query);

        if ($count > 0) {
            foreach ($db->get_results($query) as $row) {
                $track = $xml->addChild('item');
                foreach ($this->columns as $column) {
                    $track->addChild($column, html_entity_decode($row[$column]));
                }
            }
            print($xml->asXML());
        }
    }

    /**
     * 
     * @param type $query
     */
    public function getJsonData($query)
    {
        $db = new DB;
        $count = $db->num_rows($query);

        if ($count > 0) {
            $data['items'] = $db->get_results($query);
            echo json_encode($data);
        }
    }

}
