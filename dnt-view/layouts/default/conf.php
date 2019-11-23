<?php
function custom_modules($webhook = false){
	if(!$webhook){
		$webhook = new Webhook;
	}
	/*
	custom modul listeners
	*/
	$custom_modules = array(
		"default" => array_merge(
				array(), $webhook->getSitemapModules("default")
		), 
		"skeleton" => array_merge(
				array(), $webhook->getSitemapModules("skeleton")
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
			"service_name" => "Global 404 (all vendors)"
		),
		"skeleton" => array(
			"service_name" => "skeleton"
		),
		"static_redirect" => array(
			"service_name" => "Presmerovanie",
		),
	);
}