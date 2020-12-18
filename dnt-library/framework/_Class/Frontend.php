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
use DntLibrary\Base\Rest;
use DntLibrary\Base\Settings;
use DntLibrary\Base\Vendor;

class Frontend
{


	public function __construct(){
		$this->article = new ArticleView();
        $this->settings = new Settings();
        $this->rest = new Rest();
        $this->navigation = new AppNavigation();
        $this->multiLanguage = new MultyLanguage();
        $this->vendor = new Vendor();
	}
    /**
     * 
     * @param array $custom_data
     * @return type
     */
    public function get($custom_data = false, $id = false)
    {
       
        $this->navigation->init();


        if ($custom_data == false) {
            $custom_data = array(array(false));
        }

        if ($id == false) {
            $post_id = isset($custom_data['post_id']) ? $custom_data['post_id'] : $this->article->getStaticId();
        } else {
            $post_id = $id;
        }

        $metaArr = $this->article->getMetaData($post_id);
        $menuItems = $this->navigation->menuItems();
        $sitemapItems = $this->navigation->activeItems();
        $translates = $this->multiLanguage->getTranslates();
        $metaSettingsArr = $this->settings->getAllSettings();

        $articleName = $this->article->getPostParam("name", $post_id);
        $articleImage = $this->article->getPostImage($post_id);
        $data = array(
            "media_path" => WWW_PATH . "dnt-view/layouts/" . $this->vendor->getLayout() . "/",
            "title" => $this->settings->get("title"),
            "post_id" => $post_id,
            "webhook" => $this->rest->webhook(),
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
                "name_url" => $this->article->getPostParam("name_url", $post_id),
                "perex" => $this->article->getPostParam("perex", $post_id),
                "content" => $this->article->getPostParam("content", $post_id),
                "embed" => $this->article->getPostParam("embed", $post_id),
                "datetime_publish" => $this->article->getPostParam("datetime_publish", $post_id),
                "name" => $articleName,
                "service" => $this->article->getPostParam("service", $post_id),
                "service_id" => $this->article->getPostParam("service_id", $post_id),
                "tags" => $this->article->getPostTags($post_id),
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
