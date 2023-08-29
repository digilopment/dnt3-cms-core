<?php

namespace DntAdmin\Moduls;

use DntAdmin\App\AdminController;
use DntAdmin\Moduls\UpdateContent;
use DntLibrary\App\Autoloader;
use DntLibrary\App\Post;
use DntLibrary\App\PostVariants;
use DntLibrary\Base\AdminContent;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Image;
use DntLibrary\Base\PostMeta;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;
use DntLibrary\Base\Webhook;

class ContentController extends AdminController
{
    protected $loc = __FILE__;

    protected $namespace = __NAMESPACE__ . '';

    protected $db;

    protected $rest;

    protected $webhook;

    protected $image;

    protected $adminContent;

    protected $dnt;

    protected $vendor;

    protected $updateContent;

    protected $importContent;

    protected $finalItems;

    public function __construct()
    {

        (new Autoloader())->addClass($this->loc, 'UpdateContent');
        (new Autoloader())->addClass($this->loc, 'ImportContent');

        $this->db = new DB();
        $this->rest = new Rest();
        $this->webhook = new Webhook();
        $this->image = new Image();
        $this->adminContent = new AdminContent();
        $this->dnt = new Dnt();
        $this->postVariants = new PostVariants();
        $this->post = new Post();
        $this->vendor = new Vendor();
        $this->postMeta = new PostMeta();
        $this->updateContent = new UpdateContent();
        $this->importContent = new ImportContent();
    }

    public function indexAction()
    {

        $data['vendor'] = $this->vendor;
        $data['rest'] = $this->rest;
        $data['webhook'] = $this->webhook;
        $data['db'] = $this->db;
        $data['image'] = $this->image;
        $data['adminContent'] = $this->adminContent;
        $data['dnt'] = $this->dnt;
        $this->loadTemplate($this->loc, 'default', $data);
    }

    public function addAction()
    {
        $insertedData = array(
            'vendor_id' => $this->vendor->getId(),
            'cat_id' => $this->rest->get('filter'),
            '`type`' => $this->rest->get('included'),
            'datetime_creat' => $this->dnt->datetime(),
            'datetime_update' => $this->dnt->datetime(),
            'datetime_publish' => $this->dnt->datetime(),
            '`show`' => '0',
        );

        $this->db->dbTransaction();
        $this->db->insert('dnt_posts', $insertedData);
        $this->db->dbcommit();
        $lastId = $this->dnt->getLastId('dnt_posts');
        if ($this->rest->get('post_id')) {
            $groupId = $this->rest->get('post_id');
        } else {
            $groupId = $lastId;
        }
        $this->db->update(
            'dnt_posts',
            array(
                    'group_id' => $groupId,
                ),
            array(
                    'id_entity' => $lastId,
                    'vendor_id' => $this->vendor->getId(),
                )
        );

        $redirect = WWW_PATH_ADMIN_2 . 'index.php?src=content&filter=' . $this->rest->get('filter') . '&sub_cat_id=' . $this->rest->get('sub_cat_id') . '&post_id=' . $lastId . '&page=1&action=edit&included=' . $this->rest->get('included') . '';
        $this->dnt->redirect($redirect);
    }

    public function addVariantAction()
    {
        $postId = $this->rest->get('post_id');
        $lastId = $this->postVariants->createVariantFromPost($postId);
        $redirect = WWW_PATH_ADMIN_2 . 'index.php?src=content&filter=' . $this->rest->get('filter') . '&sub_cat_id=' . $this->rest->get('sub_cat_id') . '&post_id=' . $lastId . '&page=1&action=edit&included=variant';
        $this->dnt->redirect($redirect);
    }

    public function importAction()
    {
        $postData = [
            'name' => 'Specialized S-Workd 2020',
            'content' => 'Toto je content',
            'perex' => 'Toto je perex',
            'service' => 'product_detail',
            'type' => 'product',
            'image' => 'https://cyan.com/wp-content/uploads/2019/08/test-image.jpg',
        ];
        $this->importContent->createPost($postData, []);
    }

    public function delAction()
    {
        $post_id = $this->rest->get('post_id');
        $wherePosts = array('id_entity' => $post_id, 'vendor_id' => $this->vendor->getId());
        $this->db->delete('dnt_posts', $wherePosts);

        $whereMeta = array('post_id' => $post_id, 'vendor_id' => $this->vendor->getId());
        $this->db->delete('dnt_posts_meta', $whereMeta);

        $this->dnt->redirect();
    }

    public function trashAction()
    {
        $post_id = $this->rest->get('post_id');
        $table = 'dnt_posts';
        $this->db->update(
            $table, //table
            array(//set
                    'show' => 0,
                ),
            array(//where
                    'id_entity' => $post_id,
                    'vendor_id' => $this->vendor->getId(),
                )
        );

        $this->dnt->redirect();
    }

