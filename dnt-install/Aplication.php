<?php

class AplicationInstall {

    protected $msg;
    protected $skel;
    protected $web;
    protected $adm;

    protected function template() {
        print ('<!DOCTYPE html>
	<html lang="sk">
	  <head>
		<meta charset="utf-8">
		<title>Installed</title>
	  </head>
	  <body>
		<h3>Default layout web' . $this->msg . '</h3>
		<p>Defaultný layout obsahuje primárne page 404, ktorý je konfigurovateľný z admina.<br/> <br/> 
		Je to hlavný 404 page, ktorý sa zobrazí napríkald vtedy, ak nie je nainštalovaný žiadny web v rámci platformy, 
		<br/> alebo request smeruje na neexistujúci web v rámci platformy.<br/><br/> 
		V rámci default layutu sme vytvorili <b><a target="_blank" href="' . $this->skel . '">skeleton site</a></b>, na ktorej je ukázané, ako funguje skladanie layoutu v rámci <b>dnt3</b> platformy</p>
		<table><tr><td><b>Váš default web (message 404):</td><td><a target="_blank" href=' . $this->web . '></b>' . $this->web . '</a></td></tr>
			<tr><td><b>Váš skeleton web site:</td><td><a target="_blank" href=' . $this->skel . '></b>' . $this->skel . '</a></td></tr>
			<tr><td><b>Váš admin:</td><td><a target="_blank" href=' . $this->adm . '></b>' . $this->adm . '</a></td></tr>
			<tr><td><b>Váše prihlasovacie meno:</td><td>admin@root.sk</b></td></tr>
			<tr><td><b>Váše prihlasovacie heslo:</td><td>admin</b></td></tr></table>
	  </body>
	</html>');
    }

    public function run() {
        $install = new Install();
        $this->web = Url::get("WWW_PATH") . "?t=" . Dnt::timestamp();
        $this->skel = Url::get("WWW_PATH") . "skeleton?t=" . Dnt::timestamp();
        $this->adm = WWW_PATH_ADMIN . "?t=" . Dnt::timestamp();

        if (Install::db_exists()) {
            $this->template();
        } else {
            $install->installation();
            $this->msg = ' bol úspešne nainštalovaný';
            $this->template();
        }
    }

}
