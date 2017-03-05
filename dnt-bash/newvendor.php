<?php
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);

//instance
$db 			= new Db;
$XMLgenerator	= new XMLgenerator;
$api			= new Api;

//settings
$COPY_FROM 		= 2;
$NEW_VENDOR_ID 	= 3;
$STATUS 		= "creat"; //add;dell

//tabulky
$tables = array(
	//"dnt_api",
	//"dnt_languages",
	/*"dnt_posts",
	"dnt_post_type",
	"dnt_polls",
	"dnt_polls_composer",
	*/
	//VSETKY STLPCE
	"dnt_admin_menu",
	"dnt_api",
	"dnt_config",
	"dnt_languages",
	"dnt_logs",
	"dnt_mailer_mails",
	"dnt_mailer_type",
	"dnt_polls",
	"dnt_polls_composer",
	"dnt_posts",
	"dnt_posts_meta",
	"dnt_post_type",
	"dnt_settings",
	"dnt_translates",
	"dnt_uploads",
	"dnt_users",
);


function getColumns($query){
		$db = new DB();
		$i = 1;
		if ($db->num_rows($query) > 0){
				foreach($db->get_results($query) as $childArr){
					if($i == 1){
					foreach($childArr as $key => $value){
						if($key != "id" && $key != "vendor_id"){
							$arr[]=$key;
						}
					}
					$i++;
				}
			}
			return $arr;
		}
		else{
			return false;
		}
	}
	
if($STATUS == "del"){
	foreach($tables as $table){
		$where = array( 'vendor_id' => $NEW_VENDOR_ID);
		$db->delete( $table, $where);
	}
}else{
	foreach($tables as $table){
		//tabulka
		$query = "SELECT * FROM $table WHERE vendor_id = '$COPY_FROM'";
		if ($db->num_rows($query) > 0){
			$data = array();
			foreach($db->get_results($query) as $row){
				
				//stlpce
				foreach(getColumns($query) as $column){
					$data["`".$column."`"] =$row[$column];
					$data["vendor_id"] =$NEW_VENDOR_ID;
					echo "OK".$column."<br/>";
				}
				$db->insert($table, $data);
				var_dump($data);
				//echo "OK <hr/>";
			}
		}
		echo "<hr/>";
		echo "<hr/>";
	}
	
	//DELETE DATA FROM
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
	foreach($tables as $table){
		$where = array( 'vendor_id' => $NEW_VENDOR_ID);
		$db->delete( $table, $where);
	}
	
	//CREAT POST COMPOSER
}


//var_dump($api->getColumns($query));
/*
foreach($api->getColumns($query) as $column){
	echo $column;
}
*/

/*
if ($db->num_rows($query) > 0){
	foreach($db->get_results($query) as $row){
		return $row[$column];
	}
}else{
	return false;
}
*/

/*
//SQL POST_TYPE
INSERT INTO `dnt_post_type` (`id`, `cat_id`, `sub_cat_id`, `name_url`, `admin_cat`, `name`, `show`, `order`, `vendor_id`, `parent_id`) VALUES 
(NULL, '1', '0', 'sitemap', 'sitemap', 'Stránky', '1', '0', '2', '0'),
(NULL, '1', '0', 'sitemap-sub', 'sitemap', 'Podstránky', '1', '0', '2', '0'),
(NULL, '1', '0', 'article', 'sitemap', 'Články', '1', '0', '2', '0'),
(NULL, '3', '0', 'newsletter', 'post', 'Newslettre', '1', '0', '2', '0'),
(NULL, '2', '0', 'domace', 'article', 'Domáce', '1', '0', '2', '0')
*/
		
echo "OK";