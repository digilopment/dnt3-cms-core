<?php
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);

/** 
 *
 *COLOR TEST FROM HEX TO RGBA
 *
 *
**/
$color = Dnt::hex2rgba("#ff0000", 0.15);
echo "<div style='width: 200px; height:200px;background: ".$color."'>OK</div>";