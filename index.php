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

// Enable all error reporting including notices and warnings
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('log_errors', '1');
ini_set('error_log', __DIR__ . '/dnt-logs/php-errors.log');

// Create logs directory if it doesn't exist
$logDir = __DIR__ . '/dnt-logs';
if (!is_dir($logDir)) {
    @mkdir($logDir, 0755, true);
}

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
