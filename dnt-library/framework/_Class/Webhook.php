<?php

/**
 *  class       Webhook
 *  author      Tomas Doubek
 *  framework   Sessions
 *  package     dnt3
 *  date        2017
 */
class Webhook {

    /**
     * 
     * @return type
     */
    public function getSitemapModules($type = false, $vendorId = false) {
        $db = new Db;
        $ml = new MultyLanguage;

        if ($type == "static_view") {
            $eQ = "AND `dnt_posts`.`service` = ''";
        } else {
            if ($type) {
                $eQ = "AND `dnt_posts`.`service` = '" . $type . "'";
            } else {
                $eQ = false;
            }
        }

        if ($vendorId) {
            $vendorId = $vendorId;
        } else {
            $vendorId = Vendor::getId();
        }

        $query = "
			SELECT * FROM `dnt_posts` 
			LEFT JOIN `dnt_translates` ON `dnt_posts`.`id_entity` = `dnt_translates`.`translate_id` 
			WHERE `dnt_posts`.`type` = 'sitemap' 
			AND `dnt_translates`.`type` = 'name_url' 
			AND `dnt_posts`.`show` > '0' 
			" . $eQ . "
			AND `dnt_posts`.`vendor_id` = '" . $vendorId . "'
			GROUP BY `dnt_posts`.`name_url`
			";

        $query2 = "
			SELECT * FROM `dnt_posts` 
			WHERE `dnt_posts`.`type` = 'sitemap' 
			AND `dnt_posts`.`show` > '0' 
			" . $eQ . "
			AND `dnt_posts`.`vendor_id` = '" . $vendorId . "'
			GROUP BY `dnt_posts`.`name_url`
			";

        //var_export($query);
        if ($ml->countActiveLangs > 1) {
            if ($db->num_rows($query) > 0) {
                foreach ($db->get_results($query) as $row) {
                    $arr[] = $row['name_url'];
                    if ($row['translate'] != "") {
                        $arr[] = $row['translate'];
                    }
                }
            } else {
                $arr = array();
            }
        } else {
            if ($db->num_rows($query2) > 0) {
                $arr = array();
                foreach ($db->get_results($query2) as $row2) {
                    $arr[] = $row2['name_url'];
                }
            } else {
                $arr = array();
            }
        }
        return $arr;
    }

