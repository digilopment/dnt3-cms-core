<?php

function cislo($link){
  return preg_replace("/[^0-9]/","",$link);
}

function dvojcifernyDatum($cislo){
	if(strlen($cislo) > 2){
		$return = $cislo;
	}
	else{
		if (strlen($cislo) == 1){
			$return =  "0".$cislo;
		}
		else{
			$return =  $cislo;
		}
	}
	return $return; 
}

function in_string($pharse, $str){
	return preg_match("/".$pharse."\b/i", "".$str."");
}

function desatinne_cislo($link){
  $link = str_replace(",",".",$link);
  return preg_replace("/[^0-9\.]/","",$link);
}

function generujHeslo($pocetZnakov){
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$pocetZnakov);
}

function microtimeSec(){
    list($usec, $sec) = explode(" ", microtime());
    $tmp = ((float)$usec + (float)$sec);
	$tmp1 = explode(".", $tmp);
	$tmp0  = $tmp1[0];
	return $tmp0;
}

function is_mobile(){
	return preg_match("/(android|iPhone|iPod|iPad|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

function getPripona($file){
	return pathinfo($file, PATHINFO_EXTENSION);
}

function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 

function get_datum(){
	return $get_datum = "".date("d").".".date("m").".".date("Y")."";
}

function get_rok(){
	return $get_rok = date("Y");
}

function get_mesiac(){
	return $get_mesiac = date("m");
}


function get_den(){
	return $get_den = date("d");
}
function get_cas(){
	return $get_cas = date('H:i:s');
	}

function get_os(){
	$agent = $_SERVER['HTTP_USER_AGENT'];
	if(preg_match('/Android/',$agent)) $os = 'Android';
	elseif(preg_match('/Win/',$agent)) $os = 'Windows';
	elseif(preg_match('/Mac/',$agent)) $os = 'Mac';
	elseif(preg_match('/BlackBerry/', $agent)) $os = 'BlackBerry';
	elseif(preg_match('/Linux/',$agent)) $os = 'Linux';
	elseif(preg_match('/iPhone|iPod|iPad/',$agent)) $os = 'iPhone|iPod|iPad';
	else $os = 'Nerozpoznaný OS';
	return $os;
	}	
	
	
function set_rand_string($dlzka = 10){
  $retazec = "";
  $nahodne = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
  for($i = 0; $i < $dlzka; $i++){
    $retazec .= substr($nahodne,rand(0,strlen($nahodne)-1),1);
    // vrati true/false
  }
  return $retazec;
  //echo nahodny_retazec($dlzka = 10);
	}
function set_four_one(){
	return "".rand(1, 9)."".rand(1, 9)."".rand(1, 9)."".rand(1, 9)."";
	}
function set_url_adresa($url_adresa){    
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
  	
function presmeruj_url($presmeruj_url){
    if (!headers_sent()){
        header('Location: '.$presmeruj_url);
      }
    else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$presmeruj_url.'"';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url='.$presmeruj_url.'" />';
    }
}

function presmeruj_url_by_js($presmeruj_url){
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$presmeruj_url.'"';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url='.$presmeruj_url.'" />';
}

function safe($str) { 
    if(is_array($str)) 
        return array_map(__METHOD__, $str); 

    if(!empty($str) && is_string($str)) { 
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $str); 
    } 
    
    return $str = mysql_real_escape_string($str); 

}

function obsah_uvod($str, $zobraz_znakov) {
	//return htmlspecialchars($str); 
	if(strlen($str) > $zobraz_znakov)
		return "".$str = substr($str, 0, $zobraz_znakov)."...";
	elseif(strlen($str) > 5)
		return $str;
	else
		return "Tento príspevok nemá žiaden náhľad článku, pretože sa jeho obsah pravdepodobne skladá z multymediálneho obsahu. Prosím kliknite na <b>čítať viac</b> a môžete prezerať vami vybraný obsah.";
}

function get_perex($input, $maxWords, $maxChars)
{
    $words = preg_split('/\s+/', $input);
    $words = array_slice($words, 0, $maxWords);
    $words = array_reverse($words);

    $chars = 0;
    $truncated = array();

    while(count($words) > 0)
    {
        $fragment = trim(array_pop($words));
        $chars += strlen($fragment);

        if($chars > $maxChars) break;

        $truncated[] = $fragment;
    }

    $result = implode($truncated, ' ');

    if ($input == $result)
    {
        return $input;
    }
    else
    {
        return preg_replace('/[^\w]$/', '', $result) . '...';
    }
}

function perex($str, $maxPocetSlov){
			 
			$str = not_html($str);
			$slova = explode(" ", $str);
			$pocetSlov = count($slova);
			
			for($i = 0; $i<$maxPocetSlov; $i++){
				$return .= " ".$slova[$i];
			}
			
			return $return."...";
			
		 }

function is_email($email){
	if ($email == "")
		return true;
  elseif(preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$/",$email))
    return true;
  else
    return false;
	}
	
function is_iban($iban){
			$iban = strtolower(str_replace(' ','',$iban));
	    $Countries = array('al'=>28,'ad'=>24,'at'=>20,'az'=>28,'bh'=>22,'be'=>16,'ba'=>20,'br'=>29,'bg'=>22,'cr'=>21,'hr'=>21,'cy'=>28,'cz'=>24,'dk'=>18,'do'=>28,'ee'=>20,'fo'=>18,'fi'=>18,'fr'=>27,'ge'=>22,'de'=>22,'gi'=>23,'gr'=>27,'gl'=>18,'gt'=>28,'hu'=>28,'is'=>26,'ie'=>22,'il'=>23,'it'=>27,'jo'=>30,'kz'=>20,'kw'=>30,'lv'=>21,'lb'=>28,'li'=>21,'lt'=>20,'lu'=>20,'mk'=>19,'mt'=>31,'mr'=>27,'mu'=>30,'mc'=>27,'md'=>24,'me'=>22,'nl'=>18,'no'=>15,'pk'=>24,'ps'=>29,'pl'=>28,'pt'=>25,'qa'=>29,'ro'=>24,'sm'=>27,'sa'=>24,'rs'=>22,'sk'=>24,'si'=>19,'es'=>24,'se'=>24,'ch'=>21,'tn'=>24,'tr'=>26,'ae'=>23,'gb'=>22,'vg'=>24);
	    $Chars = array('a'=>10,'b'=>11,'c'=>12,'d'=>13,'e'=>14,'f'=>15,'g'=>16,'h'=>17,'i'=>18,'j'=>19,'k'=>20,'l'=>21,'m'=>22,'n'=>23,'o'=>24,'p'=>25,'q'=>26,'r'=>27,'s'=>28,'t'=>29,'u'=>30,'v'=>31,'w'=>32,'x'=>33,'y'=>34,'z'=>35);
	
	    if(strlen($iban) == $Countries[substr($iban,0,2)]){
	
	        $MovedChar = substr($iban, 4).substr($iban,0,4);
	        $MovedCharArray = str_split($MovedChar);
	        $NewString = "";
	
	        foreach($MovedCharArray AS $key => $value){
	            if(!is_numeric($MovedCharArray[$key])){
	                $MovedCharArray[$key] = $Chars[$MovedCharArray[$key]];
	            }
	            $NewString .= $MovedCharArray[$key];
	        }
	
	        if(bcmod($NewString, '97') == 1)
	        {
	            $iban = 1;
	        }
	        else{
	            $iban = 0;
	        }
	    }
	    else{
	        $iban = 0;
	    }   
	    
	    if ($iban == 1){
	    	return true;
	    }
	    else{
	    	return false;
	    }
	    
	}	
	
function is_email_exists($email, $tabulka, $dntDb){
	//zisti existujuceho uživatela
	$existujuci_uzivatel_result = dnt_query("SELECT `email` FROM `".$tabulka."` WHERE 
	email = '".$email."' AND
	vendor = '".$_SESSION['getVendorId']."'", $dntDb);
	if (mysql_num_rows($existujuci_uzivatel_result) > 0) {
		$existujuci_uzivatel = mysql_result($existujuci_uzivatel_result, 0, 'email');
				//echo "<div style='text-align: center;'>".$existujuci_uzivatel."</div>";
		}
	else{
		$existujuci_uzivatel = 10; //hodnota "10" moze byt hocjaky ciselny parameter, natsavujuci defaultny parameter *
																	 //*pre porovnávanie, v predpokladanej situaci neexistujuceho uzivatela
		}
	if($email == $existujuci_uzivatel){
		return true;
		}
		else{
			return false;
		}
	}
	
function is_facebook_profil($facebook_profil){		
	list($facebook_url, $facebook_user) = explode(".com/", $facebook_profil);
	if ($facebook_profil == ""){
		return false; //empty filed
		}
	elseif($facebook_url != "https://www.facebook"){
		return false; //first part is not facebook
		}
	else{
		return true; //OK 
		}		
	}
	
function odstran_diakritiku($text){
$prevodni_tabulka = Array(
  'ä'=>'a',
  'Ä'=>'A',
  'á'=>'a',
  'Á'=>'A',
  'à'=>'a',
  'À'=>'A',
  'ã'=>'a',
  'Ã'=>'A',
  'â'=>'a',
  'Â'=>'A',
  'č'=>'c',
  'Č'=>'C',
  'ć'=>'c',
  'Ć'=>'C',
  'ď'=>'d',
  'Ď'=>'D',
  'ě'=>'e',
  'Ě'=>'E',
  'é'=>'e',
  'É'=>'E',
  'ë'=>'e',
  'Ë'=>'E',
  'è'=>'e',
  'È'=>'E',
  'ê'=>'e',
  'Ê'=>'E',
  'í'=>'i',
  'Í'=>'I',
  'ï'=>'i',
  'Ï'=>'I',
  'ì'=>'i',
  'Ì'=>'I',
  'î'=>'i',
  'Î'=>'I',
  'ľ'=>'l',
  'Ľ'=>'L',
  'ĺ'=>'l',
  'Ĺ'=>'L',
  'ń'=>'n',
  'Ń'=>'N',
  'ň'=>'n',
  'Ň'=>'N',
  'ñ'=>'n',
  'Ñ'=>'N',
  'ó'=>'o',
  'Ó'=>'O',
  'ö'=>'o',
  'Ö'=>'O',
  'ô'=>'o',
  'Ô'=>'O',
  'ò'=>'o',
  'Ò'=>'O',
  'õ'=>'o',
  'Õ'=>'O',
  'ő'=>'o',
  'Ő'=>'O',
  'ř'=>'r',
  'Ř'=>'R',
  'ŕ'=>'r',
  'Ŕ'=>'R',
  'š'=>'s',
  'Š'=>'S',
  'ś'=>'s',
  'Ś'=>'S',
  'ť'=>'t',
  'Ť'=>'T',
  'ú'=>'u',
  'Ú'=>'U',
  'ů'=>'u',
  'Ů'=>'U',
  'ü'=>'u',
  'Ü'=>'U',
  'ù'=>'u',
  'Ù'=>'U',
  'ũ'=>'u',
  'Ũ'=>'U',
  'û'=>'u',
  'Û'=>'U',
  'ý'=>'y',
  'Ý'=>'Y',
  'ž'=>'z',
  'Ž'=>'Z',
  'ź'=>'z',
  'Ź'=>'Z'
);
 
$text = strtr($text, $prevodni_tabulka);
return $text;
}


function my_email($predmet, $komu, $od_meno, $od_email, $email_sprava){

		$od_email = "info@query.sk";
		// carriage return type (we use a PHP end of line constant)
		$predmet = odstran_diakritiku($predmet);
		$od_meno = odstran_diakritiku($od_meno);
		$to  = $komu; // note the comma
		$subject = iconv('UTF-8', 'windows-1250',$predmet);
		$title = 'Html Email';
		$message =  iconv('UTF-8', 'windows-1250',$email_sprava);
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=windows-1250' . "\r\n";
		
		$headers .= 'To:  <'.$komu.'>' . "\r\n"; // dalsi mail sa oddeluje ciarkou
		$headers .= 'From: '.$od_meno.' <'.$od_email.'>' . "\r\n";
	

		
		mail($to, $subject, $message, $headers);
		
		}
		
function getReturnInput($dntDb){
	echo "<input type='hidden' name='return' value='".getMyProtokol($dntDb).getThisUrl()."' />";
}



/* modul competition */

	function getMapLocation(){
		$string = getCompetitionMeta('map_location');
		$string = explode("@", $string);
		$position = $string[1];
		$position = explode("z/data", $position);
		$position = $position[0];
		$position = explode(",", $position);
		return $position;
	}

	
	function getRealDomain(){
		$query = mysql_query("SELECT `real_url` FROM `dnt_competitions` WHERE 
			`vendor_id` = '".VENDOR_ID."' AND active = 1
			");
		if(mysql_num_rows($query)>0){
			while($row = mysql_fetch_array($query)){
				 $realUrlArr[] = $row['real_url'];
			}
		}
		else{
			$realUrlArr = false;
		}
		return $realUrlArr;
		
	}
	
	function getColumnByDomain($column, $domain){
		$query = mysql_query("SELECT `".$column."` FROM `dnt_competitions` WHERE `real_url` = '".$domain."' LIMIT 1");
		if(mysql_num_rows($query)>0){
			while($row = mysql_fetch_array($query)){
				 $return = $row[$column];
			}
		}
		else{
			$return = false;
		}
		return $return;
	}

	function competitionId(){	

		
		
		$addr = new Addr();
		$addr->getModuleUrl();
		$WWW_PATH = str_replace("www.", "", WWW_PATH);
		
		if(in_array(str_replace("www.", "", $WWW_PATH), getRealDomain())){
			$get = getColumnByDomain("url", $WWW_PATH);
		}
		elseif(isset($_GET['type'])){
			$get = GET('type');
		}
		elseif(isset($_GET['src'])){
			$get = $addr->module[0];
		}
		else{
			$get = GET('type');
		}
		
		if($get){
			$query = mysql_query("SELECT `id` FROM `dnt_competitions` WHERE 
				`vendor_id` = '".VENDOR_ID."' AND 
				`url` = '".$get."'
				");
			if(mysql_num_rows($query)>0){
				while($row = mysql_fetch_array($query)){
					 $return = $row['id'];
				}
			}
			else{
				$return = false;
			}
		}
		else{
			$return = false;
		}
		return $return;
	}
	
	
	function getCompetitionColumn($column){	
		$query = mysql_query("SELECT `".$column."` FROM `dnt_competitions` WHERE 
			`vendor_id` = '".VENDOR_ID."' AND 
			`id` = '".competitionId()."'
			");
		if(mysql_num_rows($query)>0){
			while($row = mysql_fetch_array($query)){
				 $return = $row[$column];
			}
		}
		else{
			$return = false;
		}

		return $return;
	}
	
	function getCompetitionColumnByInput($column, $competition_id){	
		$query = mysql_query("SELECT `".$column."` FROM `dnt_competitions` WHERE 
			`vendor_id` = '".VENDOR_ID."' AND 
			`id` = '".$competition_id."'
			");
		if(mysql_num_rows($query)>0){
			while($row = mysql_fetch_array($query)){
				 $return = $row[$column];
			}
		}
		else{
			$return = false;
		}

		return $return;
	}
	
	function getCompetitionColumnId($column, $id){	
		$query = mysql_query("SELECT `".$column."` FROM `dnt_competitions` WHERE 
			`vendor_id` = '".VENDOR_ID."' AND 
			`id` = '".$id."'
			");
		if(mysql_num_rows($query)>0){
			while($row = mysql_fetch_array($query)){
				 $return = $row[$column];
			}
		}
		else{
			$return = false;
		}

		return $return;
	}
	

	
	function getCompetitionMetaExists($key){
		$query = mysql_query("SELECT `value` FROM `dnt_competition_composer` WHERE 
			`vendor_id` = '".VENDOR_ID."' AND 
			`competition_id` = '".competitionId()."' AND
			`meta` = '".$key."' AND
			`zobrazenie` = '1'
			");
		if(mysql_num_rows($query)>0){
			$return = true;
		}
		else{
			$return = false;
		}
		return $return;
		
	}
	
	
	function getCompetitionMeta($key){
		
		if(getCompetitionMetaExists($key)){
			$query = mysql_query("SELECT `value` FROM `dnt_competition_composer` WHERE 
				`vendor_id` = '".VENDOR_ID."' AND 
				`competition_id` = '".competitionId()."' AND
				`meta` = '".$key."'
				");
			if(mysql_num_rows($query)>0){
				while($row = mysql_fetch_array($query)){
					 $return = $row['value'];
				}
			}
			else{
				$return = false;
			}
		}
		else{
			$return = false;
		}
		return $return;
	}
	
	function getCompetitionMetaImportant($key){
		
			$query = mysql_query("SELECT `value` FROM `dnt_competition_composer` WHERE 
				`vendor_id` = '".VENDOR_ID."' AND 
				`competition_id` = '".competitionId()."' AND
				`meta` = '".$key."'
				");
			if(mysql_num_rows($query)>0){
				while($row = mysql_fetch_array($query)){
					 $return = $row['value'];
				}
			}
			else{
				$return = false;
			}
		return $return;
	}
	
	function getCompetitionMetaById($key, $id){
		
			$query = mysql_query("SELECT `value` FROM `dnt_competition_composer` WHERE 
				`vendor_id` = '".VENDOR_ID."' AND 
				`competition_id` = '".$id."' AND
				`meta` = '".$key."'
				");
			if(mysql_num_rows($query)>0){
				while($row = mysql_fetch_array($query)){
					 $return = $row['value'];
				}
			}
			else{
				$return = false;
			}
		return $return;
	}
	function getCompetitionMetaByInput($key, $competition_id){
		
			$query = mysql_query("SELECT `value` FROM `dnt_competition_composer` WHERE 
				`vendor_id` = '".VENDOR_ID."' AND 
				`competition_id` = '".$competition_id."' AND
				`meta` = '".$key."'
				");
			if(mysql_num_rows($query)>0){
				while($row = mysql_fetch_array($query)){
					 $return = $row['value'];
				}
			}
			else{
				$return = false;
			}
		return $return;
	}
	
	function getCompetitionMetaByInputExists($key, $competition_id){
		
			$query = mysql_query("SELECT `value` FROM `dnt_competition_composer` WHERE 
				`vendor_id` = '".VENDOR_ID."' AND 
				`zobrazenie` = '1' AND 
				`competition_id` = '".$competition_id."' AND
				`meta` = '".$key."'
				");
			if(mysql_num_rows($query)>0){
				while($row = mysql_fetch_array($query)){
					 $return = true;
				}
			}
			else{
				$return = false;
			}
		return $return;
	}
	

	
	function getMenuItems(){
		$query = mysql_query("SELECT `value` FROM `dnt_competition_composer` WHERE 
			`vendor_id` = '".VENDOR_ID."' AND 
			`competition_id` = '".competitionId()."' AND
			`zobrazenie` = '1' AND
			`meta` LIKE '%_menu_name%'
			ORDER by `poradie` ASC
			");
		if(mysql_num_rows($query)>0){
			while($row = mysql_fetch_array($query)){
				 $return[] = $row['value'];
			}
		}
		else{
			$return = false;
		}
		return $return;
	}
	
	function getModulItems(){
		$query = mysql_query("SELECT `value` FROM `dnt_competition_composer` WHERE 
			`vendor_id` = '".VENDOR_ID."' AND 
			`competition_id` = '".competitionId()."' AND
			`zobrazenie` = '0' AND
			`meta` LIKE '%_menu_name%'
			ORDER by `poradie` ASC
			");
		if(mysql_num_rows($query)>0){
			while($row = mysql_fetch_array($query)){
				 $return[] = $row['value'];
			}
			$return = array_merge(getMenuItems(), $return);
		}
		else{
			$return = false;
		}
		return $return;
	}
	
	function getSmallGallery($number){
		$query = mysql_query("SELECT `value` FROM `dnt_competition_composer` WHERE 
			`vendor_id` = '".VENDOR_ID."' AND 
			`competition_id` = '".competitionId()."' AND
			`zobrazenie` = '1' AND
			`meta` LIKE '%_menu_".$number."_image%'
			");
		if(mysql_num_rows($query)>0){
			while($row = mysql_fetch_array($query)){
				 $return[] = $row['value'];
			}
		}
		else{
			$return = false;
		}
		return $return;
	}
	
	function getFormBaseFields(){
		$query = mysql_query("SELECT * FROM `dnt_competition_composer` WHERE 
			`vendor_id` = '".VENDOR_ID."' AND 
			`competition_id` = '".competitionId()."' AND
			`zobrazenie` = '1' AND
			`meta` LIKE '%form_base%'
			");
		if(mysql_num_rows($query)>0){
			$i = 1;
			while($row = mysql_fetch_array($query)){
				 $indexes[] = $row['meta'];
				 $values[] = $row['value'];
				 $i ++;
			}
			
			$return = array_combine($indexes, $values);
	
		}
		else{
			$return = false;
		}
		return $return;
	}
	
	function creat_hash($data){
		return md5($data);
	}
	
	function creat_key($data){
		return md5(10 * $data);
	}
	
	function is_form_valid($hash, $key){
		$query = mysql_query("SELECT `id` FROM `dnt_competitions` WHERE 
			`vendor_id` = '".VENDOR_ID."' AND 
			`hash` = '".$hash."'
			");
		if(mysql_num_rows($query)>0){
			while($row = mysql_fetch_array($query)){
				 $id = $row['id'];
			}
			
			if($key = creat_key($hash)){
				$return = true;
			}
			else{
				$return = false;
			}
		}
		else{
			$return = false;
		}
		return $return;
	}
	
	function competitionIdByHash($hash){
		$query = mysql_query("SELECT `id` FROM `dnt_competitions` WHERE 
			`vendor_id` = '".VENDOR_ID."' AND 
			`hash` = '".$hash."'
			");
		if(mysql_num_rows($query)>0){
			while($row = mysql_fetch_array($query)){
				 $return = $row['id'];
			}
		}
		else{
			$return = false;
		}
		return $return;
	}
	
	function competition_id_query($catId){
		$id = GET('id');
		return mysql_query("SELECT * FROM `dnt_competition_composer` WHERE `cat_id` = '".$catId."' AND `vendor_id` = '".VENDOR_ID."' AND  `competition_id` = '".$id."'");
	}
	
	function all_meta_competition(){
		$id = GET('id');
		return mysql_query("SELECT * FROM `dnt_competition_composer` WHERE `vendor_id` = '".VENDOR_ID."' AND  `competition_id` = '".$id."'");
	}
	
	function setMetaStatus($value, $meta){
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
	
	function link_format($input){
		$input = str_replace("http://", "", $input);
		$input = str_replace("https://", "", $input);
		$input = str_replace("", "", $input);
		return $input;
	}
	
	//LANGUAGES
	function competition_languages(){
		return array(
			"sk_SK" 	=> "Slovenský",
			"cs_CZ" 	=> "Česky",
			"en_EN" 	=> "Anglický",
			"de_DE" 	=> "Nemecký",
		);
	}
	
	function getCompetitionLanguage($layout){
		$layouts = competition_languages();
		$selected = "";
		echo '<select name="_language" style="padding: 5px;">';
		
		foreach($layouts as $layoutIndex => $layoutName){
			if($layout == $layoutIndex){
				$selected = "selected";
			}
			else{
				$selected = "";
			}
			echo '<option value="'.$layoutIndex.'" '.$selected.' >'.$layoutName.'</option>';
		}
		echo '</select>';
	}
	
	
	//en_EN
	//LAYOUTS
	function competition_layout(){
		return array(
			"dnt_first" 	=> "1.st theme",
			"dnt_second" 	=> "2.nd theme",
		);
	}
	function getCompetitionLayout($layout){
		$layouts = competition_layout();
		$selected = "";
		echo '<select name="layout" style="padding: 5px;">';
		
		foreach($layouts as $layoutIndex => $layoutName){
			if($layout == $layoutIndex){
				$selected = "selected";
			}
			else{
				$selected = "";
			}
			echo '<option value="'.$layoutIndex.'" '.$selected.' >'.$layoutName.'</option>';
		}
		echo '</select>';
	}
	
	//FONTS
	function competition_fonts(){
		return array(
			"roboto" 	=> "Roboto",
			"Arial" 	=> "Arial",
			"Georgia" 	=> "Georgia",
			"Times New Roman" 	=> "Times New Roman",
			"bebas_neueregular" 	=> "Bebas",
			"impact" 	=> "Impact",
		);
	}
	
	function getCompetitionFont($font){
		$fonts = competition_fonts();
		$selected = "";
		echo '<select name="_font" style="padding: 5px;">';
		
		foreach($fonts as $fontIndex => $fontName){
			if($font == $fontIndex){
				$selected = "selected";
			}
			else{
				$selected = "";
			}
			echo '<option value="'.$fontIndex.'" '.$selected.' >'.$fontName.'</option>';
		}
		echo '</select>';
	}
	
	function hyperlinkParser($data){
	   
	   if(in_string("|", $data)){
		   $dataArr = explode("|", $data);
		   if (count($dataArr) == 2)
				return $dataArr;
		   else
				return array($data, $data);
	   }else{
		   return array($data, $data);
	   }
	}

	