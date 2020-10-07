<?php

/**
 *  class       Post
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2019
 */

namespace DntLibrary\App;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\PostMeta;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class PostVariants
{

    public function __construct()
    {
        $this->rest = new Rest();
        $this->db = new DB();
        $this->vendor = new Vendor();
        $this->post = new Post();
        $this->postMeta = new PostMeta();
        $this->dnt = new Dnt();
    }

    public function createVariantFromPost($postId, $insertWithPostMeta = true)
    {
        $postData = (array) $this->post->getPost($postId);
        unset($postData['id']);
        unset($postData['id_entity']);
        $postData['type'] = 'variant';
        $finalPostData = [];
        foreach ($postData as $row => $val) {
            $finalPostData['`' . $row . '`'] = $val;
        }
        $this->db->insert('dnt_posts', $finalPostData);
        $lastPostId = $this->dnt->getLastId('dnt_posts');
        if ($insertWithPostMeta) {
            $postMeta = $this->postMeta->getPostMeta($postId);
            $postMetaData = [];
            foreach ($postMeta as $meta) {
                foreach ($meta as $key => $singl) {
                    $postMetaData[$key] = $singl;
                    $postMetaData[$key]['post_id'] = $lastPostId;
                    $finalPostMetaData = [];
                    foreach ($postMetaData[$key] as $row => $val) {
                        $finalPostMetaData['`' . $row . '`'] = $val;
                        if ($row == 'show') {
                            $finalPostMetaData['`show`'] = 0;
                        }
                    }
                    $this->db->insert('dnt_posts_meta', $finalPostMetaData);
                }
            }
        }
        return $lastPostId;
    }

    public function getVariants($config, $addDefaultPost = false)
    {

        $data = [];
        $setShow = 'AND (`show` = 1 or `show` = 2)';
        $groupId = $config;
        if (is_array($config)) {
            $groupId = $config['group_id'];
            $setShow = ($config['add_hide'] == 1) ? 'AND `show` > 0' : 'AND (`show` = 1 or `show` = 2)';
        }
        $query = "SELECT * FROM dnt_posts WHERE `group_id` = $groupId AND vendor_id = '" . $this->vendor->getId() . "' ".$setShow;
        if ($this->db->num_rows($query) > 0) {
            $data = $this->db->get_results($query);
        }

        if ($addDefaultPost === false) {
            $variants = [];
            foreach ($data as $item) {
                if ($item['type'] == 'variant') {
                    $variants[] = $item;
                }
            }
            return $variants;
        } else {
            return $data;
        }
    }

}
