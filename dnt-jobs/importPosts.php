<?php
include "../globals.php";
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$vendor 		= new Vendor;
$db 		= new Db;

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
