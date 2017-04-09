<?php
$rest 		= new Rest;

if($rest->webhook(6)){ //o jeden vyssi webhook ako maximalnz mozny
	$rest->loadDefault();
}
elseif(
	$rest->webhook(2) == "api" && 
	$rest->webhook(3) == "json" && 
	$rest->webhook(4) == "ajax-form"){
	include "ajax-form.php";
}else{
	$rest->loadDefault();
}
