<?php

class DelWrongLogJob {

    public function run() {
        $db = new DB();
        $where = array('HTTP_COOKIE' => 'IS_JOB=1');
        $db->delete('dnt_logs', $where);
    }

}
