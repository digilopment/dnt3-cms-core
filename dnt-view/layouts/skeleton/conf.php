<?php
function custom_modules(){
	$webhook = new Webhook;
	/*
	custom modul listeners
	*/
	$custom_modules = array(
	
		"homepage" => array_merge(
			array(), $webhook->getSitemapModules("homepage")
		),
		"partners" => array_merge(
			array(), $webhook->getSitemapModules("partners")
		),  
		"contact" => array_merge(
			array(), $webhook->getSitemapModules("contact")
		),
		"eshop" => array_merge(
			array(), $webhook->getSitemapModules("eshop")
		), 
		"wp_hotely" => array_merge(
			array(), $webhook->getSitemapModules("wp_hotely")
		),
		"polls" => array_merge(
			array(), $webhook->getSitemapModules("polls")
		), 
		
	);
	return $custom_modules;
}
function modulesConfig(){
		return array(
		"homepage" => array(
			"service_name" => "Homepage",
			"sql" => ""
		),
		"partners" => array(
			"service_name" => "Partneri",
			"sql" => ""
		),
		"contact" => array(
			"service_name" => "Kontakt",
			"sql" => ""
		),
		"eshop" => array(
			"service_name" => "Eshop",
			"sql" => ""
		),
		"wp_hotely" => array(
			"service_name" => "Hotely",
			"sql" => ""
		),
		"polls" => array(
			"service_name" => "Ankety a Kvízy",
			"sql" => ""
		),
	);
}