<?php
$time_start = microtime(true);
include "../globals.php";
include	"../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);

$webhook = new Webhook;
$article = new ArticleView;
$rest = new Rest;

$serviceName = "wp_hotely";
$postId      = "14095";



$db = new Db;
$MAINquery = "SELECT * FROM dnt_posts WHERE `vendor_id` = '" . Vendor::getId() . "'";
if ($db->num_rows($MAINquery) > 0) {
	foreach ($db->get_results($MAINquery) as $row) {
		
		

		$serviceName = $row['service'];
		$postId      = $row['id_entity'];
		
		//var_dump($row['name'] ." - ". $postId . " - " . $serviceName);

		//BEGIN
		if(file_exists("../dnt-view/layouts/".Vendor::getLayout()."/modules/".$serviceName."/install/install.php")){
					
			require_once "../dnt-view/layouts/".Vendor::getLayout()."/modules/".$serviceName."/install/install.php";
			
			$SQL = "INSERT INTO `dnt_posts_meta` (
				`id`, `id_entity`, `post_id`, `service`, `vendor_id`, `key`, `value`, `content_type`, `cat_id`, `description`, `show`
			) VALUES ";
			
			/*** konfiguracne data v subore **/
			$array1 = array();
			$arrayOfDefaultMeta = $article->defaultMetaToArray($postId, $serviceName);
			foreach($arrayOfDefaultMeta as $meta){
				$array1[] = $meta['key'];
			}
			/*** realne data v databaze **/
			$array2 = array();
			foreach($article->getPostsMeta($postId, $serviceName) as $row){
				$array2[] = $row['key'];
			}
			
			$arrayDiff = array_diff($array1, $array2);
			foreach($arrayDiff as $key){
				echo $key . " - " . $postId ;
				echo "<br/>";
				/*$db->dbTransaction();
				$Insert = $article->defaultMetaToArray($postId, $serviceName, $key);
				$Insert = str_replace(",", "','", $Insert);
				$query 	= $SQL."('".$Insert."')";
				$query 	= str_replace("'null'", "null", $query);
				$db->query($query);
				$db->query("UPDATE `dnt_posts_meta` SET `id_entity` = `id` WHERE id_entity = 0 AND vendor_id = '".Vendor::getId()."'");
				$db->dbCommit();
				*/
			}
			echo "<br/><br/>";
			
		}
		//END
	}
}


