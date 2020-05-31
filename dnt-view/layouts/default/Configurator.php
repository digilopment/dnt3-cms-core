<?php

namespace DntView\Layout;

use DntLibrary\App\Autoloader;
use DntLibrary\Base\Vendor;
use DntLibrary\Base\Webhook;

class Configurator extends Webhook
{

    public function __construct()
    {
        (new Autoloader)->addVendroClass(__FILE__, 'Foo');
    }

    public function modulesRegistrator()
    {
        $modulesRegistrator = array(
            'default' => array_merge(
                    array(), $this->getSitemapModules('default')
            ),
            'skeleton' => array_merge(
                    array(), $this->getSitemapModules('skeleton')
            ),
            'static_redirect' => array_merge(
                    array(), $this->getSitemapModules('static_redirect')
            ),
            'subscriber' => array_merge(
                    array(), $this->getSitemapModules('subscriber')
            ),
        );
        return $modulesRegistrator;
    }

    public function modulesConfigurator()
    {
        return array(
            'default' => array(
                'service_name' => 'Global 404 (all vendors)'
            ),
            'skeleton' => array(
                'service_name' => 'skeleton'
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
            '`vendor_id`' => Vendor::getId(),
            '`show`' => '0',
            '`order`' => '10',
        );

        return $metaSettings;
    }

}
