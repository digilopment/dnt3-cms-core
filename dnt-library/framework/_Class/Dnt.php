<?php

/**
 *  class       Dnt
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 *  This is std static class
 */

namespace DntLibrary\Base;

use DntLibrary\Base\DB;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class Dnt
{

	public function __construct(){
		$this->db = new DB();
		$this->vendor = new Vendor();
	}
    /**
     * 
     * @param type $table
     * @return boolean
     */
    public function getLastId($table, $vendor_id = false)
    {
       
        if ($vendor_id) {
            $query = "SELECT MAX(id) FROM " . $table . " WHERE vendor_id = " . $vendor_id . "";
        } else {
            $query = "SELECT MAX(id) FROM " . $table . " WHERE vendor_id = " . $this->vendor->getId() . "";
        }

        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $return = $row['MAX(id)'];
            }
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * 
     * @param type $table
     * @param type $column
     * @param type $vendor_id
     * @return boolean
     */
    public function getMaxValueFromColumn($table, $column, $vendor_id = true)
    {
        

        if ($vendor_id) {
            $query = "SELECT MAX($column) FROM " . $table . " WHERE vendor_id = '" . $this->vendor->getId() . "'";
        } else {
            $query = "SELECT MAX($column) FROM " . $table;
        }


        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $return = $row["MAX($column)"];
            }
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * 
     * @return boolean
     */
    public function getLastIdVendor()
    {
        
        $query = "SELECT MAX(id) FROM dnt_vendors ";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $return = $row['MAX(id)'];
            }
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * 
     * @param type $googleMapsUrl
     * @return type
     */
    function getMapLocation($googleMapsUrl)
    {
        $string = $googleMapsUrl;
        $string = explode("@", $string);
        $position = $string[1];
        $position = explode("z/data", $position);
        $position = $position[0];
        $position = explode(",", $position);
        return $position;
    }

    /**
     * 
     * @param type $lastId
     */
    public function getIdEntity($lastId)
    {
        
        $this->db->update(
                'dnt_posts', //table
                array(//set
                    'id_entity' => $lastId
                ), array(//where
            'id' => $lastId
                )
        );
    }

    /**
     * 
     * @param type $link
     * @return type
     */
    public function cislo($link)
    {
        return preg_replace("/[^0-9]/", "", $link);
    }

    /**
     * 
     * @param type $input
     * @return type
     */
    function linkFormat($input)
    {
        $input = str_replace("http://", "", $input);
        $input = str_replace("https://", "", $input);
        $input = str_replace("", "", $input);
        return $input;
    }

    /**
     * 
     * @param type $column
     * @return type
     */
    public function showStatus($column)
    {
        $rest = new Rest();
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
    public function datetime()
    {
        return date("Y-m-d H:i:s");
    }

    /**
     * 
     * @param type $file
     */
    public function deleteFile($file)
    {
        if (file_exists($file)) {
            unlink($file);
        }
    }

    /**
     * 
     * @param type $src
     */
    function rrmdir($dirPath)
    {
        $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($dirPath, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($files as $fileinfo) {
            $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
            $todo($fileinfo->getRealPath());
        }
    }

    /**
     * 
     * @return type
     */
    public function timestamp()
    {
        return time();
    }

    /**
     * 
     * @param type $separator
     * @param type $time
     * @return type
     */
    public function timeToDbFormat($separator, $time)
    {
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
    public function formatTime($time, $format)
    {
        $date = date_create($time);
        return date_format($date, $format);
    }

    /**
     * 
     * @param type $cislo
     * @return type
     */
    public function dvojcifernyDatum($cislo)
    {
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
    public function in_string($pharse, $str)
    {
        return preg_match('/' . $pharse . '/', $str);
        //return preg_match("/".$pharse."\b/i", "".$str."");
    }

    /**
     * 
     * @param type $link
     * @return type
     */
    public function desatinne_cislo($link)
    {
        $link = str_replace(",", ".", $link);
        return preg_replace("/[^0-9\.]/", "", $link);
    }

    /**
     * 
     * @param type $pocetZnakov
     * @return type
     */
    public function generujHeslo($pocetZnakov)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars), 0, $pocetZnakov);
    }

    /**
     * 
     * @return type
     */
    public function microtimeSec()
    {
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
    public function is_mobile()
    {
        return preg_match("/(android|iPhone|iPod|iPad|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }

    /**
     * 
     * @param type $file
     * @return type
     */
    public function getPripona($file)
    {
        return pathinfo($file, PATHINFO_EXTENSION);
    }

    public function getFileName($file)
    {
        return $this->name_url(pathinfo($file, PATHINFO_FILENAME));
    }

    /**
     * 
     * @param type $src
     * @param type $dst
     */
    public function recurse_copy($src, $dst)
    {
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (is_dir($src . '/' . $file)) {
                    $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
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
    public function get_datum()
    {
        return $get_datum = "" . date("d") . "." . date("m") . "." . date("Y") . "";
    }

    /**
     * 
     * @return type
     */
    public function get_rok()
    {
        return $get_rok = date("Y");
    }

    /**
     * 
     * @return type
     */
    public function get_mesiac()
    {
        return $get_mesiac = date("m");
    }

    /**
     * 
     * @return type
     */
    public function get_ip()
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * 
     * @return type
     */
    public function get_den()
    {
        return $get_den = date("d");
    }

    /**
     * 
     * @return type
     */
    public function get_cas()
    {
        return $get_cas = date('H:i:s');
    }

    /**
     * 
     * @return string
     */
    public function get_os($external = false)
    {
        if ($exteral) {
            $agent = $external;
        } else {
            $agent = $_SERVER['HTTP_USER_AGENT'];
        }
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

    function getOS($user_agent)
    {

        $os_platform = "Unknown OS Platform";

        $os_array = array(
            '/windows nt 10/i' => 'Windows 10',
            '/windows nt 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows xp/i' => 'Windows XP',
            '/windows nt 5.0/i' => 'Windows 2000',
            '/windows me/i' => 'Windows ME',
            '/win98/i' => 'Windows 98',
            '/win95/i' => 'Windows 95',
            '/win16/i' => 'Windows 3.11',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile'
        );

        foreach ($os_array as $regex => $value)
            if (preg_match($regex, $user_agent))
                $os_platform = $value;

        return $os_platform;
    }

    public function downloadFile($url, $cesta)
    {
        $img = explode("/", $url);
        $array = $img;
        if (!is_array($array))
            return $array;
        if (!count($array))
            return null;
        end($array);
        $fotka = $array[key($array)];

        $img = $cesta . $fotka;
        $pripona = explode('.', $fotka);
        if (!isset($pripona[1]) || $pripona[1] ==  'png')  {
            //fotka nema v url adrese priponu
            $fotka = $this->name_url($fotka) . '.jpg';
            $img = $cesta . $fotka;
        }
        if (file_get_contents($url)) {
            file_put_contents($img, file_get_contents($url));
            return array("file" => $fotka, "path" => $cesta);
        }
        return false;
    }

    function getBrowser($user_agent)
    {

        $browser = "Unknown Browser";

        $browser_array = array(
            '/msie/i' => 'Internet Explorer',
            '/firefox/i' => 'Firefox',
            '/safari/i' => 'Safari',
            '/chrome/i' => 'Chrome',
            '/edge/i' => 'Edge',
            '/opera/i' => 'Opera',
            '/netscape/i' => 'Netscape',
            '/maxthon/i' => 'Maxthon',
            '/konqueror/i' => 'Konqueror',
            '/mobile/i' => 'Mobile Browser'
        );

        foreach ($browser_array as $regex => $value)
            if (preg_match($regex, $user_agent))
                $browser = $value;

        return $browser;
    }

    /**
     * 
     * @param type $dlzka
     * @return type
     */
    public function set_rand_string($dlzka = 10)
    {
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
    public function set_four_one()
    {
        return "" . rand(1, 9) . "" . rand(1, 9) . "" . rand(1, 9) . "" . rand(1, 9) . "";
    }

    /**
     * 
     * @param type $url_adresa
     * @return type
     */
    public function name_url($url_adresa)
    {
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
    public function is_external_url($name_url)
    {
        //$name_url = str_replace("/", "\/", $name_url);
        if ($this->in_string("http:\/\/", $name_url)) {
            $return = true;
        }
        //https protocol
        elseif ($this->in_string("https:\/\/", $name_url)) {
            $return = true;
        }
        //protocol relative
        elseif ($this->in_string("\/\/", $name_url)) {
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
    public function creat_name_url($name, $name_url)
    {

        if ($this->in_string("<WWW_PATH>", $name_url)) {
            $name_url = explode("WWW_PATH", $name_url);
            $name_url = "<WWW_PATH>" . $this->name_url($name_url[1]);
            return $name_url;
        }

        if (empty($name_url)) {
            return $this->name_url($name);
        } elseif ($this->in_string("#", $name_url)) {
            return $name_url;
        }
        //http is_external_url
        elseif ($this->is_external_url($name_url)) {
            return $name_url;
        } else {
            return $this->name_url($name_url);
        }
    }

    /**
     * 
     * @param type $presmeruj_url
     */
    public function redirect($presmeruj_url = false)
    {
        if ($presmeruj_url) {
            $redirect = $presmeruj_url;
        } else {
            $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
        }


        if (!headers_sent()) {
            header('Location: ' . $redirect);
            exit;
        } else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . $redirect . '"';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url=' . $redirect . '" />';
        }
    }

    /**
     * 
     * @param type $presmeruj_url
     */
    public function presmeruj_url_by_js($presmeruj_url)
    {
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
    public function safe($str)
    {
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
    public function obsah_uvod($str, $zobraz_znakov)
    {
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
    public function get_perex($input, $maxWords, $maxChars)
    {
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
    public function perex($str, $maxPocetSlov)
    {
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
    public function not_html($str)
    {
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
    public function is_email($email)
    {
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
    public function is_iban($iban)
    {
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
    public function is_facebook_profil($facebook_profil)
    {
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
    public function odstran_diakritiku($text)
    {
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
    public function my_email($predmet, $komu, $od_meno, $od_email, $email_sprava)
    {

        $od_email = "info@query.sk";
        // carriage return type (we use a PHP end of line constant)
        $predmet = $this->odstran_diakritiku($predmet);
        $od_meno = $this->odstran_diakritiku($od_meno);
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

    public function returnInput()
    {
        echo "<input type='hidden' name='return' value='" . WWW_FULL_PATH . "' />";
    }

    /**
     * 
     * @param type $msg
     * @return type
     */
    public function confirmMsg($msg)
    {
        return " onclick=\"return confirm('$msg');\" ";
    }

    /**
     * 
     * @param type $table
     * @param type $column
     * @param type $post_id
     * @return boolean
     */
    public function getPostParam($table, $column, $post_id)
    {
        $query = "SELECT `$column` FROM `$table` WHERE id_entity = $post_id AND  vendor_id = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
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
    public function db_current_id($table, $and_where)
    {
        $query = "SELECT `id_entity` FROM `$table` WHERE vendor_id = '" . $this->vendor->getId() . "' $and_where ORDER BY id_entity asc LIMIT 1";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
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
    public function db_next_id($table, $and_where, $currentId)
    {
        $query = "SELECT `id_entity` FROM `$table` WHERE `id_entity` > '$currentId' AND `vendor_id` = '" . $this->vendor->getId() . "' $and_where ORDER BY id_entity asc LIMIT 1";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                return $row['id_entity'];
            }
        } else {
            return false;
        }
    }

    public function setMetaStatus($value, $meta)
    {
        if ($value == 1) {
            $ano = 'selected';
            $color = "3C763D";
            $nie = false;
        } else {
            $nie = 'selected';
            $color = "ff0000";
            $ano = false;
        }
        echo '<select class="form-control" name="zobrazit_' . $meta . '" style="border: 2px #' . $color . ' solid;">
				<option value="1" ' . $ano . '>Áno</option>
				<option value="0" ' . $nie . '>Nie</option>
			</select>';
    }

    /** HEX to RGBA * */
    function hex2rgba($color, $opacity = false)
    {

        $default = 'rgb(0,0,0)';

        //Return default if no color provided
        if (empty($color))
            return $default;

        //Sanitize $color if "#" is provided 
        if ($color[0] == '#') {
            $color = substr($color, 1);
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
            $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
        } elseif (strlen($color) == 3) {
            $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
        } else {
            return $default;
        }

        //Convert hexadec to rgb
        $rgb = array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if ($opacity) {
            if (abs($opacity) == 1)
                $opacity = 1.0;
            $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
        } else {
            $output = 'rgb(' . implode(",", $rgb) . ')';
        }

        //Return rgb(a) color string
        return $output;
    }

    public function colorInverse($color)
    {
        $color = str_replace('#', '', $color);
        if (strlen($color) != 6) {
            return '000000';
        }
        $rgb = '';
        for ($x = 0; $x < 3; $x++) {
            $c = 255 - hexdec(substr($color, (2 * $x), 2));
            $c = ($c < 0) ? 0 : dechex($c);
            $rgb .= (strlen($c) < 2) ? '0' . $c : $c;
        }
        return '#' . $rgb;
    }

    function darkenColor($rgb, $darker = 2)
    {

        $hash = (strpos($rgb, '#') !== false) ? '#' : '';
        $rgb = (strlen($rgb) == 7) ? str_replace('#', '', $rgb) : ((strlen($rgb) == 6) ? $rgb : false);
        if (strlen($rgb) != 6)
            return $hash . '000000';
        $darker = ($darker > 1) ? $darker : 1;

        list($R16, $G16, $B16) = str_split($rgb, 2);

        $R = sprintf("%02X", floor(hexdec($R16) / $darker));
        $G = sprintf("%02X", floor(hexdec($G16) / $darker));
        $B = sprintf("%02X", floor(hexdec($B16) / $darker));

        return $hash . $R . $G . $B;
    }

    public function rmkdir($path)
    {
        if (@mkdir($path) or file_exists($path))
            return true;
        return ($this->rmkdir(dirname($path)) and mkdir($path));
    }

    public function orderby($data, $column = "id", $sort = "ASC")
    {
        if (count($data) > 0) {
            $sortArray = array();
            foreach ($data as $item) {
                foreach ($item as $key => $value) {
                    if (!isset($sortArray[$key])) {
                        $sortArray[$key] = array();
                    }
                    $sortArray[$key][] = $value;
                }
                if ($column == "datetime_publish") {
                    $sortArray['datetime'][] = strtotime($item[$column]);
                    $orderby = "datetime";
                }
            }

            $orderby = $column;

            if ($sort == "ASC" || $sort == "asc") {
                array_multisort($sortArray[$orderby], SORT_ASC, $data);
            } else {
                array_multisort($sortArray[$orderby], SORT_DESC, $data);
            }
            return $data;
        }
        return $data;
    }

    /* 	
     *
     * writeLog()
     * metoda zapisuje logy do suboru csv
     * kazdy novy zaznam sa zapisuje do noveho riadku
     * kazdy den sa vytvori novy subor s prefixxom Y_m_d
     * logy je mozne ukladat do vlastného súboru (suborov)
     *  
     *
     * */

    public function writeToFile($fileName, $arrToInsert = array(), $serverVariables = false)
    {

        //VYTVOR FOLDER AK NIE JE
        $this->rmkdir(dirname($fileName));

        //NACITANIE STARYCH DAT ZO SUBORU
        $data = @file_get_contents($fileName);

        //AK SU SERVER VARIABLES
        if (!is_array($serverVariables))
            $serverVariables = array();

        //PRIRADENIE ZOZNAM SERVEROVYCH METOD DO SUPERGLOBALNEJ PREMENNEJ SERVER  A ZISKANIE JEJ HODNOTY
        foreach ($serverVariables as $item) {
            $arrToInsert[$item] = isset($_SERVER[$item]) ? $_SERVER[$item] : false;
        };

        //NAZVY STLPCOV
        foreach ($arrToInsert as $key => $value) {
            $columnName[] = $key;
        }

        //ZAPIS NAZVY STLPCOV, LEN AK SA JEDNA O NOVOVYTVORENZ SUBOR
        $columnsName = empty($data) ? implode(";", $columnName) . "\n" : "";

        //IMPLODE DO RETAZCA
        $newData = implode(";", $arrToInsert);

        //OSETRENIE (PRIODANIE) NOVEHO RIADKU, LEN V PRIPADE AK SU V SUBORE DATA
        $newLine = !empty($data) ? "\n" : "";

        //SPOJENIE STARYCH DAT, RIADKU A NOVYCH DAT DO PREMENY putData
        $putData = $columnsName . $data . $newLine . $newData;

        //ZAPIS VSETKYCH DAT DO SUBORU
        file_put_contents($fileName, $putData);
    }

    public function getCountryCode($ip)
    {
        return strtolower(@file_get_contents(GEO_IP_SERVICE . '' . $ip . ''));
    }

    /**
     * static function to embed video
     *
     *
     * */
    public function youtubeVideoToEmbed($video)
    {
        if (count(explode('?v=', $video)) > 1) {
            $video = explode("?v=", $video);
            $youtube_hash = "https://www.youtube.com/embed/" . $video[1];
        } else {
            $youtube_hash = $video;
        }
        return $youtube_hash;
    }

    public function minify($html)
    {

        $search = array(
            '/\>[^\S ]+/s', // strip whitespaces after tags, except space
            '/[^\S ]+\</s', // strip whitespaces before tags, except space
            '/(\s)+/s', // shorten multiple whitespace sequences
            '/<!--(.|\s)*?-->/' // Remove HTML comments
        );
        $replace = array(
            '>',
            '<',
            '\\1',
            ''
        );
        return preg_replace($search, $replace, $html);
    }

    public function strToHex($string)
    {
        $hex = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $hex .= dechex(ord($string[$i]));
        }
        return $hex;
    }

    public function uuid()
    {
        if (function_exists('com_create_guid') === true)
            return trim(com_create_guid(), '{}');

        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    public function hexToStr($hex)
    {
        $string = '';
        for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
            $string .= chr(hexdec($hex[$i] . $hex[$i + 1]));
        }
        return $string;
    }

}
