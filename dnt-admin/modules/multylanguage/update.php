<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\MultyLanguage;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Vendor;

if (isset($_POST['sent'])) {
    $session = new Sessions;
    $db = new DB();

    $table = "dnt_translates";
    $return = $rest->post("return");
    $translate_id = $rest->get('translate_id');
    $translate_idUpdate = $rest->post('translate_id');



    $query = $multiLanguage->getLangs(true);
    if ($db->num_rows($query) > 0) {
        foreach ($db->get_results($query) as $row) {

            $where = array('translate_id' => $translate_id, 'vendor_id' => $this->vendor->getId(), 'lang_id' => $row['slug'],);
            $db->delete($table, $where);

            $insertedData = array(
                '`translate`' => $rest->post("translate_" . $row['slug']),
                '`lang_id`' => $row['slug'],
                '`translate_id`' => $translate_idUpdate,
                '`vendor_id`' => $this->vendor->getId(),
                '`type`' => 'static',
                '`table`' => '',
                '`show`' => '1',
                '`parent_id`' => '0',
            );
            $db->insert($table, $insertedData);
        }
    } else {
        
    }

    if ($return) {

        get_top();
        get_top_html();
        getConfirmMessage("index.php?src=multylanguage&action=translates", "<br/>Údaje sa úspešne uložili ");
        get_bottom_html();
        get_bottom();
    } else {

        get_top();
        get_top_html();
        error_message("heslo", "<b>Prosím zadajte vaše heslo pre uloženie údajov</b>");
        get_bottom_html();
        get_bottom();
    }
} else {
    $dnt->redirect(WWW_PATH_ADMIN_2 . "?src=" . DEFAULT_MODUL_ADMIN);
}