<?php
//include "autoload.php";
include "../globals.php";
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$vendor 		= new Vendor;

$db = new Db;

$query = "
SELECT 
    *, 
    COUNT(email)
FROM
    dnt_mailer_mails
WHERE vendor_id = 39 AND `cat_id` = 55
GROUP BY email
HAVING COUNT(email) > 1 ORDER BY name asc LIMIT 10000";

if ($db->num_rows($query) > 0) {
    foreach ($db->get_results($query) as $row) {
		//if($row['name'] == ""){
			$ids[] = $row['id']."<br/>";
		//}
    }
}

$db = new Db;
foreach($ids as $id){
	$where = array( 'id' => $id);
	$db->delete( 'dnt_mailer_mails', $where);	
}


/**
DELETE FROM dnt_mailer_mails WHERE vendor_id = 39 AND `cat_id` = 55

SELECT count(email) FROM dnt_mailer_mails WHERE vendor_id = 39 AND `cat_id` = 55

//zobraz duplikaty

SELECT 
    *, 
    COUNT(email)
FROM
    dnt_mailer_mails
WHERE vendor_id = 39 AND `cat_id` = 55
GROUP BY email
HAVING COUNT(email) > 1 LIMIT 10000;


DELETE 
FROM
    dnt_mailer_mails
WHERE vendor_id = 39 AND `cat_id` = 55
GROUP BY email
HAVING COUNT(email) > 1 LIMIT 10000;



22191

20554
**/