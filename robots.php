<?php
include "dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "";
$autoload->load($path);
$rest 			= new Rest;
$config 		= new Config;
$dntLog 		= new DntLog;
$XMLgenerator	= new XMLgenerator;
$dnt 			= new Dnt;
$dntCache 		= new Cache;
?>
User-agent: *
#This service is powered by Designdnt3 as 3rd version - professionals for better internet.
#Designdnt3 is a Application Framework initially developed by Designdnt - The Query company.
#Addons and overlays are copyright of their respective owners.
#Information and contribution at http://designdnt.query.sk/

#This sitemap defined all sitemaps off all active Vendors.
#For visit vendor sitemap please check this sitemaps or visit vendor webpage => 

#Author: 		@Designdnt3
#AuthorName: 	@Tomas Doubek
#System: 		@Designdnt3

Disallow: /dnt-admin/
Disallow: /dnt-api/
Disallow: /dnt-cache/
Disallow: /dnt-install/
Disallow: /dnt-jobs/
Disallow: /dnt-library/
Disallow: /dnt-modules/
Disallow: /dnt-modules/
Disallow: /dnt-system/
Disallow: /dnt-system/
Disallow: /dnt-test/
Disallow: /dnt-test/
Disallow: /dnt-view/
Disallow: .gitignore
Disallow: composer.json
Disallow: robots.php
<?php

?>