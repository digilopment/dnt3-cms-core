<?php

namespace DntApi;

use DntLibrary\Base\Api;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\DB;
use DntLibrary\Base\DntLog;
use DntLibrary\Base\Navigation;
use DntLibrary\Base\Rest;

class SitemapApi
{

    public function run()
    {

        $rest = new Rest;
        $db = new DB;
        $api = new Api;
        $dntLog = new DntLog;
        $article = new ArticleView;

        $NAV_NAVIGATION = 1;
        $NAV_SUB_NAVIGATION = 0.7
        ;
        $dntLog->add(
                array(
                    "http_response" => 200,
                    "system_status" => "log",
                    "msg" => "Api sitemap",
                )
        );
        header('Content-Type: text/xml');

        echo '<urlset
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach (Navigation::getParents() as $row) {
            $name_url_1 = WWW_PATH . "" . $row['name_url'];
            echo '<url>';
            echo '<loc>' . $name_url_1 . '</loc>';
            echo '<lastmod>' . date('Y-m-d') . '</lastmod>';
            echo '<changefreq>hourly</changefreq>';
            echo '<priority>' . $NAV_NAVIGATION . '</priority>';
            echo '</url>';
            if (Navigation::hasChild($row['id'])) {
                foreach (Navigation::getChildren($row['id']) as $row2) {
                    $name_url_2 = WWW_PATH . "" . $row2['name_url'];
                    ;
                    echo '<url>';
                    echo '<loc>' . $name_url_2 . '</loc>';
                    echo '<lastmod>' . date('Y-m-d') . '</lastmod>';
                    echo '<changefreq>hourly</changefreq>';
                    echo '<priority>' . $NAV_SUB_NAVIGATION . '</priority>';
                    echo '</url>';
                }
            }
        }
        echo '</urlset>';
    }

}
