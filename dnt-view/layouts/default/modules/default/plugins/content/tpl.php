<?php

use DntLibrary\Base\Dnt;
use DntLibrary\Base\MultyLanguage;
?>
<div class="container">
    <div class="jumbotron">
        <div class="container">
            <h1><?php echo Dnt::not_html($data['article']['perex']) ?></h1>
            <p><?php echo $data['article']['content'] ?></p>
        </div>
    </div>
    <p class="text-center" style="padding: 50px;">
        <a class="btn btn-primary btn-lg" href="" onclick="window.history.back();" role="button"><?php echo MultyLanguage::translate($data, "back", "translate") ?></a>
    </p>
    <hr>
    <footer class="text-center">
        <p>&copy; 2013 - <?php echo date("Y"); ?> <?php echo DOMAIN ?></p>
    </footer>
</div>