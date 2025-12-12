<?php

/**
 *  class       Sessions
 *  author      Tomas Doubek
 *  framework   Sessions
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

class Sessions
{
    protected ?string $sessionID = null;

    public function init(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            // Check if headers are already sent
            if (headers_sent($file, $line)) {
                error_log("Sessions::init() - Headers already sent in {$file} on line {$line}");
                return;
            }
            
            // Check if session save handler is available
            $saveHandler = ini_get('session.save_handler');
            if ($saveHandler === 'memcached' || $saveHandler === 'memcache') {
                // Check if memcached extension is loaded
                if (!extension_loaded('memcached') && !extension_loaded('memcache')) {
                    // Fallback to files if memcached is not available
                    ini_set('session.save_handler', 'files');
                    $savePath = ini_get('session.save_path');
                    if (empty($savePath) || !is_writable($savePath)) {
                        // Set default save path if not writable
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
            
            // Set session cookie parameters before starting (only if headers not sent)
            if (!headers_sent()) {
                $cookieParams = session_get_cookie_params();
                session_set_cookie_params([
                    'lifetime' => $cookieParams['lifetime'] ?: 0,
                    'path' => $cookieParams['path'] ?: '/',
                    'domain' => $cookieParams['domain'] ?: '',
                    'secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on',
                    'httponly' => true,
                    'samesite' => 'Lax'
                ]);
            }
            
            try {
                if (!headers_sent()) {
                    session_start();
                }
            } catch (\Exception $e) {
                // If session start fails, try with files handler
                if (!headers_sent()) {
                    ini_set('session.save_handler', 'files');
                    $defaultPath = sys_get_temp_dir() . '/dnt-sessions';
                    if (!is_dir($defaultPath)) {
                        @mkdir($defaultPath, 0755, true);
                    }
                    if (is_dir($defaultPath) && is_writable($defaultPath)) {
                        ini_set('session.save_path', $defaultPath);
                    }
                    session_start();
                }
            }
        }
    }

    public function set_session_id(): void
    {
        $this->sessionID = session_id();
    }

    /**
     *
     * @return string|null
     */
    public function get_session_id(): ?string
    {
        return $this->sessionID;
    }

    /**
     *
     * @param string $session_name
     * @return bool
     */
    public function exist(string $session_name): bool
    {
        return isset($_SESSION[$session_name]);
    }

    /**
     *
     * @param string $session_name
     * @param bool $is_array
     * @return void
     */
    public function create(string $session_name, bool $is_array = false): void
    {
        if (!isset($_SESSION[$session_name])) {
            $_SESSION[$session_name] = $is_array ? [] : '';
        }
    }

    /**
     *
     * @param string $session_name
     * @param array $data
     * @return void
     */
    public function insert(string $session_name, array $data): void
    {
        if (isset($_SESSION[$session_name]) && is_array($_SESSION[$session_name])) {
            $_SESSION[$session_name][] = $data;
        }
    }

    /**
     *
     * @param string $session_name
     * @return void
     */
    public function display_session(string $session_name): void
    {
        echo '<pre>';
        print_r($_SESSION[$session_name] ?? null);
        echo '</pre>';
    }

    /**
     *
     * @param string $session_name
     * @return void
     */
    public function remove(string $session_name = ''): void
    {
        if (!empty($session_name)) {
            unset($_SESSION[$session_name]);
        } else {
            $_SESSION = [];
        }
    }

    /**
     *
     * @param string $session_name
     * @return mixed
     */
    public function get(string $session_name)
    {
        return $_SESSION[$session_name] ?? false;
    }

    /**
     *
     * @param string $session_name
     * @param mixed $data
     * @return void
     */
    public function set(string $session_name, $data): void
    {
        $_SESSION[$session_name] = $data;
    }
}
