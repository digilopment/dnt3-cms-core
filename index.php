<?php
include "autoload.php";
//http://localhost/dnt3/sk/domov?a=35&45=2
/* webhook defined
	0 => lang  //not important
	1 => main modul
	2 => main category
	3 => sub category
	4 => sub category
*/

$rest = new Rest;
echo $rest->getModul();

if($rest->getModul()){
	
	$rest->loadModul();
	echo $rest->getModul();
	echo $rest->webhook(0);
	
	
	if($rest->webhook(0) == "sk"){
		echo "Slovensky";
	}
	if($rest->webhook(0) == "en"){
		echo "English";
	}
}else{
	//echo "NOT FOUND";
	//echo "25";
	$rest->loadMyModul("default");
	
}