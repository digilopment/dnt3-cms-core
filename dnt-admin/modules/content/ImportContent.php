<?php

namespace DntAdmin\Moduls;

use DntLibrary\Base\ArticleView;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\DntUpload;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;
use DntLibrary\Base\Upload;

class ImportContent
{

    protected $rest;
    protected $articleView;
    protected $db;
    protected $dntUpload;
    protected $dnt;
    protected $imageUrl;
    protected $lastPostId;
    protected $vendor;
    protected $postData = [];
    protected $postMetaData = [];

    public function __construct()
    {
        $this->rest = new Rest();
        $this->rest = new Vendor();
        $this->articleView = new ArticleView();
        $this->db = new DB();
        $this->dntUpload = new DntUpload();
        $this->dnt = new Dnt();
    }

    /* public function downloadAndUpload()
      {
      foreach ($images as $image) {
      $dnt = new upload($image);
      if ($dnt->uploaded) {
      foreach (DntUpload::imageFormats() as $format) {
      $dnt->image_resize = true;
      $dnt->image_x = $format;
      $dnt->image_ratio_y = true;
      $dnt->process("../dnt-view/data/uploads/formats/" . $format);
      $dnt->processed;
      }
      } else {
      echo $image . " sa nedá resiznut<br/>";
      }
      }
      } */

    protected function setData($postData = [], $metaData = [])
    {
        $name = isset($postData['name']) ? $postData['name'] : 'Product Name';
        $nameUrl = isset($postData['name_url']) ? $postData['name_url'] : $this->dnt->name_url($name);
        $perex = isset($postData['perex']) ? $postData['perex'] : 'Post Perex';
        $content = isset($postData['content']) ? $postData['content'] : 'Post Content';
        $service = isset($postData['service']) ? $postData['service'] : false;
        $show = isset($postData['show']) ? $postData['show'] : '0';
        $post_category_id = isset($postData['post_category_id']) ? $postData['post_category_id'] : false;
        $type = isset($postData['type']) ? $postData['type'] : false;
        $vendor_id = isset($postData['vendor_id']) ? $postData['vendor_id'] : Vendor::getId();
        $this->imageUrl = isset($postData['image']) ? $postData['image'] : false;



        $search = $name . $nameUrl . $content . $perex;
        $search = html_entity_decode($search);
        $search = Dnt::not_html($search);
        $search = Dnt::name_url($search);
        $search = str_replace('-', '', $search);


        $this->postData = [
            'name' => $name,
            'name_url' => $nameUrl,
            'content' => $content,
            'perex' => $perex,
            'post_category_id' => $post_category_id,
            'vendor_id' => $vendor_id,
            'type' => $type,
            'datetime_creat' => $this->dnt->datetime(),
            'datetime_update' => $this->dnt->datetime(),
            'datetime_publish' => $this->dnt->datetime(),
            'search' => $search,
            'service' => $service,
            '`show`' => $show,
        ];

        $this->postMetaData = [];
    }

    protected function insertPost($postData = [], $metaData = [])
    {
        $this->db->dbTransaction();
        $this->db->insert('dnt_posts', $this->postData);
        $this->db->dbcommit();
        $this->lastPostId = $this->dnt->getLastId('dnt_posts');
    }

    protected function importImage()
    {
        if ($this->imageUrl) {
            $url = $this->imageUrl;
            $downloadPath = '../dnt-view/data/downloaded/';
            $fileData = $this->dnt->downloadFile($url, $downloadPath);
            if (isset($fileData['file'])) {
                $imageData = $this->dntUpload->fromUrl($downloadPath . $fileData['file'], '../dnt-view/data/uploads/');
                $this->db->update(
                        'dnt_posts',
                        array('img' => $imageData['lastImageId']),
                        array('id_entity' => $this->lastPostId, '`vendor_id`' => Vendor::getId())
                );
            }
        }
    }

    protected function insertPostMeta()
    {
        echo $this->lastPostId;
    }

    public function createPost($postData, $metaData)
    {
        $this->setData($postData, $metaData);
        $this->insertPost();
        $this->insertPostMeta();
        $this->importImage();
    }

}
