<?php

namespace DntAdmin\Moduls;

use DntAdmin\App\AdminController;
use DntLibrary\Base\Cache;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\DntUpload;
use DntLibrary\Base\Image;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Settings;
use DntLibrary\Base\Vendor;
use DntLibrary\Base\Webhook;

class SettingsController extends AdminController
{

    protected $loc = __FILE__;
    protected $db;
    protected $rest;
    protected $restdntUpload;
    protected $settings;
    protected $vendor;
    protected $dnt;

    public function __construct()
    {
        $this->db = new DB();
        $this->rest = new Rest();
        $this->dntUpload = new DntUpload();
        $this->settings = new Settings();
        $this->vendor = new Vendor();
        $this->dnt = new Dnt();
        $this->cache = new Cache();
    }

    protected function updatePa1()
    {

        $db = $this->db;
        $rest = $this->rest;

        $keywords = $rest->post('keywords');
        $description = $rest->post('description');
        $nadpis_stranky = $rest->post('title');
        $default_lang = $rest->post('default_lang');
        $return = ['url' => $rest->post('return')];
        $startovaci_modul = $rest->post('startovaci_modul');
        $cachovanie = $rest->post('cachovanie');
        $language = $rest->post('language');
        $still_redirect_to_domain = $rest->post('still_redirect_to_domain');

        $db->update('dnt_settings', array('value' => $default_lang), array('`key`' => 'default_lang', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $description), array('`key`' => 'description', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $keywords), array('`key`' => 'keywords', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $nadpis_stranky), array('`key`' => 'title', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $startovaci_modul), array('`key`' => 'startovaci_modul', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $cachovanie), array('`key`' => 'cachovanie', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $language), array('`key`' => 'language', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $still_redirect_to_domain), array('`key`' => 'still_redirect_to_domain', '`vendor_id`' => Vendor::getId()));

        return $return;
    }

    protected function updatePa2()
    {

        $db = $this->db;
        $rest = $this->rest;

        $notifikacny_email = $rest->post('notifikacny_email');
        $facebook_page = $rest->post('facebook_page');
        $twitter = $rest->post('twitter');
        $youtube = $rest->post('youtube_channel');
        $instagram = $rest->post('instagram');
        $flickr = $rest->post('flickr');
        $google_map = $rest->post('google_map');
        $return = ['url' => $rest->post('return')];
        $linked_in = $rest->post('linked_in');
        $google_plus = $rest->post('google_plus');

        $db->update('dnt_settings', array('value' => $notifikacny_email), array('`key`' => 'notifikacny_email', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $facebook_page), array('`key`' => 'facebook_page', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $twitter), array('`key`' => 'twitter', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $youtube), array('`key`' => 'youtube', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $flickr), array('`key`' => 'flickr', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $google_map), array('`key`' => 'google_map', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $instagram), array('`key`' => 'instagram', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $linked_in), array('`key`' => 'linked_in', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $google_plus), array('`key`' => 'google_plus', '`vendor_id`' => Vendor::getId()));

        return $return;
    }

    protected function updatePa3()
    {

        $db = $this->db;
        $rest = $this->rest;

        $vendor_company = $rest->post('vendor_company');
        $vendor_street = $rest->post('vendor_street');
        $vendor_psc = $rest->post('vendor_psc');
        $vendor_city = $rest->post('vendor_city');
        $vendor_tel = $rest->post('vendor_tel');
        $vendor_fax = $rest->post('vendor_fax');
        $vendor_email = $rest->post('vendor_email');
        $vendor_ico = $rest->post('vendor_ico');
        $vendor_dic = $rest->post('vendor_dic');
        $vendor_iban = $rest->post('vendor_iban');
        $return = ['url' => $rest->post('return')];

        $db->update('dnt_settings', array('value' => $vendor_company), array('`key`' => 'vendor_company', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $vendor_street), array('`key`' => 'vendor_street', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $vendor_psc), array('`key`' => 'vendor_psc', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $vendor_city), array('`key`' => 'vendor_city', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $vendor_tel), array('`key`' => 'vendor_tel', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $vendor_fax), array('`key`' => 'vendor_fax', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $vendor_email), array('`key`' => 'vendor_email', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $vendor_ico), array('`key`' => 'vendor_ico', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $vendor_dic), array('`key`' => 'vendor_dic', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $vendor_iban), array('`key`' => 'vendor_iban', '`vendor_id`' => Vendor::getId()));

        return $return;
    }

