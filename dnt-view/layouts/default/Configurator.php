<?php

class Configurator extends Webhook {

    public function __construct() {
        (new Autoloader)->addVendroClass(__FILE__, 'Foo');
    }

    public function modulesRegistrator() {
        $modulesRegistrator = array(
            "default" => array_merge(
                    array(), $this->getSitemapModules("default")
            ),
            "skeleton" => array_merge(
                    array(), $this->getSitemapModules("skeleton")
            ),
            "static_redirect" => array_merge(
                    array(), $this->getSitemapModules("static_redirect")
            ),
        );
        return $modulesRegistrator;
    }

    public function modulesConfigurator() {
        return array(
            "default" => array(
                "service_name" => "Global 404 (all vendors)"
            ),
            "skeleton" => array(
                "service_name" => "skeleton"
            ),
            "static_redirect" => array(
                "service_name" => "Presmerovanie",
            ),
        );
    }

    public function metaSettings() {
        $metaSettings[] = array(
            '`type`' => "default",
            '`key`' => "test",
            '`value`' => "",
            '`content_type`' => "text",
            '`description`' => "Testovacie nastavenie, meta nastavenia zbehli úspešne",
            '`vendor_id`' => Vendor::getId(),
            '`show`' => '0',
            '`order`' => '10',
        );

        return $metaSettings;
    }

}
