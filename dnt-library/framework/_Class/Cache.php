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
        // Ensure cache directory exists and resolve to absolute path first
        $this->ensureCacheDir();
        $this->cacheFile = base64_encode(($_SERVER['HTTP_HOST'] ?? '') . ($_SERVER['REQUEST_URI'] ?? ''));
        $this->cacheFileName = $this->cacheDir . '/' . $this->cacheFile . '.txt';
        $this->cacheLogFile = $this->cacheDir . '/log.txt';
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
        // Resolve absolute path to cache directory
        // Cache directory should be in /var/www/html/<projectFolder>/dnt-cache
        // Use SCRIPT_FILENAME to find index.php location (most reliable method)
        
        $projectRoot = null;
        
        // Method 1: Use SCRIPT_FILENAME to find project root
        // If script is in dnt-admin/, we need to go up one level to find project root
        if (isset($_SERVER['SCRIPT_FILENAME'])) {
            $scriptPath = dirname($_SERVER['SCRIPT_FILENAME']);
            $scriptPathReal = realpath($scriptPath);
            
            if ($scriptPathReal !== false) {
                // Check if we're in admin subdirectory (dnt-admin)
                if (strpos($scriptPathReal, '/dnt-admin') !== false || strpos($scriptPathReal, '\\dnt-admin') !== false) {
                    // Go up one level to project root
                    $projectRoot = dirname($scriptPathReal);
                } else {
                    // Already in project root or other location
                    $projectRoot = $scriptPathReal;
                }
                
                // Verify we found the correct project root by checking for main index.php
                // (the root index.php, not dnt-admin/index.php)
                if ($projectRoot && file_exists($projectRoot . '/index.php')) {
                    // Make sure we're not still in dnt-admin
                    if (strpos($projectRoot, '/dnt-admin') === false && strpos($projectRoot, '\\dnt-admin') === false) {
                        $projectRoot = realpath($projectRoot);
                    } else {
                        // Still in dnt-admin, go up one more level
                        $projectRoot = dirname($projectRoot);
                        if (file_exists($projectRoot . '/index.php')) {
                            $projectRoot = realpath($projectRoot);
                        } else {
                            $projectRoot = null;
                        }
                    }
                } else {
                    // Try going up one more level if we didn't find root index.php
                    $parentPath = dirname($projectRoot);
                    if (file_exists($parentPath . '/index.php')) {
                        $projectRoot = realpath($parentPath);
                    } else {
                        $projectRoot = null;
                    }
                }
            }
        }
        
        // Method 2: Fallback - resolve from current file location
        if (!$projectRoot) {
            // Cache.php is in dnt-library/framework/_Class/, so project root is 4 levels up
            $projectRoot = realpath(dirname(dirname(dirname(dirname(__DIR__)))));
        }
        
        if ($projectRoot === false || !is_dir($projectRoot)) {
            error_log("Cache: Cannot resolve project root path. SCRIPT_FILENAME: " . ($_SERVER['SCRIPT_FILENAME'] ?? 'not set'));
            return;
        }
        
        $cachePath = $projectRoot . '/' . $this->cacheDir;
        
        // Check if directory already exists
        if (is_dir($cachePath)) {
            // Directory exists, just ensure it's writable
            if (!is_writable($cachePath)) {
                // Try to make it writable (permissions are already 0777 according to user)
                @chmod($cachePath, 0777);
            }
            // Update cacheDir to absolute path for future use
            $this->cacheDir = $cachePath;
            return;
        }
        
        // Directory doesn't exist, try to create it
        $parentDir = dirname($cachePath);
        if (!is_dir($parentDir)) {
            // Parent doesn't exist, try to create it first
            @mkdir($parentDir, 0777, true);
        }
        
        if (is_dir($parentDir) && is_writable($parentDir)) {
            // Create cache directory with 0777 permissions
            if (!@mkdir($cachePath, 0777, true)) {
                error_log("Cache: Cannot create cache directory: {$cachePath}. Check permissions. Parent: {$parentDir}, Writable: " . (is_writable($parentDir) ? 'yes' : 'no'));
                return;
            }
        } else {
            error_log("Cache: Cannot create cache directory: {$cachePath}. Parent directory is not writable: {$parentDir}");
            return;
        }
        
        // Ensure directory is writable
        if (is_dir($cachePath)) {
            if (!is_writable($cachePath)) {
                @chmod($cachePath, 0777);
            }
            // Update cacheDir to absolute path for future use
            $this->cacheDir = $cachePath;
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
