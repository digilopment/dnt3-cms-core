<?php

use DntLibrary\Base\Dnt;
use DntLibrary\Base\DntUpload;
use DntLibrary\Base\Polls;
use DntLibrary\Base\PollsFrontend;
use DntLibrary\Base\Vendor;

$dntUpload = new DntUpload;
if ($rest->post("sent")) {
    $poll_id = $rest->get("post_id");

    //update static inputs => dnt_polls
    $poll_show = $rest->post("poll_show");
    $poll_content = $rest->post("poll_content");
    $poll_type = $rest->post("poll_type");
    $poll_name = $rest->post("poll_name");
    $poll_name_url = $dnt->name_url($poll_name);
    $table = "dnt_polls";
    $db->update(
            $table, //table
            array(//set
                'name' => $poll_name,
                'name_url' => $poll_name_url,
                'type' => $poll_type,
                'show' => $poll_show,
                'content' => $poll_content,
            ),
            array(//where
                'id_entity' => $poll_id,
                '`vendor_id`' => $vendor->getId())
    );
    $dntUpload->addDefaultImage(
            "poll_image", //input type file
            "dnt_polls", //update table
            "img", //update table column
            "`id`", //where column
            $poll_id, //where value
            "../dnt-view/data/uploads"    //path
    );


    //update all generated inputs dnt_polls_composer
    $return = $rest->post("return");
    $table = "dnt_polls_composer";
    //update data 
    //for($i=1;$i<=$polls->getNumberOfQuestions($poll_id);$i++){
    $k = 1;
    foreach ($pollsFrontend->getPollsIds($poll_id) as $i) {
        $query = $polls->getPollData($poll_id);
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $poll_name_show = $rest->post($polls->inputName("show", $row['id_entity'], $row['show']));
                $poll_name_key = $rest->post($polls->inputName("key", $row['id_entity'], $row['key']));
                $poll_name_points = $rest->post($polls->inputName("points", $row['id_entity'], $row['key']));
                $poll_name_content = $rest->post($polls->inputName("content", $row['id_entity'], $row['key']));
                $dnt_polls_meta_id = explode("_", $polls->inputName("key", $row['id_entity'], $row['key']));
                $poll_name_img = $polls->inputName("img", $row['id_entity'], $row['img']);
                $meta_id = $dnt_polls_meta_id[0];

                if ($row['key'] == "winning_combination" && $k == 1 && $polls->getParam("type", $poll_id) == 2) {
                    $dntUpload->addDefaultImage(
                            $poll_name_img, //input type file
                            "dnt_polls_composer", //update table
                            "img", //update table column
                            "`id`", //where column
                            $meta_id, //where value
                            "../dnt-view/data/uploads"  //path
                    );
                }

                $db->update(
                        $table, //table
                        array(//set
                            'value' => $poll_name_key,
                            'show' => $poll_name_show,
                            'points' => $poll_name_points,
                            'description' => $poll_name_content,
                        ),
                        array(//where
                            'id_entity' => $meta_id,
                            //'poll_id' 		=> $poll_id, 
                            '`vendor_id`' => $vendor->getId())
                );
                //echo $poll_name_key ." ".$meta_id."<br/>";
            }
            $k++;
        }

        $is_correct = explode("_", $rest->post("is_correct_" . $i));
        $is_correct = $is_correct[0];
        $db->update(
                $table, //table
                array(//set
                    'is_correct' => 1,
                ),
                array(//where
                    'id_entity' => $is_correct,
                    '`vendor_id`' => $vendor->getId())
        );
    }
    $dnt->redirect($return);
}

