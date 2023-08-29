<?php

namespace DntJobs;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Install;
use DntLibrary\Base\Rest;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ZipArchive;

class webExportJob
{

    public function __construct()
    {
        $this->dnt = new Dnt();
        $this->install = new Install();
    }

    public function run()
    {

        $db = new DB;
        $zip = new ZipArchive();

        $vendor_id = (new Rest())->get('vendor_id');

        if ($vendor_id) {

            $mysqlUserName = DB_USER;
            $mysqlPassword = DB_PASS;
            $mysqlHostName = DB_HOST;
            $DbName = DB_NAME;
            $tables = false;
            $backup_name = "../dnt-install/install.sql";
            $this->install->Export_Database($mysqlHostName, $mysqlUserName, $mysqlPassword, $DbName, $tables, $backup_name, $vendor_id);

            // Get real path for our folder
            $rootPath = realpath('../');

            // Initialize archive object
            $zip->open('../dnt-backup/' . $vendor_id . '_dnt3.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

            // Create recursive directory iterator
            $files = new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator($rootPath),
                    RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($files as $name => $file) {
                // Skip directories (they would be added automatically)
                if (!$file->isDir()) {
                    // Get real and relative path for current file
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($rootPath) + 1);

                    if (
                            $this->dnt->in_string("dnt-backup", $relativePath) ||
                            $this->dnt->in_string("dnt-cache", $relativePath) ||
                            $this->dnt->in_string("nbproject", $relativePath) ||
                            $this->dnt->in_string("external-uploads", $relativePath) ||
                            $this->dnt->in_string("generated-files", $relativePath) ||
                            $this->dnt->in_string(".git", $relativePath) ||
                            $this->dnt->in_string("data", $relativePath)
                    ) {

                        $query = "SELECT name FROM dnt_uploads WHERE vendor_id = $vendor_id";
                        if ($db->num_rows($query) > 0) {
                            foreach ($db->get_results($query) as $row) {
                                if ($this->dnt->in_string($row['name'], $relativePath)) {
                                    $zip->addFile($filePath, $relativePath);
                                }
                            }
                        }
                    } else {
                        // Add current file to archive
                        $zip->addFile($filePath, $relativePath);
                    }
                }
            }

            // Zip archive will be created only after closing object
            $zip->close();
            $url = WWW_PATH . "dnt-backup/" . $vendor_id . "_dnt3.zip";
            echo '<a target="_blank" href="' . $url . '">Download => ' . $url . '</a>';
        }
    }

}
