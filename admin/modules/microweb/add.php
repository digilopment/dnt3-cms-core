<?php include "plugins/webhook/tpl_functions.php"; ?>
<?php get_top(); ?>
<?php
include "plugins/webhook/top.php";
$db = new Db;
$rest = new Rest;
?>
<!-- BEGIN LEFT TABS -->
<section class="content">
    <div class="row">
        <div class="col-md-10">
            <div class="col">

                <div class="row form-group text-left ">
                    <div class="col-sm-8">
                        <h3>Po zadaní názvu vytvoríte novú súťaž, ktorú v ďalšom kroku prispôsobíte.</h3>
                        <br>
                    </div>
                </div>

                <form enctype='multipart/form-data' action="index.php?src=<?php echo $rest->get("src"); ?>&action=addData" method="POST">
                    <div class="row form-group ">
                        <label class="col-sm-2 control-label"><b>Názov súťaže</b></label>
                        <div class="col-sm-6">
                            <input type="text" name="nazov" value="" class="form-control" placeholder="názov">
                            <br>
                        </div>
                    </div>
                    <div class="row form-group ">
                        <label class="col-sm-2 control-label"><b>Vztvoriť kópiu súťaže:</b></label>
                        <div class="col-sm-6"><select class="form-control" name="competition_id">
                                <?php
                                $query = "SELECT * FROM dnt_microsites WHERE vendor_id = '" . Vendor::getId() . "'";
                                if ($db->num_rows($query) > 0) {
                                    foreach ($db->get_results($query) as $row) {
                                        echo '<option value="' . $row['id_entity'] . '">' . $row['id_entity'] . ' - ' . $row['nazov'] . ' / ' . $row['real_url'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <br>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-sm-2 control-label"><b>&nbsp;</b></label>
                        <div class="col-sm-6">
                            <input type="submit" name="odoslat" class="btn btn-primary btn-lg btn-block" value="Vytvoriť novú súťaž" />
                            <br>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
<?php include "plugins/webhook/bottom.php"; ?>
<?php get_bottom(); ?>