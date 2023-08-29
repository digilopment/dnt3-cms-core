<?php

use DntLibrary\Base\Dnt;
use DntLibrary\Base\Polls;

$polls->AddWinningCombination($rest->get("post_id"), $rest->get("question_id"));
$dnt->redirect("index.php?src=polls&action=edit_poll&post_id=".$rest->get("post_id"));

