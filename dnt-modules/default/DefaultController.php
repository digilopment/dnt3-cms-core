<?php

class DefaultController {

    public function run() {
        $rest = new Rest;
        $rest->loadDefault();
    }

}
