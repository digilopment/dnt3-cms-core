<?php

use DntLibrary\Base\Dnt;
use DntLibrary\Base\DntUpload;

$dnt = new Dnt();
if (isset($_POST['sent'])) {
    $dntUpload = new DntUpload();
    $path = '../dnt-view/data/uploads';
    $files = $_FILES['userfile'];

    $dntUpload->multypleUpload($files, $path);
    $dnt->redirect(WWW_PATH_ADMIN_2 . 'index.php?src=files');
} else {
    $dnt->redirect(WWW_PATH_ADMIN_2 . 'index.php?src=' . DEFAULT_MODUL_ADMIN);
}
