<?php

namespace DntAdmin\Moduls;

use DntAdmin\App\AdminController;
use DntLibrary\App\Post;
use DntLibrary\App\PostVariants;
use DntLibrary\Base\AdminContent;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\DntUpload;
use DntLibrary\Base\Image;
use DntLibrary\Base\PostMeta;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class ServicesController extends AdminController
{

    protected $loc = __FILE__;
    protected $rest;
    protected $image;
    protected $adminContent;
    protected $dnt;
    protected $articleView;
    protected $db;
    protected $dntUpload;

    public function __construct()
    {
        $this->rest = new Rest();
        $this->image = new Image();
        $this->adminContent = new AdminContent();
        $this->dnt = new Dnt();
        $this->articleView = new ArticleView();
        $this->db = new DB();
        $this->dntUpload = new DntUpload();
        $this->postVariants = new PostVariants();
        $this->post = new Post();
        $this->postMeta = new PostMeta();
    }

    protected function checkMetaServicesConfigurator()
    {
        $file = '../dnt-view/layouts/' . Vendor::getLayout() . "/modules/" . $this->rest->get('service') . "/install/install.php";
        $class = '../dnt-view/layouts/' . Vendor::getLayout() . "/modules/" . $this->rest->get('service') . "/install/MetaServices.php";
        if (file_exists($class) || file_exists($file)) {
            return true;
        } else {
            return false;
        }
    }

    protected function postsWithMetaData($sourceItems)
    {
        $ids = [];
        $metaData = [];
        foreach ($sourceItems as $item) {
            $ids[] = $item['id_entity'];
        }
        $idsIn = join(',', $ids);
        if ($idsIn) {
            $metaData = $this->postMeta->getPostsMeta($idsIn);
        }

        $final = [];
        foreach ($sourceItems as $key => $item) {
            $final[$key] = $item;
            $postId = $item['id_entity'];
            $final[$key]['price'] = isset($metaData['keys'][$postId]['price']) && $metaData['keys'][$postId]['price']['show'] == 1 ? $metaData['keys'][$postId]['price']['value'] : false;
            $final[$key]['isInStock'] = isset($metaData['keys'][$postId]['isInStock']) && $metaData['keys'][$postId]['isInStock']['show'] == 1 ? $metaData['keys'][$postId]['isInStock']['value'] : false;
            $final[$key]['variant'] = isset($metaData['keys'][$postId]['variant']) && $metaData['keys'][$postId]['variant']['show'] == 1 ? $metaData['keys'][$postId]['variant']['value'] : false;
        }
        //$sourceItems = $final;
        return $final;
    }

    public function indexAction()
    {
        $data['image'] = $this->image;
        $data['adminContent'] = $this->adminContent;
        $data['rest'] = $this->rest;
        $data['dnt'] = $this->dnt;
        $data['article'] = $this->articleView;
        $data['post_id'] = $this->rest->get('post_id');
        $data['service'] = $this->rest->get('service');
        $data['show'] = $this->adminContent->getPostParam('show', $this->rest->get('post_id'));
        $data['msg'] = 'Tento modul nemá žiadne meta dáta. <br/>Pre vytvorenie nových meta dát prosím vytvorte konfiguráciu v module.';
        
        $post_id = $this->rest->get('post_id');
                
        $group_id = $this->adminContent->getPostParam("group_id", $post_id);
        $variantsItems = $this->postVariants->getVariants($group_id, false);
        $data['variants'] = $this->postsWithMetaData($variantsItems);
        $postItem[] = (array) $this->post->getPost($group_id, false);
        $data['item'] = $this->postsWithMetaData($postItem);

        if ($this->checkMetaServicesConfigurator()) {
            PostMeta::loadNewPostMetaFromConf($post_id, $this->rest->get('service'));
            $this->loadTemplate($this->loc, 'default', $data);
        } else {
            $this->loadTemplate($this->loc, 'error', $data);
        }
    }

    public function updateAction()
    {
        $path = '../dnt-view/data/uploads';
        $postId = $this->rest->get('post_id');
        if ($this->hasPost('sent')) {
            $return = $this->rest->post('return');
            foreach ($this->articleView->getPostsMeta($postId, $this->rest->get('service')) as $row) {

                if ($row['content_type'] == 'image' or $row['content_type'] == 'file') {

                    if ($this->rest->post('gallery_key_' . $row['id_entity'])) {
                        if ($this->rest->post('gallery_key_' . $row['id_entity']) == 'del') {
                            $galleryData = '';
                        } else {
                            $galleryData = $this->rest->post('gallery_key_' . $row['id_entity']);
                        }
                        $this->db->update(
                                'dnt_posts_meta',
                                array(
                                    'value' => $galleryData,
                                ),
                                array(
                                    'id_entity' => $row['id_entity'],
                                    'service' => $this->rest->get('service'),
                                    '`vendor_id`' => Vendor::getId()
                                )
                        );
                    } else {
                        $this->dntUpload->multypleUploadFiles(
                                $_FILES['userfile_' . $row['id_entity']],
                                'dnt_posts_meta',
                                'value',
                                '`id_entity`',
                                $row['id_entity'],
                                $path
                        );
                    }
                } elseif ($row['content_type'] == 'youtube_embed') {
                    $this->db->update(
                            'dnt_posts_meta',
                            array(
                                'value' => Dnt::youtubeVideoToEmbed($this->rest->post('key_' . $row['id_entity'])),
                            ),
                            array(
                                'id_entity' => $row['id_entity'],
                                'service' => $this->rest->get('service'),
                                '`vendor_id`' => Vendor::getId())
                    );
                } else {
                    $this->db->update(
                            'dnt_posts_meta',
                            array(
                                'value' => $this->rest->post('key_' . $row['id_entity'])
                            ),
                            array(
                                'id_entity' => $row['id_entity'],
                                'service' => $this->rest->get('service'),
                                '`vendor_id`' => Vendor::getId())
                    );
                }

                $this->db->update(
                        'dnt_posts_meta',
                        array(
                            'show' => $this->rest->post('zobrazit_' . $row['id_entity'])
                        ),
                        array(
                            'id_entity' => $row['id_entity'],
                            'service' => $this->rest->get('service'),
                            '`vendor_id`' => Vendor::getId())
                );


                $searchMeta = [];
                if ($row['content_type'] == 'text' || $row['content_type'] == 'content') {
                    $searchMeta[] = $row['value'];
                }
            }

            $searchMeta = implode('', $searchMeta);
            $name = $this->articleView->getPostParam('name', $postId);
            $name_url = $this->articleView->getPostParam('name_url', $postId);
            $content = $this->articleView->getPostParam('content', $postId);
            $perex = $this->articleView->getPostParam('perex', $postId);
            $search = $name . $name_url . $content . $perex . $searchMeta;
            $search = html_entity_decode($search);
            $search = Dnt::not_html($search);
            $search = Dnt::name_url($search);
            $search = str_replace('-', '', $search);


            $this->db->update(
                    'dnt_posts',
                    array(
                        'search' => $search,
                    ),
                    array(
                        'id_entity' => $postId,
                        '`vendor_id`' => Vendor::getId())
            );

            $data['url'] = $return;
            $data['msg'] = '<br/>Údaje sa úspešne uložili ';
            $this->loadTemplate($this->loc, 'success', $data);
        }
    }

}
