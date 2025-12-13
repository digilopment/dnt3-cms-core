<?php
declare(strict_types=1);

namespace Index;

/**
 *  Designdnt3 Application
 *  Framework Dnt3
 *  Dnt3 MultiDomain Platform
 *  CMS Designdnt3
 *  author: Digilopment
 *
 */

use DntLibrary\App\App;
use DntLibrary\App\Bootstrap;

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
