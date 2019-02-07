<?php

/**
 *  class       PostMeta
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
class PostMeta {

    /**
     * 
     * @return type
     */
    public function getServicePostsMeta($postId, $service) {
        $db = new Db;
        $query = "SELECT * FROM dnt_posts_meta WHERE `vendor_id` = '" . Vendor::getId() . "' AND service = '" . $service . "' AND post_id = '" . $postId . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $arr['keys'][$row['key']]['show'] = $row['show'];
                $arr['keys'][$row['key']]['value'] = $row['value'];
            }
            return $arr;
        }
        return array();
    }

    /**
     * 
     * @param type $postId
     * @param type $service
     */
    public function loadNewPostMetaFromConf($postId, $service) {
        $conf = "../dnt-view/layouts/" . Vendor::getLayout() . "/modules/" . $service . "/install/install.php";
        if (file_exists($conf)) {
            include $conf;
            if (function_exists("defaultModuleMetaDataConfiguration")) {
                $result = array();
                $existingKey = array();
                $settingsData = defaultModuleMetaDataConfiguration($postId, $service);
                foreach ($settingsData as $key => $value) {
                    $configKeys[] = $value['`key`'];
                }
                foreach (self::getServicePostsMeta($postId, $service) as $key => $value) {
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

                $db = new Db;
                foreach ($arrOfConfigKeys as $key) {
                    $db->insert('dnt_posts_meta', $settingsData[$key]);
                }
            }
        }
    }
    
}
