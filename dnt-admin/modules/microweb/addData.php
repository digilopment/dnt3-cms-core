<?php

if (isset($_POST['odoslat'])) {

    $rest = new Rest;
    $db = new Db;

    $nazov = $rest->post("nazov");

    $get_den = Dnt::get_den();
    $get_mesiac = Dnt::get_mesiac();
    $get_rok = Dnt::get_rok();
    $competition_id = $rest->post('competition_id');


    $url = Dnt::name_url($nazov);

    $lastId = Dnt::getLastId("dnt_microsites");
    $thisId = $lastId + 1;
    $hash = md5($thisId);

    if (empty($nazov)) {
        //die("nazov", "Nezedali ste názov súťaže");
    } else {

        //creat competition 
        $db->query("INSERT INTO `dnt_microsites` 
		(`id`, `vendor_id`, `url`, `nazov`, `active`, `in_progress`, `hash`, `datum_den`, `datum_mesiac`, `datum_rok`)
			VALUES
		('" . $thisId . "', '" . Vendor::getId() . "',  '$url', '$nazov', '0', '1', '" . $hash . "', '" . $get_den . "', '" . $get_mesiac . "', '" . $get_rok . "')");

        $query = "SELECT * FROM dnt_microsites_composer WHERE vendor_id = '" . Vendor::getId() . "' AND competition_id = '" . $competition_id . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $db->query("INSERT INTO `dnt_microsites_composer` 
				( `vendor_id`, `competition_id`, `cat_id`, `content_type`, `description`, `meta`, `value`, `zobrazenie`, `poradie`, `parent_id`)
					VALUES
				('" . Vendor::getId() . "',  '$thisId', '" . $row['cat_id'] . "', '" . $row['content_type'] . "', '" . $row['description'] . "', '" . $row['meta'] . "', '" . $row['value'] . "', '" . $row['zobrazenie'] . "', '" . $row['poradie'] . "', '0')");
            }
        }

        $db->query("UPDATE `dnt_microsites_composer` 
			SET 
		value = 'dnt_first' 
			WHERE 
		competition_id = '" . $thisId . "' AND 
		vendor_id = '" . Vendor::getId() . "' AND 
		content_type = 'content' AND 
		meta = 'layout'");

        $presmeruj_url = "index.php?src=" . $rest->get('src') . "&id=" . $thisId . "&action=edit";
        include "tpl_functions.php";
        get_top();
        include "top.php";
        getConfirmMessage($presmeruj_url, "Údaje sa úspešne uložili");
        include "bottom.php";
        get_bottom();
    }
}
?>