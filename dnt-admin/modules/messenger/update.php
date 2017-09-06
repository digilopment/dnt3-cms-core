<?php

$db = new Db;
$rest = new Rest;
$image = new Image();

$id = $rest->get('id');

if (isset($_POST['odoslat']) && isset($_GET['id'])) {
    $query = Meta::all_meta_competition();
    if ($db->num_rows($query) > 0) {
        foreach ($db->get_results($query) as $row) {

            //update all content data 
            $db->query("UPDATE `dnt_microsites_composer` 
                            SET 
                    value = '" . $rest->post($row['meta']) . "' 
                            WHERE 
                    competition_id = '" . $id . "' AND 
                    vendor_id = '" . Vendor::getId() . "' AND 
                    content_type = 'content' AND 
                    meta = '" . $row['meta'] . "'");


            //update zobrazenie
            $db->query("UPDATE `dnt_microsites_composer` 
                            SET 
                     zobrazenie = '" . $rest->post("zobrazit_" . $row['meta']) . "' 
                            WHERE 
                    competition_id = '" . $id . "' AND 
                    vendor_id = '" . Vendor::getId() . "' AND 
                    meta = '" . $row['meta'] . "'");

            //update poradie
            $db->query("UPDATE `dnt_microsites_composer` 
                            SET 
                     poradie = '" . $rest->post("poradie_" . $row['meta']) . "' 
                            WHERE 
                    competition_id = '" . $id . "' AND 
                    vendor_id = '" . Vendor::getId() . "' AND 
			meta = '" . $row['meta'] . "'");
        }
    }

    //creat youtube hash
    if (isset($_POST['youtube_video'])) {
        $youtube_video = $rest->post('youtube_video');

        if (count(explode('?v=', $rest->post('youtube_video'))) > 1) {
            $youtube_video = explode("?v=", $youtube_video);
            $youtube_hash = $youtube_video[1];
        } else {
            $youtube_hash = $rest->post('youtube_video');
        }

        $db->query("UPDATE `dnt_microsites_composer` 
			SET 
		value = '" . $youtube_hash . "' 
			WHERE 
		competition_id = '" . $id . "' AND 
		vendor_id = '" . Vendor::getId() . "' AND 
		content_type = 'content' AND 
		meta = 'youtube_video'");
    }
    $presmeruj_url = "index.php?src=" . $rest->get('src') . "&id=" . $id . "&action=edit";

    include "tpl_functions.php";
    get_top();
    include "top.php";
    getConfirmMessage($presmeruj_url, "Údaje sa úspešne uložili");
    include "bottom.php";
    get_bottom();
} elseif (isset($_POST['odoslat_sutaz'])) {



    $id = $rest->post("id");
    $real_url = $rest->post("real_url");
    $real_url = str_replace("www.", "", $real_url);
    $url = $rest->post("url");
    $nazov = $rest->post("nazov");
    $active = $rest->post("zobrazit_real_url");
    $in_progress = $rest->post("zobrazit_in_progress");

    if (!empty($nazov)) {
        $db->query("UPDATE `dnt_microsites` 
			SET 
		nazov = '" . $nazov . "' 
			WHERE 
		id = '" . $id . "' AND 
		vendor_id = '" . Vendor::getId() . "'");


        $db->query("UPDATE `dnt_microsites` 
			SET 
		real_url = '" . $real_url . "' 
			WHERE 
		id = '" . $id . "' AND 
		vendor_id = '" . Vendor::getId() . "'");


        $db->query("UPDATE `dnt_microsites` 
			SET 
		url = '" . $url . "' 
			WHERE 
		id = '" . $id . "' AND 
		vendor_id = '" . Vendor::getId() . "'");


        $db->query("UPDATE `dnt_microsites` 
			SET 
		url = '" . $url . "' 
			WHERE 
		id = '" . $id . "' AND 
		vendor_id = '" . Vendor::getId() . "'");

        $db->query("UPDATE `dnt_microsites` 
			SET 
		active = '" . $active . "' 
			WHERE 
		id = '" . $id . "' AND 
		vendor_id = '" . Vendor::getId() . "'");

        $db->query("UPDATE `dnt_microsites` 
			SET 
		in_progress = '" . $in_progress . "' 
			WHERE 
		id = '" . $id . "' AND 
		vendor_id = '" . Vendor::getId() . "'");
    }


    $presmeruj_url = "index.php?src=".$rest->get("src");
    include "tpl_functions.php";
    get_top();
    include "top.php";
    getConfirmMessage($presmeruj_url, "Údaje sa úspešne uložili");
    include "bottom.php";
    get_bottom();
}

