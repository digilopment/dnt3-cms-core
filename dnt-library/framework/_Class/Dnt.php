<?php

class Dnt{


public function cislo($link){
  return preg_replace("/[^0-9]/","",$link);
}

public function showStatus($column){
	$rest = new Rest;
	if($rest->isAdmin()){
		//return "`show` = '1' or `show` = '2'";
		return "`$column` >= '0'";
	}else{
		return "`$column` = '1' or `$column` = '2'";
	}
}

public function datetime(){
	return date("Y-m-d H:i:s");
}
public function timestamp(){
	return time();
}
public function timeToDbFormat($separator, $time){
	$dateAndTime = explode(" ", $time);
	$data = explode($separator, $dateAndTime[0]);
	return $data[2]."-".$data[1]."-".$data[0]." ".$dateAndTime[1].":00";
}

public function formatTime($time, $format){
	$date=date_create($time);
	return date_format($date,$format);
}

public function dvojcifernyDatum($cislo){
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

public function in_string($pharse, $str){
	return preg_match("/".$pharse."\b/i", "".$str."");
}

public function desatinne_cislo($link){
  $link = str_replace(",",".",$link);
  return preg_replace("/[^0-9\.]/","",$link);
}

public function generujHeslo($pocetZnakov){
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$pocetZnakov);
}

public function microtimeSec(){
    list($usec, $sec) = explode(" ", microtime());
    $tmp = ((float)$usec + (float)$sec);
	$tmp1 = explode(".", $tmp);
	$tmp0  = $tmp1[0];
	return $tmp0;
}

public function is_mobile(){
	return preg_match("/(android|iPhone|iPod|iPad|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

public function getPripona($file){
	return pathinfo($file, PATHINFO_EXTENSION);
}

public function recurse_copy($src,$dst) { 
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

public function get_datum(){
	return $get_datum = "".date("d").".".date("m").".".date("Y")."";
}

public function get_rok(){
	return $get_rok = date("Y");
}

public function get_mesiac(){
	return $get_mesiac = date("m");
}


public function get_den(){
	return $get_den = date("d");
}
public function get_cas(){
	return $get_cas = date('H:i:s');
	}

public function get_os(){
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
	
	
public function set_rand_string($dlzka = 10){
  $retazec = "";
  $nahodne = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
  for($i = 0; $i < $dlzka; $i++){
    $retazec .= substr($nahodne,rand(0,strlen($nahodne)-1),1);
    // vrati true/false
  }
  return $retazec;
  //echo nahodny_retazec($dlzka = 10);
	}
public function set_four_one(){
	return "".rand(1, 9)."".rand(1, 9)."".rand(1, 9)."".rand(1, 9)."";
	}
public function name_url($url_adresa){    
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
  
public function is_external_url($name_url){
	if(self::in_string("http:\/\/", $name_url)){
		$return = true;
	}
	//https protocol
	elseif(self::in_string("https:\/\/", $name_url)){
		$return = true;
	}
	//protocol relative
	elseif(self::in_string("\/\/", $name_url)){
		$return = true;
	}else{
		$return = false;
	}
}
public function creat_name_url($name, $name_url){
	if(empty($name_url)){
		return self::name_url($name);
	}
	elseif(self::in_string("#", $name_url)){
		return $name_url;
	}
	//http is_external_url
	elseif(self::is_external_url($name_url)){
		return $name_url;
	}
	else{
		return self::name_url($name_url);
	}
}
  	
public function redirect($presmeruj_url){
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

public function presmeruj_url_by_js($presmeruj_url){
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$presmeruj_url.'"';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url='.$presmeruj_url.'" />';
}

public function safe($str) { 
    if(is_array($str)) 
        return array_map(__METHOD__, $str); 

    if(!empty($str) && is_string($str)) { 
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $str); 
    } 
    
    return $str = mysql_real_escape_string($str); 

}

public function obsah_uvod($str, $zobraz_znakov) {
	//return htmlspecialchars($str); 
	if(strlen($str) > $zobraz_znakov)
		return "".$str = substr($str, 0, $zobraz_znakov)."...";
	elseif(strlen($str) > 5)
		return $str;
	else
		return "Tento príspevok nemá žiaden náhľad článku, pretože sa jeho obsah pravdepodobne skladá z multymediálneho obsahu. Prosím kliknite na <b>čítať viac</b> a môžete prezerať vami vybraný obsah.";
}

public function get_perex($input, $maxWords, $maxChars)
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

public function perex($str, $maxPocetSlov){		 
	$str = not_html($str);
	$slova = explode(" ", $str);
	$pocetSlov = count($slova);
	
	for($i = 0; $i<$maxPocetSlov; $i++){
		$return .= " ".$slova[$i];
	}
	
	return $return."...";
	
}

public function not_html($str) {
	//return htmlspecialchars($str); 
	$str = strip_tags($str);
	$str = trim($str);
	return $str;
}

public function is_email($email){
	if ($email == "")
		return true;
  elseif(preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$/",$email))
    return true;
  else
    return false;
	}
	
public function is_iban($iban){
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
	
	
public function is_facebook_profil($facebook_profil){		
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
	
public function odstran_diakritiku($text){
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


public function my_email($predmet, $komu, $od_meno, $od_email, $email_sprava){

		$od_email = "info@query.sk";
		// carriage return type (we use a PHP end of line constant)
		$predmet =  $this->odstran_diakritiku($predmet);
		$od_meno =  $this->odstran_diakritiku($od_meno);
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
		
	public function returnInput(){
		echo "<input type='hidden' name='return' value='".WWW_FULL_PATH."' />";
	}
	
	public function confirmMsg($msg){
		return " onclick=\"return confirm('$msg');\" ";
	}
	
	
	public function getPostParam($table, $column, $post_id){
		$db 	= new Db;
		$rest 	= new Rest;
		
		$query 	= "SELECT `$column` FROM `$table` WHERE id = $post_id";
		if($db->num_rows($query)>0){
		   foreach($db->get_results($query) as $row){
			   return $row[$column];
		   }
		 }else{
			 return false;
		 }
		 
	}
	
	public function db_current_id($table, $and_where){
		$db 	= new Db;
		$rest 	= new Rest;
		
		$query 	= "SELECT `id` FROM `$table` WHERE vendor_id = '".Vendor::getId()."' $and_where ORDER BY id asc LIMIT 1";
		if($db->num_rows($query)>0){
		   foreach($db->get_results($query) as $row){
			   return $row['id'];
		   }
		 }else{
			 return false;
		 }
		 
	}

	
	public function db_next_id($table, $and_where, $currentId){
		$db 	= new Db;
		$rest 	= new Rest;
		
		$query 	= "SELECT `id` FROM `$table` WHERE `id` > '$currentId' AND `vendor_id` = '".Vendor::getId()."' $and_where LIMIT 1";
		if($db->num_rows($query)>0){
		   foreach($db->get_results($query) as $row){
			   return $row['id'];
		   }
		 }else{
			 return false;
		 }
		 
	}

}