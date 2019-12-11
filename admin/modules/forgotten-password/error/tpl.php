<?php 
include "tpl_functions.php"; 

$errTitle 	= "Access error / <strong>licence error</strong>";
$errContent = "<strong>Sorry, you do not have a licence to access and use this application in other country.</strong> <br/>This application was built for slovak usage. Please contact slovak support.";
errorAccess($errTitle,$errContent);
?>
