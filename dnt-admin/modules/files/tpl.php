<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\DntUpload;
use DntLibrary\Base\FileAdmin;
use DntLibrary\Base\Image;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

get_top();
?>
<?php get_top_html(); ?>
<?php
$db = new DB();
$rest = new Rest();
$image = new Image;
?>
<!-- BEGIN CUSTOM TABLE -->
<section class="row content-header">
    <ul>

        <li class="post_type" style="text-decoration: underline">
            <form enctype='multipart/form-data' action="index.php?src=files&action=add" method="POST" style="display: flex;">
                <input name="userfile[]" multiple="multipl" type="file" class="form-control">
                <input type="submit" name="sent" value="Upload">
            </form>
        </li>


    </ul>
</section>
<section class="col-xs-12" style="margin-bottom:15px">
    <a href="index.php?src=files">
        <span class="label label-primary bg-blue" style="padding:5px;margin-right:20px;"><big>všetky</big></span>
    </a>
    <?php
    $query = "SELECT DISTINCT name FROM dnt_uploads WHERE vendor_id = '" . Vendor::getId() . "'";
    $formats = array();
    if ($db->num_rows($query) > 0) {
        foreach ($db->get_results($query) as $row) {
            $type = Dnt::getPripona($row['name']);
            $formats[$type] = $type;
        }
    }
    foreach ($formats as $format) {
        ?>
        <a href="index.php?src=files&search=<?php echo $format; ?>">
            <span class="label label-primary bg-orange" style="padding:5px;"><big><?php echo $format; ?></big></span>
        </a>
        <?php
    }
    ?>	
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
        <form action="index.php?src=files&action=del" method="POST">
            <div class="grid-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>post ID</th>
                            <th>Názov súboru</th>
                            <th>Typ postu</th>
                            <th>Datetime</th>
                            <th>File</th>
                            <th>Zobrazenie</th>
                            <th>Vymazať</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = FileAdmin::query();
                        $i = FileAdmin::showOrder();
                        if ($db->num_rows($query) > 0) {
                            foreach ($db->get_results($query) as $row) {
                                $cat_id = false;
                                $post_id = $row['id_entity'];
                                $sub_cat_id = false;
                                $type = $row['type'];
                                $page = FileAdmin::getPage("current");

                                $imageName = $image->getFileImage($post_id, false, false);
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['id_entity'] ?></td>
                                    <td style="max-width: 500px;"><b><a target="_blank" href="<?php echo $image->getFileImage($post_id); ?>">

                                        <?php echo $row['name']; ?></a></b>
                                        <br>
                                        <?php
                                        foreach (DntUpload::imageFormats() as $format) {
                                            if (Dnt::in_string("image", $type)) {
                                                ?>
                                                <span style="font-weight:bold;"><a href="<?php echo "../dnt-view/data/uploads/formats/" . $format . "/" . $imageName ?>" target="_blank">width-<?php echo $format; ?></a> | </span>
            <?php } ?>
        <?php } ?>

                                        <br><br>
                                        <input style="width: 250px" type="text" value="<?php echo $image->getFileImage($post_id); ?>">


                                    </td>
                                    <td>
        <?php echo FileAdmin::getPostParam("type", $row['id_entity']); ?>
                                    </td>
                                    <td><b><?php echo $row['datetime']; ?></b></td>

                                    <td><b>
                                            <?php
                                            echo '<a target="_blank" href="' . $image->getFileImage($post_id) . '">';
                                            if (Dnt::in_string("image", $row['type'])) {
                                                echo '<img style="width: 100px;" src="' . $image->getFileImage($post_id, true, Image::SMALL) . '"/>';
                                            } else {
                                                echo "Súbor";
                                            }
                                            echo '</a>';
                                            ?>
                                        </b></td>
                                    <td>
                                        <a href="<?php echo FileAdmin::url("show_hide", $cat_id, $sub_cat_id, $type, $post_id, $page) ?>">
                                            <i class="<?php echo admin_zobrazenie_stav($row['show']); ?>"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a <?php echo Dnt::confirmMsg("Naozaj chcete vymazať tento post?"); ?> href="<?php echo FileAdmin::url("del", $cat_id, $sub_cat_id, "image", $post_id, $page) ?>"><i class="fa fa-times bg-red action"></i></a>
                                        <input type="checkbox" name="del_<?php echo $post_id; ?>">
                                    </td>
                                </tr>
                            <thead>

                            </thead>
                            <?php
                        }
                    } else {
                        no_results();
                    }
                    ?>	
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><input type="submit" value="Vymazať vybrané" name="sent"></th>
                    </tr>			  
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <ul class="pagination">
        <li class="">
            <a href="<?php echo FileAdmin::paginator("prev"); ?>">
                &laquo;
            </a>
        </li>
        <li>
            <a href="<?php echo FileAdmin::paginator("first"); ?>">
<?php echo FileAdmin::getPage("first"); ?>
            </a>
        </li>
        <li>
            <a href="<?php echo FileAdmin::paginator("last"); ?>">
<?php echo FileAdmin::getPage("last"); ?>
            </a>
        </li>
        <li>
            <a href="<?php echo FileAdmin::paginator("next"); ?>">
                &raquo;
            </a>
        </li>
    </ul>
    <!-- END PAGINATION -->
</div>
<!-- BEGIN PAGINATION -->
<!-- END CUSTOM TABLE -->
<?php get_bottom_html(); ?>
<?php get_bottom(); ?>