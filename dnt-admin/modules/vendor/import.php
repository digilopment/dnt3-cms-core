<?php

use DntLibrary\Base\Api;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

get_top();
?>
<?php get_top_html(); ?>
<?php
$rest = new Rest();
$user = new Api();
$vendor = new Vendor();
$post_id = $rest->get('post_id');
$query = 'SELECT * FROM dnt_users';
?>

<div class="row">
    <div class="col-md-10">
        <div class="col">
            <div class="row form-group text-left ">
                <div class="col-sm-8">
                    <h3>Prosím uploadujte <b>.zip</b> exportovaného webu.</h3>
                    <br>
                    <p>Uploadnutý <b>.zip</b> bude po nainštalovaní odstránený</b>
                </div>
            </div>
            <section class="row content-header">
                <ul>

                    <li class="post_type" style="text-decoration: underline">
                        <form enctype='multipart/form-data' action="index.php?src=vendor&action=upload" method="POST" style="    display: flex;">
                            <input name="userfile[]" multiple="multipl" type="file" class="form-control">
                            <input type="submit" name="sent" value="Upload">
                        </form>
                    </li>


                </ul>
            </section>

        </div>
    </div>
</div>

<?php get_bottom_html(); ?>
<?php get_bottom(); ?>