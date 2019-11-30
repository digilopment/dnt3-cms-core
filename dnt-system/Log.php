<?php

class LogSystem {

    public function run() {
        $dntLog = new DntLog();

        /*
         * $comand ="alias dnt-log='php-cgi dnt.php'";
         * shell_exec($comand);
         */
        $log_id = (new Rest())->get('log_id');
        $dntLog->show($log_id ? $log_id : 'last');
    }

}
