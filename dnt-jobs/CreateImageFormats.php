<?php

namespace DntJobs;

use DntLibrary\Base\DB;
use DntLibrary\Base\DntUpload;
use DntLibrary\Base\Vendor;
use DntLibrary\Base\Upload;

class createImageFormatsJob
{

    public function run()
    {
        $vendor = new Vendor();
        $db = new DB();
        $images = [];
        $originalImagePath = "../dnt-view/data/uploads/";
        $query = "SELECT DISTINCT name FROM dnt_uploads WHERE type LIKE '%image%'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                if (file_exists($originalImagePath . $row['name'])) {
                    $images[] = $originalImagePath . $row['name'];
                }
            }
        }

        foreach ($images as $image) {
            $dnt = new Upload($image);
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
    }

}
