<?php

use DntLibrary\Base\User;

if (isset($_POST['sent'])) {
    $user = new User();
    $return = $user->addDefaultUser();


    get_top();
    get_top_html();
    getConfirmMessage($return, '<br/>Údaje sa úspešne uložili ');
    get_bottom_html();
    get_bottom();
} else {
    $dnt->redirect(WWW_PATH_ADMIN_2 . '?src=' . DEFAULT_MODUL_ADMIN);
}
