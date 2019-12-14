<?php

class DbExportJob
{

    public function run()
    {
        $rest = new Rest;
        error_reporting(0);
        $vendor_id = (new Rest())->get('vendor_id');


        //ENTER THE RELEVANT INFO BELOW
        $mysqlUserName = DB_USER;
        $mysqlPassword = DB_PASS;
        $mysqlHostName = DB_HOST;
        $DbName = DB_NAME;
        $backup_name = false;
        $tables = false;

        if ($vendor_id == 0) {
            $backup_name = "../dnt-install/install.sql";
            //echo "Database was exported. - ".$backup_name;
        } elseif ($vendor_id) {
            $backup_name = "../dnt-backup/" . $rest->get("vendor_id") . "-" . Dnt::name_url(Dnt::datetime()) . "-" . $DbName . ".sql";
            //echo "Database was exported. - ".$backup_name;
        } else {
            $vendor_id = false;
            $backup_name = "../dnt-backup/" . $DbName . ".sql";
            //echo "Database was exported. - ".$backup_name;
        }

        Install::Export_Database($mysqlHostName, $mysqlUserName, $mysqlPassword, $DbName, $tables = false, $backup_name, $vendor_id);
    }

}
