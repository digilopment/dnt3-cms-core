<?php

include "../globals.php";
include "../dnt-library/framework/_Class/Autoload.php";
$autoload = new Autoload;
$path = "../";
$autoload->load($path);

$rest = new Rest;
$image = new Image;
$dntUpload = new DntUpload;


/** SIGL TEST TEST FILE NAME * */
$file = "0a11e759531820ff241e40aa226d58e6_o.jpg";
$file = "imgISP_600x350.jpg";
$file = "1_a9fb0259a82ce786033d2278aa365c5a_o.jpg";
if ($image->hasDipendency($file)) {
    echo "Image has more Dipendencies";
    var_dump($image->hasDipendency($file));
} else {
    echo "This image can be delete from disk";
}

echo "<hr/>";

/** SIGL TEST TEST ID_ENTITY * */
$file = "1778";
if ($image->hasDipendency($file)) {
    echo "Image has more Dipendencies";
    var_dump($image->hasDipendency($file));
} else {
    echo "This image can be delete from disk";
}

echo "<hr/>";
//ALL UPLOADED
$db = new Db;
$query = "SELECT name FROM dnt_uploads";
if ($db->num_rows($query) > 0) {
    foreach ($db->get_results($query) as $row) {
        var_dump($image->hasDipendency($row['name']));
    }
}