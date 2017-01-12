<?php
include "dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "/";
$autoload->load($path);
$rest = new Rest;
$dntUpload = new DntUpload;
$rest->get("type");

if($rest->get("type") == "square"){
	$face_detect = new FaceModify('dnt-library/framework/_Class/detection.dat');
	$face_detect->faceDetect('dnt-system/data/1/kubik.jpg');
	$face_detect->save(300,300,'dnt-system/data/1/kubik3.jpg');
}elseif($rest->get("type") == "upl"){
	
	if($rest->get("type") == "upl" && $rest->get("sent") == "true"){
		$uploaded=$dntUpload->addFaceDetect(
					"userfile",							//input type file
					"dnt_settings", 					//update table
					"dnt-system/data/".Vendor::getId(), //path
					"300" 								//width
				);
		echo '<a target="_blank" href="dnt-system/data/'.Vendor::getId().'/'.$uploaded['file_dst_name'].'">'.$uploaded['file_dst_name'].'</a>';
	}else{
		echo '
			<form id="obchod" enctype="multipart/form-data" action="/dnt3/dt.php?type=upl&sent=true" method="post">
                     <input type="file" name="userfile" class="btn-default btn-lg btn-block">
                    <input type="submit" name="odoslat_logo" class="btn btn-warning btn-radius" value="Upraviť nastavenia">
             </form>
		';
	}
}else{
	$detector = new FaceDetector('dnt-library/framework/_Class/detection.dat');
	$detector->faceDetect('dnt-system/data/1/kubik.jpg');
	$detector->toJpeg();
}