    protected function updatePa4()
    {

        $db = $this->db;
        $rest = $this->rest;

        $platca_dph = $rest->post('platca_dph');
        $znak_meny = $rest->post('znak_meny');
        $nazov_meny = $rest->post('nazov_meny');
        $dph = $rest->post('dph');
        $return = ['url' => $rest->post('return')];

        $db->update('dnt_settings', array('value' => $platca_dph), array('`key`' => 'platca_dph', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $znak_meny), array('`key`' => 'znak_meny', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $nazov_meny), array('`key`' => 'nazov_meny', '`vendor_id`' => Vendor::getId()));
        $db->update('dnt_settings', array('value' => $dph), array('`key`' => 'dph', '`vendor_id`' => Vendor::getId()));

        return $return;
    }

    protected function updatePa7()
    {

        $db = $this->db;
        $rest = $this->rest;
        $dntUpload = $this->dntUpload;
        $settings = $this->settings;
        $vendor = $this->vendor;
        $dnt = $this->dnt;

        $type = $rest->get('category');
        foreach ($settings->customMeta($type) as $row) {
            if ($row['content_type'] == 'image' or $row['content_type'] == 'file') {
                if ($rest->post('gallery_key_' . $row['id_entity'])) {
                    if ($rest->post('gallery_key_' . $row['id_entity']) == 'del') {
                        $galleryData = '';
                    } else {
                        $galleryData = $rest->post('gallery_key_' . $row['id_entity']);
                    }

                    $db->update(
                            'dnt_settings',
                            array(
                                'value' => $galleryData,
                            ),
                            array(
                                'id_entity' => $row['id_entity'],
                                '`vendor_id`' => $vendor->getId()
                            )
                    );
                } else {
                    $dntUpload->multypleUploadFiles(
                            $_FILES['userfile_' . $row['id_entity']],
                            'dnt_settings',
                            'value',
                            '`id_entity`',
                            $row['id_entity'],
                            '../dnt-view/data/uploads'
                    );
                }
            } else {
                if ($row['key'] == 'youtube_sw') {
                    $db->update(
                            'dnt_settings',
                            array(
                                'value' => $dnt->youtubeVideoToEmbed($rest->post('key_' . $row['id_entity'])),
                            ),
                            array(
                                'id_entity' => $row['id_entity'],
                                '`vendor_id`' => $vendor->getId())
                    );
                } else {
                    $db->update(
                            'dnt_settings',
                            array(
                                'value' => $rest->post('key_' . $row['id_entity'])
                            ),
                            array(
                                'id_entity' => $row['id_entity'],
                                '`vendor_id`' => $vendor->getId())
                    );
                }
            }
            $db->update(
                    'dnt_settings',
                    array(
                        'show' => $rest->post('zobrazit_' . $row['id_entity'])
                    ),
                    array(
                        'id_entity' => $row['id_entity'],
                        '`vendor_id`' => $vendor->getId())
            );
        }
        $return = ['url' => $rest->post('return')];
        return $return;
    }

    /**
     * INDEX
     */
    public function indexAction()
    {
        $this->settings->loadNewSettingsFromConf();
        $data = [
            'settings' => $this->settings,
            'webhook' => new Webhook(),
            'rest' => $this->rest,
            'image' => new Image(),
        ];
        $this->loadTemplate($this->loc, 'default', $data);
    }

    /**
     * UPDATE
     */
    public function updateAction()
    {
        $posts = ['Pa1', 'Pa2', 'Pa7'];

        foreach ($posts as $post) {
            if ($this->hasPost($post)) {
                $method = 'update' . $post;
                $response = $this->$method();
                $data['msg'] = '<br/>Údaje sa úspešne uložili ';
                $data['return'] = $response['url'];
                $this->loadTemplate($this->loc, '../../../plugins/confirmUpdate', $data);
            }
        }
    }

    public function reCacheAction()
    {
		$url = 'http://' . $this->vendor->getVendorUrl(). '.'.DOMAIN.WWW_FOLDERS . '/dnt-jobs/recaching?vendorId=' . $this->vendor->getId();
        file_get_contents($url);
        $data['msg'] = '<br/>Systém sa úspešne precachoval';
        $data['return'] = 'index.php?src=settings';
        $this->loadTemplate($this->loc, '../../../plugins/confirmUpdate', $data);
    }

    /**
     * DEL CACHE
     */
    public function delCacheAction()
    {
        $originDomain = $GLOBALS['ORIGIN_DOMAIN'];
        $dbDomain = $GLOBALS['DB_DOMAIN'];
        $this->cache->deleteCacheByDomain("../dnt-cache/", $originDomain);
        $this->cache->deleteCacheByDomain("../dnt-cache/", $dbDomain);
        Dnt::redirect("index.php?src=settings");
    }

}
