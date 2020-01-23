<?php

class RouterAdmin
{

    protected $db;
    public $navigation;
    public $session;
    public $rest;

    public function __construct()
    {
        $this->db = new Db();
        $this->session = new Sessions();
        $this->rest = new Rest();
    }

    protected function redirect()
    {
        if (WWW_PATH_ADMIN_2 == HTTP_PROTOCOL . DOMAIN . WWW_FOLDERS . "/" . ADMIN_URL_2 . "/") {
            $vendors = Vendor::getAll();
            $lastVendor = end($vendors);
            $url = HTTP_PROTOCOL . $lastVendor['name_url'] . "." . DOMAIN . WWW_FOLDERS . "/" . ADMIN_URL_2 . "/";
            Dnt::redirect($url);
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

    protected function loadModul($module)
    {

        $classPrefix = $module;
        $classFile = (new Autoloader())->className($classPrefix) . "Controller.php";
        $className = (new Autoloader())->className($classPrefix) . "Controller";
        $file = "modules/" . $module . "/" . $classFile;
        if (file_exists($file)) {
            include $file;
            $moduleClass = new $className();
            if (method_exists($moduleClass, 'init')) {
                $moduleClass->init();
            }

            if (isset($_GET['action'])) {
                $methodName = (new Autoloader())->methodName($_GET['action']) . 'Action';
                if (method_exists($moduleClass, $methodName)) {
                    $moduleClass->$methodName();
                } else {
                    $moduleClass->indexAction();
                }
            } else {
                $moduleClass->indexAction();
            }
        } else {
            if (!$this->loadByWebhook($module)) {
                die('no action, no controller, no webhook');
            }
        }
    }

    protected function navigation()
    {
        $query = "SELECT * FROM `dnt_admin_menu` WHERE `parent_id` = '0' AND `show` = '1' AND `type` = 'menu' AND vendor_id = " . Vendor::getId() . "";
        $this->navigation = $this->db->get_results($query);
        array_push(
                $this->navigation,
                ["name_url" => "login"],
                ["name_url" => "logout"],
                ["name_url" => "pdfgen"],
                ["name_url" => "menucreator"],
                ["name_url" => "vendor"],
                ["name_url" => "services"],
                ["name_url" => "temporary-online"]
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

    public function init()
    {
        $this->redirect();
        $this->navigation();

        if ($this->session->get("admin_logged") && empty($this->rest->get('src'))) {
            Dnt::redirect('index.php?src=' . DEFAULT_MODUL_ADMIN);
        } elseif ($this->session->get("admin_logged")) {
            $getRequest = $this->rest->get('src');
            if (in_array($getRequest, $this->getNameUrlFromMenu())) {
                $this->loadModul($getRequest);
            } else {
                $this->loadModul('default');
            }
        } else {
            if ($this->rest->get('src') == "forgotten-password") {
                $this->loadModul('forgotten-password');
            } elseif ($this->rest->get('src') == "temporary-online") {
                $this->loadModul('temporary-online');
            } else {
                $this->loadModul('login');
            }
        }
    }

}
