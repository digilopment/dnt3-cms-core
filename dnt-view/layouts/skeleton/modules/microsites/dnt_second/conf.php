<?php

$css_path = WWW_PATH."dnt-view/layouts/".Vendor::getLayout()."/css";
$js_path = WWW_PATH."dnt-view/layouts/".Vendor::getLayout()."/js";
$grf_path = WWW_PATH."dnt-view/data/".Vendor::getId()."/";

/*
if(in_string("devel", $_SERVER['HTTP_HOST'])){
	include = "dnt-system/layouts/devel/".getCompetitionMeta('layout')."/tpl_functions.php";
	$css_path = WWW_PATH."dnt-system/layouts/devel/".getCompetitionMeta('layout')."/css";
	$js_path = WWW_CDN_PATH."dnt-system/layouts/devel/".getCompetitionMeta('layout')."/js";
	$grf_path = WWW_CDN_PATH."dnt-system/data/30/uploads/";
}
else{
	$css_path = WWW_PATH."dnt-system/layouts/".getCompetitionMeta('layout')."/css";
	$js_path = WWW_CDN_PATH."dnt-system/layouts/".getCompetitionMeta('layout')."/js";
	$grf_path = WWW_CDN_PATH."dnt-system/data/30/uploads/";
}
*/



?>