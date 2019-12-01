<?php

/**
 *  Designdnt3 Application
 *  Framework Dnt3
 *  Dnt3 MultiDomain Platform
 *  CMS Designdnt3
 *  author: Digilopment
 * 
 */
class Init {

    public function __construct() {
        require 'dnt-library/framework/app/Bootstrap.php';
    }

    public function run() {
        $bootstrap = new Bootstrap(__FILE__);
        $bootstrap->boot();
        $app = new App($bootstrap->client);
        $app->run();
    }

}

(new Init())->run();
