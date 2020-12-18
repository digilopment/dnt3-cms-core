<?php

namespace DntLibrary\App;

use DntLibrary\Base\Cookie;
use DntLibrary\Base\DB;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Vendor;

class AbstractUser
{

    public $data;
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

    protected function model()
    {

        $session = new Sessions();

        $email = $session->get($this->sessionId);
        if (empty($email)) {
            $email = $this->cookie->Get($this->sessionId);
        }
        $query = "SELECT * FROM " . $this->table . " WHERE type = '" . $this->type . "' AND email = '" . $email . "' AND vendor_id = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            $this->data = $this->db->get_results($query, true);
        }
        $this->init = true;
    }

    public function logged()
    {
        $session = new Sessions();
        if ($session->get($this->sessionStatus) || ($this->cookie->Get($this->sessionStatus) == 1 && $this->cookie->Get($this->sessionId) != "")) {
            return true;
        } else {
            return false;
        }
    }

    public function validProcessLogin($email, $pass)
    {
        $db = new DB;
        $query = "SELECT pass FROM " . $this->table . " WHERE type = '" . $this->type . "' AND email = '" . $email . "' AND vendor_id = '" . $this->vendor->getId() . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $db_pass = $row['pass'];
            }
            if ($db_pass == md5($pass)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
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
