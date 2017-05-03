<?php
function custom_modules(){
	/*
	custom modul listeners
	*/
	$custom_modules = array(
		"homepage" => array(
			"domov",
			"home",
		),
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
		),
	);
	return $custom_modules;
}