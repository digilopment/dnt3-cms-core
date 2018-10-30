<?php
/**
 *  class       DntLog
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
class DntLog {



	public $results;
    
	/**
     * 
     * @return boolean
     */
    public function is_error() {
        if (count(error_get_last()) == 0) {
            return false;
        }
        return true;
    }

    /**
     * 
     * @return type
     */
    public function error_to_json() {
        return json_encode(error_get_last());
    }

    /**
     * get session ID
     */
    function getID() {

        $session = new Sessions();
        $dnt = new Dnt();
        $session->init();
        $session->set("page_id", $dnt->set_rand_string(10));

        if ($session->get("session_id") == false) {
            $session->set("session_id", $dnt->set_rand_string(10));
        }
    }

    /**
     * 
     * @param type $arr
     */
    public function get_http_header($arr) {

        $httpCacheStatus = CACHE_HTTP_STATUS;

        if (isset($arr['http_request'])) {
            $http_request = $arr['http_request'];
        } else {
            $http_request = 200;
        }

        if (isset($arr['http_request_info'])) {
            $http_request_info = $arr['http_request_info'];
        } else {
            $http_request_info = false;
        }



        if ($http_request == $httpCacheStatus) {
            $headerMsgCache = "content-cache";
        } else {
            $headerMsgCache = "no-cache";
        }


        //get instance
        $dntVendor = new Vendor();
        $session = new Sessions();
        $session->init();
        //header('Dnt-Log: '.$session->get_session_data( "page_id" ));
        //header($_SERVER["SERVER_PROTOCOL"]." ".$http_request." ".$http_request_info." ");
        //headers
        if (isset($arr['http_response'])) {
            if ($http_request == $httpCacheStatus) {
                header('Cache-Control: cache');
                header('Cache-Control: cache');
                header("Expires: wait-time " . CACHE_TIME_SEC . "sec");
                header("Pragma: cache");
                header('Dnt-Cache-Time: ' . CACHE_TIME_SEC . "sec");
            }
            //header('Content-Type: text/html');
            http_response_code($arr['http_response']);
            header('Dnt-Request-System: ' . GET_SYSTEM_NAME);
            header('Dnt-Request-Url: ' . WWW_FULL_PATH);
            header('Dnt-Framework: ' . GET_SYSTEM_VERSION);
            header('Dnt-Version: ' . GET_SYSTEM_VERSION);

            header('Dnt-Log: ' . $_SESSION['page_id']);
            //header('Dnt-Vendor: '.$dntVendor->getVendorUrl());
            //header('Dnt-Vendor-Id: '.$dntVendor->getVendorId());

            header('Dnt-Server-Frontend: tom_F::brick-01');
            header('Dnt-Server-Backend: tom_B::brick-01');
            header('Dnt-Server-CDN: tom_C::brick-01');
            header('Dnt-Server-Varnish: tom_V::brick-01 @path/dnt-cache');
            //header('Dnt-Database-Model: Claster');
            //header('Dnt-Composer: '.GET_SYSTEM_COMPOSER);
            //header('Dnt-Engine-Pattern: '.GET_SYSTEM_ENGINE_PATTERN);
            //header('Dnt-Search-Engine: '.GET_SYSTEM_SEARCH_ENGINE);
            //header('Dnt-Components: '.GET_SYSTEM_COMPONENTS);
            //header('Dnt-Varnish: no-varnish');
            header('Dnt-Cache: ' . $headerMsgCache);
            //header('Dnt-Admin: Open');


            header('Dnt-Subsystem-Packages: dnt_logs(c), dnt_cache(c) ');
            header('Dnt-Author: Designdnt(c) ');
            //header('Server: Designdnt3 ');
        }
    }

    /**
     * 
     * @param type $arr
     */
    public function add($arr) {

        $this->getID();

        if (isset($arr['http_response'])) {
            $this->get_http_header(array("http_response" => $arr['http_response']));
        }

        $dntVendor = new Vendor();
        $session = new Sessions();
        $db = new DB();
        $session->init();

        if (isset($arr['msg'])) {
            $msg = $arr['msg'];
        } else {
            $msg = false;
        }

        if (isset($arr['http_response'])) {
            $http_response = $arr['http_response'];
        } else {
            $http_response = false;
        }

        if (isset($arr['system_status'])) {
            $system_status = $arr['system_status'];
        } else {
            $system_status = false;
        }

        if (isset($arr['system_status'])) {
            $system_status = $arr['system_status'];
        } else {
            $system_status = false;
        }

        //header($_SERVER["SERVER_PROTOCOL"]." ".$http_response." ");
        //this array included ar variables of global variable SERVER
        $serverVariables = array(
            "HTTP_HOST",
            "HTTP_CONNECTION",
            "HTTP_USER_AGENT",
            "HTTP_ACCEPT",
            "HTTP_REFERER",
            "HTTP_ACCEPT_ENCODING",
            "HTTP_ACCEPT_LANGUAGE",
            //"HTTP_ACCEPT_CHARSET",
            "HTTP_COOKIE",
            "PATH",
            "SystemRoot",
            "COMSPEC",
            "PATHEXT",
            "WINDIR",
            "SERVER_SIGNATURE",
            "SERVER_SOFTWARE",
            "SERVER_NAME",
            "SERVER_ADDR",
            "SERVER_PORT",
            "REMOTE_ADDR",
            "DOCUMENT_ROOT",
            "SERVER_ADMIN",
            "SCRIPT_FILENAME",
            "REMOTE_PORT",
            "GATEWAY_INTERFACE",
            "SERVER_PROTOCOL",
            "REQUEST_METHOD",
            "QUERY_STRING",
            "REQUEST_URI",
            "SCRIPT_NAME",
            "PHP_SELF",
            "REQUEST_TIME",
        );

        foreach ($serverVariables as $item) {
            $arrToInsert[$item] = isset($_SERVER[$item]) ? $_SERVER[$item] : false;
        };

        //custom INPUTS
        $arrToInsert['vendor_id'] = Vendor::getId();
        $arrToInsert['http_response'] = $http_response;
        $arrToInsert['system_status'] = $system_status;
        $arrToInsert['log_id'] = $session->get("page_id");
        $arrToInsert['msg'] = $msg;
        $arrToInsert['err_msg'] = $this->error_to_json();
        $arrToInsert['THIS_URL'] = WWW_FULL_PATH;

        if (IS_LOGSYSTEM_ON) {
            $db->insert('dnt_logs', $arrToInsert);
        }

        if ($http_response >= 490) {
            $mailer = new Mailer;
            $mailer->set_recipient(
                    array(
                        "thomas.doubek@gmail.com",
                    )
            );
            $mailer->set_msg("
				<h2>Designdnt 3 reguest Error, eCatch " . $http_response . "</h2> 
				<table>
					<tr><td><b>STATUS:</b></td><td> " . $msg . "</td></tr>
					<tr><td><b>LOG:</b></td><td> " . $session->get("page_id") . "</td></tr>
					<tr><td><b>VISITED:</b></td><td> " . $arrToInsert['THIS_URL'] . "</td></tr>
					<tr><td><b>VENDOR ID:</b></td><td> " . $arrToInsert['vendor_id'] . "</td></tr>
					<tr><td><b>VENDOR URL:</b></td><td> " . $dntVendor->getVendorUrl() . "</td></tr>
					<tr><td><br/><b>INFO:</b></td><td><br/> This is service email sent by Designdnt3 CMS. Please do not reply to this email.</td></tr>
				</table>
			"
            );
            $mailer->set_subject("Designdnt3 request " . $http_response . " - " . $dntVendor->getVendorUrl());
            $mailer->set_sender_name("Designdnt 3");
            $mailer->sent_email();
        }
    }

    /**
     * 
     * @param type $log_id
     */
    public function show($log_id) {
        $db = new DB();
        $columnsData = new XMLgenerator;
        //HTTP_COOKIE,PATH,SystemRoot,COMSPEC,PATHEXT,WINDIR,SERVER_SIGNATURE,SERVER_SOFTWARE,SERVER_NAME,SERVER_ADDR,SERVER_PORT,REMOTE_ADDR,DOCUMENT_ROOT,SERVER_ADMIN,SCRIPT_FILENAME,REMOTE_PORT,GATEWAY_INTERFACE,SERVER_PROTOCOL,REQUEST_METHOD,GET,QUERY_STRING,REQUEST_URI,SCRIPT_NAME,PHP_SELF,REQUEST_TIME"; 
        //$columns = "id, http_response, system_status, log_id, timestamp, vendor_id, msg, msg, THIS_URL";
        $columns = "id,http_response,system_status,log_id,timestamp,vendor_id,msg,err_msg,THIS_URL,HTTP_REFERER,HTTP_HOST,HTTP_USER_AGENT,HTTP_ACCEPT,HTTP_ACCEPT_ENCODING,HTTP_ACCEPT_LANGUAGE,HTTP_ACCEPT_CHARSET,HTTP_COOKIE";


        if ($log_id == "last") {
            $query = "SELECT * FROM `dnt_logs` WHERE id=(SELECT max(id) FROM dnt_logs)";
        } else {
            $query = "SELECT * FROM `dnt_logs` WHERE `log_id` = '" . $log_id . "'";
        }

        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                foreach ($columnsData->getTableColumns("dnt_logs", $columns) as $key => $value) {
                    print $value . "\t\t\t => " . $row[$value] . "\n";
                }
            }
        }
    }
	
	
	public function getAll(){
		$db = new DB();
		$query = "SELECT * FROM `dnt_logs` WHERE vendor_id = ".Vendor::getId();
		 if ($db->num_rows($query) > 0){
			$this->results = $db->get_results($query);
		 }else{
			$this->results = "25";
		 }
			//return false;
	}
	
	public function getAllAccess($andWhere){
		
		$db = new DB();
		$query = "SELECT id FROM `dnt_logs` WHERE vendor_id = ".Vendor::getId()." $andWhere";
		return $db->num_rows($query);
		
		
	}
	
	public function getUniqueAccess($andWhere){
		
		$db = new DB();
		$query = "SELECT DISTINCT `REMOTE_ADDR` FROM `dnt_logs` WHERE vendor_id = ".Vendor::getId()." $andWhere";
		return $db->num_rows($query);
	}
	
	public function getallUsers($andWhere){
		
		$db = new DB();
		$query = "SELECT `id` FROM `dnt_registred_users` WHERE vendor_id = ".Vendor::getId()." $andWhere";
		return $db->num_rows($query);
	}
	
	public function getUniqueUsers($andWhere){
		
		$db = new DB();
		$query = "SELECT DISTINCT `email` FROM `dnt_registred_users` WHERE vendor_id = ".Vendor::getId()." $andWhere";
		return $db->num_rows($query);
	}

	public function getCountOs($andWhere){
		
		$db = new DB();
		
		$android = 0;
		$win = 0;
		$mac = 0;
		$black = 0;
		$linux = 0;
		$iOS = 0;
		$other = 0;
		
		$agent = array();
		$query = "SELECT * FROM `dnt_logs` WHERE vendor_id = ".Vendor::getId()." $andWhere";
		if ($db->num_rows($query) > 0){
			foreach ($db->get_results($query) as $row) {
				
				$agent['os'][] = Dnt::getOS($row['HTTP_USER_AGENT']);
				$agent['browser'][] = Dnt::getBrowser($row['HTTP_USER_AGENT']);
			}
		}
		
		return $agent;
	}

}
