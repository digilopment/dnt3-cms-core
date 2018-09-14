<?php
function custom_modules(){
	$webhook = new Webhook;
	/*
	custom modul listeners
	*/
	$custom_modules = array(
	
	//PARTNERI
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
		/*"microsites" => array_merge(
				array(), $webhook->getSitemapModules("microsites")
		), */
		"search" => array(
			"search",
			"hladaj",
		),
		
		//CUSTOM STATIC MODUL
		/*"homepage" => array(
			"domov",
			"home",
		),*/
		
		/*
		"contact" => array(
			"kontakt",
			"contact",
		),
		"partners" => array(
			"partneri",
			"partners",
			"partner",
		),
		"personal" => array(
			"personal",
			"staff",
		),
		"form" => array(
			"formular",
			"form",
			"form-request",
		),
		"polls" => array(
			"kvizy",
			"polls",
		),
		"eshop" => array(
			"obchod",
			"produkty",
		),
		"microsites" => array(
			"microsites",
		),*/
	);
	return $custom_modules;
}