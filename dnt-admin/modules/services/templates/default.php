<?php

use DntLibrary\Base\Image;
get_top();
get_top_html();

$postId = $data['post_id'];
$rest = $data['rest'];
$dnt = $data['dnt'];
$article = $data['article'];
$image = $data['image'];
$adminContent = $data['adminContent'];
$show = $data['show'];
$service = $data['service'];
$actionUrl = "index.php?src=services&included=" . $service . "&filter=" . $rest->get("filter") . "&post_id=" . $postId . "&service=" . $service . "&action=update";
?>

<section class="col-xs-12" style="margin-bottom:15px">

    <a href="index.php?src=content&included=<?php echo $rest->get("included"); ?>&filter=<?php echo $rest->get("filter"); ?>">
        <span class="label label-primary bg-blue" style="padding:5px;" ><big>PREJSŤ NA ZOZNAM</big></span>
    </a>
    <a href="index.php?src=content&included=<?php echo $rest->get("included"); ?>&filter=<?php echo $rest->get("filter"); ?>&action=add">
        <span class="label label-primary bg-green" style="padding:5px;"><big>PRIDAŤ NOVÝ POST V TEJTO KATEGÓRII</big></span>
    </a>
    <a href="index.php?src=content&filter=<?php echo $rest->get("filter"); ?>&sub_cat_id=&post_id=<?php echo $postId; ?>&page=1&action=edit&included=<?php echo $rest->get("included"); ?>">
        <span class="label label-primary bg-orange" style="padding:5px;"><big>SPAŤ NA DETAIL</big></span>
    </a>
    <?php if ($show > 0) { ?>
        <a  href="<?php echo WWW_PATH . "a/" . $postId; ?>" target="_blank" style="float:right">
            <span class="label label-primary bg-blue" style="padding:5px;"><big><i class="fa fa-external-link-square"></i> OTVORIŤ POST NA WEBE</big></span>
        </a>
    <?php } ?>
</section>	
<section class="col-xs-12 content">
    <div class="row">
        <div class="row" style="background-color: #fff;padding: 5px;margin: 0px;">
            <label class="col-sm-2 control-label"><b>Názov vstupu</b></label>
            <label class="col-sm-2 control-label"><b>Použiť hodnotu?</b></label>
            <label class="col-sm-8 control-label"><b>Nastavenie hodnoty</b></label>
        </div>
        <div class="row">
            <form enctype='multipart/form-data'action="<?php echo $actionUrl; ?>" method="POST">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#sutaz" data-toggle="tab"><?php echo $postId; ?></a></li>
                    </ul>
                    <div class=" tab-content">
                        <!-- base settings -->
                        <div class="tab-pane active" id="sutaz">
                            <?php
                            foreach ($article->getPostsMeta($postId, $service) as $row) {
                                ?>
                                <div class="row form">
                                    <label class="col-sm-2 control-label"><b><?php echo $row['description'] ?></b></label>
                                    <label class="col-sm-2 control-label">
                                        <?php $dnt->setMetaStatus($row['show'], $row['id_entity']); ?>
                                    </label>
                                    <div class="col-sm-8 text-left">
                                        <?php if ($row['content_type'] == "image") { ?>
                                            <input name="userfile_<?php echo $row['id_entity']; ?>[]" multiple="multipl" type="file" class="form-control">
                                            <?php galleryChooser($row['id_entity']); ?>
                                            <?php
                                            foreach ($image->getFileImages($row['value'], true, Image::THUMB) as $img) {
                                                echo '<img src="' . $img . '" style="height: 55px; margin-left:0px; margin:10px;">';
                                            }
                                        } elseif ($row['content_type'] == "file") {
                                            ?>
                                            <input name="userfile_<?php echo $row['id_entity']; ?>[]" multiple="multipl" type="file" class="form-control">
                                            <?php
                                            foreach ($image->getFileImages($row['value'], true, Image::THUMB) as $file) {
                                                echo "<a target='_blank' href='" . $file . "'>" . $file . "</a><br/>";
                                            }
                                        } elseif ($row['content_type'] == "color") {
                                            ?>
                                            <input name="key_<?php echo $row['id_entity']; ?>"  value="<?php echo $row['value'] ?>" type="color" class="form-control">
                                            <?php
                                        } elseif ($row['content_type'] == "bool") {
                                            ?>
                                            <input name="key_<?php echo $row['id_entity']; ?>"  value="" type="hidden" class="form-control">
                                            <?php
                                        }elseif ($row['content_type'] == "content") {
                                            ?>
                                            <textarea name="key_<?php echo $row['id_entity'] ?>" value="<?php echo $row['value'] ?>" class="ckeditor" style="min-height: 195px;"><?php echo $row['value'] ?></textarea>
                                        <?php } else {
                                            ?>
                                            <input type="text" name="key_<?php echo $row['id_entity'] ?>" value='<?php echo $row['value'] ?>' class="form-control" placeholder="">
                                        <?php } ?>
                                    </div>
                                </div>
                                <br/>
                                <?php
                            }
                            ?>
                            <input type="hidden" name="return" value="<?php echo WWW_FULL_PATH; ?>">
                            <input type="submit" name="sent" class="btn btn-primary btn-lg btn-block" value="Upraviť">
                        </div>
                    </div>
                </div>
            </form>
        </div>
</section>
<?php
get_bottom_html();
get_bottom();
?>