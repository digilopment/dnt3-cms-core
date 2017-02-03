<?php
include "dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "/";
$autoload->load($path);
$rest 			= new Rest;
$config 		= new Config;
$dntLog 		= new DntLog;
$XMLgenerator	= new XMLgenerator;
$dnt 			= new Dnt;
$dntCache 		= new Cache;

/*
register_shutdown_function( "fatal_handler" );
function format_error( $errno, $errstr, $errfile, $errline ) {
  $trace = print_r( debug_backtrace( false ), true );

  $content = "
  <table>
  <thead><th>Item</th><th>Description</th></thead>
  <tbody>
  <tr>
    <th>Error</th>
    <td><pre>$errstr</pre></td>
  </tr>
  <tr>
    <th>Errno</th>
    <td><pre>$errno</pre></td>
  </tr>
  <tr>
    <th>File</th>
    <td>$errfile</td>
  </tr>
  <tr>
    <th>Line</th>
    <td>$errline</td>
  </tr>
  <tr>
    <th>Trace</th>
    <td><pre>$trace</pre></td>
  </tr>
  </tbody>
  </table>";

  return $content;
}

function fatal_handler() {
  $errfile = "unknown file";
  $errstr  = "shutdown";
  $errno   = E_CORE_ERROR;
  $errline = 0;

  $error = error_get_last();

  if( $error !== NULL) {
    $errno   = $error["type"];
    $errfile = $error["file"];
    $errline = $error["line"];
    $errstr  = $error["message"];

    echo format_error( $errno, $errstr, $errfile, $errline);
  }
}
*/


if($rest->getModul()){
	
	//$dntCache->start();		
	
		if($dntLog->is_error()){
			$dntLog->add(array(
				"http_response" 	=> 500,
				"system_status" 	=> "log",		
				"msg"				=> "Error Log",
			));
		}else{
			$dntLog->add(array(
				"http_response" 	=> 200,
				"system_status" 	=> "log",		
				"msg"				=> "Default Log",
			));
		}
		$rest->loadModul();
	//$dntCache->end();
	
}else{
	
	$dntLog->add(array(
			"http_response" 	=> 404,
			"system_status" 	=> "log",		
			"msg"				=> "Default Log", 
			));
	$rest->loadMyModul("default");
	
}

if(isset($_GET['dnt_debug_mod_show_log'])){
	$dntLog->show("last");
}

			