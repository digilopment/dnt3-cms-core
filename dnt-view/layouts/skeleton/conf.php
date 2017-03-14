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
	);
	return $custom_modules;
}