<?php

namespace DntJobs;

use DntLibrary\App\Categories;
use DntLibrary\App\Modul;
use DntLibrary\App\Post;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class PrepareCacheByUrlJob
{

    public function __construct()
    {
        $this->vendor = new Vendor();
        $this->modul = new Modul();
        $this->rest = new Rest();
        $this->categories = new Categories();
        $this->posts = new Post();
        $this->articleView = new ArticleView();
        $this->singlVendor = false;
        $this->vendors = true;
    }

    protected function setContext()
    {
        $opts = array(
            'http' => array(
                'method' => 'GET',
                'header' => 'Accept-language: en\r\n' .
                'Cookie: IS_JOB=1\r\n'
            )
        );
        $this->context = stream_context_create($opts);
    }

    protected function setVendor()
    {
        $this->vendorId = ($this->rest->get('vendorId') > 0) ? $this->rest->get('vendorId') : $this->vendor->getId();
    }

    protected function getVendor()
    {
        $final = [];
        if ($this->vendorId) {
            foreach ($this->vendor->getAll() as $vendor) {
                if ($this->vendorId == $vendor['id']) {
                    $final[] = $vendor;
                }
            }
        }
        $this->vendors = $final;
    }

    protected function initGetRequest($url)
    {
        file_get_contents($url, false, $this->context);
    }

    protected function getVendors()
    {
        $final = [];
        foreach ($this->vendor->getAll() as $vendor) {
            $final[] = $vendor;
        }
        return $final;
    }

    protected function modulUrls($modul, $serviceId)
    {
        $final = [];
        if ($modul->service == 'eshop_list') {
            foreach ($this->categories->allCategories as $category) {
                $final[] = 'category/' . $category['id_entity'];
            }
        } elseif ($modul->service == 'article_list') {
            foreach ($this->posts->postsModel as $post) {
                if ($serviceId == $post->cat_id) {
                    $final[] = 'detail/' . $post->id_entity . '/' . $post->name_url;
                }
            }
        }
        return $final;
    }

    public function init()
    {
        $this->setVendor();
        $this->setContext();
        $this->getVendor();
        $this->posts->init();
        $this->categories->init();
    }

    public function initVendor()
    {
        $this->init();
        foreach ($this->vendors as $vendor) {
            $this->modul->getSitemap(false, $vendor['id']);
            foreach ($this->modul->sitemapUrl as $module) {
                $url = $vendor['real_url'] . '/' . $module->name_url;
                $finalUrl[] = $url;
                $this->initGetRequest($url);
                $serviceId = $this->articleView->getPostParam('service_id', $module->id_entity);
                foreach ($this->modulUrls($module, $serviceId) as $modulUrl) {
                    $url = $vendor['real_url'] . '/' . $module->name_url . '/' . $modulUrl;
                    $this->initGetRequest($url);
                    $finalUrl[] = $url;
                }
            }
        }
        echo join('<br/>', $finalUrl);
    }

    public function run()
    {
        $this->init();
        if ($this->vendorId) {
            $this->initVendor();
        } else {
            foreach ($this->getVendors() as $vendor) {
                $url = HTTP_PROTOCOL . $vendor['name_url'] . '.' . DOMAIN . $_SERVER['REQUEST_URI'];
                $this->initGetRequest($url);
                $finalUrl[] = $url;
            }
        }
    }

}
