<?php

/**
 *  class       Frontend
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\App\Navigation as AppNavigation;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\MultyLanguage;
use DntLibrary\Base\Navigation;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Settings;
use DntLibrary\Base\Vendor;

class Frontend
{

    /**
     * 
     * @param array $custom_data
     * @return type
     */
    public function get($custom_data = false, $id = false)
    {
        $article = new ArticleView;
        $settings = new Settings;
        $rest = new Rest;
        $navigation = new AppNavigation();
        $navigation->init();


        if ($custom_data == false) {
            $custom_data = array(array(false));
        }

        if ($id == false) {
            $post_id = isset($custom_data['post_id']) ? $custom_data['post_id'] : $article->getStaticId();
        } else {
            $post_id = $id;
        }

        $metaArr = $article->getMetaData($post_id);
        $menuItems = $navigation->menuItems();
        $sitemapItems = $navigation->activeItems();
        $translates = MultyLanguage::getTranslates();
        $metaSettingsArr = $settings->getAllSettings();

        $articleName = $article->getPostParam("name", $post_id);
        $articleImage = $article->getPostImage($post_id);
        $data = array(
            "media_path" => WWW_PATH . "dnt-view/layouts/" . Vendor::getLayout() . "/",
            "title" => Settings::get("title"),
            "post_id" => $post_id,
            "webhook" => $rest->webhook(),
            "meta" => array(
                '<meta name="keywords" content="' . $metaSettingsArr['keys']['keywords']['value'] . '" />',
                '<meta name="description" content="' . $metaSettingsArr['keys']['description']['value'] . '" />',
                '<meta content="' . $articleName . '" property="og:title" />',
                '<meta content="' . SERVER_NAME . '" property="og:site_name" />',
                '<meta content="article" property="og:type" />',
                '<meta content="' . $articleImage . '" property="og:image" />',
            ),
            "article" => array(
                "name" => $articleName,
                "name_url" => $article->getPostParam("name_url", $post_id),
                "perex" => $article->getPostParam("perex", $post_id),
                "content" => $article->getPostParam("content", $post_id),
                "embed" => $article->getPostParam("embed", $post_id),
                "datetime_publish" => $article->getPostParam("datetime_publish", $post_id),
                "name" => $articleName,
                "service" => $article->getPostParam("service", $post_id),
                "service_id" => $article->getPostParam("service_id", $post_id),
                "tags" => $article->getPostTags($post_id),
                "img" => $articleImage,
            ),
            "meta_tree" => $metaArr,
            "menu_items" => $menuItems,
            "sitemap_items" => $sitemapItems,
            "translates" => $translates,
            "meta_settings" => $metaSettingsArr,
            "timestamp" => time(),
        );

        $finalData = array_merge($data, $custom_data);
        return $finalData;
    }

    public function addCustomData($data, $customData)
    {
        return array_merge($data, $customData);
    }

    /**
     * 
     * @param type $data
     * @param type $key
     * @return boolean
     */
    public static function getMetaSetting($data, $key)
    {
        if (isset($data['meta_settings']['keys'][$key]['value']) && $data['meta_settings']['keys'][$key]['show'] == 1) {
            return $data['meta_settings']['keys'][$key]['value'];
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $data
     * @param type $key
     * @return boolean
     */
    public static function getMetaSettingBool($data, $key)
    {
        if (isset($data['meta_settings']['keys'][$key]['show']) && $data['meta_settings']['keys'][$key]['show'] == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $data
     * @param type $key
     * @return boolean
     */
    public static function getMetaTree($data, $key)
    {
        if (isset($data['meta_tree']['keys'][$key]['value']) && $data['meta_tree']['keys'][$key]['show'] == 1) {
            return $data['meta_tree']['keys'][$key]['value'];
        } else {
            return false;
        }
    }

    public static function pluginBridgeVar()
    {
        
    }

    /**
     * 
     * @param type $data
     * @param type $key
     * @return boolean
     */
    public static function getDeafult($data, $key)
    {
        if (isset($data[$key])) {
            return $data[$key];
        } else {
            return false;
        }
    }

}
