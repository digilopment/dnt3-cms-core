<?php

/**
 * 
 * If you download this script as a singl script file, 
 * please add this line of code below, after last bracket
 * *
 * * * => (new Dnt3InstallScript())->run();
 * *
 * 
 */
class Dnt3InstallScript {

    protected static function downloadFile($url, $path) {
        $file = explode("/", $url);
        $array = $file;
        if (!is_array($array))
            return $array;
        if (!count($array))
            return null;
        end($array);
        $fotka = $array[key($array)];

        $file = $path . $fotka;
        file_put_contents($file, file_get_contents($url));
        return true;
    }

    protected static function recurse_copy($src, $dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (is_dir($src . '/' . $file)) {
                    self::recurse_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    protected static function rrmdir($src) {
        $dir = opendir($src);
        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                $full = $src . '/' . $file;
                if (is_dir($full)) {
                    self::rrmdir($full);
                } else {
                    unlink($full);
                }
            }
        }
        closedir($dir);
        rmdir($src);
    }

    public function run() {
        $projectFolder = "dnt3/";

        if (self::downloadFile("https://github.com/designdnt/cms-designdnt3/archive/master.zip", "")) {
            $zip = new ZipArchive;
            $res = $zip->open('master.zip');
            @file($res);
            $zip->extractTo($projectFolder);
            $zip->close();
            self::recurse_copy($projectFolder . "cms-designdnt3-master", $projectFolder);
            self::rrmdir($projectFolder . 'cms-designdnt3-master');
            unlink('master.zip');
            print ("\nInstalation finished... redirecting\n");
            print ("<script>window.setTimeout(location.href = '/" . $projectFolder . "dnt-install/index.php',5000)</script>");
        }
    }

}
