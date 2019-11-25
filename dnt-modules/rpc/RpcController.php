<?php

class RpcController {

    public function run() {
        $rest = new Rest;
        if ($rest->webhook(2) == "subscriber") {
            include "dnt-admin/modules/subscriber/webhook.php";
        } else {
            include "dnt-view/layouts/" . Vendor::getLayout() . "/modules/rpc/webhook.php";
        }
    }

}