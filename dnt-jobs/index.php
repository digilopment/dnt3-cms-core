<?php

require '../dnt-library/framework/app/Bootstrap.php';
$bootstrap = new Bootstrap('../../');
$bootstrap->boot();
$app = new App($bootstrap->client);
$app->runJob();
