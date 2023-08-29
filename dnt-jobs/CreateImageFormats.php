<?php

namespace DntJobs;

use DntLibrary\Base\DB;
use DntLibrary\Base\DntUpload;
use DntLibrary\Base\Upload;
use DntLibrary\Base\Vendor;

class CreateImageFormatsJob
{

    const UPLOAD_PATH = '../dnt-view/data/uploads/';

    public function __construct()
    {
        $this->db = new DB();
        $this->vendor = new Vendor();
        $this->dntUpload = new DntUpload();
    }

    protected function removeAllCookies()
    {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time() - 1000);
                setcookie($name, '', time() - 1000, '/');
            }
        }
    }

    public function run()
    {
        $this->removeAllCookies();
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
            if (!file_exists(self::UPLOAD_PATH . 'formats/' . $this->dntUpload->imageFormats()[0] . '/' . $image['imageName'])) {
                $upload = new Upload($image['pathImage']);
                if ($upload->uploaded) {
                    foreach ($this->dntUpload->imageFormats() as $format) {
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
