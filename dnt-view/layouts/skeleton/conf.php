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