<?php

/**
 * Simple Error Logger
 * Logs all PHP errors/notices/warnings/deprecated to dnt-logs/exception.log
 */

namespace DntLibrary\Base;

class ErrorLogger
{
    protected static string $logDir;
    protected static string $logFile;

    /**
     * Initialize error logging
     */
    public static function init(string $baseDir): void
    {
        // Configure PHP error reporting
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        ini_set('log_errors', '1');
        ini_set('error_log', $baseDir . '/dnt-logs/php-errors.log');

        self::$logDir = $baseDir . '/dnt-logs';
        self::$logFile = self::$logDir . '/exception.log';

        // Create logs directory if it doesn't exist
        if (!is_dir(self::$logDir)) {
            @mkdir(self::$logDir, 0755, true);
        }

        // Set error handler
        set_error_handler([self::class, 'handleError']);

        // Set exception handler
        set_exception_handler([self::class, 'handleException']);
    }

    /**
     * Error handler
     */
    public static function handleError(int $errno, string $errstr, string $errfile, int $errline): bool
    {
        // Check if error should be reported
        if (!(error_reporting() & $errno)) {
            return false;
        }

        // Determine error type
        $errorType = 'ERROR';
        switch ($errno) {
            case E_ERROR:
            case E_CORE_ERROR:
            case E_COMPILE_ERROR:
            case E_PARSE:
            case E_USER_ERROR:
                $errorType = 'ERROR';
                break;
            case E_WARNING:
            case E_CORE_WARNING:
            case E_COMPILE_WARNING:
            case E_USER_WARNING:
                $errorType = 'WARNING';
                break;
            case E_NOTICE:
            case E_USER_NOTICE:
                $errorType = 'NOTICE';
                break;
            case E_DEPRECATED:
            case E_USER_DEPRECATED:
                $errorType = 'DEPRECATED';
                break;
        }

        // Format log entry
        $timestamp = date('Y-m-d H:i:s');
        // Make file path relative to project root
        $basePath = dirname(self::$logDir);
        $errfile = str_replace($basePath . '/', '', $errfile);
        $logEntry = sprintf(
            "[%s] [%s] %s in %s on line %d\n",
            $timestamp,
            $errorType,
            $errstr,
            $errfile,
            $errline
        );

        // Write to exception.log
        @file_put_contents(self::$logFile, $logEntry, FILE_APPEND | LOCK_EX);

        // Return false to let PHP handle the error normally (display on web)
        return false;
    }

    /**
     * Exception handler
     */
    public static function handleException(\Throwable $exception): void
    {
        $timestamp = date('Y-m-d H:i:s');
        // Make file path relative to project root
        $basePath = dirname(self::$logDir);
        $file = str_replace($basePath . '/', '', $exception->getFile());
        $logEntry = sprintf(
            "[%s] [EXCEPTION] %s in %s on line %d\nStack trace:\n%s\n%s\n",
            $timestamp,
            $exception->getMessage(),
            $file,
            $exception->getLine(),
            $exception->getTraceAsString(),
            str_repeat('-', 80) . "\n"
        );

        @file_put_contents(self::$logFile, $logEntry, FILE_APPEND | LOCK_EX);

        // Re-throw to display on web
        throw $exception;
    }
}

