<?php

namespace DntAdmin\App;

use DntLibrary\App\Autoloader;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Vendor;

class RouterAdmin
{
    protected DB $db;
    protected Dnt $dnt;
    protected Vendor $vendor;

    public $navigation;

    public $session;

    public $rest;

    protected string $logFile;

    public function __construct()
    {
        $this->db = new DB();
        $this->dnt = new Dnt();
        $this->session = new Sessions();
        $this->rest = new Rest();
        $this->vendor = new Vendor();
        
        // Setup logging
        $logDir = dirname(__DIR__) . '/../dnt-logs';
        $this->logFile = $logDir . '/exception.log';
        if (!is_dir($logDir)) {
            @mkdir($logDir, 0755, true);
        }
        
        // CRITICAL: Initialize session immediately
        $this->session->init();
    }
    
    protected function log(string $level, string $message): void
    {
        $timestamp = date('Y-m-d H:i:s');
        $logMessage = "[{$timestamp}] [{$level}] RouterAdmin: {$message}\n";
        @file_put_contents($this->logFile, $logMessage, FILE_APPEND);
    }

    protected function redirect()
    {
        if (WWW_PATH_ADMIN_2 == HTTP_PROTOCOL . DOMAIN . WWW_FOLDERS . '/' . ADMIN_URL_2 . '/') {
            $vendors = $this->vendor->getAll();
            $lastVendor = end($vendors);
            $url = HTTP_PROTOCOL . $lastVendor['name_url'] . '.' . DOMAIN . WWW_FOLDERS . '/' . ADMIN_URL_2 . '/';
            $this->dnt->redirect($url);
        }
    }

    /**
     * old modules...
     */
    protected function loadByWebhook($module)
    {
        $file = 'modules/' . $module . '/webhook.php';
        $tplFunctions = 'plugins/tpl_functions.php';
        if (file_exists($tplFunctions)) {
            include $tplFunctions;
        }
        if (file_exists($file)) {
            include $file;
            return true;
        }
        return false;
    }

    protected function loadModul(string $module): void
    {
        $classPrefix = $module;
        $classFile = (new Autoloader())->className($classPrefix) . 'Controller.php';
        $className = (new Autoloader())->className($classPrefix) . 'Controller';
        $file = 'modules/' . $module . '/' . $classFile;
        if (file_exists($file)) {
            include $file;
            $fullClassName = 'DntAdmin\Moduls\\' . $className;
            if (!class_exists($fullClassName)) {
                error_log("RouterAdmin: Class {$fullClassName} not found for module {$module}");
                die('Class not found: ' . $fullClassName);
            }
            $moduleClass = new $fullClassName();
            if (method_exists($moduleClass, 'init')) {
                $moduleClass->init();
            }

            $action = $_GET['action'] ?? '';
            if (!empty($action)) {
                $methodName = (new Autoloader())->methodName($action) . 'Action';
                if (method_exists($moduleClass, $methodName)) {
                    $moduleClass->$methodName();
                } else {
                    error_log("RouterAdmin: Method {$methodName} not found in {$fullClassName}");
                    $moduleClass->indexAction();
                }
            } else {
                $moduleClass->indexAction();
            }
        } else {
            if (!$this->loadByWebhook($module)) {
                error_log("RouterAdmin: Module {$module} not found");
                die('no action, no controller, no webhook');
            }
        }
    }

    protected function navigation()
    {
        $query = "SELECT * FROM `dnt_admin_menu` WHERE `parent_id` = '0' AND `show` = '1' AND `type` = 'menu' AND vendor_id = " . $this->vendor->getId() . '';
        $this->navigation = $this->db->get_results($query);
        array_push(
            $this->navigation,
            ['name_url' => 'login'],
            ['name_url' => 'logout'],
            ['name_url' => 'pdfgen'],
            ['name_url' => 'menucreator'],
            ['name_url' => 'vendor'],
            ['name_url' => 'services'],
            ['name_url' => 'temporary-online']
        );
    }

    protected function getNameUrlFromMenu()
    {
        $nameUrls = [];
        foreach ($this->navigation as $row) {
            $nameUrls[] = $row['name_url'];
        }
        return $nameUrls;
    }

    public function init(): void
    {
        // Ensure session is initialized BEFORE anything else
        $this->session->init();
        
        $this->log('INFO', "RouterAdmin::init() started");
        $this->log('INFO', "Session status: " . session_status());
        $this->log('INFO', "Session ID: " . (session_id() ?: 'empty'));
        $this->log('INFO', "Session name: " . session_name());
        $this->log('INFO', "Session cookie params: " . json_encode(session_get_cookie_params(), JSON_UNESCAPED_UNICODE));
        $this->log('INFO', "Cookies: " . json_encode($_COOKIE ?? [], JSON_UNESCAPED_UNICODE));
        $this->log('INFO', "Session data: " . json_encode($_SESSION ?? [], JSON_UNESCAPED_UNICODE));
        
        $this->redirect();
        $this->navigation();

        $adminLogged = $this->session->get('admin_logged');
        $adminId = $this->session->get('admin_id');
        $src = $this->rest->get('src');
        
        $this->log('INFO', "admin_logged: " . ($adminLogged ?: 'false'));
        $this->log('INFO', "admin_id: " . ($adminId ?: 'empty'));
        $this->log('INFO', "src: " . ($src ?: 'empty'));
        
        if ($adminLogged && empty($src)) {
            $this->log('INFO', "Redirecting to default module");
            $this->dnt->redirect('index.php?src=' . DEFAULT_MODUL_ADMIN);
        } elseif ($adminLogged) {
            $this->log('INFO', "User is logged in, loading module: " . $src);
            $getRequest = $src;
            if (in_array($getRequest, $this->getNameUrlFromMenu(), true)) {
                $this->loadModul($getRequest);
            } else {
                $this->log('WARNING', "Module {$getRequest} not found in menu, loading default");
                $this->loadModul('default');
            }
        } else {
            $this->log('INFO', "User is NOT logged in");
            if ($src === 'forgotten-password') {
                $this->loadModul('forgotten-password');
            } elseif ($src === 'temporary-online') {
                $this->loadModul('temporary-online');
            } else {
                $this->loadModul('login');
            }
        }
    }
}
