<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\Image;
use DntLibrary\Base\Meta;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

get_top();
?>
<?php get_top_html(); ?>
<?php
$db = new DB();
$rest = new Rest();
$image = new Image();
?>
<section class="content">
    <div class="row">

        <div style="clear: both;"></div>
        <!-- BEGIN CUSTOM TABLE -->
        <div class="col-md-12">
            <div class="grid no-border">
                <div class="grid-header">
                    <i class="fa fa-table"></i>
                    <span class="grid-title">Súťaže</span>
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
                                <th>#id</th>
                                <th>Názov postu</th>
                                <th>Editovať vlastnosti súťaže</th>
                                <th>Zobrazenie na pracovnej adrese</th>
                                <th>Zobrazenie na developerskom serveri</th>
                                <th>Zobrazenie na vlastnej doméne</th>
                                <th>Globálne vlastnosti súťaže</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $query = "SELECT * FROM `dnt_microsites` WHERE `vendor_id` = '" . Vendor::getId() . "'";
                            if ($db->num_rows($query) > 0) {
                                foreach ($db->get_results($query) as $row) {
                                    $editUrl = 'index.php?src=' . $rest->get('src') . '&id=' . $row['id_entity'] . '&action=edit';
                                    $develUrl = '';
                                    $webUrl = WWW_PATH . 'microsites/' . $row['url'];
                                    $domainUrl = $row['real_url'];
                                    // $saveUrl = "index.php?src=" . $rest->get("src") . "&action=save";
                                    $urlUpdate = 'index.php?src=' . $rest->get('src') . '&id=' . $row['id_entity'] . '&action=update';
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id_entity']; ?></td>
                                        <td style="max-width: 500px;"><b><a href="<?php echo $editUrl; ?>"><?php echo $row['nazov']; ?></a></b></td>
                                        <td><a href="<?php echo $editUrl; ?>"><i class="fa fa-pencil bg-blue action"></i></a></td>
                                        <td>
                                            <i class="fa fa-arrow-right bg-green action"></i> - <a href="<?php echo $develUrl; ?>" target="_blank"><?php echo $develUrl; ?></a>
                                        </td>

                                        <td>
                                            <i class="fa fa-arrow-right bg-green action"></i> - <a href="<?php echo $webUrl; ?>" target="_blank"><?php echo $webUrl; ?></a>
                                        </td>

                                        <td>
                                            <?php if ($row['active'] == 1) { ?>
                                                <i class="fa fa-arrow-right bg-green action"></i> - <a href="<?php echo $row['real_url']; ?>" target="_blank"><?php echo $row['real_url']; ?></a>
                                            <?php } else { ?>
                                                <i class="fa fa-times bg-red action"></i> - K tejto súťaži nie je priradená žiadna doména
                                            <?php } ?>
                                        </td>
                                        <td style="display: none;">
                                            <span class="text-green">
                                                <a href="#"><i class="fa fa-angle-up"></i></a>
                                                <a href="#"><i class="fa fa-angle-down"></i></a>
                                            </span>
                                        </td>
                                        <td>
                                            <button data-toggle="modal" data-target="#modalPrimary<?php echo $row['id_entity']; ?>"><i class="fa fa-pencil bg-blue action"></i></button>


                                            <!-- START MODAL -->                                
                                            <div class="modal fade" id="modalPrimary<?php echo $row['id_entity']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8" aria-hidden="true">
                                                <div class="modal-wrapper">
                                                    <div class="modal-dialog">
                                                        <form action="<?php echo $urlUpdate; ?>" method="POST">
                                                            <div class="modal-content">
                                                                <div class="col-md-12">
                                                                    <div class="modal-header bg-blue">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title" id="myModalLabel8">&nbsp;</h4>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="tab-content" style="border: 0px solid; padding: 0px;">
                                                                            <div class="tab-pane active" id="home-lang">
                                                                                <p class="lead dnt_bold">
                                                                                    <span class="dnt_lang">Defaultný jazyk</span>
                                                                                </p>
                                                                                <br/>
                                                                                <div class="row">
                                                                                    <div class="form-group">
                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-3 control-label"><b>Názov:</b></label>
                                                                                            <div class="col-sm-9">
                                                                                                <input type="text" name="nazov" value="<?php echo $row['nazov']; ?>" class="form-control" placeholder="Názov:">
                                                                                                <br/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-3 control-label"><b>Url hash:</b></label>
                                                                                            <div class="col-sm-9">
                                                                                                <input type="text"  value="<?php echo $row['url']; ?>" name="url" class="form-control" placeholder="Názov:">
                                                                                                <br/>
                                                                                            </div>
                                                                                        </div>


                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-3 control-label"><b>Zobraziť na vlastnej adrese:</b></label>

                                                                                            <div class="col-sm-9 ">
                                    <?php Meta::setMetaStatus($row['active'], 'real_url'); ?>
                                                                                                <br/>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-3 control-label"><b>Povoliť registráciu:</b></label>

                                                                                            <div class="col-sm-9 ">
                                    <?php Meta::setMetaStatus($row['in_progress'], 'in_progress'); ?>
                                                                                                <br/>
                                                                                            </div>
                                                                                        </div>




                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-3 control-label"><b>Vlastná URL adresa:</b></label>
                                                                                            <div class="col-sm-9">
                                                                                                <input type="text"  value="<?php echo $row['real_url']; ?>" name="real_url" class="form-control" placeholder="Názov:">
                                                                                                <br/>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                <br/>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end here -->
                                                                        <input type="hidden"  value="<?php echo $row['id_entity']; ?>" name="id">
                                                                        <input type="submit" name="odoslat_sutaz" class="btn btn-primary btn-lg btn-block" value="Upraviť" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END MODAL -->
                                        </td>
                                    </tr>
                                    <?php
                                }
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- END PAGINATION -->
        </div>
        <!-- BEGIN PAGINATION -->
        <!-- END CUSTOM TABLE -->           
    </div>
</section>

<?php get_bottom_html(); ?>
<?php get_bottom(); ?>