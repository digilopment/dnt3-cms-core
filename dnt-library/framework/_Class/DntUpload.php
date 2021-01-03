<?php

/**
 *  class       DntUpload
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\FaceModify;
use DntLibrary\Base\Image;
use DntLibrary\Base\Upload;
use DntLibrary\Base\Vendor;

class DntUpload
{

    public function __construct()
    {
        $this->db = new DB();
        $this->dnt = new Dnt();
        $this->image = new Image();
        $this->faceModify = new FaceModify();
        $this->vendor = new Vendor();
    }

    /**
     *
     * image name
     *
     */
    protected function imageName($prefix = false)
    {
        if ($prefix) {
            return $prefix . "_" . md5(time()) . "_o";
        }
        return $this->vendor->getId() . "_" . md5(time()) . "_o";
    }

    public function imageFormats()
    {
        return array(
            Image::THUMB,
            Image::SMALL,
            Image::MEDIUM,
            Image::LARGE
        );
    }

    protected function makeImageFormat($dntUpload, $path, $image_x, $fileName)
    {

        if ($this->dnt->in_string("image", $dntUpload->file_src_mime)) {
            $dntUpload->file_new_name_body = $fileName;
            $dntUpload->image_resize = true;
            $dntUpload->image_ratio_y = true;
            $dntUpload->image_x = $image_x;
            $dntUpload->Process($path);
            return $dntUpload->processed;
        }
    }

    /**
     * 
     * @param type $file
     * @param type $table
     * @param type $setColumn
     * @param type $updateColumn
     * @param type $updateValue
     * @param type $path
     */
    public function addDefaultImage($file, $table, $setColumn, $updateColumn, $updateValue, $path)
    {
        $dntUpload = new Upload(@$_FILES[$file]);

        if (is_file($_FILES[$file]['tmp_name'])) {
            $insertedData = array();
            if ($dntUpload->uploaded) {
                $fileName = $this->imageName();
                $dntUpload->file_new_name_body = $fileName;
                $dntUpload->Process($path);
                if ($dntUpload->processed) {
                    //insert to files table of files
                    $insertedData = array(
                        'vendor_id' => $this->vendor->getId(),
                        'name' => $dntUpload->file_dst_name,
                        'type' => $dntUpload->file_src_mime
                    );
                    $this->db->dbTransaction();
                    $this->db->insert('dnt_uploads', $insertedData);

                    //get last ID of this file
                    $imgId = $this->dnt->getLastId('dnt_uploads');

                    //update settings columns
                    $this->db->update(
                            $table, //table 
                            array($setColumn => $imgId), //set
                            array($updateColumn => $updateValue, '`vendor_id`' => $this->vendor->getId())//where
                    );
                    $this->db->dbCommit();
                }
                foreach ($this->imageFormats() as $format) {
                    $this->makeImageFormat(new Upload(@$_FILES[$file]), $path . "/formats/" . $format, $format, $fileName);
                }
                return $insertedData;
            }
        }
    }

    /**
     * 
     * @param type $file
     * @param type $table
     * @param type $path
     * @param type $width
     * @return type
     */
    public function addFaceDetect($file, $table, $path, $width)
    {

        $dntUpload = new Upload(@$_FILES[$file]);
        $returnData = array();
        if (is_file($_FILES[$file]['tmp_name'])) {

            if ($dntUpload->uploaded) {
                $dntUpload->Process($path);
                if ($dntUpload->processed) {
                    //insert to files table of files
                    $face_detect = new FaceModify('dnt-library/framework/_Class/detection.dat');
                    $face_detect->faceDetect($path . "/" . $dntUpload->file_dst_name);
                    $face_detect->save($width, $width, $path . "/" . $dntUpload->file_dst_name);
                    $insertedData = array(
                        'vendor_id' => $this->vendor->getId(),
                        'name' => $dntUpload->file_dst_name,
                        'type' => $dntUpload->file_src_mime
                    );
                    $this->db->insert('dnt_uploads', $insertedData);
                    $returnData = array(
                        "file_dst_name" => $dntUpload->file_dst_name,
                        "file_src_mime" => $dntUpload->file_src_mime,
                    );
                }
                foreach ($this->imageFormats() as $format) {
                    $this->makeImageFormat(new Upload($file), $path . "/formats/" . $format, $format, $dntUpload->file_dst_name);
                }
            }
            return $returnData;
        }
    }

    /**
     * 
     * @param type $file_post
     * @return type
     */
    public function arrayFiles(&$file_post)
    {
        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }

    /**
     * 
     * @param type $files
     * @param type $path
     */
    public function multypleUpload($files, $path, $insertToDatabase = true, $moreFormats = true)
    {
        $files_arr = $this->arrayFiles($files);
        $returnInserted = array();

        foreach ($files_arr as $file) {
            $dntUpload = new Upload($file);
            $fileName = $this->imageName();
            if ($dntUpload->uploaded) {
                $dntUpload->file_new_name_body = $fileName;
                $dntUpload->Process($path);
                if ($dntUpload->processed) {
                    //insert to files table of files
                    $insertedData = array(
                        'vendor_id' => $this->vendor->getId(),
                        'name' => $dntUpload->file_dst_name,
                        'type' => $dntUpload->file_src_mime
                    );
                    if ($insertToDatabase) {
                        $this->db->insert('dnt_uploads', $insertedData);
                    }
                    $returnInserted[] = $insertedData;
                }

                if ($moreFormats === true) {
                    foreach ($this->imageFormats() as $format) {
                        $this->makeImageFormat(new Upload($file), $path . "/formats/" . $format, $format, $fileName);
                    }
                }
            }
        } //end foreach
        return $returnInserted;
    }

    public function fromUrl($url, $path, $vendorId = false, $insertToDatabase = true, $moreFormats = true)
    {
        $insertedData = array();

        $dntUpload = new Upload($url);
        $fileName = $this->imageName($vendorId);
        if ($dntUpload->uploaded) {
            $dntUpload->image_resize = true;
            $dntUpload->image_x = 1500;
            $dntUpload->image_ratio_y = true;
            $dntUpload->file_new_name_body = $fileName;
            $dntUpload->Process($path);
            if ($dntUpload->processed) {
                //insert to files table of files
                $insertedData = array(
                    'vendor_id' => ($vendorId) ? $vendorId : $this->vendor->getId(),
                    'name' => $dntUpload->file_dst_name,
                    'type' => $dntUpload->file_src_mime
                );
                if ($insertToDatabase) {
                    $this->db->insert('dnt_uploads', $insertedData);
                }
                $insertedData['lastImageId'] = $this->dnt->getLastId('dnt_uploads', $vendorId);
            } else {
                echo $url . ' no upload<br/>';
            }

            if ($moreFormats === true) {
                foreach ($this->imageFormats() as $format) {
                    //self::makeImageFormat(new Upload($url), $path . "/formats/" . $format, $format, $fileName);
                }
            }
        }
        return $insertedData;
    }

    /**
     * 
     * @param type $files
     * @param type $table
     * @param type $setColumn
     * @param type $updateColumn
     * @param type $updateValue
     * @param type $path
     */
    public function multypleUploadFiles($files, $table, $setColumn, $updateColumn, $updateValue, $path)
    {
        $files_arr = $this->arrayFiles($files);
        $uploadedID = array();
        foreach ($files_arr as $file) {
            $dntUpload = new Upload($file);

            if ($dntUpload->uploaded) {
                $fileName = $this->imageName();
                $dntUpload->file_new_name_body = $fileName;
                $dntUpload->Process($path);
                if ($dntUpload->processed) {
                    //insert to files table of files
                    $insertedData = array(
                        'vendor_id' => $this->vendor->getId(),
                        'name' => $dntUpload->file_dst_name,
                        'type' => $dntUpload->file_src_mime
                    );

                    $this->db->insert('dnt_uploads', $insertedData);
                    $uploadedID[] = $this->dnt->getLastId('dnt_uploads');
                }
                foreach ($this->imageFormats() as $format) {
                    $this->makeImageFormat(new Upload($file), $path . "/formats/" . $format, $format, $fileName);
                }
            }
        } //end foreach
        //get last ID of this file
        if (count($uploadedID) > 0) {
            $imgId = implode(",", $uploadedID);

            //update settings columns
            $this->db->update(
                    $table, //table 
                    array($setColumn => $imgId), //set
                    array($updateColumn => $updateValue, '`vendor_id`' => $this->vendor->getId())//where
            );
        }
    }

}
