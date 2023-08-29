<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\MultyLanguage;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Vendor;

if (isset($_POST['sent'])) {
    $session = new Sessions;
    $db = new DB();



    $langs = array();
    $query = $multiLanguage->getLangs(true);
    if ($db->num_rows($query) > 0) {
        foreach ($db->get_results($query) as $row) {
            $langs[] = $row['slug'];
        }
    }

    foreach ($multiLanguage->getTranslates() as $item) {
        if (in_array($item['lang_id'], $langs)) {
            $db->update(
                    "dnt_translates", //table
                    array(//set
                        'translate' => $rest->post("translate_" . $item['id_entity'])
                    ),
                    array(//where
                        '`vendor_id`' => $vendor->getId(),
                        '`id_entity`' => $item['id_entity']
                    )
            );
        }
    }



    get_top();
    get_top_html();
    getConfirmMessage("index.php?src=multylanguage&action=translate-all", "<br/>Údaje sa úspešne uložili ");
    get_bottom_html();
    get_bottom();
} else {
    $dnt->redirect(WWW_PATH_ADMIN_2 . "?src=" . DEFAULT_MODUL_ADMIN);
}