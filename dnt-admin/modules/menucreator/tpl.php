<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\Rest;

get_top();
?>
<?php get_top_html(); ?>
<?php
$db = new DB();
$rest = new Rest();
?>

<!-- BEGIN CUSTOM TABLE -->
<section class="col-xs-12" style="margin-bottom:15px">
    <a href="index.php?src=menucreator&action=addToMenu">
        <span class="label label-primary bg-green" style="padding:5px;"><big>Pridať všetky menu položky</big></span>
    </a>

</section>  

<div style="clear: both;"></div>
<div class="col-md-12">
    <div class="grid no-border">
        <div class="grid-header">
            <i class="fa fa-table"></i>
            <span class="grid-title">Posty</span>
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
                        <th>Názov</th>
                        <th>typ</th>
                        <th>url</th>
                        <th>url sub</th>
                        <th>Ikona</th>
                        <th>Poradie</th>
                        <th>Zobrazenie</th>
                        <th></th>
                        <th>Vymazať</th>
                    </tr>
                </thead>
                <form action="index.php?src=menucreator&action=update" method="POST">
                    <tbody>
                        <?php
                        $query = menuQuery();
                        if ($db->num_rows($query) > 0) {
                            $i = 1;
                            foreach ($db->get_results($query) as $row) {
                                ?>
                                <tr>
                                    <td><a href="index.php?src=<?php echo $row['name_url']; ?>" target="_blank"><?php echo $i++; ?></a></td>
                                    <td style="width: auto;"><b><input type="text" name="name_<?php echo $row['id_entity']; ?>" value="<?php echo $row['name']; ?>" /></b></td>
                                    <td style="width: auto;"><b><input type="text" name="type_<?php echo $row['id_entity']; ?>" value="<?php echo $row['type']; ?>" /></b></td>
                                    <td style="width: auto;"><b><input type="text" name="name_url_<?php echo $row['id_entity']; ?>" value="<?php echo $row['name_url']; ?>" /></b></td>
                                    <td style="width: auto;"><b><input type="text" name="name_url_sub_<?php echo $row['id_entity']; ?>" value="<?php echo $row['name_url_sub']; ?>" /></b></td>



                                    <td style="width: auto;"><b><input type="text" name="ico_<?php echo $row['id_entity']; ?>" value="<?php echo $row['ico']; ?>" /></b></td>
                                    <td style="width: auto;"><b><input type="text" name="order_<?php echo $row['id_entity']; ?>" value="<?php echo $row['order']; ?>" /></b></td>
                                    <td style="width: auto;"><b><input type="text" name="show_<?php echo $row['id_entity']; ?>" value="<?php echo $row['show']; ?>" /></b></td>

                                    <td>
                                        <a href="index.php?src=menucreator&id=<?php echo $row['id_entity'] ?>&action=show_hide">
                                            <i class="<?php echo admin_zobrazenie_stav($row['show']); ?>"></i>
                                        </a>
                                    </td>
                                    <td style="width: auto;">
                                        <a href="index.php?src=menucreator&id=<?php echo $row['id_entity'] ?>&action=del">
                                            <i class="bg-red action fa fa-trash"></i>
                                        </a></td>
                                </tr>
                                <?php
                            }
                        } else {
                            no_results();
                        }
                        ?>                                  
                    </tbody>
                    <input type="submit" name="sent" class="btn btn-primary" value="Uložiť" >
                </form>
            </table>
        </div>
    </div>

</div>
<!-- BEGIN PAGINATION -->
<!-- END CUSTOM TABLE -->
<?php get_bottom_html(); ?>
<?php get_bottom(); ?>