<?php

namespace DntLibrary\App;

use DntLibrary\App\Post;
use DntLibrary\App\PostVariants;
use DntLibrary\Base\Cookie;
use DntLibrary\Base\DB;
use DntLibrary\Base\PostMeta;

class Cart
{
    public $postMetaDeta = [];

    public $cookieProductId;

    public function __construct()
    {
        $this->cookies = new Cookie();
        $this->posts = new Post();
        $this->postMeta = new PostMeta();
        $this->postVariants = new PostVariants();
        $this->db = new DB();
    }

    public function addToCart()
    {
        if ($this->cookies->IsEmpty($this->cookieProductId)) {
            $this->cookies->Set($this->cookieProductId, 1);
        } else {
            $countInCart = $this->cookies->Get($this->cookieProductId);
            $newCountInCart = $countInCart + 1;
            $this->cookies->Set($this->cookieProductId, $newCountInCart);
        }
    }

    public function product()
    {
        return $this->cookies->Get($this->cookieProductId);
    }

    public function removeFromCart()
    {
        $this->cookies->Delete($this->cookieProductId);
    }

    public function price($postIds)
    {
        $finalPrices = [];
        $query = 'SELECT `value`, `post_id` FROM `dnt_posts_meta` WHERE post_id IN(' . join(',', $postIds) . ") AND vendor_id = 56 AND `key` = 'price' AND `show` = 1 AND `value` <> ''";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $finalPrices[$row['post_id']] = $row['value'];
            }
        }
        return $finalPrices;

        /* $finalPrice = null;
          $post = $this->posts->getPost($postId);
          $postMeta = $this->postMeta->getPostsMeta($postId);
          if (isset($post->group_id)) {
          $variants = $this->postVariants->getVariants($post->group_id);
          if (count($variants) == 0) {
          $finalPrice = $postMeta['keys'][$postId]['price']['value'];
          } else {
          if (!isset($postMeta['keys'][$postId]['price']['value']) || $postMeta['keys'][$postId]['price']['value'] == 0) {
          $postMetaParent = $this->postMeta->getPostsMeta($post->group_id);
          $finalPrice = $postMetaParent['keys'][$post->group_id]['price']['value'];
          } else {
          $finalPrice = $postMeta['keys'][$postId]['price']['value'];
          }
          }
          }
          return $finalPrice; */
    }

    public function checkPost()
    {
        if ($this->postId && (isset($this->postMetaDeta['keys']['isInStock']['show']) && $this->postMetaDeta['keys']['isInStock']['show'] == 1) || (isset($this->postMetaDeta['keys']['isInShop']['show']) && $this->postMetaDeta['keys']['isInShop']['show'] == 1)) {
            return true;
        }
        return false;
    }

    public function init($postId)
    {
        $this->postId = $postId;
        $this->cookieProductId = 'dnt3Product_' . $this->postId;
        $this->postData = $this->posts->getPost($this->postId);
        if (isset($this->postData->id_entity)) {
            $this->postMetaDeta = $this->postMeta->getPostMeta($this->postData->id_entity);
        }
    }
}
