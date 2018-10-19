<?php
/*
 *
 *CONFIGURACIA PRE VENDORA
 *
*/

$VENDOR_CONF = 
array(
	array(
		"WWW_PATH" 		=> "http://dnt3.loc/dnt3/",
		"VENDOR_LAYOUT" => "osmos",
		"VENDOR_ID" 	=> "2",
	),
	array(
		"WWW_PATH" 		=> "http://nastrojaren.dnt3.loc/dnt3/",
		"VENDOR_LAYOUT" => "nastrojaren",
		"VENDOR_ID" 	=> "3",
	),
	array(
		"WWW_PATH" 		=> "http://pdc.dnt3.loc/dnt3/",
		"VENDOR_LAYOUT" => "pdc",
		"VENDOR_ID" 	=> "8",
	),
);


error_reporting(0);
include "../globals.php";
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$webhook = new Webhook;

foreach($VENDOR_CONF as $CONF){
/*$file = "../dnt-view/layouts/".$CONF['VENDOR_LAYOUT']."/conf.php";
if(file_exists($file)){
	include_once $file;
	if(function_exists("custom_modules")){
		$custom_modules = custom_modules();
	}else{
		$custom_modules = false;
	}
}else{
	$custom_modules = false;
}*/
$db = new Db;

$articleqQuery	= "SELECT * FROM `dnt_posts` WHERE `vendor_id` = '".$CONF['VENDOR_ID']."' AND `type` = 'article' ORDER BY `order`";
$langQuery 		= "SELECT * FROM dnt_languages WHERE `show` = '1' AND vendor_id = '".$CONF['VENDOR_ID']."'";
$sitemapQuery 	= "SELECT * FROM `dnt_posts` WHERE `show` = '1' AND `type` = 'sitemap' AND vendor_id = '".$CONF['VENDOR_ID']."'";

$defaultLang = array(array("slug" => "")); 
	if($db->num_rows($langQuery)>0){
	$langs = array_merge($db->get_results($langQuery), $defaultLang);
	   foreach($langs as $rowLangs){
		   if($rowLangs['slug'])
				$lang = $rowLangs['slug']."/";
		   else
			   $lang = false;
				foreach($webhook->get($custom_modules) as $moduleName=>$addrs){
					foreach($addrs as $addr){
					if($moduleName == "article_view"){
						if ($db->num_rows($articleqQuery) > 0){
							foreach($db->get_results($articleqQuery) as $row){
								$data[] = $CONF['WWW_PATH']."".$lang."clanok/".$row['id']."/".$row['name_url']."";
							}
						}	
					}
					elseif($moduleName == "article_list"){
								$data[] = $CONF['WWW_PATH']."".$lang."clanky/novinky";
					}else{
							$data[] = $CONF['WWW_PATH']."".$lang."".$addr;
					}
				}	
			}
			
			//sitemap
			if ($db->num_rows($sitemapQuery) > 0){
				foreach($db->get_results($sitemapQuery) as $row){
					$data[] = $CONF['WWW_PATH']."".$lang."".$row['name_url']."";
				}
			}	
		}
	}
}
$data  =array_unique($data);
echo "\n GENERATING ".count($data). " CACHE FILES\n";
$i = 1;
$j = count($data)-1;
foreach($data as $value){
	file_get_contents($value);
	echo "".$i." | ".$j."  => ".$value."\n";
	$i++;
	$j--;
}
echo "\n\nOK ".count($data). " CACHE FILES WAS GENERATED\n";