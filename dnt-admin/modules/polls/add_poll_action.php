<?php


$poll_id = $polls->generatePoll(); //creat a item in dnt_polls

if ($rest->post('poll_id') == 0) {
    $polls->generateDefaultComposer($poll_id); //creat a item in dnt_polls_composer as default values
} else {
    $polls->copyComposer($poll_id, $rest->post('poll_id')); //creat a item in dnt_polls_composer as default values
}


//redirect to first question of poll_id poll
$dnt->redirect(WWW_PATH_ADMIN_2 . 'index.php?src=polls&action=edit_poll&post_id=' . $poll_id . '&question_id=1');
