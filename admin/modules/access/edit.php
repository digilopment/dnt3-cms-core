<?php include "plugins/webhook/tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "plugins/webhook/top.php"; ?>
<?php
$rest = new Rest;
$post_id = $rest->get("post_id");
?>
<section class="content">
    <div class="row">
        <form enctype="multipart/form-data" action="index.php?src=access&action=update&post_id=<?php echo $post_id; ?>" method="POST">
            <!-- BEGIN SEARCH RESULT -->
            <div class="col-md-12">
                <div class="grid search">
                    <div class="grid-body">
                        <div class="row">
                            <!-- BEGIN FILTERS -->
                            <input type="hidden" name="src" value="pristupy">
                            <div class="col-md-6">
                                <h2 class="grid-title"><i class="fa fa-filter"></i>Administrátor</h2>
                                <hr>
                                <!-- BEGIN FILTER BY CATEGORY -->
                                <span style="font-weight: bold;">
                                    <h5>Meno:</h5>
                                    <div class="checkbox">
                                        <input type="text" name="name" value="<?php echo AdminUser::dataById("admin", "name", $post_id); ?>" class="form-control">
                                    </div>
                                    <h5>Priezvisko:</h5>
                                    <div class="checkbox">
                                        <input type="text" name="surname" value="<?php echo AdminUser::dataById("admin", "surname", $post_id); ?>" class="form-control">
                                    </div>
                                    <h5>Email:</h5>
                                    <div class="checkbox">
                                        <input type="text" name="email" value="<?php echo AdminUser::dataById("admin", "email", $post_id); ?>" class="form-control">
                                    </div>
                                    <h5>Aktívny prístup?</h5>
                                    <div class="checkbox">
                                        <input type="radio" name="show" value="1" checked="">Áno
                                        <input type="radio" name="show" value="0">Nie										
                                    </div>
                                    <h5>Zadajte heslo na overenie totožnosti:</h5>
                                    <div class="checkbox">
                                        <input type="password" name="pass" value="" class="form-control">
                                    </div>
                                </span>
                            </div>
                            <!-- END FILTERS -->
                            <div class="col-md-6">
                                <h2><i class="fa fa-file-o"></i> Fotografia</h2>
                                <hr>
                                <p class="lead">Vyberte si jedinečnú <b>fotografiu</b></p>
                                <p>Ak máte eshop a vystavíte faktúru, vaše meno tam bude predvyplnené</p>
                                <img src="<?php echo AdminUser::avatarById($post_id); ?>" style="max-width: 200px; margin: 15px;" alt="">
                                <input type="file" name="userfile" class="btn-default btn-lg btn-block">
                                <?php galleryChooser("user_avatar"); ?>
                                <div class="padding"></div>
                                <div class="checkbox">
                                    <?php echo Dnt::returnInput(); ?>
                                    <input type="hidden" name="group" value="<?php echo AdminUser::dataById("admin", "type", $post_id); ?>" class="form-control">
                                    <input type="submit" name="sent" value="Uložiť" class="btn btn-primary" style="width: 40%;">
                                </div>
                            </div>
                            <!-- END TABLE RESULT -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SEARCH RESULT -->
        </form>
    </div>
</section>

<?php include "plugins/webhook/bottom.php"; ?>
<?php get_bottom(); ?>