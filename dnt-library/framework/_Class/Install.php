<?php
/**
 *  class       Install
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
Class Install {

    /**
     * 
     * @return boolean
     */
    public static function db_exists() {

        //$conn = new mysqli(DB_HOST, DB_USER, DB_PASS);

        $db = new mysqli(DB_HOST, DB_USER, DB_PASS);
        $database = DB_NAME;
        $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME=?";
        $stmt = $db->prepare($query);
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
    public static function getColumns($query) {
        $db = new DB();
        $i = 1;
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $childArr) {
                if ($i == 1) {
                    foreach ($childArr as $key => $value) {
                        if ($key != "id" && $key != "vendor_id") {
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
    public static function addVendor($tables, $VENDOR_NAME, $COPY_FROM, $VENDOR_LAYOUT = false, $DELETE_DATA = 1) {
        $db = new Db;
        //SETTINGS
        $COPY_FROM = $COPY_FROM;
        $vendor_name = $VENDOR_NAME;
        $vendor_name_url = Dnt::name_url($VENDOR_NAME);
        
		if($VENDOR_LAYOUT){
			$vendor_layout = $VENDOR_LAYOUT;
		}else{
			$vendor_layout = Dnt::name_url($VENDOR_NAME);
		}
		

        $insertedData = array(
            'name' => $vendor_name,
            'name_url' => $vendor_name_url,
            'layout' => $vendor_layout,
            'is_default' => 0,
        );
        $db->insert('dnt_vendors', $insertedData);
        $NEW_VENDOR_ID = $db->lastid();

        foreach ($tables as $table) {
            //tabulka
            $query = "SELECT * FROM $table WHERE vendor_id = '$COPY_FROM'";
            if ($db->num_rows($query) > 0) {
                $data = array();
                foreach ($db->get_results($query) as $row) {

                    //stlpce
                    foreach (self::getColumns($query) as $column) {
                        $data["`" . $column . "`"] = $row[$column];
                        $data["vendor_id"] = $NEW_VENDOR_ID;
                        //echo "OK" . $column . "<br/>";
                    }
                    $db->insert($table, $data);
                    //var_dump($data);
                    //echo "OK <hr/>";
                }
            }
            echo "<hr/>";
            echo "<hr/>";
        }

        //DELETE DATA FROM
		/*
		if($DELETE_DATA == 1){
			$tables = array(
				"dnt_logs",
				"dnt_mailer_mails",
				"dnt_mailer_type",
				"dnt_polls",
				"dnt_polls_composer",
				"dnt_posts",
				"dnt_posts_meta",
				"dnt_post_type",
				"dnt_uploads",
			);
		}else{
			$tables = array(
				false
			);
		}
        foreach ($tables as $table) {
            $where = array('vendor_id' => $NEW_VENDOR_ID);
            $db->delete($table, $where);
        }

        //INSERT POST_TYPE FROM
        $query = "
		INSERT INTO `dnt_post_type` (`id`, `cat_id`, `sub_cat_id`, `name_url`, `admin_cat`, `name`, `show`, `order`, `vendor_id`, `parent_id`) VALUES 
		(NULL, '1', '0', 'sitemap', 'sitemap', 'Stránky', '1', '0', '$NEW_VENDOR_ID ', '0'),
		(NULL, '1', '0', 'sitemap-sub', 'sitemap', 'Podstránky', '1', '0', '$NEW_VENDOR_ID ', '0'),
		(NULL, '1', '0', 'article', 'sitemap', 'Články', '1', '0', '$NEW_VENDOR_ID ', '0'),
		(NULL, '3', '0', 'newsletter', 'post', 'Newslettre', '1', '0', '$NEW_VENDOR_ID ', '0'),
		(NULL, '2', '0', 'domace', 'article', 'Domáce', '1', '0', '$NEW_VENDOR_ID ', '0')
		";
        $db->query($query);
		*/
    }

    /**
     * 
     * @param type $id
     * @param type $tables
     */
    public static function delVendor($id, $tables) {

        $db = new Db;

        foreach ($tables as $table) {
            $where = array('vendor_id' => $id);
            $db->delete($table, $where);
        }
        $query = "
		DELETE FROM `dnt_vendors` WHERE `dnt_vendors`.`id` = '$id';
		";
        $db->query($query);

        echo "Deleted";
    }

    /**
     * 
     * @param type $id
     * @param type $move_to
     * @param type $tables
     */
    public static function moveVendor($id, $move_to, $tables) {

        $db = new Db;

        foreach ($tables as $table) {
            $where = array('vendor_id' => $id);

            $db->update(
                    $table, //table
                    array(//set
                'vendor_id' => $move_to,
                    ), array(//where
                'vendor_id' => $id)
            );
        }



        $query = "
		UPDATE `dnt_vendors` SET `id` = '" . $move_to . "' WHERE `dnt_vendors`.`id` = $id
		";
        $db->query($query);

        echo "Updated";
    }

    /**
     * installation
     */
    public static function installation() {

        //CREAT TABLE
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Create database
        $sql = "CREATE DATABASE " . DB_NAME . "";
        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
        }
        $conn->close();

        $db = new Db;


        //INSERT DATA
        $filename = 'install.sql';
        // Temporary variable, used to store current query
        $templine = '';
        // Read in entire file
        $lines = file($filename);
        // Loop through each line
        foreach ($lines as $line) {
            // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '')
                continue;

            // Add this line to the current segment
            $templine .= $line;
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';') {
                $db->query($templine);
                $templine = '';
            }
        }

        $addVendor = "INSERT INTO `dnt_vendors` (`id`, `name`, `name_url`, `layout`, `is_default`) VALUES
		(1, 'Skeleton', 'skeleton', 'skeleton', 1);";
        $db->query($addVendor);

        echo "Data imported, vendor created";
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
    public static function Export_Database($host, $user, $pass, $name, $tables = false, $backup_name = false, $vendor_id = false) {

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
        if ($vendor_id == false) {
            $vendor_where = false;
        } else {
            $vendor_where = "WHERE `vendor_id` = '$vendor_id'";
        }
        foreach ($target_tables as $table) {
            $result = $mysqli->query("SELECT * FROM " . $table . " $vendor_where");
            $fields_amount = $result->field_count;
            $rows_num = $mysqli->affected_rows;
            $res = $mysqli->query('SHOW CREATE TABLE ' . $table);
            $TableMLine = $res->fetch_row();
            $content = (!isset($content) ? '' : $content) . "\n\n" . $TableMLine[1] . ";\n\n";

            for ($i = 0, $st_counter = 0; $i < $fields_amount; $i++, $st_counter = 0) {
                while ($row = $result->fetch_row()) { //when started (and every after 100 command cycle):
                    if ($st_counter % 100 == 0 || $st_counter == 0) {
                        $content .= "\nINSERT INTO " . $table . " VALUES";
                    }
                    $content .= "\n(";
                    for ($j = 0; $j < $fields_amount; $j++) {
                        $row[$j] = str_replace("\n", "\\n", addslashes($row[$j]));
                        if (isset($row[$j])) {
                            $content .= '"' . $row[$j] . '"';
                        } else {
                            $content .= '""';
                        }
                        if ($j < ($fields_amount - 1)) {
                            $content .= ',';
                        }
                    }
                    $content .= ")";
                    //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                    if ((($st_counter + 1) % 100 == 0 && $st_counter != 0) || $st_counter + 1 == $rows_num) {
                        $content .= ";";
                    } else {
                        $content .= ",";
                    }
                    $st_counter = $st_counter + 1;
                }
            } $content .= "\n\n\n";
        }
        //$backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
        $backup_name = $backup_name ? $backup_name : $name . ".sql";
        /* header('Content-Type: application/octet-stream');   
          header("Content-Transfer-Encoding: Binary");
          header("Content-disposition: attachment; filename=\"".$backup_name."\"");
         */
        file_put_contents($backup_name, $content);
        //echo $content; exit;
    }
	
	public function importSql($file){
		//INSERT DATA
        $filename = $file;
        // Temporary variable, used to store current query
        $templine = '';
        // Read in entire file
        $lines = file($filename);
        // Loop through each line
        foreach ($lines as $line) {
            // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '')
                continue;

            // Add this line to the current segment
            $templine .= $line;
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';') {
                $db->query($templine);
                $templine = '';
            }
        }
	}

}
