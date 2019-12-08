<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Init
{

    public function __construct()
    {
        require '../dnt-library/framework/app/Bootstrap.php';
    }

    public function run()
    {
        $bootstrap = new Bootstrap('../../');
        $bootstrap->boot();
        $app = new App($bootstrap->client);
        $app->runAdmin();
    }

}

(new Init())->run();
