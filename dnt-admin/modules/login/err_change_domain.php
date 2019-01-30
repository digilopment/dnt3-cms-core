<?php 
include "tpl_functions.php";			
$errTitle  = 'Používateľ nie je vytvorený, alebo nemá príslušné oprávnenia';
$errContent  = 'Do webu <b>'.SERVER_NAME.'</b>, nie je možné prihlásiť používateľa s emailom '.$email.'. Tento email nie je autorizovaný pre správu webu pod doménou <b>'.SERVER_NAME.'</b>.<br/>Prosím kontaktuje správcu, aplikácie.<br/><br/><a class="btn btn-primary" onclick="goBack()" href="#">Naspäť</a>';
errorAccess($errTitle, $errContent); 
?>