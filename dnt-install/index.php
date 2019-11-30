<?php

require '../dnt-library/framework/app/Bootstrap.php';
$bootstrap = new Bootstrap('../../');
$bootstrap->boot();

class AppInstall {

    public function run() {
        $install = new Install();

        if (Install::db_exists()) {
            $web = Url::get("WWW_PATH") . "?t=" . Dnt::timestamp();
            $skel = Url::get("WWW_PATH") . "skeleton?t=" . Dnt::timestamp();
            $adm = WWW_PATH_ADMIN . "?t=" . Dnt::timestamp();
            echo
            '
	<!DOCTYPE html>
	<html lang="sk">
	  <head>
		<meta charset="utf-8">
		<title>Installed</title>
	  </head>
	  <body>
		<h3>Default layout web</h3>
		<p>Defaultný layout obsahuje primárne page 404, ktorý je konfigurovateľný z admina.<br/> <br/> 
		Je to hlavný 404 page, ktorý sa zobrazí napríkald vtedy, ak nie je nainštalovaný žiadny web v rámci platformy, 
		<br/> alebo request smeruje na neexistujúci web v rámci platformy.<br/><br/> 
		V rámci default layutu sme vytvorili <b><a target="_blank" href="' . $skel . '">skeleton site</a></b>, na ktorej je ukázané, ako funguje skladanie layoutu v rámci <b>dnt3</b> platformy
		</p>
		<table>
			<tr><td><b>Váš default web (message 404):</td><td><a target="_blank" href=' . $web . '></b>' . $web . '</a></td></tr>
			<tr><td><b>Váš skeleton web site:</td><td><a target="_blank" href=' . $skel . '></b>' . $skel . '</a></td></tr>
			<tr><td><b>Váš admin:</td><td><a target="_blank" href=' . $adm . '></b>' . $adm . '</a></td></tr>
			<tr><td><b>Váše prihlasovacie meno:</td><td>admin@root.sk</b></td></tr>
			<tr><td><b>Váše prihlasovacie heslo:</td><td>admin</b></td></tr>
		</table>
	  </body>
	</html>
	';
        } else {
            $install->installation();
            $web = Url::get("WWW_PATH") . "?t=" . Dnt::timestamp();
            $skel = Url::get("WWW_PATH") . "skeleton?t=" . Dnt::timestamp();
            $adm = WWW_PATH_ADMIN . "?t=" . Dnt::timestamp();
            echo
            '
	<!DOCTYPE html>
	<html lang="sk">
	  <head>
		<meta charset="utf-8">
		<title>Installed</title>
	  </head>
	  <body>
		<h3>Default layout web bol úspešne nainštalovaný</h3>
		<p>Defaultný layout obsahuje primárne page 404, ktorý je konfigurovateľný z admina.<br/> <br/> 
		Je to hlavný 404 page, ktorý sa zobrazí napríkald vtedy, ak nie je nainštalovaný žiadny web v rámci platformy, 
		<br/> alebo request smeruje na neexistujúci web v rámci platformy.<br/><br/> 
		V rámci default layutu sme vytvorili <b><a target="_blank" href="' . $skel . '">skeleton site</a></b>, na ktorej je ukázané, ako funguje skladanie layoutu v rámci <b>dnt3</b> platformy
		</p>
		<table>
			<tr><td><b>Váš default web (message 404):</td><td><a target="_blank" href=' . $web . '></b>' . $web . '</a></td></tr>
			<tr><td><b>Váš skeleton web site:</td><td><a target="_blank" href=' . $skel . '></b>' . $skel . '</a></td></tr>
			<tr><td><b>Váš admin:</td><td><a target="_blank" href=' . $adm . '></b>' . $adm . '</a></td></tr>
			<tr><td><b>Váše prihlasovacie meno:</td><td>admin@root.sk</b></td></tr>
			<tr><td><b>Váše prihlasovacie heslo:</td><td>admin</b></td></tr>
		</table>
	  </body>
	</html>
	';
        }
    }

}

(new AppInstall())->run();
