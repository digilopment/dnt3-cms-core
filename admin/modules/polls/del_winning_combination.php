<?php
Polls::delComposerInput($rest->get("composer_id"));
Dnt::redirect("index.php?src=polls&action=edit_poll&post_id=".$rest->get("post_id"));

