<?php
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$install = new Install;

if(Install::db_exists()){
	$web = Url::get("WWW_PATH");
	$adm = WWW_PATH_ADMIN;
	echo 
	'
	<!DOCTYPE html>
	<html lang="sk">
	  <head>
		<meta charset="utf-8">
		<title>Installed</title>
	  </head>
	  <body>
		<h3>Skeletón je už nainštalovaný</h3>
		<table>
			<tr><td><b>Váš web:</td><td><a target="_blank" href='.$web.'></b>'.$web.'</a></td></tr>
			<tr><td><b>Váš admin:</td><td><a target="_blank" href='.$adm.'></b>'.$adm.'</a></td></tr>
			<tr><td><b>Váše prihlasovacie meno:</td><td>admin@root.sk</b></td></tr>
			<tr><td><b>Váše prihlasovacie heslo:</td><td>admin</b></td></tr>
		</table>
	  </body>
	</html>
	';
}else{
	$install->installation();
	$web = Url::get("WWW_PATH");
	$adm = WWW_PATH_ADMIN;
	echo 
	'
	<!DOCTYPE html>
	<html lang="sk">
	  <head>
		<meta charset="utf-8">
		<title>Installed</title>
	  </head>
	  <body>
		<h3>Skeletón bol úspešne nainštalovaný</h3>
		<table>
			<tr><td><b>Váš web:</td><td><a target="_blank" href='.$web.'></b>'.$web.'</a></td></tr>
			<tr><td><b>Váš admin:</td><td><a target="_blank" href='.$adm.'></b>'.WWW_PATH_ADMIN.'</a></td></tr>
			<tr><td><b>Váše prihlasovacie meno:</td><td>root@root.sk</b></td></tr>
			<tr><td><b>Váše prihlasovacie heslo:</td><td>admin</b></td></tr>
		</table>
	  </body>
	</html>
	';
}
