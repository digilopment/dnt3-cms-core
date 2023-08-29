<?php

namespace DntTest;

use DntLibrary\App\Client;

class ClienterTest
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function run()
    {
        $this->client->init();
        var_dump($this->client);
    }
}
