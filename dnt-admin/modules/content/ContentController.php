<?php

namespace DntAdmin\Moduls;

use DntAdmin\App\BaseAdminController;
use DntAdmin\App\Traits\CrudTrait;
use DntAdmin\Moduls\UpdateContent;
use DntLibrary\App\Autoloader;

class ContentController extends BaseAdminController
{
    use CrudTrait;

    protected string $loc = __FILE__;
    protected string $namespace = __NAMESPACE__;
    
    protected UpdateContent $updateContent;
    protected $importContent;
    protected array $finalItems = [];

    public function __construct()
    {
        parent::__construct();
        
        (new Autoloader())->addClass($this->loc, 'UpdateContent');
        (new Autoloader())->addClass($this->loc, 'ImportContent');
        
        $this->updateContent = new UpdateContent();
        $this->importContent = new ImportContent();
    }

    public function indexAction(): void
    {
        $data = array_merge($this->getCommonData(), []);
        $this->loadTemplate($this->loc, 'default', $data);
    }

    public function addAction(): void
    {
        $this->genericAdd(
            'dnt_posts',
            [
                'cat_id' => $this->rest->get('filter'),
                '`type`' => $this->rest->get('included'),
            ],
            null,
            function ($lastId, $insertedData) {
                $groupId = $this->rest->get('post_id') ?: $lastId;
                $this->db->update(
                    'dnt_posts',
                    ['group_id' => $groupId],
                    [
                        'id_entity' => $lastId,
                        'vendor_id' => $this->vendor->getId(),
                    ]
                );
                
                $redirect = $this->getRedirectUrl('content', [
                    'filter' => $this->rest->get('filter'),
                    'sub_cat_id' => $this->rest->get('sub_cat_id'),
                    'post_id' => $lastId,
                    'page' => 1,
                    'action' => 'edit',
                    'included' => $this->rest->get('included'),
                ]);
                $this->dnt->redirect($redirect);
            }
        );
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

    public function delAction(): void
    {
        $post_id = $this->rest->get('post_id');
        
        $this->genericDelete(
            'dnt_posts',
            $post_id,
            [],
            null,
            function ($id, $result) {
                if ($result) {
                    $this->db->delete('dnt_posts_meta', [
                        'post_id' => $id,
                        'vendor_id' => $this->vendor->getId(),
                    ]);
                }
                $this->dnt->redirect();
            }
        );
    }

    public function trashAction(): void
    {
        $post_id = $this->rest->get('post_id');
        $this->genericTrash('dnt_posts', $post_id);
        $this->dnt->redirect();
    }

    public function moveDownAction(): void
    {
        $post_id = $this->rest->get('post_id');
        $this->genericMoveDown('dnt_posts', $post_id);
        $this->dnt->redirect();
    }

    public function moveUpAction(): void
    {
        $post_id = $this->rest->get('post_id');
        $this->genericMoveUp('dnt_posts', $post_id);
        $this->dnt->redirect();
    }

    public function showHideAction(): void
    {
        $post_id = $this->rest->get('post_id');
        $this->genericShowHide('dnt_posts', $post_id);
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
