<?php

use DntLibrary\Base\Install;

if (isset($_POST['name'])) {
    if (!empty($_POST['name']) && !empty($_POST['vendor_id'])) {
        $install = new Install();

        $VENDOR_NAME = $_POST['name'];
        $COPY_FROM = $_POST['vendor_id'];
        $LAYOUT = $_POST['layout'];
        $DELETE_DATA = 0;
        $tables = array(
            //VSETKY STLPCE
            'dnt_admin_menu',
            //"dnt_api",
            'dnt_config',
            'dnt_gallery',
            'dnt_languages',
            //"dnt_logs",
            //"dnt_mailer_mails",
            //"dnt_mailer_type",
            //"dnt_microsites",
            //"dnt_microsites_composer",
            //"dnt_polls",
            //"dnt_polls_composer",
            'dnt_posts',
            'dnt_posts_meta',
            'dnt_post_type',
            //"dnt_registred_users",
            'dnt_settings',
            'dnt_translates',
            'dnt_uploads',
            'dnt_users',
        );
        //var_dump($VENDOR_NAME, $COPY_FROM);
        $install->addVendor($tables, $VENDOR_NAME, $COPY_FROM, $LAYOUT, $DELETE_DATA);
        $return = WWW_PATH_ADMIN_2 . 'index.php?src=vendor';

        get_top();
        get_top_html();
        getConfirmMessage($return, '<br/>Web bol úspešne vytvorený');
        get_bottom_html();
        get_bottom();
    } else {
        get_top();
        get_top_html();
        error_message('Názov webu', '<b>Nezadali ste názov webu</b>');
        get_bottom_html();
        get_bottom();
    }
}
