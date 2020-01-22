<?php 
include "tpl_functions.php";			
$errTitle  = 'Problém s prihlásením';
$errContent  = 'Zadali ste nesprávne <b>meno</b>, alebo <b>heslo</b>. Akciu prosím zopakujte.<br/><br/> <a class="btn btn-primary" href="#" onclick="goBack()">Naspäť</a>';
errorAccess($errTitle, $errContent); 
?>