<?php

/**
 *  Designdnt3 Application
 *  Framework Dnt3
 *  Dnt3 MultiDomain Platform
 *  CMS Designdnt3
 *  author: Digilopment
 * 
 */

namespace Index;

use DntLibrary\App\App;
use DntLibrary\App\Bootstrap;

(new class
{

    public function __construct()
    {
        require '../dnt-library/framework/app/Bootstrap.php';
    }

    public function main()
    {
        $bootstrap = new Bootstrap('../../');
        $bootstrap->boot();
        $app = new App($bootstrap->client);
        $app->runJob();
    }
})->main();
