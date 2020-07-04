<?php

namespace DntJobs;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Image;

class ImportDeleteAllProductsJob
{

    protected $importContent;

    const VENDOR_ID = 56;
    const CAT_ID = 308;

    public function __construct()
    {
        $this->dnt = new Dnt();
        $this->image = new Image();
        $this->db = new DB();
    }

    protected function deleteProducts()
    {
        $query = "SELECT * FROM `dnt_posts` WHERE `vendor_id` = '" . self::VENDOR_ID . "' AND type = 'product'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $post_id = $row['id_entity'];
                $wherePosts = array('id_entity' => $post_id, 'vendor_id' => self::VENDOR_ID);
                $this->db->delete('dnt_posts', $wherePosts);

                $whereMeta = array('post_id' => $post_id, 'vendor_id' => self::VENDOR_ID);
                $this->db->delete('dnt_posts_meta', $whereMeta);

                //REMOVE IMAGE
                $imageId = $row['img'];
                $imageName = $this->image->getFileImage($imageId, false);
                $fileName = "../dnt-view/data/uploads/" . $imageName;
                if ($imageName) {
                    $this->dnt->deleteFile($fileName);
                }

                //DELETE FROM DB
                $this->db->query("DELETE FROM dnt_uploads WHERE name = '" . $imageName . "' AND vendor_id = '" . self::VENDOR_ID . "'");
            }
        }
    }

    public function run()
    {
        $this->deleteProducts();
    }

}
