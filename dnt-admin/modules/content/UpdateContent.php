<?php

namespace DntAdmin\Moduls;

use DntLibrary\Base\ArticleList;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Cache;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\DntUpload;
use DntLibrary\Base\MultyLanguage;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class UpdateContent
{
    protected $rest;

    protected $cache;

    protected $articleView;

    protected $db;

    protected $multiLanguage;

    protected $dntUpload;

    public function __construct()
    {
        $this->rest = new Rest();
        $this->cache = new Cache();
        $this->articleView = new ArticleView();
        $this->articleList = new ArticleList();
        $this->db = new DB();
        $this->multiLanguage = new MultyLanguage();
        $this->dntUpload = new DntUpload();
        $this->dnt = new Dnt();
        $this->vendor = new Vendor();
    }

    public function init()
    {
        $cache = $this->cache;
        $article = $this->articleView;
        $rest = $this->rest;
        $db = $this->db;
        $multilanguages = $this->multiLanguage;
        $dntUpload = $this->dntUpload;

        $post_id = $rest->get('post_id');
        $return = $rest->post('return');
        $table = 'dnt_posts';

        $cat_id = $rest->post('cat_id');
        $sub_cat_id = $rest->post('sub_cat_id');
        $type = $rest->post('type');
        $show = $rest->post('show');
        $protected = $rest->post('protected') ? 1 : 0;
        $name = $rest->post('name');
        $name_url = $this->dnt->creat_name_url($rest->post('name'), $rest->post('name_url'));
        $datetime_publish = $this->dnt->timeToDbFormat('.', $rest->post('datetime_publish'));
        $perex = $rest->post('perex');
        $content = $rest->post('content');
        $embed = $rest->post('embed');
        $tags = $rest->post('tags');
        $service = $rest->post('service');
        $service_id = $rest->post('service_id');
        $post_category_id = $rest->post('post_category_id');

        $searchMeta = [];
        if ($service) {
            foreach ($article->getPostsMeta($post_id, $service) as $meta) {
                if ($meta['content_type'] == 'text' || 'content') {
                    $searchMeta[] = $meta['value'];
                }
            }
        }
        $searchMeta = implode('', $searchMeta);

        $search = $name . $name_url . $content . $perex . $searchMeta;
        $search = html_entity_decode($search);
        $search = $this->dnt->not_html($search);
        $search = $this->dnt->name_url($search);
        $search = str_replace('-', '', $search);

        $db->update(
            $table,
            array(
                    'cat_id' => $cat_id,
                    'sub_cat_id' => $sub_cat_id,
                    'post_category_id' => $post_category_id,
                    'type' => $type,
                    'show' => $show,
                    'protected' => $protected,
                    'name' => $name,
                    'name_url' => $name_url,
                    'datetime_publish' => $datetime_publish,
                    'perex' => $perex,
                    'content' => $content,
                    'search' => $search,
                    'embed' => $embed,
                    'tags' => $tags,
                    'datetime_update' => $this->dnt->datetime(),
                    'datetime_publish' => $datetime_publish,
                    'service' => $service,
                    'service_id' => $service_id,
                ),
            array(//where
                    'id_entity' => $post_id,
                    '`vendor_id`' => $this->vendor->getId())
        );

        $cat_name_url = $this->articleList->getArticleUrl($post_id);
        $cat_name_url = (str_replace(WWW_PATH, '', $cat_name_url));

        //delete as sitemap
        $cache->delete($GLOBALS['ORIGIN_DOMAIN'] . '/' . $name_url);
        $cache->delete($GLOBALS['DB_DOMAIN'] . '/' . $name_url);

        //delete as detail
        $cache->delete($GLOBALS['ORIGIN_DOMAIN'] . '/' . $cat_name_url);
        $cache->delete($GLOBALS['DB_DOMAIN'] . '/' . $cat_name_url);

        //MULTILANGUAGE BEGIN
        //vymaze aktualne preklady
        $where = array('`translate_id`' => $post_id, '`table`' => 'dnt_posts');
        $db->delete('dnt_translates', $where);

        $query = $multilanguages->getLangs();
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $name = $rest->post('name_' . $row['slug']);
                $name_url = $rest->post('name_url_' . $row['slug']);
                $content = $rest->post('name_content_' . $row['slug']);
                $perex = $rest->post('name_perex_' . $row['slug']);
                $tags = $rest->post('name_tags_' . $row['slug']);

                /**
                 * name
                 */
                $insertedData = array(
                    '`vendor_id`' => $this->vendor->getId(),
                    '`lang_id`' => $row['slug'],
                    '`translate_id`' => $post_id,
                    '`type`' => 'name',
                    '`table`' => 'dnt_posts',
                    '`translate`' => $name,
                    '`show`' => 1,
                    '`parent_id`' => '0',
                );
                $db->insert('dnt_translates', $insertedData);

                /**
                 * name_url
                 */
                $insertedData = array(
                    '`vendor_id`' => $this->vendor->getId(),
                    '`lang_id`' => $row['slug'],
                    '`translate_id`' => $post_id,
                    '`type`' => 'name_url',
                    '`table`' => 'dnt_posts',
                    '`translate`' => $name_url,
                    '`show`' => 1,
                    '`parent_id`' => '0',
                );
                $db->insert('dnt_translates', $insertedData);

                /**
                 * perex
                 */
                $insertedData = array(
                    '`vendor_id`' => $this->vendor->getId(),
                    '`lang_id`' => $row['slug'],
                    '`translate_id`' => $post_id,
                    '`type`' => 'perex',
                    '`table`' => 'dnt_posts',
                    '`translate`' => $perex,
                    '`show`' => 1,
                    '`parent_id`' => '0',
                );
                $db->insert('dnt_translates', $insertedData);

                /**
                 * content
                 */
                $insertedData = array(
                    '`vendor_id`' => $this->vendor->getId(),
                    '`lang_id`' => $row['slug'],
                    '`translate_id`' => $post_id,
                    '`type`' => 'content',
                    '`table`' => 'dnt_posts',
                    '`translate`' => $content,
                    '`show`' => 1,
                    '`parent_id`' => '0',
                );
                $db->insert('dnt_translates', $insertedData);

                /**
                 * tags
                 */
                $insertedData = array(
                    '`vendor_id`' => $this->vendor->getId(),
                    '`lang_id`' => $row['slug'],
                    '`translate_id`' => $post_id,
                    '`type`' => 'tags',
                    '`table`' => 'dnt_posts',
                    '`translate`' => $tags,
                    '`show`' => 1,
                    '`parent_id`' => '0',
                );
                $db->insert('dnt_translates', $insertedData);
            }
        }

        if ($rest->post('gallery_key_' . $post_id)) {
            if ($rest->post('gallery_key_' . $post_id) == 'del') {
                $galleryData = '';
            } else {
                $galleryData = $rest->post('gallery_key_' . $post_id);
            }
            $db->update(
                $table,
                array(
                        'img' => $galleryData,
                    ),
                array(
                        'id_entity' => $post_id,
                        '`vendor_id`' => $this->vendor->getId())
            );
        } else {
            $dntUpload->addDefaultImage(
                'userfile',
                'dnt_posts',
                'img',
                '`id_entity`',
                $post_id,
                '../dnt-view/data/uploads'
            );
        }

        $response = ['url' => $return];
        return $response;
    }
}
