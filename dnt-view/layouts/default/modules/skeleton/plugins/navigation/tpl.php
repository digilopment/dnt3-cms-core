<?php

use DntLibrary\Base\MultyLanguage;
?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#"><?php echo MultyLanguage::translate($data, "navigation", "translate"); ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">

<?php foreach ($data['plugin_data']['nav'] as $item) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo WWW_PATH . $item['name_url'] ?>"><?php echo $item['name'] ?></a>
                </li>
<?php } ?>

        </ul>
    </div>
</nav>