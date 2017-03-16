<?php
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);

$webhook = new Webhook;
$file = "../dnt-view/layouts/".Vendor::getLayout()."/conf.php";
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
	`vendor_id` = '".Vendor::getId()."' AND 
	`type` = 'article' 
  ORDER BY `order`";
 
$defaultLang = array(array("slug" => "")); 

$queryLangs = MultyLanguage::getLangs(1);
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
						$data[] = Url::get("WWW_PATH")."".$lang."".$addr."/".$row['id']."/".$row['name_url']."";
					}
				}	
			}else{
				foreach($addrs as $addr){
					$data[] = Url::get("WWW_PATH")."".$lang."".$addr;
				}
			}
			
		}
	}
}
 
 foreach($data as $value){
	echo $value."<br/>";
	//file_get_contents($value);
 }



//echo "OK";