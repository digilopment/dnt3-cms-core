<?php

namespace DntLibrary\App;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Vendor;

class Categories
{

    protected $db;
    protected $vendor;
    protected $dnt;
    public $allCategories = [];
    protected $tempParentTree = [];

    public function __construct()
    {
        $this->db = new DB();
        $this->dnt = new Dnt();
        $this->vendor = new Vendor();
    }

    protected function getAll()
    {
        $query = 'SELECT * FROM dnt_posts_categories WHERE vendor_id = ' . $this->vendor->getId() . ' order by `order` DESC, `id_entity` ASC';
        if ($this->db->num_rows($query) > 0) {
            $this->allCategories = $this->db->get_results($query);
        }
    }

    public function getRoot()
    {
        $sub = [];
        foreach ($this->allCategories as $category) {
            if (preg_match('/B-\d+-E/', $category['char_index'])) {
                $sub[] = $category;
            }
        }
        return $sub;
    }

    public function getParentCharIndex($parentId)
    {
        foreach ($this->allCategories as $category) {
            if (preg_match('/' . $parentId . '-E/', $category['char_index'])) {
                return $category['char_index'];
            }
        }
        return false;
    }

    public function getElement($id)
    {

        foreach ($this->allCategories as $category) {
            if ($id == $category['id_entity']) {
                return $category;
            }
        }
        return false;
    }

    public function getParentElement($id)
    {

        foreach ($this->allCategories as $category) {
            if ($id == $category['id_entity']) {
                $charIndex = $category['char_index'];
                $temp = (explode('-', explode('-' . $id, $charIndex)[0]));
                $parentId = (int) end($temp);
                return $this->getElement($parentId);
            }
        }
        return false;
    }

    protected function getParentElementsToBuffer($id)
    {
        foreach ($this->allCategories as $category) {
            if ($id == $category['id_entity']) {
                $charIndex = $category['char_index'];
                $temp = (explode('-', explode('-' . $id, $charIndex)[0]));
                $id = (int) end($temp);
                if ($id > 0) {
                    echo $id . '-';
                }
                $this->getParentElementsToBuffer($id);
            }
        }
    }

    public function getParentElements($id)
    {
        ob_start();
        $this->getParentElementsToBuffer($id);
        $response = ob_get_clean();
        $final = [];
        foreach (explode('-', $response) as $key => $val) {
            if ((int) $val) {
                $final[(int) $val] = (int) $val;
            }
        }
        return $final;
    }

    public function getParentElementsInit($id)
    {
        $data = [];
        foreach ($this->allCategories as $category) {
            if ($id == $category['id_entity']) {
                $charIndex = $category['char_index'];
                $temp = (explode('-', explode('-' . $id, $charIndex)[0]));
                $parentId = (int) end($temp);
                if ($parentId) {
                    $this->getParentElementsInit($parentId);
                    $data[] = $parentId;
                }
            }
        }
        $this->tempParentTree[] = $data;
        return $data;
    }

    public function getTreePath($id)
    {
        $final = [];
        $this->getParentElementsInit($id);
        foreach ($this->tempParentTree as $id) {
            if ($id) {
                $final[] = $id[0];
            }
        }
        $this->tempParentTree = null;
        return $final;
    }

    public function getChildren($parentId, $allSubchildren = false)
    {
        switch ($allSubchildren) {
            case false:
                $sub = [];
                foreach ($this->allCategories as $category) {
                    $charIndex = $this->getParentCharIndex($parentId);
                    $findPattern = str_replace('-E', '-\d+-E', $charIndex);
                    if (preg_match('/' . $findPattern . '/', $category['char_index'])) {
                        $sub[] = $category;
                    }
                }
                break;
            case true:
                $sub = [];
                foreach ($this->allCategories as $category) {
                    if ($this->dnt->in_string('-' . $parentId . '', $category['char_index'])) {
                        $sub[] = $category;
                    }
                }
                break;
        }
        return $sub;
    }

    public function hasPosts($categoryId)
    {
        $query = 'SELECT * FROM dnt_posts WHERE post_category_id = ' . $categoryId . ' AND vendor_id = ' . $this->vendor->getId();
        if ($this->db->num_rows($query) > 0) {
            return true;
        }
        return false;
    }

    public function hasChild($parentId)
    {
        if (count($this->getChildren($parentId)) > 0) {
            return true;
        }
        return false;
    }

    public function init()
    {
        $this->getAll();
    }

}