    public function moveDownAction()
    {
        $post_id = $this->rest->get('post_id');
        $query = "SELECT `order` FROM dnt_posts WHERE id_entity = '" . $post_id . "' AND vendor_id = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $order = $row['order'];
            }
        }

        $order = $order - 1;

        $table = 'dnt_posts';
        $this->db->update(
            $table, //table
            array(//set
                    'order' => $order,
                ),
            array(//where
                    'id_entity' => $post_id,
                    'vendor_id' => $this->vendor->getId(),
                )
        );
        $this->dnt->redirect();
    }

    public function moveUpAction()
    {
        $post_id = $this->rest->get('post_id');
        $query = "SELECT `order` FROM dnt_posts WHERE id_entity = '" . $post_id . "' AND vendor_id = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $order = $row['order'];
            }
        }

        $order = $order + 1;

        $table = 'dnt_posts';
        $this->db->update(
            $table,
            array(
                    'order' => $order,
                ),
            array(
                    'id_entity' => $post_id,
                    'vendor_id' => $this->vendor->getId(),
                )
        );
        $this->dnt->redirect();
    }

    public function showHideAction()
    {
        $post_id = $this->rest->get('post_id');
        $query = "SELECT `show` FROM dnt_posts WHERE id_entity = '" . $post_id . "' AND vendor_id = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $show = $row['show'];
            }
        }

        if ($show == 3 || $show == 0) {
            $set_show = 1;
        } elseif ($show == 1) {
            $set_show = 2;
        } else {
            $set_show = 3;
        }
        $table = 'dnt_posts';
        $this->db->update(
            $table,
            array(
                    'show' => $set_show,
                ),
            array(
                    'id_entity' => $post_id,
                    'vendor_id' => $this->vendor->getId(),
                )
        );
        $this->dnt->redirect();
    }

    public function editCatAction()
    {
        $redirect = $this->rest->post('return');

        $name = $this->rest->post('name');
        $name_url = $this->dnt->name_url($name);
        $id_entity = $this->rest->post('id_entity');

        $this->db->update(
            'dnt_post_type',
            array(
                    'name' => $name,
                    'name_url' => $name_url,
                ),
            array(
                    'id_entity' => $id_entity,
                    '`vendor_id`' => $this->vendor->getId())
        );
        $this->dnt->redirect($redirect);
    }

    public function addCatAction()
    {
        $redirect = $this->rest->post('return');

        $name = $this->rest->post('name');
        $name_url = $this->dnt->name_url($name);
        $admin_cat = $this->rest->post('admin_cat');

        if ($name != '') {
            if ($admin_cat == 'post') {
                $cat_id = 3;
                $sub_cat_id = 0;
            } elseif ($admin_cat == 'article') {
                $cat_id = 2;
                $sub_cat_id = 0;
            }

            $insertedData = array(
                'cat_id' => $cat_id,
                'sub_cat_id' => $sub_cat_id,
                '`name_url`' => $name_url,
                '`admin_cat`' => $admin_cat,
                'name' => $name,
                '`show`' => '1',
                '`order`' => '0',
                'vendor_id' => $this->vendor->getId(),
            );

            $this->db->insert('dnt_post_type', $insertedData);
        }
        $this->dnt->redirect($redirect);
    }

    protected function postsWithMetaData($sourceItems)
    {
        $ids = [];
        $metaData = [];
        //$this->finalItems = $this->postVariants->getVariants($group_id, false);
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
            $final[$key]['variant'] = isset($metaData['keys'][$postId]['variant']) && $metaData['keys'][$postId]['variant']['show'] == 1 ? $metaData['keys'][$postId]['variant']['value'] : false;
        }
        //$sourceItems = $final;
        return $final;
    }

    public function editAction()
    {
        $post_id = $this->rest->get('post_id');
        $group_id = $this->adminContent->getPostParam('group_id', $post_id);
        if ($group_id == 0) {
            $this->db->update(
                'dnt_posts',
                array(
                        'group_id' => $post_id,
                    ),
                array(
                        'id_entity' => $post_id,
                        'vendor_id' => $this->vendor->getId(),
                    )
            );
        }

        $config = [
            'group_id' => $group_id,
            'add_hide' => 1,
        ];
        $variantsItems = $this->postVariants->getVariants($config, false);
        $data['variants'] = $this->postsWithMetaData($variantsItems);
        $postParentItem[] = (array) $this->post->getPost($group_id, false);
        $data['parentItem'] = $this->postsWithMetaData($postParentItem);

        $postItem[] = (array) $this->post->getPost($post_id, false);
        $data['item'] = $this->postsWithMetaData($postItem);
        $data['rest'] = $this->rest;
        $data['webhook'] = $this->webhook;
        $data['dnt'] = $this->dnt;
        $data['adminContent'] = $this->adminContent;
        $data['image'] = $this->image;

        $this->loadTemplate($this->loc, 'edit', $data);
    }

    public function updateAction()
    {
        if ($this->hasPost('sent')) {
            $response = $this->updateContent->init();
            $data = ['msg' => '<br/>Údaje sa úspešne uložili ', 'url' => $response['url']];
            $this->loadTemplate($this->loc, 'success', $data);
        }
    }
}
