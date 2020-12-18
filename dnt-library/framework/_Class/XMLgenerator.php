<?php

/**
 *  class       XMLgenerator
 *  author      Tomas Doubek
 *  framework   Sessions
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;

class XMLgenerator
{

	public function __construct(){
		$this->db = new DB();
		$this->dnt = new Dnt();
	}
    /**
     * 
     * @param type $array
     * @return type
     */
    public function getColumn($array)
    {
        return array_keys($array);
    }

    /**
     * 
     * @param type $table
     * @param type $columns
     * @return boolean
     */
    public function getTableColumns($table, $columns)
    {
        $query = ("SELECT $columns FROM $table");
        if ($this->db->num_rows($query) > 0) {
            $columns = str_replace(" ", "", $columns);
            $array = explode(",", $columns);
            return $array;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $table
     * @param boolean $andWhere
     * @return boolean
     */
    public function getSQLData($table, $andWhere)
    {
        if ($andWhere) {
            $andWhere;
        } else {
            $andWhere = false;
        }

        $query = "SELECT id_entity FROM $table WHERE parent_id = 0 $andWhere ";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $id[] = $row['id'];
            }
        } else {
            $id = false;
        }
        return $id;
    }

    /**
     * 
     * @param type $table
     * @param type $columns
     * @param type $id
     * @return boolean
     */
    public function getTableRows($table, $columns, $id_entity)
    {
        $query = "SELECT $columns FROM $table WHERE id_entity = $id_entity";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                foreach ($this->getTableColumns($table, $columns) as $index => $value) {
                    $arr[] = $this->dnt->odstran_diakritiku($row[$index]);
                }
            }
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $input
     * @return type
     */
    public function arrayToXls($input)
    {
        // BoF
        $ret = pack('ssssss', 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);

        // array_values is used to ensure that the array is numerically indexed
        foreach (array_values($input) as $lineNumber => $row) {
            foreach (array_values($row) as $colNumber => $data) {
                if (is_numeric($data)) {
                    // number, store as such
                    $ret .= pack('sssssd', 0x203, 14, $lineNumber, $colNumber, 0x0, $data);
                } else {
                    // everything else store as string
                    $len = strlen($data);
                    $ret .= pack('ssssss', 0x204, 8 + $len, $lineNumber, $colNumber, 0x0, $len) . $data;
                }
            }
        }

        $ret .= pack('ss', 0x0A, 0x00);

        return $ret;
    }

    /**
     * 
     * @param type $table
     * @param type $columns
     * @param type $where
     * @return type
     */
    public function prepareData($table, $columns, $where)
    {
        $allId = $this->getSQLData($table, $where);
        $input[] = $this->getTableColumns($table, $columns);
        foreach ($allId as $id) {
            $input[] = $this->getTableRows($table, $columns, $id);
        }
        return $input;
    }

    /**
     * 
     * @param type $table
     * @param type $columns
     * @param type $where
     * @param type $fileName
     */
    public function creatXlsFile($table, $columns, $where, $fileName)
    {
        $input = $this->prepareData($table, $columns, $where);
        file_put_contents($fileName, $this->arrayToXls($input));
    }

    /**
     * 
     * @param type $table
     * @param type $columns
     * @param type $where
     * @param type $fileName
     */
    public function creatCsvFile($table, $columns, $where, $fileName, $columnsName = false)
    {
        $data = false;
        $data = chr(0xEF) . chr(0xBB) . chr(0xBF); //diakritika pod UTF 8
        $query = "SELECT $columns FROM $table WHERE parent_id = 0 $where";
        if ($this->db->num_rows($query) > 0) {

            $pocetStlpcov = count($this->getTableColumns($table, $columns));

            if ($columnsName) {
                $data .= str_replace(",", ";", $columnsName) . "\n";
            } else {
                $data .= implode(";", $this->getTableColumns($table, $columns)) . "\n";
            }

            foreach ($this->db->get_results($query) as $row) {
                $i = 1;
                foreach ($this->getTableColumns($table, $columns) as $column) {
                    $data .= $row[$column];

                    if ($i == $pocetStlpcov) {
                        $data .= "\n";
                    } else {
                        $data .= ";";
                    }
                    $i++;
                }
            }
        }

        if (!is_readable(dirname($fileName))) {
            mkdir(dirname($fileName));
        }
        file_put_contents($fileName, $data);
    }

    /**
     * 
     * @param type $table
     * @param type $columns
     * @param type $where
     * @param type $fileName
     */
    public function creatCsvFileStatic($table, $columns, $where, $fileName, $columnsName = false)
    {
        $data = false;
        $data = chr(0xEF) . chr(0xBB) . chr(0xBF); //diakritika pod UTF 8
        $query = "SELECT $columns FROM $table WHERE parent_id = 0 $where";
        if ($this->db->num_rows($query) > 0) {
            $data .= str_replace(" ", ";", $columns);

            if ($columnsName) {
                $data .= str_replace(",", ";", $columnsName) . "\n";
            } else {
                $data .= str_replace(" ", ";", $columns);
            }

            $data .= "\n";
            foreach ($this->db->get_results($query) as $row) {
                $data .= $row['id_entity'] . ";" . $row['vendor_id'] . ";" . $row['name'] . ";" . $row['surname'] . ";" . $row['session_id'] . ";" . $row['mesto'] . ";" . $row['psc'] . ";" . $row['email'] . ";" . $row['content'] . ";" . $row['news'] . ";" . $row['news_2'] . ";" . $row['perex'] . ";" . $row['podmienky'] . "\n";
            }
        }
        if (!is_readable(dirname($fileName))) {
            mkdir(dirname($fileName));
        }
        file_put_contents($fileName, $data);
    }

    /**
     * 
     * @param type $input
     * @param type $fileName
     */
    public function creatXlsFileFromArray($input, $fileName)
    {
        file_put_contents($fileName, $this->arrayToXls($input));
    }

}
