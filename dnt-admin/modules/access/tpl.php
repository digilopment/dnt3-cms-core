<?php 
use DntLibrary\Base\AdminUser;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Vendor;
get_top(); ?>
<?php get_top_html(); ?>
<div class="row">
    <!-- BEGIN CUSTOM TABLE -->
    <div class="col-md-12">
        <div class="grid no-border">
            <div class="grid-header">
                <i class="fa fa-table"></i>
                <span class="grid-title">Prístupy</span>
                <div class="pull-right grid-tools">
                    <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                    <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                    <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="grid-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Login</th>
                            <th>Meno, priezvisko</th>
                            <th>Email</th>
                            <th>Stav konta</th>
                            <th>Akcia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM `dnt_users` WHERE 
                   parent_id = '0' AND
                   type = 'admin' AND
                   vendor_id = '" . Vendor::getId() . "' ORDER BY id_entity desc";
                        $pocet_aktivne = $db->num_rows($query);
                        if ($db->num_rows($query) > 0) {
                            foreach ($db->get_results($query) as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row['id_entity']; ?></td>
                                    <td><?php echo $row['login']; ?></td>
                                    <td><b><?php echo $row['name'] . " " . $row['surname']; ?></b></td>
                                    <td>
                                        <span class="">
                                            <?php echo $row['email']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php
                                        if (($pocet_aktivne > 1) || ($row['status'] == 0)) {
                                            ?>
                                            <a href="<?php echo WWW_PATH_ADMIN_2 . "index.php?src=" . $rest->get('src') . "&nastav_zobrazenie=" . $row['status'] . "&id=" . $row['id_entity']; ?>">
                                                <i class="<?php echo admin_zobrazenie_stav($row['status']); ?>"></i>
                                            </a>
                                            <?php
                                        } else {
                                            echo '<a href="#" title="PAP - Posledný Aktívny Prístup (Toto je posledný aktívny prístup a tento prístup nie je možné deaktivovať)"><i class="fa fa-minus-square bg-green action"></i></a>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo WWW_PATH_ADMIN_2 . "index.php?src=" . $rest->get('src') . "&action=edit&post_id=" . $row['id_entity']; ?>"><i class="fa fa-pencil bg-blue action"></i></a>
                                        <?php
                                        //var_dump($row['id_entity'], AdminUser::data("admin", "id_entity"));
                                        if (AdminUser::data("admin", "id_entity") != $row['id_entity']) {
                                            ?>
                                            <a <?php echo Dnt::confirmMsg("Naozaj chcete zmazať tohoto používateľa?"); ?> href="<?php echo WWW_PATH_ADMIN_2 . "index.php?src=" . $rest->get('src') . "&action=del&post_id=" . $row['id_entity']; ?>"><i class="fa fa-times bg-red action"></i></a>
                                                <?php
                                            } else {
                                                echo '<a href="#" title="Nie je možné vymazať aktívny účet, pod ktorým ste prihlásený"><i class="fa fa-minus-square bg-red action"></i></a>';
                                            }
                                            ?>
                                    </td>
                                </tr>
        <?php
    }
} else {
    no_results();
}
?>									
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END CUSTOM TABLE -->
<?php get_bottom_html(); ?>
<?php get_bottom(); ?>