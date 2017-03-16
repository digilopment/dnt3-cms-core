<?php
error_reporting(0);

include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$webhook = new Webhook;



$WWW_PATH 		= "http://localhost/dnt3/";
$VENDOR_LAYOUT 	= "osmos";
$VENDOR_ID		= "2";

//exit;

$file = "../dnt-view/layouts/".$VENDOR_LAYOUT."/conf.php";
if(file_exists($file)){
	include_once $file;
	if(function_exists("custom_modules")){
		$custom_modules = custom_modules();
	}else{
		$custom_modules = false;
	}
}else{
	$custom_modules = false;
}

//var_dump($webhook->get($custom_modules));
$db = new Db;

  $query = "SELECT * FROM `dnt_posts` 
  WHERE 
	`vendor_id` = '".$VENDOR_ID."' AND 
	`type` = 'article' 
  ORDER BY `order`";
 
$defaultLang = array(array("slug" => "")); 

$queryLangs = "SELECT * FROM dnt_languages WHERE `show` = '1' AND vendor_id = '".$VENDOR_ID."'";
	if($db->num_rows($queryLangs)>0){
	$langs = array_merge($db->get_results($queryLangs), $defaultLang);
	   foreach($langs as $rowLangs){
		   if($rowLangs['slug'])
			$lang = $rowLangs['slug']."/";
		   else
			   $lang = false;

		foreach($webhook->get($custom_modules) as $moduleName=>$addrs){
			
			if($moduleName == "article_view"){
				if ($db->num_rows($query) > 0){
					foreach($db->get_results($query) as $row){
						$data[] = $WWW_PATH."".$lang."".$addr."/".$row['id']."/".$row['name_url']."";
					}
				}	
			}else{
				foreach($addrs as $addr){
					$data[] = $WWW_PATH."".$lang."".$addr;
				}
			}
			
		}
	}
}
 
 foreach($data as $value){
	echo $value."\n";
	//file_get_contents($value);
 }
 
// echo "OK";
   
   //echo count($data);
   
//echo file_get_contents("http://osmos.localhost/dnt3/");


//echo "OK";