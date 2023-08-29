<?php

/**
 *  class       Install
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use mysqli;

class Install
{
    public function __construct()
    {
        $this->dbMysqli = new mysqli(DB_HOST, DB_USER, DB_PASS);
        $this->db = new DB();
        $this->dnt = new Dnt();
    }

    /**
     *
     * @return boolean
     */
    public function db_exists()
    {
        $database = DB_NAME;
        $query = 'SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME=?';
        $stmt = $this->dbMysqli->prepare($query);
        $stmt->bind_param('s', $database);
        $stmt->execute();
        $stmt->bind_result($data);
        if ($stmt->fetch()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    /**
     *
     * @param type $query
     * @return boolean
     */
    public function getColumns($query)
    {

        $i = 1;
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $childArr) {
                if ($i == 1) {
                    foreach ($childArr as $key => $value) {
                        if ($key != 'id' && $key != 'vendor_id') {
                            $arr[] = $key;
                        }
                    }
                    $i++;
                }
            }
            return $arr;
        } else {
            return false;
        }
    }

    /**
     *
     * @param array $tables
     * @param type $VENDOR_NAME
     * @param type $COPY_FROM
     */
    public function addVendor($tables, $VENDOR_NAME, $COPY_FROM, $VENDOR_LAYOUT = false, $DELETE_DATA = 1)
    {

        $COPY_FROM = $COPY_FROM;
        $vendor_name = $VENDOR_NAME;
        $vendor_name_url = $this->dnt->name_url($VENDOR_NAME);

        if ($VENDOR_LAYOUT) {
            $vendor_layout = $VENDOR_LAYOUT;
        } else {
            $vendor_layout = $this->dnt->name_url($VENDOR_NAME);
        }

        $insertedData = array(
            'name' => $vendor_name,
            'name_url' => $vendor_name_url,
            'layout' => $vendor_layout,
            'is_default' => 0,
        );

        $this->db->insert('dnt_vendors', $insertedData);
        $NEW_VENDOR_ID = $this->dnt->getLastIdVendor();

        foreach ($tables as $table) {
            $query = "SELECT * FROM $table WHERE vendor_id = '$COPY_FROM'";
            if ($this->db->num_rows($query) > 0) {
                $data = array();
                foreach ($this->db->get_results($query) as $row) {
                    foreach (self::getColumns($query) as $column) {
                        $data['`' . $column . '`'] = $row[$column];
                        $data['vendor_id'] = $NEW_VENDOR_ID;
                    }
                    $this->db->insert($table, $data, false);
                }
            }
        }
    }

    /**
     *
     * @param type $id
     * @param type $tables
     */
    public function delVendor($id, $tables)
    {

        foreach ($tables as $table) {
            $where = array('vendor_id' => $id);
            $this->db->delete($table, $where);
        }
        $query = "DELETE FROM `dnt_vendors` WHERE `dnt_vendors`.`id` = '$id'";
        $this->db->query($query);
    }

    /**
     *
     * @param type $id
     * @param type $move_to
     * @param type $tables
     */
    public function moveVendor($id, $move_to, $tables)
    {

        foreach ($tables as $table) {
            $where = array('vendor_id' => $id);

            $this->db->update(
                $table, //table
                array(//set
                        'vendor_id' => $move_to,
                    ),
                array(//where
                'vendor_id' => $id)
            );
        }

        $query = "UPDATE `dnt_vendors` SET `id` = '" . $move_to . "' WHERE `dnt_vendors`.`id` = $id";
        $this->db->query($query);
        $query = "UPDATE `dnt_vendors` SET `id_entity` = '" . $move_to . "' WHERE `dnt_vendors`.`id_entity` = $id";
        $this->db->query($query);
        return 'Updated';
    }

    public function updateIdEntity($tables)
    {

        foreach ($tables as $table) {
            $query = "SELECT * FROM $table WHERE 1";
            if ($this->db->num_rows($query) > 0) {
                $data = array();
                foreach ($this->db->get_results($query) as $row) {
                    $this->db->update(
                        $table, //table
                        array(//set
                                'id_entity' => $row['id'],
                            ),
                        array(//where
                        'id_entity' => 0,
                        'id' => $row['id'],
                            )
                    );

                    $qU = "UPDATE `$table` SET id_entity = '" . $row['id'] . "' WHERE id_entity = 0 AND id = '" . $row['id'] . "'";
                    $this->db->query($qU);
                }
            }
        }
    }

    /**
     * installation
     */
    public function installation()
    {

        //CREAT TABLE
        //$conn = new mysqli(DB_HOST, DB_USER, DB_PASS);
        // Check connection
        if ($this->dbMysqli->connect_error) {
            die('Connection failed: ' . $this->dbMysqli->connect_error);
        }
        // Create database
        $sql = 'CREATE DATABASE ' . DB_NAME . '';
        if ($this->dbMysqli->query($sql) === true) {
            echo 'Database created successfully';
        } else {
            echo 'Error creating database: ' . $this->dbMysqli->error;
        }
        $this->dbMysqli->close();

        //INSERT DATA
        $filename = 'install.sql';
        // Temporary variable, used to store current query
        $templine = '';
        // Read in entire file
        $lines = file($filename);
        // Loop through each line
        foreach ($lines as $line) {
            // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }

            // Add this line to the current segment
            $templine .= $line;
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';') {
                $this->db->query($templine);
                $templine = '';
            }
        }

        $addVendor = "INSERT INTO `dnt_vendors` (`id`, `name`, `name_url`, `layout`, `is_default`) VALUES
		(1, 'Skeleton', 'skeleton', 'skeleton', 1);";
        $this->db->query($addVendor);

        echo 'Data imported, vendor created';
    }

    /**
     *
     * @param type $sqlFile
     */
    public function addInstallation($sqlFile)
    {

        //INSERT DATA
        $filename = $sqlFile;
        // Temporary variable, used to store current query
        $templine = '';
        // Read in entire file
        $lines = file($filename);
        // Loop through each line
        foreach ($lines as $line) {
            // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }

            // Add this line to the current segment
            $templine .= $line;
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';') {
                $this->db->query($templine);
                $templine = '';
            }
        }
    }

    /**
     *
     * @param type $host
     * @param type $user
     * @param type $pass
     * @param type $name
     * @param type $tables
     * @param type $backup_name
     * @param type $vendor_id
     */
    public function Export_Database($host, $user, $pass, $name, $tables = false, $backup_name = false, $vendor_id = false)
    {

        $mysqli = new mysqli($host, $user, $pass, $name);
        $mysqli->select_db($name);
        $mysqli->query("SET NAMES 'utf8'");

        $queryTables = $mysqli->query('SHOW TABLES');
        while ($row = $queryTables->fetch_row()) {
            $target_tables[] = $row[0];
        }
        if ($tables !== false) {
            $target_tables = array_intersect($target_tables, $tables);
        }
        if ($vendor_id === false) {
            $vendor_where = false;
            $contentVendor = false;
        } else {
            $vendor_where = "WHERE `vendor_id` = '$vendor_id'";

            $contentVendor = false;
            $result = $mysqli->query("SELECT * FROM dnt_vendors WHERE id = $vendor_id");
            $fields_amount = $result->field_count;
            $rows_num = $mysqli->affected_rows;
            for ($i = 0, $st_counter = 0; $i < $fields_amount; $i++, $st_counter = 0) {
                while ($row = $result->fetch_row()) { //when started (and every after 100 command cycle):
                    if ($st_counter % 100 == 0 || $st_counter == 0) {
                        $contentVendor .= "\nINSERT INTO dnt_vendors VALUES";
                    }
                    $contentVendor .= "\n(";
                    for ($j = 0; $j < $fields_amount; $j++) {
                        $row[$j] = str_replace("\n", "\\n", addslashes($row[$j]));
                        if (isset($row[$j])) {
                            if ($j == 0) {
                                $contentVendor .= $vendor_id;
                            } else {
                                $contentVendor .= '"' . $row[$j] . '"';
                            }
                        } else {
                            $contentVendor .= '""';
                        }
                        if ($j < ($fields_amount - 1)) {
                            $contentVendor .= ',';
                        }
                    }
                    $contentVendor .= ')';
                    if ((($st_counter + 1) % 100 == 0 && $st_counter != 0) || $st_counter + 1 == $rows_num) {
                        $contentVendor .= ';';
                    } else {
                        $contentVendor .= ',';
                    }
                    $st_counter = $st_counter + 1;
                }
            }
        }
        foreach ($target_tables as $table) {
            $result = $mysqli->query('SELECT * FROM ' . $table . " $vendor_where");
            $fields_amount = @$result->field_count;
            $rows_num = $mysqli->affected_rows;
            $res = $mysqli->query('SHOW CREATE TABLE ' . $table);
            $TableMLine = $res->fetch_row();
            $content = (!isset($content) ? '' : $content) . "\n\n" . $TableMLine[1] . ";\n\n";

            for ($i = 0, $st_counter = 0; $i < $fields_amount; $i++, $st_counter = 0) {
                while ($row = $result->fetch_row()) { //when started (and every after 100 command cycle):
                    if ($st_counter % 100 == 0 || $st_counter == 0) {
                        $content .= "\nINSERT INTO " . $table . ' VALUES';
                    }
                    $content .= "\n(";
                    for ($j = 0; $j < $fields_amount; $j++) {
                        $row[$j] = str_replace("\n", "\\n", addslashes($row[$j]));
                        if (isset($row[$j])) {
                            if ($j == 0) {
                                $content .= 'null';
                            } else {
                                $content .= '"' . $row[$j] . '"';
                            }
                        } else {
                            $content .= '""';
                        }
                        if ($j < ($fields_amount - 1)) {
                            $content .= ',';
                        }
                    }
                    $content .= ')';
                    //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                    if ((($st_counter + 1) % 100 == 0 && $st_counter != 0) || $st_counter + 1 == $rows_num) {
                        $content .= ';';
                    } else {
                        $content .= ',';
                    }
                    $st_counter = $st_counter + 1;
                }
            } $content .= "\n\n\n";
        }

        $content = str_replace('CREATE TABLE', 'CREATE TABLE IF NOT EXISTS', $content);
        //$backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
        $backup_name = $backup_name ? $backup_name : $name . '.sql';
        /* header('Content-Type: application/octet-stream');
          header("Content-Transfer-Encoding: Binary");
          header("Content-disposition: attachment; filename=\"".$backup_name."\"");
         */
        file_put_contents($backup_name, $content . $contentVendor);
        //echo $content; exit;
    }

    public function importSql($file)
    {
        //INSERT DATA
        $filename = $file;
        // Temporary variable, used to store current query
        $templine = '';
        // Read in entire file
        $lines = file($filename);
        // Loop through each line
        foreach ($lines as $line) {
            // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }

            // Add this line to the current segment
            $templine .= $line;
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';') {
                $this->db->query($templine);
                $templine = '';
            }
        }
    }
}
