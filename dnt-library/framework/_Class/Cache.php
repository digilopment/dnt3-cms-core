<?php

/**
 *  class       Cache
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 *  Module cachuje len vtedy, ak sa jedna o adresu, ktorá je rewritovaná PR: http://localhost/www/abc
 *  Ak sa jedná o adresu, ktorá nie je rewritovaná, modul necachu PR: http://localhost/www/index.php?src=abc
 *  Obe adresy vyssie su zhodne, teda vracaju rovnaky conten
 *  Rewritovana adresa je len vtedy, ak sa namiesto `index.php?src=` nahradi nicim
 */

namespace DntLibrary\Base;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\DntLog;
use DntLibrary\Base\MultyLanguage;

class Cache
{
    var $doNotCache = array('rpc');

    var $cacheDir = 'dnt-cache';

    var $cacheTime = CACHE_TIME_SEC; //in seconds

    var $caching = false;

    var $cacheFile;

    var $cacheFileName;

    var $cacheLogFile;

    var $cacheLog;

    var $CACHE_ADDR;

    public function __construct()
    {
        $this->dnt = new Dnt();
        $this->cacheFile = base64_encode(@$_SERVER['HTTP_HOST'] . @$_SERVER['REQUEST_URI']);
        $this->cacheFileName = $this->cacheDir . '/' . $this->cacheFile . '.txt';
        $this->cacheLogFile = $this->cacheDir . '/log.txt';
        if (!is_dir($this->cacheDir)) {
            mkdir($this->cacheDir, 0755);
        }
        if (file_exists($this->cacheLogFile)) {
            $this->cacheLog = unserialize(file_get_contents($this->cacheLogFile));
        } else {
            $this->cacheLog = array();
        }
    }

    public function start()
    {
        $dntLog = new DntLog();
        $location = array_slice(explode('/', @$_SERVER['HTTP_HOST'] . @$_SERVER['REQUEST_URI']), 2);
        if (!in_array(@$location[0], $this->doNotCache)) {
            if (file_exists($this->cacheFileName) && (time() - filemtime($this->cacheFileName)) < @$this->cacheTime && @$this->cacheLog[@$this->cacheFile] == 1) {
                $dntLog->add(
                    array(
                            'http_response' => CACHE_HTTP_STATUS,
                            'system_status' => 'cache',
                            'msg' => 'Status done, reading cache',
                        )
                );

                $this->caching = false;
                echo file_get_contents($this->cacheFileName); //show cache file...
                exit(); //stop reading PHP
            } else {
                $this->caching = true;
                ob_start();
            }
        }
    }

    /**
     *
     * @return boolean
     */
    public function end()
    {
        if ($this->caching) {
            @file_put_contents($this->cacheFileName, ob_get_contents());
            ob_end_flush();
            $this->cacheLog[$this->cacheFile] = 1;
            if (file_put_contents($this->cacheLogFile, serialize($this->cacheLog))) {
                return true;
            }
        }
    }

    /**
     *
     * @param type $location
     * @return boolean
     */
    public function purge($location)
    {
        $location = base64_encode($location);
        $this->cacheLog[$location] = 0;
        if (file_put_contents($this->cacheLogFile, serialize($this->cacheLog))) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *
     * @param type $name_url
     * @return string
     */
    public function deteleAllLangs($name_url)
    {
        $multylanguages = new MultyLanguage();
        $db = new DB();
        $query = $multylanguages->getLangs();
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $cacheFile[] = '/' . $row['slug'] . '/' . $name_url;
            }
            $cacheFile[] = '/' . DEAFULT_LANG . '/' . $name_url;
        }
        $cacheFile[] = '/' . $name_url;

        return $cacheFile;
    }

    /**
     *
     * @param type $location
     */
    public function delete($location)
    {
        //$location = base64_encode(@$_SERVER['HTTP_HOST'] . WWW_FOLDERS . $location);
        //echo $location;
        $location = base64_encode($location);
        $dir = '../dnt-cache/';
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if (preg_match('/' . $location . '/', $file)) {
                        $fileName = $dir . $file;
                        unlink($fileName);
                    }
                }
                closedir($dh);
            }
        }
    }

    /**
     *
     * @return boolean
     */
    public function purge_all()
    {
        if (file_exists($this->cacheLogFile)) {
            foreach ($this->cacheLog as $key => $value) {
                $this->cacheLog[$key] = 0;
            }
            if (file_put_contents($this->cacheLogFile, serialize($this->cacheLog))) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     *
     * @param type $path
     */
    public function deleteOld($path)
    {
        $dnt = new Dnt();
        $dir = $path;
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($filename = readdir($dh)) !== false) {
                    $dateArr = explode(' ', date('F d Y H:i:s.', filemtime($dir . $filename)));
                    $datum_mesiac = $dateArr[0];
                    $datum_den = $dateArr[1];
                    $datum_rok = $dateArr[2];

                    if ($datum_den != '01') { //prvy den v mesiaci sa nemaze
                        if ($datum_den < $dnt->dvojcifernyDatum($dnt->get_den() - 1)) {
                            @unlink($dir . $filename);
                        }
                    }
                }
                closedir($dh);
            }
        }
    }

    public function deleteCacheByDomain($path, $domain)
    {
        $dir = $path;
        //$domain = str_replace("www", "", $domain);
        $domain = str_replace('=', '', base64_encode($domain));
        $domain = str_replace('=', '', $domain);
        $domain = str_replace('=', '', $domain);
        $domain = substr($domain, 0, -3);
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($filename = readdir($dh)) !== false) {
                    if ($this->dnt->in_string($domain, $filename)) {
                        @unlink($dir . $filename);
                    }
                }
                closedir($dh);
            }
        }
    }
}
