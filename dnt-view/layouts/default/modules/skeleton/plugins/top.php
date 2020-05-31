<?php

use DntLibrary\Base\Frontend;
?>
<!DOCTYPE html> 
<html lang="<?php echo Frontend::getMetaSetting($data, "language"); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $data['article']['name'] ?></title>
        <link href="<?php echo WWW_PATH; ?>/dnt-view/layouts/default/css/skeleton/bootstrap.min.css" rel="stylesheet">
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
        <link href="<?php echo WWW_PATH; ?>/dnt-view/layouts/default/css/skeleton/jumbotron.css" rel="stylesheet">
    </head>