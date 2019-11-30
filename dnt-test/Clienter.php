<?php

class ClienterTest {

    public function run() {
        $client = new Client();
        $client->init();
        var_dump($client);
    }

}
