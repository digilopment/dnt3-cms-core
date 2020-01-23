<?php

/**
 *  Designdnt3 Application
 *  Framework Dnt3
 *  Dnt3 MultiDomain Platform
 *  CMS Designdnt3
 *  author: Digilopment
 * 
 */
class Run
{

    public function __construct()
    {
        require 'dnt-library/framework/app/Bootstrap.php';
    }

    public function main()
    {
        $bootstrap = new Bootstrap(__FILE__);
        $bootstrap->boot();
        $app = new App($bootstrap->client);
        $app->run();
    }
}

$run = new Run();
$run->main();
