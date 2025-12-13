<?php
/**
 * Logger Initialization
 * This file initializes Logger with error handlers
 * Must be included after declare(strict_types=1) but before namespace
 */

// Enable all error reporting including notices and warnings
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('log_errors', '1');
ini_set('error_log', __DIR__ . '/../../../dnt-logs/php-errors.log');

// Create logs directory if it doesn't exist
$logDir = __DIR__ . '/../../../dnt-logs';
if (!is_dir($logDir)) {
    @mkdir($logDir, 0755, true);
}

// Initialize Logger IMMEDIATELY - before namespace to catch all errors
require_once __DIR__ . '/_Class/Logger.php';
require_once __DIR__ . '/_Class/LoggerFunctions.php';

// Register Logger handlers IMMEDIATELY - before any other code
\DntLibrary\Base\Logger::getInstance()->registerHandlers();

