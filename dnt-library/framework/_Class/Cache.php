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
    protected array $doNotCache = ['rpc'];

    protected string $cacheDir = 'dnt-cache';

    protected int $cacheTime; //in seconds

    protected bool $caching = false;

    protected string $cacheFile;

    protected string $cacheFileName;

    protected string $cacheLogFile;

    protected array $cacheLog = [];

    protected ?string $CACHE_ADDR = null;

    protected ?Dnt $dnt = null;

    public function __construct()
    {
        $this->dnt = new Dnt();
        $this->cacheTime = defined('CACHE_TIME_SEC') ? (int)CACHE_TIME_SEC : 86400;
        $this->cacheFile = base64_encode(($_SERVER['HTTP_HOST'] ?? '') . ($_SERVER['REQUEST_URI'] ?? ''));
        $this->cacheFileName = $this->cacheDir . '/' . $this->cacheFile . '.txt';
        $this->cacheLogFile = $this->cacheDir . '/log.txt';
        $this->ensureCacheDir();
        if (file_exists($this->cacheLogFile)) {
            $logContent = file_get_contents($this->cacheLogFile);
            if ($logContent !== false) {
                $this->cacheLog = unserialize($logContent) ?: [];
            }
        }
    }

    /**
     * Ensure cache directory exists with proper permissions
     * @return void
     */
    protected function ensureCacheDir(): void
    {
        if (!is_dir($this->cacheDir)) {
            // Try to create directory recursively
            if (!@mkdir($this->cacheDir, 0755, true)) {
                // If mkdir fails, try with parent directory permissions
                $parentDir = dirname($this->cacheDir);
                if (is_dir($parentDir) && is_writable($parentDir)) {
                    @mkdir($this->cacheDir, 0755, true);
                } else {
                    // Log error but don't break execution
                    error_log("Cache: Cannot create cache directory: {$this->cacheDir}. Check permissions.");
                }
            }
        }
        // Ensure directory is writable
        if (is_dir($this->cacheDir) && !is_writable($this->cacheDir)) {
            error_log("Cache: Cache directory is not writable: {$this->cacheDir}. Check permissions.");
        }
    }

    public function start(): void
    {
        if (!is_dir($this->cacheDir) || !is_writable($this->cacheDir)) {
            return; // Skip caching if directory is not available
        }

        $dntLog = new DntLog();
        $requestUri = ($_SERVER['HTTP_HOST'] ?? '') . ($_SERVER['REQUEST_URI'] ?? '');
        $location = array_slice(explode('/', $requestUri), 2);
        $firstLocation = $location[0] ?? '';
        
        if (!in_array($firstLocation, $this->doNotCache, true)) {
            if (file_exists($this->cacheFileName) && 
                (time() - filemtime($this->cacheFileName)) < $this->cacheTime && 
                isset($this->cacheLog[$this->cacheFile]) && 
                $this->cacheLog[$this->cacheFile] == 1) {
                $dntLog->add([
                    'http_response' => defined('CACHE_HTTP_STATUS') ? CACHE_HTTP_STATUS : 201,
                    'system_status' => 'cache',
                    'msg' => 'Status done, reading cache',
                ]);

                $this->caching = false;
                $cacheContent = file_get_contents($this->cacheFileName);
                if ($cacheContent !== false) {
                    echo $cacheContent;
                }
                exit();
            } else {
                $this->caching = true;
                ob_start();
            }
        }
    }

    /**
     *
     * @return bool
     */
    public function end(): bool
    {
        if ($this->caching && is_dir($this->cacheDir) && is_writable($this->cacheDir)) {
            $content = ob_get_contents();
            if ($content !== false) {
                @file_put_contents($this->cacheFileName, $content);
            }
            ob_end_flush();
            $this->cacheLog[$this->cacheFile] = 1;
            if (file_put_contents($this->cacheLogFile, serialize($this->cacheLog)) !== false) {
                return true;
            }
        }
        return false;
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
