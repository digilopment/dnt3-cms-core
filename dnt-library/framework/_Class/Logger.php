<?php

/**
 *  class       Logger
 *  author      DNT3 Team
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2024
 * 
 *  Globálny logger systém pre DNT3 CMS
 *  - Automaticky zachytáva PHP errors, exceptions, warnings, notices, deprecated
 *  - Loguje do dnt-logs/exception.log
 *  - Poskytuje API pre info logy do dnt-logs/info.log
 */

namespace DntLibrary\Base;

class Logger
{
    protected static ?Logger $instance = null;
    protected string $logDir;
    protected string $exceptionLog;
    protected string $infoLog;
    protected bool $enabled;

    /**
     * Singleton pattern
     */
    private function __construct()
    {
        $this->logDir = __DIR__ . '/../../../../dnt-logs/';
        $this->exceptionLog = $this->logDir . 'exception.log';
        $this->infoLog = $this->logDir . 'info.log';
        $this->enabled = true;

        // Vytvor adresár ak neexistuje
        if (!is_dir($this->logDir)) {
            @mkdir($this->logDir, 0755, true);
        }
    }

    /**
     * Získanie inštancie Logger
     */
    public static function getInstance(): Logger
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Zapnutie/vypnutie logovania
     */
    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * Logovanie exception/error/warning/notice/deprecated
     */
    public function exception(string $message, array $context = [], string $file = '', int $line = 0): void
    {
        if (!$this->enabled) {
            return;
        }

        $logEntry = $this->formatLogEntry('EXCEPTION', $message, $context, $file, $line);
        $this->writeToFile($this->exceptionLog, $logEntry);
    }

    /**
     * Logovanie info správ
     */
    public function info(string $message, array $context = []): void
    {
        if (!$this->enabled) {
            return;
        }

        $logEntry = $this->formatLogEntry('INFO', $message, $context);
        $this->writeToFile($this->infoLog, $logEntry);
    }

    /**
     * Logovanie warning
     */
    public function warning(string $message, array $context = [], string $file = '', int $line = 0): void
    {
        if (!$this->enabled) {
            return;
        }

        $logEntry = $this->formatLogEntry('WARNING', $message, $context, $file, $line);
        $this->writeToFile($this->exceptionLog, $logEntry);
    }

    /**
     * Logovanie error
     */
    public function error(string $message, array $context = [], string $file = '', int $line = 0): void
    {
        if (!$this->enabled) {
            return;
        }

        $logEntry = $this->formatLogEntry('ERROR', $message, $context, $file, $line);
        $this->writeToFile($this->exceptionLog, $logEntry);
    }

    /**
     * Logovanie notice
     */
    public function notice(string $message, array $context = [], string $file = '', int $line = 0): void
    {
        if (!$this->enabled) {
            return;
        }

        $logEntry = $this->formatLogEntry('NOTICE', $message, $context, $file, $line);
        $this->writeToFile($this->exceptionLog, $logEntry);
    }

    /**
     * Logovanie deprecated warning
     */
    public function deprecated(string $message, array $context = [], string $file = '', int $line = 0): void
    {
        if (!$this->enabled) {
            return;
        }

        $logEntry = $this->formatLogEntry('DEPRECATED', $message, $context, $file, $line);
        $this->writeToFile($this->exceptionLog, $logEntry);
    }

