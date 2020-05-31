<?php

use DntLibrary\Base\Frontend;
?>
<!DOCTYPE html> 
<html lang="<?php echo Frontend::getMetaSetting($data, "language"); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $data['article']['name'] ?></title>
        <link href="<?php echo WWW_PATH; ?>dnt-view/layouts/default/css/bootstrap.min.css" rel="stylesheet">
    </head>