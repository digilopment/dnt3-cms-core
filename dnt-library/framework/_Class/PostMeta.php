<?php

/**
 *  class       PostMeta
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\DB;
use DntLibrary\Base\Vendor;
use DntView\Layout\Modul\Install\MetaServices;
use function defaultModuleMetaDataConfiguration;

class PostMeta
{

    /**
     * 
     * @return type
     */
    public function getServicePostsMeta($postId, $service)
    {
        $db = new DB;
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

    public function getPostsMeta($postId)
    {

        $db = new DB;
        $query = "SELECT * FROM dnt_posts_meta WHERE `vendor_id` = '" . Vendor::getId() . "' AND post_id IN (" . $postId . ")";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $arr['keys'][$row['post_id']][$row['key']]['show'] = $row['show'];
                $arr['keys'][$row['post_id']][$row['key']]['value'] = $row['value'];
            }
            return $arr;
        }
        return array();
    }

    public function getPostMeta($postId)
    {
        $db = new DB;
        $query = "SELECT * FROM dnt_posts_meta WHERE `vendor_id` = '" . Vendor::getId() . "' AND post_id = '" . $postId . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $arr['keys'][$row['key']]['show'] = $row['show'];
                $arr['keys'][$row['key']]['value'] = $row['value'];
                $arr['keys'][$row['key']]['id_entity'] = $row['id_entity'];
                $arr['keys'][$row['key']]['post_id'] = $row['post_id'];
                $arr['keys'][$row['key']]['service'] = $row['service'];
                $arr['keys'][$row['key']]['key'] = $row['key'];
                $arr['keys'][$row['key']]['content_type'] = $row['content_type'];
                $arr['keys'][$row['key']]['cat_id'] = $row['cat_id'];
                $arr['keys'][$row['key']]['description'] = $row['description'];
                $arr['keys'][$row['key']]['order'] = $row['order'];
                $arr['keys'][$row['key']]['vendor_id'] = $row['vendor_id'];
            }
            return $arr;
        }
        return array();
    }

    protected function loadNewPostMetaFromInstallConf($postId, $service)
    {
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

                $db = new DB;
                foreach ($arrOfConfigKeys as $key) {
                    $db->insert('dnt_posts_meta', $settingsData[$key]);
                }
            }
        }
    }

    /**
     * 
     * @param type $postId
     * @param type $service
     */
    public function loadNewPostMetaFromConf($postId, $service)
    {


        $conf = "../dnt-view/layouts/" . Vendor::getLayout() . "/modules/" . $service . "/install/MetaServices.php";
        if (file_exists($conf)) {
            include $conf;
            $metaServices = new MetaServices();
            if (method_exists($metaServices, 'init')) {
                $result = [];
                $existingKey = [];
                $settingsData = $metaServices->init($postId, $service);
                foreach ($settingsData as $key => $value) {
                    $configKeys[] = $value['`key`'];
                }
                foreach (self::getServicePostsMeta($postId, $service) as $key => $value) {
                    $existingKey = array_keys($value);
                }
                $diffedArray = array_diff($configKeys, $existingKey);
                $arrOfConfigKeys = array();
                $arrOfConfigKeysUpdate = [];
                foreach ($configKeys as $key => $value) {
                    if (in_array($value, $diffedArray)) {
                        $arrOfConfigKeys[] = $key;
                        continue;
                    } else {
                        $arrOfConfigKeysUpdate[$key] = $value;
                    }
                }
                //var_dump($arrOfConfigKeysUpdate);
                $db = new DB;
                foreach ($arrOfConfigKeys as $key) {
                    $db->insert('dnt_posts_meta', $settingsData[$key]);
                }

                foreach ($arrOfConfigKeysUpdate as $key => $val) {
                    $db->update(
                            'dnt_posts_meta',
                            array(
                                'order' => $settingsData[$key]['`order`'],
                                //'show' => $settingsData[$key]['`show`'],
                                'content_type' => $settingsData[$key]['`content_type`'],
                                'description' => $settingsData[$key]['`description`'],
                            ),
                            array(
                                '`key`' => $settingsData[$key]['`key`'],
                                '`post_id`' => $postId,
                                '`vendor_id`' => Vendor::getId())
                    );
                }
            }
        } else {
            self::loadNewPostMetaFromInstallConf($postId, $service);
        }
    }

}
