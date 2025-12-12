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
ini_set('error_log', __DIR__ . '/../dnt-logs/php-errors.log');

// Fix session handler if memcached is not available
if (ini_get('session.save_handler') === 'memcached' || ini_get('session.save_handler') === 'memcache') {
    if (!extension_loaded('memcached') && !extension_loaded('memcache')) {
        ini_set('session.save_handler', 'files');
        $savePath = ini_get('session.save_path');
        if (empty($savePath) || !is_writable($savePath)) {
            $defaultPath = sys_get_temp_dir() . '/dnt-sessions';
            if (!is_dir($defaultPath)) {
                @mkdir($defaultPath, 0755, true);
            }
            if (is_dir($defaultPath) && is_writable($defaultPath)) {
                ini_set('session.save_path', $defaultPath);
            }
        }
    }
}

// Create logs directory if it doesn't exist
$logDir = __DIR__ . '/../dnt-logs';
if (!is_dir($logDir)) {
    @mkdir($logDir, 0755, true);
}

use DntLibrary\App\App;
use DntLibrary\App\Bootstrap;

(new class
{
    public function __construct()
    {
        require '../dnt-library/framework/app/Bootstrap.php';
    }

    public function run()
    {
        $bootstrap = new Bootstrap('../../');
        $bootstrap->boot();
        $app = new App($bootstrap->client);
        $app->runAdmin();
    }
})->run();
