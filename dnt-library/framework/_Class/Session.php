<?php
/**
 *  class       Rest
 *  author      Tomas Doubek
 *  framework   Sessions
 *  package     dnt3
 *  date        2017
 */
class Sessions {

    protected $sessionID;

    /**
     * 
     */
    public function init() {
        if (!isset($_SESSION)) {
            @session_start();
        }
    }

    /**
     * 
     */
    public function set_session_id() {
        //$this->start_session();
        $this->sessionID = session_id();
    }

    /**
     * 
     * @return type
     */
    public function get_session_id() {
        return $this->sessionID;
    }

    /**
     * 
     * @param type $session_name
     * @return boolean
     */
    public function exist($session_name) {
        if (isset($_SESSION[$session_name])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $session_name
     * @param type $is_array
     */
    public function create($session_name, $is_array = false) {
        if (!isset($_SESSION[$session_name])) {
            if ($is_array == true) {
                $_SESSION[$session_name] = array();
            } else {
                $_SESSION[$session_name] = '';
            }
        }
    }

    /**
     * 
     * @param type $session_name
     * @param array $data
     */
    public function insert($session_name, array $data) {
        if (is_array($_SESSION[$session_name])) {
            array_push($_SESSION[$session_name], $data);
        }
    }

    /**
     * 
     * @param type $session_name
     */
    public function display_session($session_name) {
        echo '<pre>';
        print_r($_SESSION[$session_name]);
        echo '</pre>';
    }

    /**
     * 
     * @param type $session_name
     */
    public function remove($session_name = '') {
        if (!empty($session_name)) {
            unset($_SESSION[$session_name]);
        } else {
            unset($_SESSION);
            //session_unset();
            //session_destroy();
        }
    }

    /**
     * 
     * @param type $session_name
     * @return boolean
     */
    public function get($session_name) {
        if (isset($_SESSION[$session_name])) {
            return $_SESSION[$session_name];
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $session_name
     * @param type $data
     */
    public function set($session_name, $data) {
        $_SESSION[$session_name] = $data;
    }

}