    /**
     * Formátovanie log záznamu
     */
    protected function formatLogEntry(string $level, string $message, array $context = [], string $errorFile = '', int $errorLine = 0): string
    {
        $timestamp = date('Y-m-d H:i:s');
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $url = $_SERVER['REQUEST_URI'] ?? 'unknown';
        $method = $_SERVER['REQUEST_METHOD'] ?? 'unknown';
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';

        // Ak sú poskytnuté error file a line, použijeme ich, inak použijeme backtrace
        if ($errorFile && $errorLine) {
            $file = $errorFile;
            $line = $errorLine;
            $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 5);
            $function = $backtrace[3]['function'] ?? 'unknown';
        } else {
            // Backtrace informácie
            $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 5);
            $file = $backtrace[2]['file'] ?? 'unknown';
            $line = $backtrace[2]['line'] ?? 0;
            $function = $backtrace[2]['function'] ?? 'unknown';
        }

        // Relatívna cesta k súboru
        $file = str_replace(__DIR__ . '/../../../../', '', $file);

        $logEntry = sprintf(
            "[%s] [%s] %s\n",
            $timestamp,
            $level,
            $message
        );

        $logEntry .= sprintf(
            "  File: %s:%d\n  Function: %s\n  URL: %s %s\n  IP: %s\n",
            $file,
            $line,
            $function,
            $method,
            $url,
            $ip
        );

        if (!empty($context)) {
            $logEntry .= "  Context: " . json_encode($context, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";
        }

        $logEntry .= "  User-Agent: " . substr($userAgent, 0, 200) . "\n";
        $logEntry .= str_repeat('-', 80) . "\n";

        return $logEntry;
    }

    /**
     * Zápis do súboru
     */
    protected function writeToFile(string $file, string $content): void
    {
        @file_put_contents($file, $content, FILE_APPEND | LOCK_EX);
    }

    /**
     * PHP Error Handler
     */
    public function handleError(int $errno, string $errstr, string $errfile, int $errline): bool
    {
        // Check if this error type should be reported
        $errorReporting = error_reporting();
        if (!($errorReporting & $errno)) {
            return false; // Tento error kód nie je v error_reporting
        }

        $errfile = str_replace(__DIR__ . '/../../../../', '', $errfile);

        $message = sprintf(
            "%s in %s on line %d",
            $errstr,
            $errfile,
            $errline
        );

        $context = [
            'errno' => $errno,
            'errfile' => $errfile,
            'errline' => $errline,
            'error_reporting' => $errorReporting,
        ];

        switch ($errno) {
            case E_ERROR:
            case E_CORE_ERROR:
            case E_COMPILE_ERROR:
            case E_PARSE:
            case E_USER_ERROR:
                $this->error($message, $context, $errfile, $errline);
                break;

            case E_WARNING:
            case E_CORE_WARNING:
            case E_COMPILE_WARNING:
            case E_USER_WARNING:
                $this->warning($message, $context, $errfile, $errline);
                break;

            case E_NOTICE:
            case E_USER_NOTICE:
                $this->notice($message, $context, $errfile, $errline);
                break;

            case E_DEPRECATED:
            case E_USER_DEPRECATED:
                $this->deprecated($message, $context, $errfile, $errline);
                break;

            default:
                $this->error($message, $context, $errfile, $errline);
                break;
        }

        // Nezastavujeme vykonávanie skriptu
        return true;
    }

    /**
     * Exception Handler
     */
    public function handleException(\Throwable $exception): void
    {
        $message = sprintf(
            "Uncaught %s: %s in %s:%d\nStack trace:\n%s",
            get_class($exception),
            $exception->getMessage(),
            str_replace(__DIR__ . '/../../../../', '', $exception->getFile()),
            $exception->getLine(),
            $exception->getTraceAsString()
        );

        $context = [
            'exception' => get_class($exception),
            'file' => str_replace(__DIR__ . '/../../../../', '', $exception->getFile()),
            'line' => $exception->getLine(),
            'trace' => $exception->getTrace(),
        ];

        $this->exception($message, $context);
    }

    /**
     * Shutdown Handler - zachytáva fatal errors
     */
    public function handleShutdown(): void
    {
        $error = error_get_last();

        if ($error !== null && in_array($error['type'], [E_ERROR, E_CORE_ERROR, E_COMPILE_ERROR, E_PARSE])) {
            $message = sprintf(
                "Fatal error: %s in %s on line %d",
                $error['message'],
                str_replace(__DIR__ . '/../../../../', '', $error['file']),
                $error['line']
            );

            $context = [
                'type' => $error['type'],
                'file' => str_replace(__DIR__ . '/../../../../', '', $error['file']),
                'line' => $error['line'],
            ];

            $this->error($message, $context);
        }
    }

    /**
     * Registrácia error a exception handlerov
     */
    public function registerHandlers(): void
    {
        set_error_handler([$this, 'handleError']);
        set_exception_handler([$this, 'handleException']);
        register_shutdown_function([$this, 'handleShutdown']);
    }

    /**
     * Vymazanie logov (voliteľné)
     */
    public function clearLogs(string $type = 'all'): void
    {
        if ($type === 'all' || $type === 'exception') {
            @unlink($this->exceptionLog);
        }
        if ($type === 'all' || $type === 'info') {
            @unlink($this->infoLog);
        }
    }

    /**
     * Získanie veľkosti log súborov
     */
    public function getLogSize(string $type = 'all'): array
    {
        $sizes = [];

        if ($type === 'all' || $type === 'exception') {
            $sizes['exception'] = file_exists($this->exceptionLog) ? filesize($this->exceptionLog) : 0;
        }

        if ($type === 'all' || $type === 'info') {
            $sizes['info'] = file_exists($this->infoLog) ? filesize($this->infoLog) : 0;
        }

        return $sizes;
    }
}

