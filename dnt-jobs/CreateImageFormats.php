<?php

namespace DntJobs;

use DntLibrary\Base\DB;
use DntLibrary\Base\DntUpload;
use DntLibrary\Base\Vendor;
use DntLibrary\Base\Upload;

class CreateImageFormatsJob
{

    const UPLOAD_PATH = '../dnt-view/data/uploads/';

    public function __construct()
    {
        $this->db = new DB();
        $this->vendor = new Vendor();
    }

    public function run()
    {
        $this->db = new DB();
        $images = [];
        $originalImagePath = self::UPLOAD_PATH;
        $query = "SELECT DISTINCT name FROM dnt_uploads WHERE type LIKE '%image%'";
        if ($this->db->num_rows($query) > 0) {
            $i = 0;
            foreach ($this->db->get_results($query) as $row) {
                if (file_exists($originalImagePath . $row['name'])) {
                    $images[$i]['pathImage'] = $originalImagePath . $row['name'];
                    $images[$i]['imageName'] = $row['name'];
                }
                $i++;
            }
        }
        
        foreach ($images as $image) {

            if (!file_exists(self::UPLOAD_PATH . 'formats/' . DntUpload::imageFormats()[0] . '/' . $image['imageName'])) {
                $upload = new Upload($image['pathImage']);
                if ($upload->uploaded) {
                    foreach (DntUpload::imageFormats() as $format) {
                        $formatPath = self::UPLOAD_PATH . 'formats/' . $format;
                        $upload->image_resize = true;
                        $upload->image_x = $format;
                        $upload->image_ratio_y = true;
                        $upload->process($formatPath);
                        $upload->processed;
                    }
                } else {
                    echo $image . ' sa nedá resiznut<br/>';
                }
            }
        }
    }

}
