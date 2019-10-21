<?php
$path		= "../";
include "../dnt-library/framework/app/Bootstrap.php";
$vendor = new Vendor;
$db 	= new Db;


$json = file_get_contents('http://app.query.sk/json_data.json');
$obj = json_decode($json);

foreach($obj as $item){
	//var_dump($item->name);
	$insertedData = array(
		'vendor_id' 		=> Vendor::getId(), 
		'name' 				=> $item->name, 
		'cat_id' 			=> $item->id, 
		'`type`' 			=> "post", 
		'`service`' 		=> "article_view_meta", 
		'`name_url`' 		=> Dnt::name_url($item->name), 
		'datetime_creat' 	=> Dnt::datetime(),
		'datetime_update' 	=> Dnt::datetime(),
		'datetime_publish' 	=> Dnt::datetime(),
		'`show`' 			=> '1' 
	);
	//$db->dbTransaction();				
	$db->insert('dnt_posts', $insertedData);
	$lastId = Dnt::getLastId('dnt_posts');
	
		/*//BU
		if($item->bu && $item->bu == "ZE"){
			//var_dump($lastId);
			$c_type = "poll_id";
			$key	= "bu";
			$des	= "Bu check list";
			$val	= "";
			
			$insertedData = array(
				'post_id' 			=> $lastId, 
				'`service`' 		=> "article_view_meta", 
				'vendor_id' 		=> Vendor::getId(), 
				'`key`' 			=> $key, 
				'content_type' 		=> $c_type, 
				'cat_id' 			=> "3", 
				'description' 		=> $des, 
				'value' 			=> $val, 
				'`show`' 			=> '1' 
			);
			$db->insert('dnt_posts_meta', $insertedData);
			
		}
		elseif($item->bu && ($item->bu == "cross" || $item->bu == "o" || $item->bu == "tick")){
			$c_type = "content";
			$key	= "bu";
			$des	= "Bu info";
			$val 	= $item->des;
			
			$insertedData = array(
				'post_id' 			=> $lastId, 
				'`service`' 		=> "article_view_meta", 
				'vendor_id' 		=> Vendor::getId(), 
				'`key`' 			=> $key, 
				'content_type' 		=> $c_type, 
				'cat_id' 			=> "3", 
				'description' 		=> $des, 
				'value' 			=> $val, 
				'`show`' 			=> '1' 
			);
			$db->insert('dnt_posts_meta', $insertedData);
		}
		
		//GF
		if($item->gf && $item->gf == "ZE"){
			$c_type = "poll_id";
			$key	= "gf";
			$des	= "GF check list";
			$val	= "";
			
			$insertedData = array(
				'post_id' 			=> $lastId, 
				'`service`' 		=> "article_view_meta", 
				'vendor_id' 		=> Vendor::getId(), 
				'`key`' 				=> $key, 
				'content_type' 		=> $c_type, 
				'cat_id' 			=> "3", 
				'description' 		=> $des, 
				'value' 			=> $val, 
				'`show`' 			=> '1' 
			);
			$db->insert('dnt_posts_meta', $insertedData);
			
		}
		elseif($item->gf && ($item->gf == "cross" || $item->gf == "o" || $item->gf == "tick")){
			$c_type = "content";
			$key	= "gf";
			$des	= "GF info";
			$val 	= $item->des;
			
			$insertedData = array(
				'post_id' 			=> $lastId, 
				'`service`' 		=> "article_view_meta", 
				'vendor_id' 		=> Vendor::getId(), 
				'`key`' 			=> $key, 
				'content_type' 		=> $c_type, 
				'cat_id' 			=> "3", 
				'description' 		=> $des, 
				'value' 			=> $val, 
				'`show`' 			=> '1' 
			);
			$db->insert('dnt_posts_meta', $insertedData);
		}
		
		//DD
		if($item->dd && $item->dd == "ZE"){
			$c_type = "poll_id";
			$key	= "dd";
			$des	= "DD check list";
			$val	= "";
			
			$insertedData = array(
				'post_id' 			=> $lastId, 
				'`service`' 		=> "article_view_meta", 
				'vendor_id' 		=> Vendor::getId(), 
				'`key`' 			=> $key, 
				'content_type' 		=> $c_type, 
				'cat_id' 			=> "3", 
				'description' 		=> $des, 
				'value' 			=> $val, 
				'`show`' 			=> '1' 
			);
			$db->insert('dnt_posts_meta', $insertedData);
			
		}
		elseif($item->dd && ($item->dd == "cross" || $item->dd == "o" || $item->dd == "tick")){
			$c_type = "content";
			$key	= "dd";
			$des	= "Dd info";
			$val 	= $item->des;
			
			$insertedData = array(
				'post_id' 			=> $lastId, 
				'`service`' 		=> "article_view_meta", 
				'vendor_id' 		=> Vendor::getId(), 
				'`key`' 				=> $key, 
				'content_type' 		=> $c_type, 
				'cat_id' 			=> "3", 
				'description' 		=> $des, 
				'value' 			=> $val, 
				'`show`' 			=> '1' 
			);
			$db->insert('dnt_posts_meta', $insertedData);
		}
		
		//LV
		if($item->lv && $item->lv == "ZE"){
			$c_type = "poll_id";
			$key	= "lv";
			$des	= "Lv check list";
			$val	= "";
			
			$insertedData = array(
				'post_id' 			=> $lastId, 
				'`service`' 		=> "article_view_meta", 
				'vendor_id' 		=> Vendor::getId(), 
				'`key`' 				=> $key, 
				'content_type' 		=> $c_type, 
				'cat_id' 			=> "3", 
				'description' 		=> $des, 
				'value' 			=> $val, 
				'`show`' 			=> '1' 
			);
			$db->insert('dnt_posts_meta', $insertedData);
		
		}
		elseif($item->lv && ($item->lv == "cross" || $item->lv == "o" || $item->lv == "tick")){
			$c_type = "content";
			$key	= "lv";
			$des	= "Lv info";
			$val 	= $item->des;
			
			$insertedData = array(
				'post_id' 			=> $lastId, 
				'`service`' 		=> "article_view_meta", 
				'vendor_id' 		=> Vendor::getId(), 
				'`key`' 			=> $key, 
				'content_type' 		=> $c_type, 
				'cat_id' 			=> "3", 
				'description' 		=> $des, 
				'value' 			=> $val, 
				'`show`' 			=> '1' 
			);
			$db->insert('dnt_posts_meta', $insertedData);
		}
		*/
		
}
	

	/*
	if($item->gf != "ZE"){
		$insertedData = array(
			'post_id' 			=> $lastId, 
			'`service`' 		=> "article_view_meta", 
			'vendor_id' 		=> Vendor::getId(), 
			'`key`' 				=> "gf", 
			'content_type' 		=> "content", 
			'cat_id' 			=> "3", 
			'description' 		=> "GF info", 
			'value' 			=> $item->des, 
			'`show`' 			=> '1' 
		);
	}
	if($item->gf != "ZE"){
		$insertedData = array(
			'post_id' 			=> $lastId, 
			'`service`' 		=> "article_view_meta", 
			'vendor_id' 		=> Vendor::getId(), 
			'`key`' 				=> "gf", 
			'content_type' 		=> "content", 
			'cat_id' 			=> "3", 
			'description' 		=> "GF info", 
			'value' 			=> $item->des, 
			'`show`' 			=> '1' 
		);
	}
}

*/
/*
$insertedData = array(
	'vendor_id' 		=> Vendor::getId(), 
	'cat_id' 			=> $rest->get("filter"), 
	//'sub_cat_id' 		=> $rest->get("filter"), 
	'`type`' 			=> $rest->get("included"), 
	'datetime_creat' 	=> Dnt::datetime(),
	'datetime_update' 	=> Dnt::datetime(),
	'datetime_publish' 	=> Dnt::datetime(),
	'`show`' 			=> '0' 
);

$db->dbTransaction();				
$db->insert('dnt_posts', $insertedData);
*/




