<?php
function get_top(){
	$template = explode('id="slider"',file_get_contents('http://www.markiza.sk/'));

	$template = $template[0];
	$template = str_replace('<body>', '<body onload="">', $template);
	$template = str_replace('/media/2.0/mar/grf/top', 'http://www.markiza.sk/media/2.0/mar/grf/top', $template);
	//$template = str_replace('<script src="http://imagesrv.adition.com/js/adition.js" type="text/javascript"></script>', '', $template);
	$template = str_replace('<form action="/vyhladavanie" class="search">', '<form action="http://www.markiza.sk/vyhladavanie" class="search">', $template);
	$template = str_replace('/media/2.0/core/bootstrap3/css/font-awesome.min.css', 'http://www.markiza.sk//media/2.0/core/bootstrap3/css/font-awesome.min.css', $template);

	echo $template;
	echo "/>"; //dokoncenie divka
}

function get_bottom(){
	echo "</div>";
	echo "</div>";
	echo "</div>";
	$template = explode('class="tvn-footer"',file_get_contents('http://www.markiza.sk/'));
	echo '<footer class="tvn-footer"'; //yaciatok footra
	$template = $template[1];
	$template = str_replace('/media/2.0/', "http://www.markiza.sk/media/2.0/", $template);
	echo $template;
}