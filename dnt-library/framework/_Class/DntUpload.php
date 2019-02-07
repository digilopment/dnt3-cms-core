<?php

/**
 *  class       DntUpload
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
class DntUpload {

    /**
     *
     * image name
     *
     */
    protected function imageName() {
        return Vendor::getId() . "_" . md5(time()) . "_o";
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
    public function addDefaultImage($file, $table, $setColumn, $updateColumn, $updateValue, $path) {

        $dntUpload = new Upload(@$_FILES[$file]);
        $db = new Db;


        if (is_file($_FILES[$file]['tmp_name'])) {

            if ($dntUpload->uploaded) {
                $dntUpload->file_new_name_body = $this->imageName();
                $dntUpload->Process($path);
                if ($dntUpload->processed) {
                    //insert to files table of files
                    $insertedData = array(
                        'vendor_id' => Vendor::getId(),
                        'name' => $dntUpload->file_dst_name,
                        'type' => $dntUpload->file_src_mime
                    );
                    $db->dbTransaction();
                    $db->insert('dnt_uploads', $insertedData);

                    //get last ID of this file
                    $imgId = Dnt::getLastId('dnt_uploads');

                    //update settings columns
                    $db->update(
                            $table, //table 
                            array($setColumn => $imgId), //set
                            array($updateColumn => $updateValue, '`vendor_id`' => Vendor::getId())//where
                    );
                    $db->dbCommit();
                    return $insertedData;
                }
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
    public function addFaceDetect($file, $table, $path, $width) {

        $dntUpload = new Upload(@$_FILES[$file]);
        $db = new Db;

        if (is_file($_FILES[$file]['tmp_name'])) {

            if ($dntUpload->uploaded) {
                $dntUpload->Process($path);
                if ($dntUpload->processed) {
                    //insert to files table of files
                    $face_detect = new FaceModify('dnt-library/framework/_Class/detection.dat');
                    $face_detect->faceDetect($path . "/" . $dntUpload->file_dst_name);
                    $face_detect->save($width, $width, $path . "/" . $dntUpload->file_dst_name);
                    $insertedData = array(
                        'vendor_id' => Vendor::getId(),
                        'name' => $dntUpload->file_dst_name,
                        'type' => $dntUpload->file_src_mime
                    );
                    $db->insert('dnt_uploads', $insertedData);
                    return array(
                        "file_dst_name" => $dntUpload->file_dst_name,
                        "file_src_mime" => $dntUpload->file_src_mime,
                    );
                }
            }
        }
    }

    /**
     * 
     * @param type $file_post
     * @return type
     */
    public function arrayFiles(&$file_post) {
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
    public function multypleUpload($files, $path) {
        $db = new Db;
        $files_arr = $this->arrayFiles($files);

        foreach ($files_arr as $file) {
            $dntUpload = new Upload($file);

            if ($dntUpload->uploaded) {
                $dntUpload->file_new_name_body = $this->imageName();
                $dntUpload->Process($path);
                if ($dntUpload->processed) {
                    //insert to files table of files
                    $insertedData = array(
                        'vendor_id' => Vendor::getId(),
                        'name' => $dntUpload->file_dst_name,
                        'type' => $dntUpload->file_src_mime
                    );
                    $db->insert('dnt_uploads', $insertedData);
                    return $insertedData;
                }
            }
        } //end foreach
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
    public function multypleUploadFiles($files, $table, $setColumn, $updateColumn, $updateValue, $path) {
        $db = new Db;
        $files_arr = $this->arrayFiles($files);
        $uploadedID = array();
        foreach ($files_arr as $file) {
            $dntUpload = new Upload($file);

            if ($dntUpload->uploaded) {
                $dntUpload->file_new_name_body = $this->imageName();
                $dntUpload->Process($path);
                if ($dntUpload->processed) {
                    //insert to files table of files
                    $insertedData = array(
                        'vendor_id' => Vendor::getId(),
                        'name' => $dntUpload->file_dst_name,
                        'type' => $dntUpload->file_src_mime
                    );

                    $db->insert('dnt_uploads', $insertedData);
                    $uploadedID[] = Dnt::getLastId('dnt_uploads');
                }
            }
        } //end foreach
        //get last ID of this file
        if (count($uploadedID) > 0) {
            $imgId = implode(",", $uploadedID);

            //update settings columns
            $db->update(
                    $table, //table 
                    array($setColumn => $imgId), //set
                    array($updateColumn => $updateValue, '`vendor_id`' => Vendor::getId())//where
            );
        }
    }

}
