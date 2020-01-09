<?php

/**
 *  Designdnt3 Application
 *  Framework Dnt3
 *  Dnt3 MultiDomain Platform
 *  CMS Designdnt3
 *  author: Digilopment
 * 
 */
(new class
{

    public function __construct()
    {
        require 'dnt-library/framework/app/Bootstrap.php';
        $bootstrap = new Bootstrap(__FILE__);
        $bootstrap->boot();
    }

    public function template()
    {

        $text = '';
        $text .= 'User-agent: * \n';
        $text .= '#This service is powered by Designdnt3 as 3rd version - professionals for better internet. \n';
        $text .= '#Designdnt3 is a Application Framework initially developed by Designdnt - The Query company.\n';
        $text .= '#Addons and overlays are copyright of their respective owners.\n';
        $text .= '#Information and contribution at http://designdnt.query.sk/\n';

        $text .= '#This sitemap defined all sitemaps off all active Vendors.\n';
        $text .= '#For visit vendor sitemap please check this sitemaps or visit vendor webpage =>\n';

        $text .= '#Author: Digilopment\n';
        $text .= '#AuthorName: Tomas Doubek\n';
        $text .= '#System Dnt3 Platform\n';

        $text .= 'Disallow: /dnt-admin/\n';
        $text .= 'Disallow: /dnt-cache/\n';
        $text .= 'Disallow: /dnt-install/\n';
        $text .= 'Disallow: /dnt-jobs/\n';
        $text .= 'Disallow: /dnt-library/\n';
        $text .= 'Disallow: /dnt-modules/\n';
        $text .= 'Disallow: /dnt-system/\n';
        $text .= 'Disallow: /dnt-test/\n';
        $text .= 'Disallow: /dnt-view/\n';
        $text .= 'Disallow: .gitignore\n';
        $text .= 'Disallow: composer.json\n';
        $text .= 'Disallow: robots.php\n';
        $text .= 'Disallow: config.dnt\n';
        $layout = Vendor::getLayout();
        if (file_exists('dnt-view/layouts/' . $layout . '/modules/rpc/sitemap.php')) {
            $text .= 'Sitemap: ' . WWW_PATH . 'rpc/xml/sitemap';
        } else {
            $text .= 'Sitemap: ' . WWW_PATH . 'dnt-api/sitemap.php';
        }
        return $text;
    }

    public function main()
    {
        print($this->template());
    }
})->main();
