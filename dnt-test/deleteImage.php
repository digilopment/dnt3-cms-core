<?php

include "../globals.php";
include "../dnt-library/framework/_Class/Autoload.php";
$autoload = new Autoload;
$path = "../";
$autoload->load($path);

$rest = new Rest;
$image = new Image;
$dntUpload = new DntUpload;


//VYMAZE SUBORY, KTORE UZ NEMAJU ZAZNAM V DATABASE
$db = new Db;
$images = array();
$query = "SELECT name FROM dnt_uploads";
$path  = "../dnt-view/data/uploads/";

echo "SUBORY, KTORE UZ NEMAJU ZAZNAM ANI DIPENDENCIU V DATABASE<br/>";
if ($db->num_rows($query) > 0) {
    foreach ($db->get_results($query) as $row) {
		$data = $image->hasDipendency($row['name'], "3");
		if(!$data){
			foreach($data as $file){
				$images[] = $file['image_url'];
			}
		}
    }
	
	//unique array
	$images = array_unique($images);
	foreach($images as $image){
		if(file_exists($path)){
			unlink($path);
			echo '<a href="'.$path.''.$image.'">'.$image."</a><br/>";
		}
	}
}
echo "<hr/>";

//VYMAZE SUBORY, KTORE KTORE BOLI UPLOADNUTE, ALE NEMAJU ZAZNAM V DATABASE
echo "SUBORY, KTORE BOLI UPLOADNUTE, ALE NEMAJU ZAZNAM V DATABASE<br/>";
$files = glob($path."*");
foreach($files as $file) {
	$fileName = str_replace($path, "", $file);
	if(filetype($file) == "file"){
		if(!$image->hasDipendency($fileName, false)){
			if(file_exists($path.$fileName)){
				unlink($path.$fileName);
				echo 'Deleted: <a href="'.$path.''.$fileName.'">'.$fileName."</a><br/>";
			}	
		}
	}
}