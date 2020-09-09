<?php

namespace DntJobs;

use DntLibrary\App\PostVariants;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\PostMeta;
use DntLibrary\Base\Vendor;

class JsonVariantsToPostVariantsJob
{

    public function __construct()
    {
        $this->db = new DB();
        $this->dnt = new Dnt();
        $this->vendor = new Vendor();
        $this->postMeta = new PostMeta();
        $this->postVariants = new PostVariants();
    }

    protected function getProducts()
    {
        $query = "SELECT * FROM dnt_posts WHERE "
                . "type = 'product' AND "
                . "`show` = '1' AND "
                . "vendor_id = '" . $this->vendor->getId() . "' "
                . "ORDER BY id ASC ";
        $this->finalItems = $this->db->get_results($query);
    }

    protected function postsWithMetaData()
    {
        $ids = [];
        $metaData = [];
        foreach ($this->finalItems as $item) {
            $ids[] = $item['id_entity'];
        }
        $idsIn = join(',', $ids);
        if ($idsIn) {
            $metaData = $this->postMeta->getPostsMeta($idsIn);
        }

        $final = [];
        foreach ($this->finalItems as $key => $item) {
            $final[$key] = $item;
            $postId = $item['id_entity'];
            $final[$key]['price'] = isset($metaData['keys'][$postId]['price']) && $metaData['keys'][$postId]['price']['show'] == 1 ? $metaData['keys'][$postId]['price']['value'] : false;
            $final[$key]['variants'] = isset($metaData['keys'][$postId]['variants']) && $metaData['keys'][$postId]['variants']['show'] == 1 ? $metaData['keys'][$postId]['variants']['value'] : false;
            $final[$key]['productId'] = isset($metaData['keys'][$postId]['productId']) && $metaData['keys'][$postId]['productId']['show'] == 1 ? $metaData['keys'][$postId]['productId']['value'] : false;
        }
        $this->finalItems = $final;
    }

    protected function init()
    {
        $this->getProducts();
        $this->postsWithMetaData();
    }

    protected function jsonDecode($str)
    {
        return json_decode($this->dnt->hexToStr($str), true);
    }

    protected function updateMeta($variant, $lastId, $post)
    {
        $meta = [
            'variant' => $variant['variant'],
            'productId' => $variant['id'],
            'originalImage' => $variant['image'],
        ];

        foreach ($meta as $key => $val) {
            $this->db->update(
                    'dnt_posts_meta',
                    array(
                        'show' => 1,
                        'value' => $val,
                    ),
                    array(
                        '`key`' => $key,
                        '`post_id`' => $lastId,
                        '`vendor_id`' => $post['vendor_id'])
            );
        }
    }

    protected function createMeta($variant, $lastId, $post)
    {
        $meta = [
            'variant' => $variant['variant'],
            'productId' => $variant['id'],
            'originalImage' => $variant['image'],
        ];

        foreach ($meta as $key => $val) {
            $insertedData = array(
                '`post_id`' => $lastId,
                '`service`' => $post['service'],
                '`vendor_id`' => $post['vendor_id'],
                '`key`' => $key,
                '`value`' => $val,
                '`content_type`' => 'text',
                '`cat_id`' => '2',
                '`description`' => 'Meta ' . ucfirst($key),
                '`show`' => '1'
            );
            $this->db->insert('dnt_posts_meta', $insertedData);
        }
    }

    protected function removeUnusedMeta()
    {
        $query = "DELETE FROM `dnt_posts_meta` WHERE "
                . "post_id IN("
                . "SELECT id_entity FROM `dnt_posts` WHERE "
                . "vendor_id = '" . $this->vendor->getId() . "' AND "
                . "type = 'variant') AND "
                . "vendor_id = '" . $this->vendor->getId() . "' AND "
                . "service = 'product_detail' AND "
                . "(`key` <> 'variant' OR `key` <> 'productId' OR `key` <> 'isInShop' or `key` <> 'isInStock')";
        $this->db->query($query);
    }

    protected function removeAllPostsVariants()
    {
        $query = "DELETE FROM `dnt_posts_meta` WHERE "
                . "post_id IN("
                . "SELECT id_entity FROM `dnt_posts` WHERE "
                . "vendor_id = '" . $this->vendor->getId() . "' AND "
                . "type = 'variant') AND "
                . "vendor_id = '" . $this->vendor->getId() . "' AND "
                . "service = 'product_detail'";
        $this->db->query($query);
        $query = "DELETE  FROM `dnt_posts` WHERE vendor_id = '" . $this->vendor->getId() . "' AND type = 'variant'";
        $this->db->query($query);
        var_dump('removel all variants post');
    }

    public function run()
    {
        //$this->removeAllPostsVariants();
		//exit;
        $this->init();
        //exit;
        foreach ($this->finalItems as $post) {
            if ($post['variants'] && $post['variants'] != '[]') { //&& $post['id_entity'] == 31138
                $variants = $post['variants'];
                $postId = $post['id_entity'];
                $arrVariants = $this->jsonDecode($variants);
				//var_dump($variants);
                print($post['name'] . ' - ');
                if (is_array($arrVariants) && count($arrVariants) > 0) {
                    $i = 0;
                    foreach ($arrVariants as $variant) {
                        if ($post['productId'] != $variant['id']) { //naimportuje varianty bey duplikovania variant == product
                            //var_dump($post);
                            //var_dump($variant);
                            //exit;
                            //SLOW OPTIONS - 1000 products - 90min
                            //$lastId = $this->postVariants->createVariantFromPost($postId);
                            //$this->updateMeta($variant, $lastId, $post);
                            //FASTER OPTION - 1000 products - 5min
                            
							$lastId = $this->postVariants->createVariantFromPost($postId, false);
                            $this->createMeta($variant, $lastId, $post);
                            $i++;
                        }
                    }
                    print('' . $i . ' varianty boli vytvorené<br/>');
                } else {
                    print('neexistujú varianty<br/>');
                }
            }
        }
        print('<hr/> KONIEC <br/>');
        //$this->removeUnusedMeta();
        //var_dump($this->finalItems);
    }

}
