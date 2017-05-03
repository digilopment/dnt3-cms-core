<?php

Class MicroWeb{
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
			"roboto" 				=> "Roboto",
			"Arial" 				=> "Arial",
			"Georgia" 				=> "Georgia",
			"Calibri" 				=> "Calibri",
			"Cambria" 				=> "Cambria",
			"Lucida Sans Unicode" 	=> "Lucida Sans Unicode",
			"Myriad Pro Regular " 	=> "Myriad Pro Regular",
			"Tahoma" 				=> "Tahoma",
			"Verdana" 				=> "Verdana",
			//"Times New Roman" 	=> "Times New Roman",
			//"bebas_neueregular" 	=> "Bebas",
			//"impact" 	=> "Impact",
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
}