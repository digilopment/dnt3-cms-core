<?php

namespace DntLibrary\App;

use DntLibrary\Base\Cookie;
use DntLibrary\Base\DB;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Vendor;

class AbstractUser
{
    public $data;

    public $cookie;

    public $vendor;

    protected $init;

    protected $table;

    protected $type;

    protected $sessionId;

    protected $sessionStatus;

    protected $db;

    public function __construct($conf)
    {

        $this->db = new DB();
        $this->cookie = new Cookie();
        $this->vendor = new Vendor();

        $this->table = $conf['table'];
        $this->type = $conf['type'];

        $this->sessionId = $this->type . '_id';
        $this->sessionStatus = $this->type . '_logged';
    }

    protected function model(): void
    {
        $session = new Sessions();
        // Only initialize session if headers haven't been sent yet
        if (!headers_sent()) {
            $session->init(); // Ensure session is initialized
        }

        $email = $session->get($this->sessionId);
        if (empty($email)) {
            $email = $this->cookie->Get($this->sessionId);
        }
        
        if (empty($email)) {
            $this->data = [];
            $this->init = true;
            return;
        }
        
        $emailEscaped = $this->db->escape($email);
        $typeEscaped = $this->db->escape($this->type);
        $vendorId = $this->vendor->getId();
        
        $query = 'SELECT * FROM `' . $this->table . "` WHERE type = '" . $typeEscaped . "' AND email = '" . $emailEscaped . "' AND vendor_id = '" . $vendorId . "' LIMIT 1";
        if ($this->db->num_rows($query) > 0) {
            $this->data = $this->db->get_results($query, true);
        } else {
            $this->data = [];
        }
        $this->init = true;
    }

    public function logged(): bool
    {
        $session = new Sessions();
        // Only initialize session if headers haven't been sent yet
        if (!headers_sent()) {
            $session->init(); // Ensure session is initialized
        }
        if ($session->get($this->sessionStatus) || ($this->cookie->Get($this->sessionStatus) == 1 && $this->cookie->Get($this->sessionId) != '')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $email
     * @param string $pass
     * @return bool
     */
    public function validProcessLogin(string $email, string $pass): bool
    {
        $logDir = dirname(dirname(dirname(__DIR__))) . '/dnt-logs';
        $logFile = $logDir . '/exception.log';
        
        // Create log directory if it doesn't exist
        if (!is_dir($logDir)) {
            @mkdir($logDir, 0755, true);
        }
        
        $log = function(string $level, string $message) use ($logFile) {
            $timestamp = date('Y-m-d H:i:s');
            $logMessage = "[{$timestamp}] [{$level}] {$message}\n";
            @file_put_contents($logFile, $logMessage, FILE_APPEND);
        };
        
        if (empty($email) || empty($pass)) {
            $log('ERROR', "AbstractUser::validProcessLogin - Empty email or password");
            return false;
        }

        $db = new DB();
        $emailEscaped = $db->escape($email);
        $typeEscaped = $db->escape($this->type);
        $vendorId = $this->vendor->getId();
        
        $query = 'SELECT pass FROM `' . $this->table . "` WHERE type = '" . $typeEscaped . "' AND email = '" . $emailEscaped . "' AND vendor_id = '" . $vendorId . "' LIMIT 1";
        
        $log('INFO', "AbstractUser::validProcessLogin - Query: " . $query);
        $log('INFO', "AbstractUser::validProcessLogin - Vendor ID: " . $vendorId);
        $log('INFO', "AbstractUser::validProcessLogin - Type: " . $this->type);
        $log('INFO', "AbstractUser::validProcessLogin - Email: " . $email);
        $log('INFO', "AbstractUser::validProcessLogin - Table: " . $this->table);
        
        $db_pass = null;
        if ($db->num_rows($query) > 0) {
            $results = $db->get_results($query);
            $log('INFO', "AbstractUser::validProcessLogin - Query returned " . count($results) . " row(s)");
            if (!empty($results)) {
                $db_pass = $results[0]['pass'] ?? null;
                $log('INFO', "AbstractUser::validProcessLogin - DB pass hash: " . ($db_pass ? substr($db_pass, 0, 10) . '...' : 'null'));
                $log('INFO', "AbstractUser::validProcessLogin - Full DB pass hash length: " . ($db_pass ? strlen($db_pass) : 0));
            }
        } else {
            $log('WARNING', "AbstractUser::validProcessLogin - No rows found for email: {$email}, type: {$this->type}, vendor_id: {$vendorId}");
        }
        
        $inputPassHash = md5($pass);
        $log('INFO', "AbstractUser::validProcessLogin - Input pass hash: " . substr($inputPassHash, 0, 10) . '...');
        $log('INFO', "AbstractUser::validProcessLogin - Input pass hash length: " . strlen($inputPassHash));
        
        if ($db_pass !== null && $db_pass === $inputPassHash) {
            $log('INFO', "AbstractUser::validProcessLogin - Password MATCH!");
            return true;
        }
        
        if ($db_pass === null) {
            $log('ERROR', "AbstractUser::validProcessLogin - User not found in database");
        } else {
            $log('ERROR', "AbstractUser::validProcessLogin - Password MISMATCH");
            $log('ERROR', "AbstractUser::validProcessLogin - DB hash: " . substr($db_pass, 0, 20) . "...");
            $log('ERROR', "AbstractUser::validProcessLogin - Input hash: " . substr($inputPassHash, 0, 20) . "...");
        }
        
        return false;
    }

    public function get()
    {
        if ($this->init) {
            return $this->data[0];
        } else {
            $this->model();
            return $this->data[0];
        }
    }
}
