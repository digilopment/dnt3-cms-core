<?php
function custom_modules(){
	$webhook = new Webhook;
	/*
	custom modul listeners
	*/
	$custom_modules = array(
		"default" => array_merge(
				array(), $webhook->getSitemapModules("default")
		), 
		"static_redirect" => array_merge(
				array(), $webhook->getSitemapModules("static_redirect")
		),
	);
	return $custom_modules;
}

function modulesConfig(){
	return array(
		"default" => array(
			"service_name" => "404",
			"sql" => ""
		),
		"static_redirect" => array(
			"service_name" => "Presmerovanie",
			"sql" => ""
		),
	);
}