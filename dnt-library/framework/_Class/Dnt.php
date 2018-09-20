<?php
/**
 *  class       Dnt
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 *  This is std static class
 */
class Dnt {

    /**
     * 
     * @param type $table
     * @return boolean
     */
    public static function getLastId($table) {
        $db = new Db;
        $query = "SELECT MAX(id) FROM " . $table . " WHERE 
	vendor_id = '" . Vendor::getId() . "'";


        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $return = $row['MAX(id)'];
            }
        } else {
            $return = false;
        }
        return $return;
    }
	
	public static function getLastIdVendor() {
        $db = new Db;
        $query = "SELECT MAX(id) FROM dnt_vendors ";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $return = $row['MAX(id)'];
            }
        } else {
            $return = false;
        }
        return $return;
    }
	
	public static function getIdEntity($lastId) {
		$db = new Db;
		$db->update(
			'dnt_posts',	//table
			array(	//set
				'id_entity' => $lastId
				), 
			array( 	//where
				'id' => $lastId
			)
		);
	}

    /**
     * 
     * @param type $link
     * @return type
     */
    public static function cislo($link) {
        return preg_replace("/[^0-9]/", "", $link);
    }

    /**
     * 
     * @param type $column
     * @return type
     */
    public static function showStatus($column) {
        $rest = new Rest;
        if ($rest->isAdmin()) {
            //return "`show` = '1' or `show` = '2'";
            return "`$column` >= '0'";
        } else {
            return "`$column` = '1' or `$column` = '2'";
        }
    }

    /**
     * 
     * @return type
     */
    public static function datetime() {
        return date("Y-m-d H:i:s");
    }
    
    /**
     * 
     * @return type
     */
    public static function timestamp() {
        return time();
    }

    /**
     * 
     * @param type $separator
     * @param type $time
     * @return type
     */
    public static function timeToDbFormat($separator, $time) {
        $dateAndTime = explode(" ", $time);
        $data = explode($separator, $dateAndTime[0]);
        return $data[2] . "-" . $data[1] . "-" . $data[0] . " " . $dateAndTime[1] . ":00";
    }

    /**
     * 
     * @param type $time
     * @param type $format
     * @return type
     */
    public static function formatTime($time, $format) {
        $date = date_create($time);
        return date_format($date, $format);
    }

    /**
     * 
     * @param type $cislo
     * @return type
     */
    public static function dvojcifernyDatum($cislo) {
        if (strlen($cislo) > 2) {
            $return = $cislo;
        } else {
            if (strlen($cislo) == 1) {
                $return = "0" . $cislo;
            } else {
                $return = $cislo;
            }
        }
        return $return;
    }

    /**
     * 
     * @param type $pharse
     * @param type $str
     * @return type
     */
    public static function in_string($pharse, $str) {
        return preg_match('/' . $pharse . '/', $str);
        //return preg_match("/".$pharse."\b/i", "".$str."");
    }

    /**
     * 
     * @param type $link
     * @return type
     */
    public static function desatinne_cislo($link) {
        $link = str_replace(",", ".", $link);
        return preg_replace("/[^0-9\.]/", "", $link);
    }

    /**
     * 
     * @param type $pocetZnakov
     * @return type
     */
    public static function generujHeslo($pocetZnakov) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars), 0, $pocetZnakov);
    }

    /**
     * 
     * @return type
     */
    public static function microtimeSec() {
        list($usec, $sec) = explode(" ", microtime());
        $tmp = ((float) $usec + (float) $sec);
        $tmp1 = explode(".", $tmp);
        $tmp0 = $tmp1[0];
        return $tmp0;
    }

    /**
     * 
     * @return type
     */
    public static function is_mobile() {
        return preg_match("/(android|iPhone|iPod|iPad|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }

    /**
     * 
     * @param type $file
     * @return type
     */
    public static function getPripona($file) {
        return pathinfo($file, PATHINFO_EXTENSION);
    }

    /**
     * 
     * @param type $src
     * @param type $dst
     */
    public static function recurse_copy($src, $dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (is_dir($src . '/' . $file)) {
                    recurse_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    /**
     * 
     * @return type
     */
    public static function get_datum() {
        return $get_datum = "" . date("d") . "." . date("m") . "." . date("Y") . "";
    }

    /**
     * 
     * @return type
     */
    public static function get_rok() {
        return $get_rok = date("Y");
    }

    /**
     * 
     * @return type
     */
    public static function get_mesiac() {
        return $get_mesiac = date("m");
    }

    /**
     * 
     * @return type
     */
    public static function get_ip() {
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * 
     * @return type
     */
    public static function get_den() {
        return $get_den = date("d");
    }

    /**
     * 
     * @return type
     */
    public static function get_cas() {
        return $get_cas = date('H:i:s');
    }

    /**
     * 
     * @return string
     */
    public static function get_os() {
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/Android/', $agent))
            $os = 'Android';
        elseif (preg_match('/Win/', $agent))
            $os = 'Windows';
        elseif (preg_match('/Mac/', $agent))
            $os = 'Mac';
        elseif (preg_match('/BlackBerry/', $agent))
            $os = 'BlackBerry';
        elseif (preg_match('/Linux/', $agent))
            $os = 'Linux';
        elseif (preg_match('/iPhone|iPod|iPad/', $agent))
            $os = 'iPhone|iPod|iPad';
        else
            $os = 'Nerozpoznaný OS';
        return $os;
    }

    /**
     * 
     * @param type $dlzka
     * @return type
     */
    public static function set_rand_string($dlzka = 10) {
        $retazec = "";
        $nahodne = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
        for ($i = 0; $i < $dlzka; $i++) {
            $retazec .= substr($nahodne, rand(0, strlen($nahodne) - 1), 1);
            // vrati true/false
        }
        return $retazec;
        //echo nahodny_retazec($dlzka = 10);
    }

    /**
     * 
     * @return type
     */
    public static function set_four_one() {
        return "" . rand(1, 9) . "" . rand(1, 9) . "" . rand(1, 9) . "" . rand(1, 9) . "";
    }

    /**
     * 
     * @param type $url_adresa
     * @return type
     */
    public static function name_url($url_adresa) {
        # všetky znaky, ktoré v unicode nie sú písmená, čísla alebo podtržítka nahradíme pomlčkou
        $url_adresa = preg_replace('/[^\pL0-9_]+/u', '-', $url_adresa);
        # trimneme pomlčky
        $url_adresa = trim($url_adresa, '-');
        # urobíme translit diakritiky (č sa stane c, á sa stane a ...)
        $url_adresa = iconv('utf-8', 'ASCII//TRANSLIT', $url_adresa);
        # prevod na lowercase
        $url_adresa = strtolower($url_adresa);
        # vyhodíme všetko, čo nie je pomlčka, písmeno, číslo alebo podtržítko
        $url_adresa = preg_replace('/[^-a-z0-9_]+/', '', $url_adresa);

        return $url_adresa;
    }

    /**
     * 
     * @param type $name_url
     * @return boolean
     */
    public static function is_external_url($name_url) {
        //$name_url = str_replace("/", "\/", $name_url);
        if (self::in_string("http:\/\/", $name_url)) {
            $return = true;
        }
        //https protocol
        elseif (self::in_string("https:\/\/", $name_url)) {
            $return = true;
        }
        //protocol relative
        elseif (self::in_string("\/\/", $name_url)) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * 
     * @param type $name
     * @param type $name_url
     * @return type
     */
    public static function creat_name_url($name, $name_url) {


        if (empty($name_url)) {
            return self::name_url($name);
        } elseif (self::in_string("#", $name_url)) {
            return $name_url;
        }
        //http is_external_url
        elseif (self::is_external_url($name_url)) {
            return $name_url;
        } else {
            return self::name_url($name_url);
        }
    }

    /**
     * 
     * @param type $presmeruj_url
     */
    public static function redirect($presmeruj_url) {
        if (!headers_sent()) {
            header('Location: ' . $presmeruj_url);
        } else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . $presmeruj_url . '"';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url=' . $presmeruj_url . '" />';
        }
    }

    /**
     * 
     * @param type $presmeruj_url
     */
    public static function presmeruj_url_by_js($presmeruj_url) {
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $presmeruj_url . '"';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=' . $presmeruj_url . '" />';
    }
    
    /**
     * 
     * @param type $str
     * @return type
     */
    public static function safe($str) {
        if (is_array($str))
            return array_map(__METHOD__, $str);

        if (!empty($str) && is_string($str)) {
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $str);
        }

        return $str = mysql_real_escape_string($str);
    }

    /**
     * 
     * @param string $str
     * @param type $zobraz_znakov
     * @return string
     */
    public static function obsah_uvod($str, $zobraz_znakov) {
        //return htmlspecialchars($str); 
        if (strlen($str) > $zobraz_znakov)
            return "" . $str = substr($str, 0, $zobraz_znakov) . "...";
        elseif (strlen($str) > 5)
            return $str;
        else
            return "Tento príspevok nemá žiaden náhľad článku, pretože sa jeho obsah pravdepodobne skladá z multymediálneho obsahu. Prosím kliknite na <b>čítať viac</b> a môžete prezerať vami vybraný obsah.";
    }

    /**
     * 
     * @param type $input
     * @param type $maxWords
     * @param type $maxChars
     * @return type
     */
    public static function get_perex($input, $maxWords, $maxChars) {
        $words = preg_split('/\s+/', $input);
        $words = array_slice($words, 0, $maxWords);
        $words = array_reverse($words);

        $chars = 0;
        $truncated = array();

        while (count($words) > 0) {
            $fragment = trim(array_pop($words));
            $chars += strlen($fragment);

            if ($chars > $maxChars)
                break;

            $truncated[] = $fragment;
        }

        $result = implode($truncated, ' ');

        if ($input == $result) {
            return $input;
        } else {
            return preg_replace('/[^\w]$/', '', $result) . '...';
        }
    }

    /**
     * 
     * @param type $str
     * @param type $maxPocetSlov
     * @return type
     */
    public static function perex($str, $maxPocetSlov) {
        $str = not_html($str);
        $slova = explode(" ", $str);
        $pocetSlov = count($slova);

        for ($i = 0; $i < $maxPocetSlov; $i++) {
            $return .= " " . $slova[$i];
        }

        return $return . "...";
    }

    /**
     * 
     * @param type $str
     * @return type
     */
    public static function not_html($str) {
        //return htmlspecialchars($str); 
        $str = strip_tags($str);
        $str = trim($str);
        return $str;
    }

    /**
     * 
     * @param type $email
     * @return boolean
     */
    public static function is_email($email) {
        if ($email == "")
            return true;
        elseif (preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$/", $email))
            return true;
        else
            return false;
    }
    
    /**
     * 
     * @param type $iban
     * @return boolean
     */
    public static function is_iban($iban) {
        $iban = strtolower(str_replace(' ', '', $iban));
        $Countries = array('al' => 28, 'ad' => 24, 'at' => 20, 'az' => 28, 'bh' => 22, 'be' => 16, 'ba' => 20, 'br' => 29, 'bg' => 22, 'cr' => 21, 'hr' => 21, 'cy' => 28, 'cz' => 24, 'dk' => 18, 'do' => 28, 'ee' => 20, 'fo' => 18, 'fi' => 18, 'fr' => 27, 'ge' => 22, 'de' => 22, 'gi' => 23, 'gr' => 27, 'gl' => 18, 'gt' => 28, 'hu' => 28, 'is' => 26, 'ie' => 22, 'il' => 23, 'it' => 27, 'jo' => 30, 'kz' => 20, 'kw' => 30, 'lv' => 21, 'lb' => 28, 'li' => 21, 'lt' => 20, 'lu' => 20, 'mk' => 19, 'mt' => 31, 'mr' => 27, 'mu' => 30, 'mc' => 27, 'md' => 24, 'me' => 22, 'nl' => 18, 'no' => 15, 'pk' => 24, 'ps' => 29, 'pl' => 28, 'pt' => 25, 'qa' => 29, 'ro' => 24, 'sm' => 27, 'sa' => 24, 'rs' => 22, 'sk' => 24, 'si' => 19, 'es' => 24, 'se' => 24, 'ch' => 21, 'tn' => 24, 'tr' => 26, 'ae' => 23, 'gb' => 22, 'vg' => 24);
        $Chars = array('a' => 10, 'b' => 11, 'c' => 12, 'd' => 13, 'e' => 14, 'f' => 15, 'g' => 16, 'h' => 17, 'i' => 18, 'j' => 19, 'k' => 20, 'l' => 21, 'm' => 22, 'n' => 23, 'o' => 24, 'p' => 25, 'q' => 26, 'r' => 27, 's' => 28, 't' => 29, 'u' => 30, 'v' => 31, 'w' => 32, 'x' => 33, 'y' => 34, 'z' => 35);

        if (strlen($iban) == $Countries[substr($iban, 0, 2)]) {

            $MovedChar = substr($iban, 4) . substr($iban, 0, 4);
            $MovedCharArray = str_split($MovedChar);
            $NewString = "";

            foreach ($MovedCharArray AS $key => $value) {
                if (!is_numeric($MovedCharArray[$key])) {
                    $MovedCharArray[$key] = $Chars[$MovedCharArray[$key]];
                }
                $NewString .= $MovedCharArray[$key];
            }

            if (bcmod($NewString, '97') == 1) {
                $iban = 1;
            } else {
                $iban = 0;
            }
        } else {
            $iban = 0;
        }

        if ($iban == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $facebook_profil
     * @return boolean
     */
    public static function is_facebook_profil($facebook_profil) {
        list($facebook_url, $facebook_user) = explode(".com/", $facebook_profil);
        if ($facebook_profil == "") {
            return false; //empty filed
        } elseif ($facebook_url != "https://www.facebook") {
            return false; //first part is not facebook
        } else {
            return true; //OK 
        }
    }

    /**
     * 
     * @param type $text
     * @return type
     */
    public static function odstran_diakritiku($text) {
        $prevodni_tabulka = Array(
            'ä' => 'a',
            'Ä' => 'A',
            'á' => 'a',
            'Á' => 'A',
            'à' => 'a',
            'À' => 'A',
            'ã' => 'a',
            'Ã' => 'A',
            'â' => 'a',
            'Â' => 'A',
            'č' => 'c',
            'Č' => 'C',
            'ć' => 'c',
            'Ć' => 'C',
            'ď' => 'd',
            'Ď' => 'D',
            'ě' => 'e',
            'Ě' => 'E',
            'é' => 'e',
            'É' => 'E',
            'ë' => 'e',
            'Ë' => 'E',
            'è' => 'e',
            'È' => 'E',
            'ê' => 'e',
            'Ê' => 'E',
            'í' => 'i',
            'Í' => 'I',
            'ï' => 'i',
            'Ï' => 'I',
            'ì' => 'i',
            'Ì' => 'I',
            'î' => 'i',
            'Î' => 'I',
            'ľ' => 'l',
            'Ľ' => 'L',
            'ĺ' => 'l',
            'Ĺ' => 'L',
            'ń' => 'n',
            'Ń' => 'N',
            'ň' => 'n',
            'Ň' => 'N',
            'ñ' => 'n',
            'Ñ' => 'N',
            'ó' => 'o',
            'Ó' => 'O',
            'ö' => 'o',
            'Ö' => 'O',
            'ô' => 'o',
            'Ô' => 'O',
            'ò' => 'o',
            'Ò' => 'O',
            'õ' => 'o',
            'Õ' => 'O',
            'ő' => 'o',
            'Ő' => 'O',
            'ř' => 'r',
            'Ř' => 'R',
            'ŕ' => 'r',
            'Ŕ' => 'R',
            'š' => 's',
            'Š' => 'S',
            'ś' => 's',
            'Ś' => 'S',
            'ť' => 't',
            'Ť' => 'T',
            'ú' => 'u',
            'Ú' => 'U',
            'ů' => 'u',
            'Ů' => 'U',
            'ü' => 'u',
            'Ü' => 'U',
            'ù' => 'u',
            'Ù' => 'U',
            'ũ' => 'u',
            'Ũ' => 'U',
            'û' => 'u',
            'Û' => 'U',
            'ý' => 'y',
            'Ý' => 'Y',
            'ž' => 'z',
            'Ž' => 'Z',
            'ź' => 'z',
            'Ź' => 'Z'
        );

        $text = strtr($text, $prevodni_tabulka);
        return $text;
    }

    /**
     * 
     * @param type $predmet
     * @param type $komu
     * @param type $od_meno
     * @param string $od_email
     * @param type $email_sprava
     */
    public static function my_email($predmet, $komu, $od_meno, $od_email, $email_sprava) {

        $od_email = "info@query.sk";
        // carriage return type (we use a PHP end of line constant)
        $predmet = self::odstran_diakritiku($predmet);
        $od_meno = self::odstran_diakritiku($od_meno);
        $to = $komu; // note the comma
        $subject = iconv('UTF-8', 'windows-1250', $predmet);
        $title = 'Html Email';
        $message = iconv('UTF-8', 'windows-1250', $email_sprava);
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=windows-1250' . "\r\n";

        $headers .= 'To:  <' . $komu . '>' . "\r\n"; // dalsi mail sa oddeluje ciarkou
        $headers .= 'From: ' . $od_meno . ' <' . $od_email . '>' . "\r\n";



        mail($to, $subject, $message, $headers);
    }

    public static function returnInput() {
        echo "<input type='hidden' name='return' value='" . WWW_FULL_PATH . "' />";
    }

    /**
     * 
     * @param type $msg
     * @return type
     */
    public static function confirmMsg($msg) {
        return " onclick=\"return confirm('$msg');\" ";
    }

    /**
     * 
     * @param type $table
     * @param type $column
     * @param type $post_id
     * @return boolean
     */
    public static function getPostParam($table, $column, $post_id) {
        $db = new Db;
        $rest = new Rest;

        $query = "SELECT `$column` FROM `$table` WHERE id = $post_id";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                return $row[$column];
            }
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $table
     * @param type $and_where
     * @return boolean
     */
    public static function db_current_id($table, $and_where) {
        $db = new Db;
        $rest = new Rest;

        $query = "SELECT `id_entity` FROM `$table` WHERE vendor_id = '" . Vendor::getId() . "' $and_where ORDER BY id_entity asc LIMIT 1";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                return $row['id_entity'];
            }
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $table
     * @param type $and_where
     * @param type $currentId
     * @return boolean
     */
    public static function db_next_id($table, $and_where, $currentId) {
        $db = new Db;
        $rest = new Rest;

        $query = "SELECT `id_entity` FROM `$table` WHERE `id_entity` > '$currentId' AND `vendor_id` = '" . Vendor::getId() . "' $and_where LIMIT 1";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                return $row['id_entity'];
            }
        } else {
            return false;
        }
    }
	
	public static function setMetaStatus($value, $meta){
		if($value == 1){
			$ano = 'selected';
			$color = "3C763D";
			$nie = false;
			
		}
		else{
			$nie = 'selected';
			$color = "ff0000";
			$ano = false;
		}
		echo '<select class="form-control" name="zobrazit_'.$meta.'" style="border: 2px #'.$color.' solid;">
				<option value="1" '.$ano.'>Áno</option>
				<option value="0" '.$nie.'>Nie</option>
			</select>';
	}
	
	/** HEX to RGBA **/
	function hex2rgba($color, $opacity = false) {
 
		$default = 'rgb(0,0,0)';
		
		//Return default if no color provided
		if(empty($color))
			  return $default; 
	 
		//Sanitize $color if "#" is provided 
			if ($color[0] == '#' ) {
				$color = substr( $color, 1 );
			}
	 
			//Check if color has 6 or 3 characters and get values
			if (strlen($color) == 6) {
					$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
			} elseif ( strlen( $color ) == 3 ) {
					$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
			} else {
					return $default;
			}
	 
			//Convert hexadec to rgb
			$rgb =  array_map('hexdec', $hex);
	 
			//Check if opacity is set(rgba or rgb)
			if($opacity){
				if(abs($opacity) == 1)
					$opacity = 1.0;
				$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
			} else {
				$output = 'rgb('.implode(",",$rgb).')';
			}
	 
			//Return rgb(a) color string
			return $output;
	}

}
