<?php

namespace DntAdmin\Moduls;

use DntAdmin\App\AdminController;
use DntLibrary\App\Categories;
use DntLibrary\App\Post;
use DntLibrary\Base\AdminContent;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class CategoriesController extends AdminController
{
    protected $loc = __FILE__;

    protected $categories;

    protected $rest;

    protected $vendor;

    protected $db;

    protected $dnt;

    protected $posts;

    protected $adminContent;

    public function __construct()
    {
        $this->categories = new Categories();
        $this->rest = new Rest();
        $this->db = new DB();
        $this->vendor = new Vendor();
        $this->dnt = new Dnt();
        $this->posts = new Post();
        $this->adminContent = new AdminContent();
        $this->categories->init();
        $this->posts->init();
    }

    protected function postFilter()
    {
        $final = [];
        foreach ($this->posts->postsModel as $post) {
            if (isset($_GET['type'])) {
                if ($post->type == $_GET['type']) {
                    $final[] = $post;
                }
            } elseif (isset($_GET['catId'])) {
                $categoryTree = $this->categories->getChildren($_GET['catId'], true);
                $categoryIds = [];
                foreach ($categoryTree as $cat) {
                    $categoryIds[] = $cat['id_entity'];
                }
                if (in_array($post->post_category_id, $categoryIds)) {
                    $final[] = $post;
                }
            } elseif (isset($_GET['search'])) {
                $searhString = str_replace('-', '', $this->dnt->name_url($_GET['search']));
                if ($this->dnt->in_string($searhString, $post->search)) {
                    $final[] = $post;
                }
            } elseif (isset($_GET['productId'])) {
                if ($post->id_entity == $_GET['productId']) {
                    $final[] = $post;
                }
            } else {
                $final[] = $post;
            }
        }
        return $final;
    }

    public function indexAction()
    {
        $this->categories->init();

        $data['root_categories'] = $this->categories->getRoot();
        $data['children_test'] = $this->categories->getChildren(1);
        $data['children_test_all'] = $this->categories->getChildren(1, true);

        $data['hasChild'] = function ($parentId) {
            return $this->categories->hasChild($parentId) ? true : false;
        };
        $data['getChildren'] = function ($parentId) {
            return $this->categories->getChildren($parentId);
        };
        $data['getElement'] = function ($id) {
            return $this->categories->getElement($id);
        };

        $data['primaryCat'] = $this->adminContent->primaryCat();

        $data['getPosts'] = $this->postFilter();
        $data['dnt'] = $this->dnt;

        $this->loadTemplate($this->loc, 'default', $data);
    }

    public function editNameAction()
    {
        $id = $this->rest->get('id');
        $name = urldecode($this->rest->get('name'));
        $nameUrl = $this->dnt->name_url($name);

        $this->db->update(
            'dnt_posts_categories',
            [
                    'name' => $name,
                    'name_url' => $nameUrl,
                ],
            [
                    'id_entity' => $id,
                    '`vendor_id`' => $this->vendor->getId(),
                ]
        );
        $redirect = WWW_PATH_ADMIN_2 . 'index.php?src=categories';
        $this->dnt->redirect($redirect);
    }

    public function addCatAction()
    {
        $charIndex = $this->rest->get('charindex');
        $name = urldecode($this->rest->get('name'));
        $nameUrl = $this->dnt->name_url($name);

        $insertedData = array(
            'vendor_id' => $this->vendor->getId(),
            'post_id' => 0,
            'type' => '',
            'name' => $name,
            'name_url' => $nameUrl,
            '`show`' => '1',
        );

        $this->db->dbTransaction();
        $this->db->insert('dnt_posts_categories', $insertedData);
        $this->db->dbcommit();
        $lastId = $this->dnt->getLastId('dnt_posts_categories');
        $newCharIndex = str_replace('-E', '-' . $lastId . '-E', $charIndex);
        $this->db->update(
            'dnt_posts_categories',
            ['char_index' => $newCharIndex],
            [
                    'id_entity' => $lastId,
                    '`vendor_id`' => $this->vendor->getId(),
                ]
        );
        $redirect = WWW_PATH_ADMIN_2 . 'index.php?src=categories';
        $this->dnt->redirect($redirect);
    }

    public function removeTreeAction()
    {
    }

    public function moveCatLevelAction()
    {
    }

    protected function arrayNeighbor($arr, $key, $wrap = false)
    {
        $keys = array_keys($arr);
        $keyIndexes = array_flip($keys);

        $return = array();
        if (isset($keys[$keyIndexes[$key] - 1])) {
            $return['prev'] = $keys[$keyIndexes[$key] - 1];
        } else {
            $return['prev'] = null;
        }

        if (isset($keys[$keyIndexes[$key] + 1])) {
            $return['next'] = $keys[$keyIndexes[$key] + 1];
        } else {
            $return['next'] = null;
        }

        if (false != $wrap && empty($return['prev'])) {
            $end = end($arr);
            $return['prev'] = key($arr);
        }

        if (false != $wrap && empty($return['next'])) {
            $beginning = reset($arr);
            $return['next'] = key($arr);
        }

        return $return;
    }

    public function moveUpAction()
    {
        $id = (int) $this->rest->get('id');
        $parent = $this->categories->getParentElement($id);
        $parentId = $parent['id'];
        $parentCatChildren = $this->categories->getChildren($parentId);
        ksort($parentCatChildren);
        $items = [];
        $current = [];

        $count = count($parentCatChildren);
        foreach ($parentCatChildren as $child) {
            if ($id == $child['id_entity']) {
                $prev = prev($parentCatChildren);
                $current[$child['id_entity']] = (int) $count;
            }
            $items[$child['id_entity']] = (int) $count;
            $count--;
        }

        $neighbors = $this->arrayNeighbor($items, array_keys($current)[0]);
        $prevId = $neighbors['prev'];

        if ($prevId) {
            $setNewOrderForCurrentItem = $items[$prevId] + 1;
            $finalItems = [];
            if (in_array($setNewOrderForCurrentItem, $items)) {
                foreach ($items as $key => $val) {
                    if ($val >= $setNewOrderForCurrentItem) {
                        $finalItems[$key] = $val + 1;
                    } else {
                        $finalItems[$key] = $val;
                    }
                }
                $finalItems[$id] = $setNewOrderForCurrentItem;
            } else {
                foreach ($items as $key => $val) {
                    $finalItems[$key] = $val;
                }
                $finalItems[$id] = $setNewOrderForCurrentItem;
            }
        } else {
            $finalItems = $items;
        }

        foreach ($finalItems as $key => $val) {
            $this->db->update(
                'dnt_posts_categories',
                [
                        'order' => $val,
                    ],
                [
                        'id' => $key,
                        '`vendor_id`' => $this->vendor->getId(),
                    ]
            );
        }
        $this->dnt->redirect();
    }

    public function moveDownAction()
    {
        $id = (int) $this->rest->get('id');
        $position = $this->rest->get('position');
        $parent = $this->categories->getParentElement($id);
        $parentId = $parent['id'];
        $parentCatChildren = $this->categories->getChildren($parentId);
        ksort($parentCatChildren);
        $items = [];
        $current = [];

        $count = count($parentCatChildren);
        foreach ($parentCatChildren as $child) {
            if ($id == $child['id_entity']) {
                $current[$child['id_entity']] = (int) $count;
            }
            $items[$child['id_entity']] = (int) $count;
            $count--;
        }

        $neighbors = $this->arrayNeighbor($items, array_keys($current)[0]);
        $nextId = $neighbors['next'];
        $finalItems = [];

        if ($nextId) {
            $setNewOrderForCurrentItem = $items[$id] + 1;
            foreach ($items as $key => $val) {
                if ($val >= $setNewOrderForCurrentItem) {
                    $finalItems[$key] = $val + 1;
                    continue;
                } else {
                    $finalItems[$key] = $val;
                }
            }
            $finalItems[$nextId] = $setNewOrderForCurrentItem;
        } else {
            $finalItems = $items;
        }

        foreach ($finalItems as $key => $val) {
            $this->db->update(
                'dnt_posts_categories',
                [
                        'order' => $val,
                    ],
                [
                        'id' => $key,
                        '`vendor_id`' => $this->vendor->getId(),
                    ]
            );
        }
        $this->dnt->redirect();
    }

    public function moveToAction()
    {
        $id = $this->rest->get('id');
        $moveTo = $this->rest->get('moveTo');

        $element = $this->categories->getElement($id);
        $newParent = $this->categories->getElement($moveTo);
        $newCharIndex = str_replace('-E', '-' . $id . '-E', $newParent['char_index']);
        if ($this->categories->hasChild($id)) {
            $newParentElement = $this->categories->getElement($moveTo);
            foreach ($this->categories->getChildren($id, true) as $childrenElement) {
                if ($childrenElement['id_entity'] != $id) {
                    $charIndex = $childrenElement['char_index'];
                    $stableIndex = $id . '-' . explode('-' . $id . '-', $charIndex)[1];
                    $newPrefixIndex = str_replace('-E', '', $newParentElement['char_index']);
                    $newCharIndexChild = $newPrefixIndex . '-' . $stableIndex;

                    $this->db->update(
                        'dnt_posts_categories',
                        ['char_index' => $newCharIndexChild],
                        [
                                'id_entity' => $childrenElement['id_entity'],
                                '`vendor_id`' => $this->vendor->getId(),
                            ]
                    );
                }
            }
        }

        $this->db->update(
            'dnt_posts_categories',
            ['char_index' => $newCharIndex],
            [
                    'id_entity' => $element['id_entity'],
                    '`vendor_id`' => $this->vendor->getId(),
                ]
        );
        $redirect = WWW_PATH_ADMIN_2 . 'index.php?src=categories';
        $this->dnt->redirect($redirect);
    }

    public function removePostCatAction()
    {
        $id_entity = $this->rest->get('post_id');
        $this->db->update(
            'dnt_posts',
            ['post_category_id' => false],
            [
                    'id_entity' => $id_entity,
                    '`vendor_id`' => $this->vendor->getId(),
                ]
        );
        $this->dnt->redirect();
    }

    public function removeCatAction()
    {
        $id = $this->rest->get('id');
        if ($this->categories->hasChild($id)) {
            echo 'Nie je možné odstraniť kategóriu, pretože obsahuje ďalšie podkategórie';
        } elseif ($this->categories->hasPosts($id)) {
            echo 'Kategória, ktorú sa snažíte odstrániť obsahuje priradené posty';
        } else {
            $where = array('id_entity' => $id, 'vendor_id' => $this->vendor->getId());
            $this->db->delete('dnt_posts_categories', $where);
            $redirect = WWW_PATH_ADMIN_2 . 'index.php?src=categories';
            $this->dnt->redirect($redirect);
        }
    }

    public function savePostsToCatAction()
    {
        foreach ($_POST as $key => $val) {
            $post['post_id_entity'] = $key;
            $post['post_category_id'] = $val;
        }
        $id_entity = (int) $post['post_id_entity'];
        $post_category_id = (int) $post['post_category_id'];
        $this->db->update(
            'dnt_posts',
            ['post_category_id' => $post_category_id],
            [
                    'id_entity' => $id_entity,
                    '`vendor_id`' => $this->vendor->getId(),
                ]
        );
    }
}
