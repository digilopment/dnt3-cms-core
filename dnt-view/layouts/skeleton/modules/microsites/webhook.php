<?php

$micrositeLayout = Meta::getCompetitionMeta('layout');
$vendorLayout 	= Vendor::getLayout();

$css_path 	= WWW_PATH."dnt-view/layouts/".$vendorLayout."/modules/microsites/".$micrositeLayout."/css";
$js_path 	= WWW_PATH."dnt-view/layouts/".$vendorLayout."/modules/microsites/".$micrositeLayout."/js";
$modulName 	= "homepage";
$grf_path 	= WWW_PATH."dnt-view/data/".Vendor::getId()."/";

include "".$micrositeLayout."/modules/".$modulName."/webhook.php"; //module include