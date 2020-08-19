<?php

/**
 *  class       Frontend
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\App;

use DntLibrary\App\Navigation as AppNavigation;
use DntLibrary\App\Post;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\MultyLanguage;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Settings;
use DntLibrary\Base\Vendor;

class Data
{

    public function __construct()
    {
        $this->vendor = new Vendor();
        $this->articleView = new ArticleView();
        $this->settings = new Settings();
        $this->rest = new Rest();
        $this->navigation = new AppNavigation();
        $this->multilanguage = new MultyLanguage();
        $this->post = new Post();
    }

    public function configure($config = [])
    {
        $this->customData = isset($config['custom_data']) ? $config['custom_data'] : array(array(false));
        $this->postId = isset($config['post_id']) ? $config['post_id'] : false;
        $this->sitemapData = isset($config['sitemap_data']) ? $config['sitemap_data'] : false;
        $this->postObject = isset($config['post_object']) ? $config['post_object'] : false;

        $this->postMeta = (isset($config['post_meta']) && $config['post_meta'] == true) ? true : false;
        $this->menuItems = (isset($config['menu_items']) && $config['menu_items'] == true) ? true : false;
        $this->sitemapItems = (isset($config['sitemap_items']) && $config['sitemap_items'] == true) ? true : false;
        $this->translates = (isset($config['translates']) && $config['translates'] == true) ? true : false;
        $this->metaSettings = (isset($config['meta_settings']) && $config['meta_settings'] == true) ? true : false;
    }

    protected function init()
    {
        $this->navigation->init();
    }

    public function get()
    {
        $this->init();


        $customData = $this->customData;

        if ($this->postId) {
            $postId = $this->postId;
        } else {
            $postId = isset($this->customData['post_id']) ? $this->customData['post_id'] : $this->articleView->getStaticId();
        }

        if ($this->postObject) {
            $articleName = $this->postObject->name;
            $articleNameUrl = $this->postObject->name_url;
            $articlePerex = $this->postObject->perex;
            $articleContent = $this->postObject->content;
            $articleEmbed = $this->postObject->embed;
            $articleDatetimePublish = $this->postObject->datetime_publish;
            $articleService = $this->postObject->service;
            $articleServiceId = $this->postObject->service_id;
            $articleTags = $this->postObject->tags;
            $articleImage = $this->articleView->getPostImage($this->postObject->post_id);
        } else {
            $this->postObject = $this->getPostObject($postId);
            $articleName = $this->postObject->name;
            $articleNameUrl = $this->postObject->name_url;
            $articlePerex = $this->postObject->perex;
            $articleContent = $this->postObject->content;
            $articleEmbed = $this->postObject->embed;
            $articleDatetimePublish = $this->postObject->datetime_publish;
            $articleService = $this->postObject->service;
            $articleServiceId = $this->postObject->service_id;
            $articleTags = $this->postObject->tags;
            $articleImage = $this->articleView->getPostImage($postId);
        }

        $metaArr = ($this->postMeta) ? $this->articleView->getMetaData($postId) : false;
        $menuItems = ($this->menuItems) ? $this->navigation->menuItems() : false;
        $sitemapItems = ($this->sitemapItems) ? $this->navigation->activeItems() : false;
        $translates = ($this->translates) ? $this->multilanguage->getTranslates() : false;
        $metaSettingsArr = ($this->metaSettings) ? $this->settings->getAllSettings() : false;


        $keyWords = isset($metaSettingsArr['keys']['keywords']['value']) ? $metaSettingsArr['keys']['keywords']['value'] : false;
        $description = isset($metaSettingsArr['keys']['description']['value']) ? $metaSettingsArr['keys']['description']['value'] : false;
        $favicon = Settings::getImage($metaSettingsArr['keys']['favicon']['value']);
        $title = Settings::get('title');
        $data = array(
            'media_path' => WWW_PATH . 'dnt-view/layouts/' . Vendor::getLayout() . '/',
            'title' => $title,
            'web_title' => $title,
            'post_id' => $postId,
            'webhook' => $this->rest->webhook(),
            'meta' => array(
                '<meta name="keywords" content="' . $keyWords . '" />',
                '<meta name="description" content="' . $description . '" />',
                '<meta content="' . $articleName . '" property="og:title" />',
                '<meta content="' . SERVER_NAME . '" property="og:site_name" />',
                '<meta content="article" property="og:type" />',
                '<meta content="' . $articleImage . '" property="og:image" />',
                '<meta content="#ff0000" name="msapplication-TileColor">',
                '<meta content="' . $favicon . '" name="msapplication-TileImage">',
                '<meta content="#ff0000" name="theme-color">',
                '<meta content="' . $articleName . '" name="apple-mobile-web-app-title">',
                '<meta content="' . $articleName . '" name="application-name">',
                '<meta content="yes" name="apple-mobile-web-app-capable">',
                '<meta content="black" name="apple-mobile-web-app-status-bar-style">',
            ),
            'article' => array(
                'name' => $articleName,
                'name_url' => $articleNameUrl,
                'perex' => $articlePerex,
                'content' => $articleContent,
                'embed' => $articleEmbed,
                'datetime_publish' => $articleDatetimePublish,
                'name' => $articleName,
                'service' => $articleService,
                'service_id' => $articleServiceId,
                'tags' => $articleTags,
                'img' => $articleImage,
            ),
            'meta_tree' => $metaArr,
            'menu_items' => $menuItems,
            'sitemap_items' => $sitemapItems,
            'translates' => $translates,
            'meta_settings' => $metaSettingsArr,
            'timestamp' => time(),
        );

        $finalData = array_merge($data, $customData);
        return $finalData;
    }

    protected function getPostObject($postId)
    {
        foreach ($this->navigation->activeItems() as $item) {
            if ($item['id_entity'] == $postId) {
                return (object) $item;
            }
        }
        return $this->post->getPost($postId);
    }

    public function addCustomData($data, $customData)
    {
        return array_merge($data, $customData);
    }

}
