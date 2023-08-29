<?php 		
$errTitle  = 'Používateľ nie je vytvorený, alebo nemá príslušné oprávnenia';
$errContent  = 'Do webu <b>'.SERVER_NAME.'</b>, nie je možné prihlásiť používateľa s emailom '.$data['email'].'. Tento email nie je autorizovaný pre správu webu pod doménou <b>'.SERVER_NAME.'</b>.<br/>Prosím kontaktuje správcu, aplikácie.<br/><br/><a class="btn btn-primary" onclick="goBack()" href="#">Naspäť</a> <a class="btn btn-primary bg-green" href="'.WWW_PATH_ADMIN_2.'">Prihlásiť sa s iným účtom</a>';
errorAccess($errTitle, $errContent); 