<?php
/**
 *  class       XMLgenerator
 *  author      Tomas Doubek
 *  framework   Sessions
 *  package     dnt3
 *  date        2017
 */
class XMLgenerator {

    /**
     * 
     * @param type $array
     * @return type
     */
    public function getColumn($array) {
        return array_keys($array);
    }

    /**
     * 
     * @param type $table
     * @param type $columns
     * @return boolean
     */
    public function getTableColumns($table, $columns) {

        $db = new DB();
        $query = ("SELECT $columns FROM $table");
        if ($db->num_rows($query) > 0) {
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
    public function getSQLData($table, $andWhere) {
        $db = new DB();

        if ($andWhere) {
            $andWhere;
        } else {
            $andWhere = false;
        }

        $query = "SELECT id FROM $table WHERE parent_id = 0 $andWhere ";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
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
    public function getTableRows($table, $columns, $id) {
        $db = new DB();
        $query = "SELECT $columns FROM $table WHERE id = $id";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                foreach ($this->getTableColumns($table, $columns) as $index => $value) {
                    $arr[] = odstran_diakritiku($row[$index]);
                }
            }
            return $arr;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $input
     * @return type
     */
    public function arrayToXls($input) {
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
    public function prepareData($table, $columns, $where) {
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
    public function creatXlsFile($table, $columns, $where, $fileName) {
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
    public function creatCsvFile($table, $columns, $where, $fileName) {
        $db = new DB();
        $data = false;
        $query = "SELECT $columns FROM $table WHERE parent_id = 0 $where";
        if ($db->num_rows($query) > 0) {

            $pocetStlpcov = count($this->getTableColumns($table, $columns));
            $data .= implode(";", $this->getTableColumns($table, $columns)) . "\n";
            foreach ($db->get_results($query) as $row) {
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
        file_put_contents($fileName, $data);
    }

    /**
     * 
     * @param type $table
     * @param type $columns
     * @param type $where
     * @param type $fileName
     */
    public function creatCsvFileVyhrat($table, $columns, $where, $fileName) {
        $db = new DB();
        $data = false;
        $query = "SELECT $columns FROM $table WHERE parent_id = 0 $where";
        if ($db->num_rows($query) > 0) {
            $data .= str_replace(" ", ";", $columns);
            $data .= "\n";
            foreach ($db->get_results($query) as $row) {
                $data .= $row['id'] . ";" . $row['competition_id'] . ";" . $row['meno'] . ";" . $row['priezvisko'] . ";" . $row['uniq_id'] . ";" . $row['mesto'] . ";" . $row['psc'] . ";" . $row['email'] . ";" . $row['odpoved'] . ";" . $row['news'] . ";" . $row['news_2'] . ";" . $row['custom_1'] . "\n";
            }
        }
        file_put_contents($fileName, odstran_diakritiku($data));
    }

    /**
     * 
     * @param type $input
     * @param type $fileName
     */
    public function creatXlsFileFromArray($input, $fileName) {
        file_put_contents($fileName, $this->arrayToXls($input));
    }

}
