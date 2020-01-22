<?php

(new class
{

    public function __construct()
    {
        require '../dnt-library/framework/app/Bootstrap.php';
    }

    public function main()
    {
        $bootstrap = new Bootstrap('../../');
        $bootstrap->boot();
        $app = new App($bootstrap->client);
        $app->runInstall('Aplication');
    }
})->main();
