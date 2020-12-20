<?php

/**
 *  class       Settings
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\DB;
use DntLibrary\Base\Vendor;
use DntView\Layout\Configurator;
use function websettings;

/**
 * GET VENDOR SETTING: $this->settings->getGlobals()->vendor['foo']
 */
class Settings
{

	public function __construct(){
		$this->db = new DB();
		$this->vendor = new Vendor();
	}
    /**
     * 
     * @param type $key
     * @return boolean
     */
    public function get($key)
    {
        $query = "SELECT value FROM dnt_settings WHERE `key` = '" . $key . "' AND `vendor_id` = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                return $row['value'];
            }
        } else {
            return false;
        }
    }

    public function getGlobals()
    {
        $parsed = [];
        foreach (array_keys($GLOBALS) as $key) {
            $parsed[strtolower($key)] = $GLOBALS[$key];
        }

        foreach ($parsed['globals']['GLOBALS'] as $key2 => $val) {
            $final[strtolower($key2)] = $GLOBALS[$key2];
        }
        
        $final['database'] = $this->getAllSettings();

        $vendorLoadedSettings = [];
        $file = __DIR__ . "/../../../dnt-view/layouts/" . $this->vendor->getLayout() . "/Configurator.php";
        if (!class_exists('Configurator')) {
            if (file_exists($file)) {
                include_once $file;
                $configurator = new Configurator();
                if (method_exists($configurator, 'vendorConfig')) {
                    $vendorLoadedSettings = $configurator->vendorConfig();
                }
            }
        } else {
            $configurator = new Configurator();
            if (method_exists($configurator, 'vendorConfig')) {
                $vendorLoadedSettings = $configurator->vendorConfig();
            }
        }
        $vendorSettings = ['vendor' => $vendorLoadedSettings];

        return (object) array_merge($final, $vendorSettings);
    }

    /**
     * 
     * @param type $key
     * @return boolean
     */
    public function show($key)
    {
        $query = "SELECT * FROM dnt_settings WHERE `key` = '" . $key . "' AND `vendor_id` = '" . $this->vendor->getId() . "' AND `show` = '1'";
        if ($this->db->num_rows($query) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $catId
     * @return boolean
     */
    public function customMeta($catId = false)
    {
        if ($catId) {
            $query = "SELECT * FROM dnt_settings WHERE `type` = '$catId' AND `vendor_id` = '" . $this->vendor->getId() . "' ORDER BY `order`";
        } else {
            $query = "SELECT * FROM dnt_settings WHERE `type` = 'custom' AND `vendor_id` = '" . $this->vendor->getId() . "' ORDER BY `order`";
        }
        if ($this->db->num_rows($query) > 0) {
            return $this->db->get_results($query);
        } else {
            return false;
        }
    }

    /**
     * 
     * @return type
     */
    public function getMetaData()
    {
        $query = "SELECT * FROM dnt_settings WHERE `type` = 'custom' AND `vendor_id` = '" . $this->vendor->getId() . "'";

        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $arr['keys'][$row['key']]['show'] = $row['show'];
                $arr['keys'][$row['key']]['value'] = $row['value'];
            }
            return $arr;
        }
        return array();
    }

    /**
     * 
     * @return type
     */
    public function getAllSettings()
    {
        $query = "SELECT * FROM dnt_settings WHERE `vendor_id` = '" . $this->vendor->getId() . "'";

        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $arr['keys'][$row['key']]['show'] = $row['show'];
                $arr['keys'][$row['key']]['value'] = $row['value'];
            }
            return $arr;
        }
        return array();
    }

    /**
     * 
     * @param type $key
     * @return boolean
     */
    public function getImage($key)
    {
        if (is_numeric($key)) {
            $imageId = $key;
        } else {
            $imageId = $this->get($key);
        }

        $query = "SELECT name FROM dnt_uploads WHERE `id_entity` = '" . $imageId . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                return WWW_CDN_PATH . "dnt-view/data/uploads/" . $row['name'];
            }
        } else {
            return false;
        }
    }

    /**
     * 
     * @return type
     */
    public function showStatus()
    {
        return array(
            "0" => "Vymazať",
            "1" => "Publikovať post",
            "2" => "Povoliť na webe (nezobrazí sa v menu alebo listingu)",
            "3" => "Skryť z webu",
        );
    }

    protected function settingsConf()
    {
        $settingsData = false;
        $conf = __DIR__ . "/../../../dnt-view/layouts/" . $this->vendor->getLayout() . "/conf.php";
        if (!function_exists("websettings")) {
            if (file_exists($conf)) {
                include $conf;
                if (function_exists("websettings")) {
                    $settingsData = websettings();
                }
            }
        }

        return $settingsData;
    }

    protected function settingsConfigurator()
    {
        $file = __DIR__ . "/../../../dnt-view/layouts/" . $this->vendor->getLayout() . "/Configurator.php";
        $modulesRegistrator = false;
        if (!class_exists('Configurator')) {
            if (file_exists($file)) {
                include_once $file;
                $configurator = new Configurator();
                if (method_exists($configurator, 'metaSettings')) {
                    $modulesRegistrator = $configurator->metaSettings();
                }
            }
        } else {
            $configurator = new Configurator();
            if (method_exists($configurator, 'metaSettings')) {
                $modulesRegistrator = $configurator->metaSettings();
            }
        }
        return $modulesRegistrator;
    }

    /**
     * 
     */
    public function loadNewSettingsFromConf()
    {
        if ($this->settingsConfigurator()) {
            $settingsData = $this->settingsConfigurator();
        } else {
            $settingsData = $this->settingsConf();
        }
        if ($settingsData) {

            $result = array();
            $existingKey = array();

            foreach ($settingsData as $key => $value) {
                $configKeys[] = $value['`key`'];
            }
            foreach ($this->getAllSettings() as $key => $value) {
                $existingKey = array_keys($value);
            }

            $diffedArray = array_diff($configKeys, $existingKey);

            //get configKeys of diffed ararys
            $arrOfConfigKeys = array();
            foreach ($configKeys as $key => $value) {
                if (in_array($value, $diffedArray)) {
                    $arrOfConfigKeys[] = $key;
                    continue;
                }
            }
            foreach ($arrOfConfigKeys as $key) {
                $this->db->insert('dnt_settings', $settingsData[$key]);
            }
        }
    }

}
