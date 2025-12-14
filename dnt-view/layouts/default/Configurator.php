<?php

namespace DntView\Layout;

use DntLibrary\App\Autoloader;
use DntLibrary\Base\Vendor;
use DntLibrary\Base\Webhook;

class Configurator extends Webhook
{
    public function __construct()
    {
        $this->vendor = new Vendor();
        (new Autoloader())->addVendroClass(__FILE__, 'Foo');
    }

    public function modulesRegistrator()
    {
        // Optimalizované: načítame všetky moduly naraz v jednom SQL dotaze
        $services = array(
            'default' => false,           // false = service = '' alebo NULL
            'skeleton' => 'skeleton',
            'static_redirect' => 'static_redirect',
            'subscriber' => 'subscriber',
        );
        
        $sitemapModules = $this->getSitemapModulesBatch($services);
        
        $modulesRegistrator = array(
            'default' => array_merge(
                array(),
                $sitemapModules['default'] ?? array()
            ),
            'skeleton' => array_merge(
                array(),
                $sitemapModules['skeleton'] ?? array()
            ),
            'static_redirect' => array_merge(
                array(),
                $sitemapModules['static_redirect'] ?? array()
            ),
            'subscriber' => array_merge(
                array(),
                $sitemapModules['subscriber'] ?? array()
            ),
        );
        
        return $modulesRegistrator;
    }

    public function modulesConfigurator()
    {
        return array(
            'default' => array(
                'service_name' => 'Global 404 (all vendors)',
            ),
            'skeleton' => array(
                'service_name' => 'skeleton',
            ),
            'static_redirect' => array(
                'service_name' => 'Presmerovanie',
            ),
            'subscriber' => array(
                'service_name' => 'Služba na potvrdenie emailu',
            ),
        );
    }

    public function metaSettings()
    {
        $metaSettings[] = array(
            '`type`' => 'default',
            '`key`' => 'test',
            '`value`' => '',
            '`content_type`' => 'text',
            '`description`' => 'Testovacie nastavenie, meta nastavení zbehli úspešne',
            '`vendor_id`' => $this->vendor->getId(),
            '`show`' => '0',
            '`order`' => '10',
        );

        return $metaSettings;
    }
}
