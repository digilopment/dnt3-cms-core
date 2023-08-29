<?php

namespace DntSystem;

use DntLibrary\Base\DntLog;
use DntLibrary\Base\Rest;

class LogSystem
{

    public function run()
    {
        $dntLog = new DntLog();

        /*
         * $comand ="alias dnt-log='php-cgi dnt.php'";
         * shell_exec($comand);
         * last log: /dnt-system/log/
         */
        $log_id = (new Rest())->get('log_id');
        $dntLog->show($log_id ? $log_id : 'last');
    }

}
