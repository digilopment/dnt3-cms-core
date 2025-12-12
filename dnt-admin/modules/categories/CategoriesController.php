<?php

namespace DntAdmin\Moduls;

use DntAdmin\App\BaseAdminController;
use DntAdmin\App\Traits\CrudTrait;
use DntLibrary\App\Categories;

class CategoriesController extends BaseAdminController
{
    use CrudTrait;

    protected string $loc = __FILE__;
    protected string $namespace = __NAMESPACE__;
    
    protected Categories $categories;

    public function __construct()
    {
        parent::__construct();
        $this->categories = new Categories();
        $this->categories->init();
        $this->post->init();
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

    public function indexAction(): void
    {
        $this->categories->init();

        $data = array_merge($this->getCommonData(), [
            'root_categories' => $this->categories->getRoot(),
            'children_test' => $this->categories->getChildren(1),
            'children_test_all' => $this->categories->getChildren(1, true),
            'hasChild' => function ($parentId) {
                return $this->categories->hasChild($parentId);
            },
            'getChildren' => function ($parentId) {
                return $this->categories->getChildren($parentId);
            },
            'getElement' => function ($id) {
                return $this->categories->getElement($id);
            },
            'primaryCat' => $this->adminContent->primaryCat(),
            'getPosts' => $this->postFilter(),
        ]);

        $this->loadTemplate($this->loc, 'default', $data);
    }

    public function editNameAction(): void
    {
        $id = $this->rest->get('id');
        $name = urldecode($this->rest->get('name') ?: '');
        $nameUrl = $this->dnt->name_url($name);

        $this->genericUpdate(
            'dnt_posts_categories',
            $id,
            [
                'name' => $name,
                'name_url' => $nameUrl,
            ]
        );
        
        $this->dnt->redirect($this->getRedirectUrl('categories'));
    }

    public function addCatAction(): void
    {
        $charIndex = $this->rest->get('charindex') ?: '';
        $name = urldecode($this->rest->get('name') ?: '');
        $nameUrl = $this->dnt->name_url($name);

        $this->genericAdd(
            'dnt_posts_categories',
            [
                'post_id' => 0,
                'type' => '',
                'name' => $name,
                'name_url' => $nameUrl,
                '`show`' => '1',
            ],
            null,
            function ($lastId, $insertedData) use ($charIndex) {
                $newCharIndex = str_replace('-E', '-' . $lastId . '-E', $charIndex);
                $this->db->update(
                    'dnt_posts_categories',
                    ['char_index' => $newCharIndex],
                    [
                        'id_entity' => $lastId,
                        '`vendor_id`' => $this->vendor->getId(),
                    ]
                );
                $this->dnt->redirect($this->getRedirectUrl('categories'));
            }
        );
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

    public function removeCatAction(): void
    {
        $id = $this->rest->get('id');
        
        $this->genericDelete(
            'dnt_posts_categories',
            $id,
            [],
            function ($id, $where) {
                if ($this->categories->hasChild($id)) {
                    echo 'Nie je možné odstraniť kategóriu, pretože obsahuje ďalšie podkategórie';
                    return false;
                }
                if ($this->categories->hasPosts($id)) {
                    echo 'Kategória, ktorú sa snažíte odstrániť obsahuje priradené posty';
                    return false;
                }
                return true;
            },
            function ($id, $result) {
                if ($result) {
                    $this->dnt->redirect($this->getRedirectUrl('categories'));
                }
            }
        );
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
