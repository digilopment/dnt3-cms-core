<?php

use DntLibrary\Base\Dnt;
use DntLibrary\Base\Polls;

Polls::AddWinningCombination($rest->get("post_id"), $rest->get("question_id"));
Dnt::redirect("index.php?src=polls&action=edit_poll&post_id=".$rest->get("post_id"));

