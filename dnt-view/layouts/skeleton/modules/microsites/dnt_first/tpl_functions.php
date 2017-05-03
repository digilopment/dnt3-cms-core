<?php
function getModul($modul, $image, $CAPTCHA, $CAPTCHA_MIN, $CAPTCHA_MAX, $NO_ROBOT, $link_region_dest, $link_region_show, $link_partner_dest, $link_partner_show) {
    $image = new Image;

    if ($modul == Dnt::name_url(Meta::getCompetitionMeta('_menu_name_1'))) {
        ?>
        <!-- HEADER INFO -->
        <header style="background-image: url('<?php echo $image->getFileImage(Meta::getCompetitionMeta('_menu_1_image_1')); ?>'); display: none;">
            <div class="header-content">
                <div class="header-content-inner">
                    <h1><?php echo Meta::getCompetitionMeta('_menu_1_text_1'); ?></h1>
                </div>
            </div>
        </header>


        <div class="row no-padding slider"> 
            <header>
                <div id="main-carousel" class="carousel slide" data-ride="carousel">  
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <div class="header-content">
                                <div class="header-content-inner">
                                    <h1><?php echo Meta::getCompetitionMeta('_menu_1_text_1'); ?></h1>
                                </div>
                            </div>
                            <img src="<?php echo $image->getFileImage(Meta::getCompetitionMeta('_menu_1_image_1')); ?>" alt="">
                        </div>

                        <?php if (Meta::getCompetitionMeta('_menu_1_image_2')) { ?>
                            <div class="item">
                                <div class="header-content">
                                    <div class="header-content-inner">
                                        <h1><?php echo Meta::getCompetitionMeta('_menu_1_text_1'); ?></h1>
                                    </div>
                                </div>
                                <img src="<?php echo $image->getFileImage(Meta::getCompetitionMeta('_menu_1_image_2')); ?>" alt="">
                            </div>
                        <?php } ?>
                    </div>
                    <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Predchádzajúca</span>
                    </a>
                    <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Ďalšia</span>
                    </a>
                </div>
            </header>
        </div>
        <!-- O SUTAZI -->
        <section class="bg-primary" id="<?php echo Dnt::name_url(Meta::getCompetitionMeta('_menu_name_2')); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-1 col-md-10 col-sm-offset-1 text-center">
                        <h2 class="section-heading"><?php echo Meta::getCompetitionMeta('_menu_name_2'); ?></h2>
                        <hr class="light">
                        <div class="text-faded"><?php echo Meta::getCompetitionMeta('_menu_2_text_1'); ?></div>
                        <span class="dnt-form-control">
                            <a href="#<?php echo Dnt::name_url(Meta::getCompetitionMeta('_menu_name_4')); ?>" class="btn btn-primary btn-lg btn-post page-scroll"><?php echo Meta::getCompetitionMeta('_menu_name_4'); ?></a>
                        </span>
                    </div>
                </div>
            </div>
        </section>
    <?php } elseif ($modul == Dnt::name_url(Meta::getCompetitionMetaImportant('_menu_name_3'))) { ?>
        <!-- GALERIA -->


        <div class="padding-top section-devider-half-heading" id="<?php echo Dnt::name_url(Meta::getCompetitionMetaImportant('_menu_name_3')); ?>" style="border-bottom: 0px #777 dashed;">
        </div>
        <section class="no-padding" id="portfolio">
            <div class="container">
                <div class="row no-gutter">
                    <div class="row">
                        <?php
                        $i = 1;
                        foreach (Meta::getSmallGallery(3) as $hash) {
                            if ($hash) {
                                $class = "big";
                                if ($i == 1)
                                    $custom_css = "float: right; margin-right: 50px";
                                else
                                    $custom_css = "float: left; margin-left: 50px";
                                ?>
                                <div class="col-lg-6 col-sm-6">
                                    <a class="landscape item-<?php echo $class; ?> portfolio-box" data-lightbox="roadtrip" href="<?php echo $image->getFileImage(Meta::getCompetitionMeta('_menu_3_image_' . $i)); ?>" style="<?php echo $custom_css; ?>">
                                        <i class="fa fa-arrows-alt gallery-icon" aria-hidden="true"></i><span class="gallery-icon-text">Gallery</span>
                                        <img src="<?php echo $image->getFileImage(Meta::getCompetitionMeta('_menu_3_image_' . $i)); ?>" />
                                    </a>
                                </div>


                                <?php
                            }
                            $i++;
                        }
                        ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>
        <?php
    }
    elseif ($modul == Dnt::name_url(Meta::getCompetitionMeta('_menu_name_4'))) {
        ?>
        <!-- REGISTRACIA -->
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
            $("#registration_form").validate({
            rules: {
        <?php
        foreach (Meta::getFormBaseFields() as $filedIndex => $filedName) {
            if ($filedIndex != "form_base_tel_c") {
                ?>
                <?php echo $filedIndex; ?>: {
                    required: true,
                            minlength: 1
                    },
                <?php
            }
        }
        ?>
            podmienky: {
            required: true,
                    minlength: 1
            },
        <?php if (Meta::getCompetitionMetaExists('form_extend_v1_doklad') || Meta::getCompetitionMetaExists('form_extend_v2_doklad') || Meta::getCompetitionMetaExists('form_extend_v3_doklad')) { ?>
                ans: {
                required: true,
                        minlength: 1
                },
            <?php
        }
        ?>
            },
                    messages: {
        <?php
        foreach (Meta::getFormBaseFields() as $filedIndex => $filedName) {
            if ($filedIndex != "form_base_tel_c") {
                ?>
                <?php echo $filedIndex; ?>: "<?php echo Meta::getCompetitionMeta('field_word_err'); ?> ^",
            <?php } ?>
        <?php } ?>
                    podmienky: "<?php echo Meta::getCompetitionMeta('field_word_err'); ?> ^",
        <?php if (Meta::getCompetitionMetaExists('form_extend_v1_doklad') || Meta::getCompetitionMetaExists('form_extend_v2_doklad') || Meta::getCompetitionMetaExists('form_extend_v3_doklad')) { ?>
                        ans: "<?php echo Meta::getCompetitionMeta('field_word_err'); ?> ^",
        <?php } ?>
                    },
                    submitHandler: function(form) {
                    $.ajax({
                    type: "POST",
                            url: "<?php echo Url::get("WWW_PATH"); ?>/rpc/api/json/ajax-microsites-reg?type=<?php echo Meta::creat_key(Vendor::getId()); ?>&no_robot=<?php echo $NO_ROBOT; ?>",
                            data: $(form).serialize(),
                            timeout: "10000",
                            dataType: "json",
                            success: function(data) {
                            //var data = jQuery.parseJSON(data);
                            console.log(data);
                            if (data.success == 1) {
                            $("#registration_form").css("display", "none");
                            $("#form_ok").css("display", "block");
                            } else if (data.success == 2) {
                            alert("No valid captcha");
                            } else if (data.success == 0) {
                            alert("...in progress...");
                            } else {
                            writeError(data.message);
                            }
                            },
                            error: function() {
                            alert("Please try again later...");
                            }
                    });
                    return false;
                    }


            });
            //writeError("TEST");		
            function writeError(message) {
            $("#form-result").html("<div class=\"alert alert-error\">" + message + "</div>");
            }
            });
        </script> 
        <div class="section-devider-heading" id="<?php echo Dnt::name_url(Meta::getCompetitionMeta('_menu_name_4')); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="text-left section-name"><?php echo Meta::getCompetitionMeta('_menu_name_4'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <section class="registration">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 dnt-center">
                        <!-- begin is here -->

                            <?php if (Meta::getCompetitionColumn('in_progress') == 1) { ?>
                            <div class="col-md-4 register-info">
            <?php echo Meta::getCompetitionMeta('_menu_4_text_1'); ?>
                            </div>
                            <div class="col-md-8 register-form">
                                <form class="dnt-form-control" id="registration_form">
            <?php foreach (Meta::getFormBaseFields() as $filedIndex => $filedName) { ?>
                                        <div class="form-group row">
                                            <label for="<?php echo $filedIndex; ?>" class="col-sm-3 form-control-label"><?php echo $filedName; ?>
                <?php if ($filedIndex != "form_base_tel_c") { ?>&nbsp;<span class="povinne">*</span>&nbsp;</label><?php } ?>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="<?php echo $filedIndex; ?>" id="<?php echo $filedIndex; ?>" placeholder="<?php echo $filedName; ?>">
                                            </div>
                                        </div>
            <?php } ?>
                                    <input type="hidden" name="form_id" value="<?php echo Meta::creat_hash(Vendor::getId()); ?>" />

            <?php if (Meta::getCompetitionMetaExists('form_extend_v1_doklad')) { ?>
                                        <div class="form-group row">
                                            <label for="ans" class="col-sm-12 form-control-label"><?php echo Meta::getCompetitionMeta('form_extend_v1_doklad'); ?>&nbsp;<span class="povinne">*</span>&nbsp;</label>
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ans" name="ans" placeholder="<?php echo Dnt::not_html(Meta::getCompetitionMeta('form_extend_v1_doklad')); ?>">
                                            </div>
                                        </div>
            <?php } elseif (Meta::getCompetitionMetaExists('form_extend_v2_otazka')) { ?>
                                        <div class="form-group row">
                                            <label for="ans" class="col-sm-3 form-control-label"><?php echo Meta::getCompetitionMeta('form_extend_v2_otazka'); ?>&nbsp;<span class="povinne">*</span>&nbsp;</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="" name="ans" placeholder="<?php echo Dnt::not_html(Meta::getCompetitionMeta('form_extend_v2_otazka')); ?>">
                                            </div>
                                        </div>
            <?php } elseif (Meta::getCompetitionMetaExists('form_extend_v3_otazka')) { ?>
                                        <!-- to do -->
                                        <div class="form-group row radio-ans">
                                            <br/>
                                            <label for="ans" class="col-sm-12 form-control-label"><?php echo Meta::getCompetitionMeta('form_extend_v3_otazka'); ?>&nbsp;<span class="povinne">*</span>
                                                &nbsp;</label>
                                            <br/>
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <label id="ans_a">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <p class="help-block"><b><big>a)&nbsp;&nbsp;</big></b></p>
                                                            </td>
                                                            <td><input type="radio" name="ans" value="a" class="dnt-checkbox" id="ans_a"></td>
                                                            <td>
                                                                <p class="help-block"><?php echo Meta::getCompetitionMeta('form_extend_v3_odpoved_a'); ?></p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </label>
                                                <br/>
                                                <label id="ans_b">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <p class="help-block"><b><big>b)&nbsp;&nbsp;</big></b></p>
                                                            </td>
                                                            <td><input type="radio" name="ans" value="b" class="dnt-checkbox" id="ans_b"></td>
                                                            <td>
                                                                <p class="help-block"><?php echo Meta::getCompetitionMeta('form_extend_v3_odpoved_b'); ?></p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </label>
                                                <br/>
                                                <label id="ans_c">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <p class="help-block"><b><big>c)&nbsp;&nbsp;</big></b></p>
                                                            </td>
                                                            <td><input type="radio" name="ans" value="c" class="dnt-checkbox" id="ans_c"></td>
                                                            <td>
                                                                <p class="help-block"><?php echo Meta::getCompetitionMeta('form_extend_v3_odpoved_c'); ?></p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </label>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    <div class="form-group row">
            <?php if (Meta::getCompetitionMeta('form_file_podmienky')) { ?>
                                            <div class="col-sm-12">
                                                <table>
                                                    <tr>
                                                        <td><input type="checkbox"  name="podmienky" class="dnt-checkbox" id="exampleInputFile"></td>
                                                        <td>
                                                            <p class="help-block"><a target="_blank" href="<?php echo $image->getFileImage(Meta::getCompetitionMeta('form_file_podmienky')); ?>"><?php echo Meta::getCompetitionMeta('field_word_suhlas_podm'); ?>&nbsp;<span class="povinne">*</span>&nbsp;</a></p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
            <?php } ?>
                                        <div class="col-sm-12">
                                            <table>
                                                <tr>
                                                    <td><input type="checkbox"  class="dnt-checkbox" name="newsletter" id="exampleInputFile"></td>
                                                    <td>
                                                        <?php if (Meta::getCompetitionMeta('form_file_newsletter')) { ?>
                                                            <p class="help-block"><a target="_blank" href="<?php echo $image->getFileImage(Meta::getCompetitionMeta('form_file_newsletter')); ?>"><?php echo Meta::getCompetitionMeta('field_word_suhlas_news'); ?></a></p>
                                                            <?php
                                                        } else {
                                                            echo Meta::getCompetitionMeta('field_word_suhlas_news');
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>

            <?php if (Meta::getCompetitionMeta('form_file_newsletter_2')) { ?>
                                                    <tr>
                                                        <td><input type="checkbox"  class="dnt-checkbox" name="newsletter_2" id="exampleInputFile"></td>
                                                        <td><br/>
                                                            <a target="_blank" href="<?php echo $image->getFileImage(Meta::getCompetitionMeta('form_file_newsletter')); ?>"></a><?php echo Meta::getCompetitionMeta('field_word_suhlas_news_2'); ?>

                                                        </td>
                                                    </tr>
            <?php } ?>


                                            </table>
                                        </div>

                                    </div>




                                    <div class="form-group row">


                                        <label for="captcha" class="col-sm-3 form-control-label">Captcha&nbsp;<span class="povinne">*</span>&nbsp;</label>

                                        <div class="col-sm-4">
                                            <table><tr>
                                                    <td><span class="captcha"><?php echo $CAPTCHA_MAX . "-" . $CAPTCHA_MIN . "="; ?></span><input type="text" name="captcha"  class="dnt-captcha"></td>

                                                </tr></table>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <label for="povinne-info" class="col-sm-3 form-control-label" style="padding: 0px;"> &nbsp;<span class="povinne">*</span>&nbsp;  <?php echo Meta::getCompetitionMeta('field_word_err'); ?></label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
                                            <button type="submit" class="btn btn-primary btn-large btn-post"><?php echo Meta::getCompetitionMeta('field_word_sent'); ?></button>
                                        </div>
                                    </div>


                                </form>
                            </div>

                        </div>

                        <style>
                            .captcha{
                                font-size: 25px;
                                font-weight: bold;
                                letter-spacing: 5px;
                            }
                            body input.dnt-captcha{
                                width: 50px;
                                border: 2px solid #333;
                                height: 35px;
                                border-radius: 5px;
                            }
                        </style>
        <?php } else { ?>
                        <!-- on exit -->
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10 col-sm-offset-1 text-center">
                                <div class="text-left"><?php echo Meta::getCompetitionMeta('field_word_koniec_registracie'); ?></div>
                            </div>
                        </div>
                    <?php }
                    ?>

                    <div id="form_ok" style="display: none">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="text-center"><?php echo Meta::getCompetitionMeta('field_word_dakujeme'); ?>
                                    <br/><a style="font-size: 20px;" href="<?php echo Url::get("WWW_PATH"); ?>#<?php echo Dnt::name_url(Meta::getCompetitionMeta('_menu_name_4')); ?>" target="_blank"><?php echo Meta::getCompetitionMeta('field_word_nova_registracia'); ?></a></h2>
                            </div>
                        </div>
                    </div>

                    <!-- END is here -->
                </div>
            </div>
        </section>
        <?php
    } elseif ($modul == Dnt::name_url(Meta::getCompetitionMeta('_menu_name_5'))) {
        ?>
        <!-- REGION -->
        <div class="section-devider-half-heading" id="<?php echo Dnt::name_url(Meta::getCompetitionMeta('_menu_name_5')); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="text-left section-name"><?php echo Meta::getCompetitionMeta('_menu_name_5'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <section style="overflow: hidden">

            <div class="row desktop-gallery" style="">
                <?php
                /*
                  $i =1;
                  for($x=0;$x<=2;$x++){
                  $albumy = "SELECT * FROM `dnt_galeria_media` WHERE
                  `url_album` = '".getCompetitionMeta('_menu_5_gallery_1')."' ";

                  if($db->num_rows($albumy)>0){
                  foreach($db->get_results($albumy) as $album){

                  if($i % 2 == 0){
                  $class="big";
                  }else{
                  $class="big";
                  }
                  ?>
                  <a class="landscape item-<?php echo $class; ?> portfolio-box" data-lightbox="roadtrip" href="<?php echo fotka_albumu($album['url_album'], $album['id'], false, $dntDb);?>">
                  <i class="fa fa-arrows-alt gallery-icon" aria-hidden="true"></i><span class="gallery-icon-text">Gallery</span>
                  <img src="<?php echo fotka_albumu($album['url_album'], $album['id'], false, $dntDb);?>" /></a>
                  <?php
                  $i ++;
                  }
                  }//end for
                  }
                 */
                ?>
            </div>
            <style>
                /*.desktop-gallery a>i,
                .desktop-gallery a>span{
                        display: none;
                }
                .desktop-gallery a:hover>i,
                .desktop-gallery a:hover>span{
                        display: block;
                }
                
                .item-middle .gallery-icon{
                        top: 90px;
                        left: 110px;
                }
                
                .item-middle .gallery-icon-text {
                        top: 140px;
                        left: 95px;
                }
                */
            </style>

            <div class="container">
                <div class="row">
                    <!-- left article -->
                    <div class="col-md-12 responsive-gallery">
                        <div id="layout_carousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <?php
                                /* $i = 0;
                                  $albumy = dnt_query("SELECT * FROM `dnt_galeria_media` WHERE
                                  `url_album` = '".getCompetitionMeta('_menu_5_gallery_1')."' ", $dntDb);
                                  if (mysql_num_rows($albumy) > 0){
                                  while ($album = mysql_fetch_array($albumy)) {
                                  ?>
                                  <li data-target="#layout_carousel" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; }?>"></li>
                                  <?php
                                  $i ++;
                                  }
                                  }
                                 */
                                ?>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <?php
                                /*
                                  $i = 0;
                                  $albumy = dnt_query("SELECT * FROM `dnt_galeria_media` WHERE
                                  `url_album` = '".getCompetitionMeta('_menu_5_gallery_1')."' ", $dntDb);
                                  if (mysql_num_rows($albumy) > 0){
                                  while ($album = mysql_fetch_array($albumy)) {
                                  ?>
                                  <div class="item <?php if($i == 0){ echo 'active'; }?>">
                                  <img src="<?php echo fotka_albumu($album['url_album'], $album['id'], false, $dntDb);?>" alt="<?php echo $album['url_fotka']; ?>" width="" height="" style="width: 100%">
                                  </div>
                                  <?php
                                  $i ++;
                                  }
                                  }
                                 */
                                ?>
                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#layout_carousel" role="button" data-slide="prev">
                                    <span class="glyphicon-chevron-left" aria-hidden="true"><i class="fa fa-arrow-left" aria-hidden="true" style="font-size: 30px;"></i></span>
                                    <span class="sr-only"><?php echo Meta::getCompetitionMeta('field_word_previous'); ?></span>
                                </a>
                                <a class="right carousel-control" href="#layout_carousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"><i class="fa fa-arrow-right" aria-hidden="true" style="font-size: 30px;"></i></span>
                                    <span class="sr-only"><?php echo Meta::getCompetitionMeta('field_word_next'); ?></span>
                                </a>
                            </div>
                        </div>
                        <br/>
                    </div>
                </div>



                <!-- left article -->
                <div class="row region-row">
                    <div class="<?php
                    if (Meta::getCompetitionMeta('_menu_5_text_1') && Meta::getCompetitionMeta('map_location')) {
                        echo 'col-md-6';
                    } else {
                        echo 'col-md-offset-1 col-md-10 col-sm-offset-1';
                    }
                    ?>">
                        <div class="text-faded-dark faded-dark">
                    <?php echo Meta::getCompetitionMeta('_menu_5_text_1'); ?>
                        </div>
                    </div>
                    <?php if (Meta::getCompetitionMeta('map_location')) { ?>
                        <div class="<?php
                             if (Meta::getCompetitionMeta('_menu_5_text_1') && Meta::getCompetitionMeta('map_location')) {
                                 echo 'col-md-6';
                             } else {
                                 echo 'col-md-offset-1 col-md-10 col-sm-offset-1 ';
                             }
                             ?>">
                            <div id="googleMap" style="width:100%;height: 343px;"></div>
                        </div>
        <?php } ?>

                </div>


                <div class="row region-row">
                    <!-- left article -->
                    <div class="<?php
                            if (Meta::getCompetitionMeta('youtube_video') && Meta::getCompetitionMeta('youtube_video')) {
                                echo 'col-md-6';
                            } else {
                                echo 'col-md-offset-1 col-md-10 col-sm-offset-1 ';
                            }
                            ?>">
                        <div class="text-faded-dark faded-dark">
                    <?php echo Meta::getCompetitionMeta('_menu_5_text_2'); ?>
                        </div>
                    </div>
                    <!-- right article -->

        <?php if (Meta::getCompetitionMeta('youtube_video')) { ?>
                        <!-- right article -->
                        <div class="<?php
            if (Meta::getCompetitionMeta('youtube_video') && Meta::getCompetitionMeta('youtube_video')) {
                echo 'col-md-6';
            } else {
                echo 'col-md-offset-1 col-md-10 col-sm-offset-1  ';
            }
            ?>">
                            <div class="video_cont">
                                <div class="video_div">
                                    <div class="responsive-container">
                                        <iframe src="https://www.youtube.com/embed/<?php echo Meta::getCompetitionMeta('youtube_video'); ?>"  allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
        <?php } ?>
                </div>
                <div>
                    <div class="row contact-line">
        <?php if (Meta::getCompetitionMeta('region_logo')) { ?>

                            <div class="col-lg-3 col-md-6 text-center">
                                <a class="" target="_blank" href="<?php echo $link_region_dest; ?>">
                                    <img class="img-responsive" src="<?php echo $image->getFileImage(Meta::getCompetitionMeta('region_logo')); ?>" alt="logo" />
                                </a>
                            </div>
                        <?php } ?>
                        <?php if (Meta::getCompetitionMeta('info_region_addr')) { ?>
                            <div class="col-lg-3 col-md-6 text-center">
                                <div class="service-box">
                                    <i class="fa fa-4x fa-location-arrow wow bounceIn text-primary" data-wow-delay=".1s"></i>
                                    <h3><?php echo Meta::getCompetitionMeta('field_word_adresa'); ?></h3>
                                    <p class="text-muted"><?php echo Meta::getCompetitionMeta('info_region_name'); ?></p>
                                    <p class="text-muted"><?php echo Meta::getCompetitionMeta('info_region_addr'); ?></p>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (Meta::getCompetitionMeta('info_region_tel_c') || Meta::getCompetitionMeta('info_region_email')) { ?>
                            <div class="col-lg-3 col-md-6 text-center">
                                <div class="service-box">
                                    <i class="fa fa-4x fa-paper-plane-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                                    <h3><?php echo Meta::getCompetitionMeta('field_word_kontakt'); ?></h3>
                                    <p class="text-muted"><?php echo Meta::getCompetitionMeta('info_region_tel_c'); ?></p>
                                    <p class="text-muted"><a href="mailto:<?php echo Meta::getCompetitionMeta('info_region_email'); ?>"><?php echo Meta::getCompetitionMeta('info_region_email'); ?></a></p>
                                </div>
                            </div>
                        <?php } ?>
        <?php if (Meta::getCompetitionMeta('link_region')) { ?>
                            <div class="col-lg-3 col-md-6 text-center">
                                <div class="service-box">
                                    <i class="fa fa-4x fa-globe wow bounceIn text-primary" data-wow-delay=".3s"></i>
                                    <h3><?php echo Meta::getCompetitionMeta('field_word_web'); ?></h3>
                                    <p class="text-muted"><a target="_blank" href="<?php echo $link_region_dest; ?>"><?php echo Meta::link_format($link_region_show); ?></a></p>
                                </div>
                            </div>
        <?php } ?>
                    </div>
                </div>

            </div>
        </section>
    <?php } elseif ($modul == Dnt::name_url(Meta::getCompetitionMeta('_menu_name_8'))) {
        ?>
        <?php if (Meta::getCompetitionMeta('_menu_name_8')) { ?>   
            <!-- O PARTNEROVI -->
            <div class="section-devider-half-heading" id="<?php echo Dnt::name_url(Meta::getCompetitionMeta('_menu_name_8')); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="text-left section-name"><?php echo Meta::getCompetitionMeta('_menu_name_8'); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <section>
                <div class="container">
                    <div class="row">
                        <!-- left article -->
                        <div class="col-md-6">
                            <div class="text-faded-dark faded-dark">
                                <?php if (Meta::getCompetitionMeta('_menu_8_image_1')) { ?>
                                    <img class="img-responsive" src="<?php echo $image->getFileImage(Meta::getCompetitionMeta('_menu_8_image_1')); ?>" alt="logo" />
            <?php } else { ?>
                                    <img class="img-responsive" src="<?php echo $image->getFileImage(Meta::getCompetitionMeta('partner_logo')); ?>" alt="logo" />
            <?php } ?>
                            </div>
                        </div>
                        <!-- right article -->
                        <div class="col-md-6">
                            <div class="text-faded-dark faded-dark">
                            <?php echo Meta::getCompetitionMeta('_menu_8_text_1'); ?>
                            </div>
                        </div>
                    </div>


                    <div class="partner_kontakt">
                        <div class="row contact-line">

                            <?php if (Meta::getCompetitionMeta('partner_logo')) { ?>

                                <div class="col-lg-3 col-md-6 text-center">
                                    <a class="" target="_blank" href="<?php echo $link_partner_dest; ?>">
                                        <img class="img-responsive logo-bottom" src="<?php echo $image->getFileImage(Meta::getCompetitionMeta('partner_logo')); ?>" alt="logo" />
                                    </a>
                                </div>
            <?php } ?>

                            <?php if (Meta::getCompetitionMeta('info_partner_addr')) { ?>
                                <div class="col-lg-3 col-md-6 text-center">
                                    <div class="service-box">
                                        <i class="fa fa-4x fa-location-arrow wow bounceIn text-primary" data-wow-delay=".1s"></i>
                                        <h3><?php echo Meta::getCompetitionMeta('field_word_adresa'); ?></h3>
                                        <p class="text-muted"><?php echo Meta::getCompetitionMeta('info_partner_name'); ?></p>
                                        <p class="text-muted"><?php echo Meta::getCompetitionMeta('info_partner_addr'); ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (Meta::getCompetitionMeta('info_partner_tel_c') || Meta::getCompetitionMeta('info_partner_email')) { ?>
                                <div class="col-lg-3 col-md-6 text-center">
                                    <div class="service-box">
                                        <i class="fa fa-4x fa-paper-plane-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                                        <h3><?php echo Meta::getCompetitionMeta('field_word_kontakt'); ?></h3>
                                        <p class="text-muted"><?php echo Meta::getCompetitionMeta('info_partner_tel_c'); ?></p>
                                        <p class="text-muted"><a href="mailto:<?php echo Meta::getCompetitionMeta('info_partner_email'); ?>"><?php echo Meta::getCompetitionMeta('info_partner_email'); ?></a></p>
                                    </div>
                                </div>
                            <?php } ?>
            <?php if (Meta::getCompetitionMeta('link_partner')) { ?>
                                <div class="col-lg-3 col-md-6 text-center">
                                    <div class="service-box">
                                        <i class="fa fa-4x fa-globe wow bounceIn text-primary" data-wow-delay=".3s"></i>
                                        <h3><?php echo Meta::getCompetitionMeta('field_word_web'); ?></h3>
                                        <p class="text-muted"><a target="_blank" href="<?php echo $link_partner_dest; ?>"><?php echo Meta::link_format($link_partner_show); ?></a></p>
                                    </div>
                                </div>
            <?php } ?>
                        </div>
                    </div>

                </div>
            </section>
        <?php } ?>
    <?php } elseif ($modul == Dnt::name_url(Meta::getCompetitionMetaImportant('_menu_name_7'))) { ?>
        <!-- UBYTOVANIE -->
        <div class="section-devider-half-heading" id="<?php echo Dnt::name_url(Meta::getCompetitionMetaImportant('_menu_name_7')); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="text-left section-name"><?php echo Meta::getCompetitionMeta('_menu_name_7'); ?></h2>
                    </div>
                </div>
            </div>
        </div>

                            <?php
							
                            for ($i = 1; $i <= 4; $i++) {
                                if (Meta::getCompetitionMeta('info_hotel_name_' . $i)) {
                                    ?>  
                <section class="ubytovanie">
                    <div class="container">
                        <div class="row">
                            <!-- left article -->
                            <div class="col-md-7">
                                <div class="text-faded-dark faded-dark">
                                <?php echo Meta::getCompetitionMeta('_menu_7_text_' . $i); ?>
                                </div>
                            </div>
                            <!-- right article -->
                <?php if (Meta::getCompetitionMeta('_menu_7_image_2_' . $i) || Meta::getCompetitionMeta('_menu_7_image_1_' . $i)) { ?>
                                <div class="col-md-5">

                                <?php if (Meta::getCompetitionMeta('_menu_7_image_2_' . $i)) { ?>
                                        <img src="<?php echo $image->getFileImage(Meta::getCompetitionMeta('_menu_7_image_2_' . $i)); ?>" class="center-block" style="max-width: 100%;" alt="">
                    <?php } ?>

                                <?php if (Meta::getCompetitionMeta('_menu_7_image_1_' . $i)) { ?>
                                        <a href="<?php echo $image->getFileImage(Meta::getCompetitionMeta('_menu_7_image_1_' . $i)); ?>" class="portfolio-box" data-lightbox="roadtrip" >
                                            <img src="<?php echo $image->getFileImage(Meta::getCompetitionMeta('_menu_7_image_1_' . $i)); ?>" class="img-responsive no-padding" style="width: 100%;" alt="">
                                        </a>
                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="row contact-line">
                <?php if (Meta::getCompetitionMeta('_menu_7_image_2_' . $i)) { ?>
                                <div class="col-lg-3 col-md-6 text-center">
                                    <div class="service-box">
                                        <img src="<?php echo $image->getFileImage(Meta::getCompetitionMeta('_menu_7_image_2_' . $i)); ?>" class="img-responsive no-padding" style="width: 100%;" alt="">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (Meta::getCompetitionMeta('info_hotel_addr_' . $i)) { ?>
                                <div class="col-lg-3 col-md-6 text-center">
                                    <div class="service-box">
                                        <i class="fa fa-4x fa-location-arrow wow bounceIn text-primary" data-wow-delay=".1s"></i>
                                        <h3><?php echo Meta::getCompetitionMeta('field_word_adresa'); ?></h3>
                                        <p class="text-muted"><?php echo Meta::getCompetitionMeta('info_hotel_name_' . $i); ?></p>
                                        <p class="text-muted"><?php echo Meta::getCompetitionMeta('info_hotel_addr_' . $i); ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (Meta::getCompetitionMeta('info_hotel_tel_c_' . $i) || Meta::getCompetitionMeta('info_hotel_email_' . $i)) { ?>
                                <div class="col-lg-3 col-md-6 text-center">
                                    <div class="service-box">
                                        <i class="fa fa-4x fa-paper-plane-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                                        <h3><?php echo Meta::getCompetitionMeta('field_word_kontakt'); ?></h3>
                                        <p class="text-muted"><?php echo Meta::getCompetitionMeta('info_hotel_tel_c_' . $i); ?></p>
                                        <p class="text-muted"><a href="mailto:<?php echo Meta::getCompetitionMeta('info_hotel_email_' . $i); ?>"><?php echo Meta::getCompetitionMeta('info_hotel_email_' . $i); ?></a></p>
                                    </div>
                                </div>
                            <?php } ?>
                <?php if (Meta::getCompetitionMeta('link_hotel_' . $i)) { ?>
                                <div class="col-lg-3 col-md-6 text-center">
                                    <div class="service-box">
                                        <i class="fa fa-4x fa-globe wow bounceIn text-primary" data-wow-delay=".3s"></i>
                                        <h3><?php echo Meta::getCompetitionMeta('field_word_web'); ?></h3>
                                        <p class="text-muted"><a target="_blank" href="<?php echo Meta::getCompetitionMeta('link_hotel_' . $i); ?>"><?php echo Meta::link_format(Meta::getCompetitionMeta('link_hotel_' . $i)); ?></a></p>
                                    </div>
                                </div>
                <?php } ?>
                        </div>
                    </div>
                </div>
                </section>
            <?php } ?>   
        <?php } ?>   
    <?php } ?>
<?php }

//end function  
?> 