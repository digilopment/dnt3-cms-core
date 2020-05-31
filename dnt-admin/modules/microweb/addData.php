<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

if (isset($_POST['odoslat'])) {

    $rest = new Rest;
    $db = new DB();

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
		(`id`, `id_entity`,  `vendor_id`, `url`, `nazov`, `active`, `in_progress`, `hash`, `datum_den`, `datum_mesiac`, `datum_rok`)
			VALUES
		('" . $thisId . "', '" . $thisId . "', '" . Vendor::getId() . "',  '$url', '$nazov', '0', '1', '" . $hash . "', '" . $get_den . "', '" . $get_mesiac . "', '" . $get_rok . "')");

        $query = "SELECT * FROM dnt_microsites_composer WHERE vendor_id = '" . Vendor::getId() . "' AND competition_id = '" . $competition_id . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $db->dbTransaction();
                $db->query("INSERT INTO `dnt_microsites_composer` 
				( `vendor_id`, `competition_id`, `cat_id`, `content_type`, `description`, `meta`, `value`, `zobrazenie`, `poradie`, `parent_id`)
					VALUES
				('" . Vendor::getId() . "',  '$thisId', '" . $row['cat_id'] . "', '" . $row['content_type'] . "', '" . $row['description'] . "', '" . $row['meta'] . "', '" . $row['value'] . "', '" . $row['zobrazenie'] . "', '" . $row['poradie'] . "', '0')");
                $post_id = $db->lastid();
                $db->update(
                        'dnt_microsites_composer', //table
                        array(//set
                            'id_entity' => $lastId
                        ),
                        array(//where
                            'id' => $lastId
                        )
                );
                $db->dbCommit();
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

        get_top();
        get_top_html();
        getConfirmMessage($presmeruj_url, "Údaje sa úspešne uložili");
        get_bottom_html();
        get_bottom();
    }
}
?>
