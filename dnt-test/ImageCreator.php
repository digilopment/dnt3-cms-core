<?php

namespace DntTest;

use DntLibrary\Base\Dnt;

class ImageCreatorTest
{

    public function __construct()
    {
        $this->dnt = new Dnt();
    }

    public function image()
    {
        //header("Content-Type: image/jpeg");
        //$filename = 'data/g2ao-splnomocnenec_zlatice_kusnirovej_roman_kvasnica_.jpg';
        if (!isset($_GET['file'])) {
            $file = '';
        } else {
            $file = $_GET['file'];
        }
        $source_file_name = (file_exists($file)) ? $file : 'data/g2ao-splnomocnenec_zlatice_kusnirovej_roman_kvasnica_.jpg';
        $source_file_modified = (file_exists($source_file_name)) ? filemtime($source_file_name) : 0;
        $source_ext = @strtolower(array_pop(explode('.', $source_file_name)));
        $mime_types = array('png' => 'image/png', 'jpe' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'jpg' => 'image/jpeg', 'gif' => 'image/gif');
        $mime_type = false;
        if (array_key_exists($source_ext, $mime_types)) {
            $mime_type = $mime_types[$source_ext];
        }

        // Set a maximum height and width
        // round($_GET['width'], -1); // Round to nearest ten
        $width = ( isset($_GET['width']) && $_GET['width'] < 1000 ) ? $_GET['width'] : 100;
        $height = ( isset($_GET['height']) && $_GET['width'] < 1000 ) ? $_GET['height'] : 100;

        // New dimensions
        list($width_orig, $height_orig) = getimagesize($source_file_name);
        $ratio_orig = $width_orig / $height_orig;
        if ($width / $height > $ratio_orig) {
            $width = intval($height * $ratio_orig);
        } else {
            $height = intval($width / $ratio_orig);
        }

        // New File Name
        $pattern = '/(.*)(\.[a-z]{3,4})$/';
        $replacement = '$1_' . $width . 'x' . $height . '$2';
        $new_file_name = preg_replace($pattern, $replacement, $source_file_name);
        $new_file_modified = (file_exists($new_file_name)) ? filemtime($new_file_name) : 0;

        // Resample
        if (!file_exists($new_file_name) || $source_file_modified > $new_file_modified) {
            $image_p = imagecreatetruecolor($width, $height);
            switch ($mime_type) {
                case 'image/png':
                    $image = imagecreatefrompng($source_file_name);
                    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                    imagepng($image_p, $new_file_name, 80);
                    break;
                case 'image/gif':
                    $image = imagecreatefromgif($source_file_name);
                    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                    imagegif($image_p, $new_file_name, 80);
                    break;
                case 'image/jpeg':
                    $image = imagecreatefromjpeg($source_file_name);
                    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                    imagejpeg($image_p, $new_file_name, 80);
                    break;
            }
            imagedestroy($image_p);
        }

        // Content type
        header('Content-Type: ' . $mime_type);

        // Output
        //echo $new_file_name;
        echo file_get_contents($new_file_name);
    }

    public function run()
    {
        $this->image();
    }

}