    /**
     * 
     * @param type $postId
     * @param type $config
     * @return type
     */
    public function services($postId = false, $config = false) {
        if ($config === true) {
            return array(
                "config" => array(
                    "sql" => "INSERT INTO `dnt_posts_meta` (`id`, `id_entity`, `service`, `vendor_id`, `key`, `value`, `content_type`, `cat_id`, `description`, `order`, `show`) VALUES",
                ),
            );
        }
        $file = "../dnt-view/layouts/" . Vendor::getLayout() . "/conf.php";

        if (!function_exists("modulesConfig")) {
            if (file_exists($file)) {
                include $file;
            }
        }
        if (file_exists($file)) {
            if (function_exists("modulesConfig")) {
                return modulesConfig();
            }
        } else {
            return array(
                //homepage
                "homepage" => array(
                    "service_name" => "Homepage",
                    "sql" => "
                        (null, $postId, 'homepage', '" . Vendor::getId() . "', 'name', 'uvod', 'content', '1', 'Url adresa', 1),
                        (null, $postId, 'homepage', '" . Vendor::getId() . "', 'name_url', 'Úvod', 'content', '1','Nazov sekcie', 1),
                        (null, $postId, 'homepage', '" . Vendor::getId() . "', 'info', 'Toto je info', 'content', '1','Informácie', 1),
                        (null, $postId, 'homepage', '" . Vendor::getId() . "', 'add', 'Toto je info', 'content', '1','Informácie', 1),
                        (null, $postId, 'homepage', '" . Vendor::getId() . "', 'test', 'Toto je test', 'content', '1','Testovacia zóna', 0);
                    "),
                //contact
                "contact" => array(
                    "service_name" => "Kontakt",
                    "sql" => "
                        (null, $postId, 'contact', '" . Vendor::getId() . "', 'info', 'Toto je info', 'content', '1','Informácie', 1),
                        (null, $postId, 'contact', '" . Vendor::getId() . "', 'info_url', 'Toto je info url', 'content', '1','Informácie url', 1),
                        (null, $postId, 'contact', '" . Vendor::getId() . "', 'new', 'Toto je info url', 'content', '1','Informácie url', 1),
                        (null, $postId, 'contact', '" . Vendor::getId() . "', 'test', 'Toto je test', 'content', '1','Testovacia zóna', 0);
                    "),
                //about-us
                "about-us" => array(
                    "service_name" => "O nás",
                    "sql" => "
                        (null, $postId, 'about-us', '" . Vendor::getId() . "', 'about-us', 'Toto je about-us', 'content', '1','about-us', 1),
                        (null, $postId, 'about-us', '" . Vendor::getId() . "', 'test', 'Toto je about-us', 'content', '1','about-us zóna', 0);
                       "),
                //partneri
                "partners" => array(
                    "service_name" => "Partnetri",
                    "sql" => "
                        (null, $postId, 'partners', '" . Vendor::getId() . "', 'partners', 'Toto je partnerss', 'content', '1', 'partners', 1),
                        (null, $postId, 'partners', '" . Vendor::getId() . "', 'test', 'Toto je partners', 'content', '1', 'partners zóna', 0);
                    "),
                //partneri
                "article_list" => array(
                    "service_name" => "Article List",
                    "sql" => ""
                ),
                //ZOZNAM ANKIET
                "polls" => array(
                    "service_name" => "Kvízy",
                    "sql" => ""
                ),
                //ESHOP
                "eshop" => array(
                    "service_name" => "Eshop List",
                    "sql" => ""
                ),
                //ESHOP
                "wp_hotely" => array(
                    "service_name" => "WP Hotely",
                    "sql" => "
                        (null, $postId, 'wp_hotely', '" . Vendor::getId() . "', 'hotel_', 'Toto je partnerss', 'content', '1', 'partners', 1),
                        (null, $postId, 'wp_hotely', '" . Vendor::getId() . "', 'test', 'Toto je partners', 'content', '1', 'partners zóna', 0);
                    "
                ),
            );
        }
    }

    /**
     * 
     * @return boolean
     */
    public function getArticleViewCat() {
        $db = new Db;
        $arr = array();
        $query = "SELECT `name_url` FROM dnt_posts WHERE `type` = 'sitemap' AND `show` > '0' AND vendor_id = '" . Vendor::getId() . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $arr[] = $row['name_url'];
            }
        } else {
            $arr = array(false);
        }

        return $arr;
    }

    /**
     * 
     * @param type $custom_modules
     * @return type
     * 
     * key_array -> represent modul service
     * array_alue-> represent the hook get PARAMETER 
     */
    public function get($custom_modules = false) {
        if ($custom_modules == false) {
            $custom_modules = array(array(false));
        } else {
            $custom_modules = $custom_modules;
        }

        $modules = array(
            //CLANKY V KATEGORIACH			  
            "article_list" => array_merge(
                    array(""), $this->getSitemapModules("article_list")
            ),
            //redirect na article_list 
            "auto_redirect" => array(
                "a",
                "article",
            ),
            //404
            "default" => array(
                "error-404",
                "not-found",
            ),
            //MEDIALNY OBSAH
            "media_downloads" => array(
                "media-download",
                "download-media",
            ),
            //RPC API
            "rpc" => array(
                "rpc",
            ),
            //SEARCH
            /* "search" => array(
              "search",
              "hladaj",
              ), */

            //STATIC VIEW
            "static_view" => array_merge(
                    array(), $this->getSitemapModules("static_view")
            ),
        );
        $modules = array_merge($custom_modules, $modules);
        return $modules;
    }

}