exit;
$json = file_get_contents('http://zupnypohar.query.sk/posts.php');
$obj = json_decode($json);
$insertToDatabase = true;


$i = 0;
$imgId = "";
foreach($obj as $item){
	if($i<1000){
	//"../dnt-view/data/uploads"
	$file = Dnt::downloadFile($item->file, "../dnt-view/data/uploads");
	$path = $file['path'];
	$file = $file['file'];
	$filePath = $path."".$file;
	echo "".$filePath."<br/>";

	$dntUpload = new Upload($filePath);
	$fileName = Vendor::getId() . "_" . md5(time()) . "_o";
	if ($dntUpload->uploaded) {
		$dntUpload->file_new_name_body = $fileName;
		$dntUpload->Process($path);
		if ($dntUpload->processed) {
			$insertedData = array(
				'vendor_id' => Vendor::getId(),
				'name' => $dntUpload->file_dst_name,
				'type' => $dntUpload->file_src_mime
			);
			if($insertToDatabase){
				$db->dbTransaction();
				$db->insert('dnt_uploads', $insertedData);
				$imgId = Dnt::getLastId('dnt_uploads');
                $db->dbCommit();
			}
			$returnInserted[] = $insertedData;
		}else{
			echo "err";
		}
	}
	
	$data[] = array(
		"file_id"	 => $imgId,
		"content"	 => $item->obsah,
		"name"	 	 => $item->nazov,
		"datetime_publish" 	=> "".$item->rok."-".$item->mesiac."-".$item->den." 11:00:00",
		);

	$i++;
	}

}
		
//var_dump($data);
$cat_id = 1044;
$type = "post";
foreach($data as $post){
	$insertedPostData = array(
		'vendor_id' 		=> Vendor::getId(), 
		'cat_id' 			=> $cat_id, 
		'content' 			=> $post['content'], 
		'img' 		=> $post['file_id'], 
		'name' 				=> $post['name'], 
		'name_url' 			=> Dnt::name_url($post['name']), 
		'`type`' 			=> $type, 
		'datetime_creat' 	=> Dnt::datetime(),
		'datetime_update' 	=> Dnt::datetime(),
		'datetime_publish' 	=> $post['datetime_publish'],
		'`show`' 			=> '1' 
	);
	if($insertToDatabase){
		$db->insert('dnt_posts', $insertedPostData);
	}
	var_dump($insertedPostData);
}

/*
if ($dnt->uploaded) {
   foreach(DntUpload::imageFormats() as $format){
	   $dnt->image_resize = true;
	   $dnt->image_x = $format;
	   $dnt->image_ratio_y = true;
	   $dnt->process("../dnt-view/data/uploads/formats/".$format);
	   $dnt->processed;
   }  
}else{
	echo $image . " sa nedá resiznut<br/>";
}
*/
//echo $filePath;

	/*$image = "http://query.sk/dnt-system/data/3/uploads/5767_20190119_zupny1.pdf";
	$dnt = new upload($image); 
	if ($dnt->uploaded) {
	   foreach(DntUpload::imageFormats() as $format){
		   $dnt->image_resize = true;
		   $dnt->image_x = $format;
		   $dnt->image_ratio_y = true;
		   $dnt->process("../dnt-view/data/uploads/formats/".$format);
		   $dnt->processed;
	   }  
	}else{
		echo $image . " sa nedá resiznut<br/>";
	}  */
	
/*foreach($obj as $item){
	echo $item->file;
}
*/
