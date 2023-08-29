<?php

namespace DntAdmin\App;

class AdminController
{

	public function __construct(){
		
	}
	
    public function loadTemplate($path, $tpl, $data = false)
    {
        if (!function_exists('adminFunctionsExists')) {
            include '../' . ADMIN_URL_2 . '/plugins/tpl_functions.php';
        }
        if (!function_exists('tplData')) {

            /*function tplData($data, $object)
            {
                if (isset($data[$object])) {
                    return $data[$object];
                } else {
                    return false;
                }
            }*/

        }

        include dirname($path) . '/templates/' . $tpl . '.php';
    }

    protected function hasPost($postKey)
    {
        return isset($_POST[$postKey]) ? true : false;
    }

}
