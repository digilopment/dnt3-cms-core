<?php
//GET IMAGE
$image = new Image;

//CAPTCHA
$NO_ROBOT = session_id();
$CAPTCHA_MAX = rand(20, 99);
$CAPTCHA_MIN = rand(1, 19);
$_SESSION['no_robot'] = $NO_ROBOT;
$_SESSION['captcha_max'] = $CAPTCHA_MAX;
$_SESSION['captcha_min'] = $CAPTCHA_MIN;
$CAPTCHA = $CAPTCHA_MAX - $CAPTCHA_MIN;
$_SESSION['captcha'] = $CAPTCHA;

//GET MASKED HYPERLINK PARTNER
$hyperlinkParser = Meta::hyperlinkParser(Meta::getCompetitionMeta('link_partner'));
$link_partner_dest = $hyperlinkParser[0];
$link_partner_show = $hyperlinkParser[1];

//GET MASKED HYPERLINK REGION
$hyperlinkParser = Meta::hyperlinkParser(Meta::getCompetitionMeta('link_region'));
$link_region_dest = $hyperlinkParser[0];
$link_region_show = $hyperlinkParser[1];
?>


<div id="fb-root"></div>
<script type="text/javascript">(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/<?php echo Meta::getCompetitionMeta('_language'); ?>/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<body id="page-top">
    <div id="<?php echo Dnt::name_url(Meta::getCompetitionMeta('_menu_name_1')); ?>"></div>
    <!-- NAVIGACIA -->
    <div class="row no-padding">
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php if (Meta::getCompetitionMeta('partner_logo')) { ?>
                        <a class="navbar-brand page-scroll" target="_blank" href="<?php echo $link_partner_dest; ?>">
                            <img class="img-responsive logo" src="<?php echo $image->getFileImage(Meta::getCompetitionMeta('partner_logo')); ?>" alt="logo" />
                        </a>
                        <a class="navbar-brand page-scroll logo-region-section-mobil" target="_blank" href="<?php echo $link_region_dest; ?>">
                            <img class="img-responsive logo mobile-logo-region" src="<?php echo $image->getFileImage(Meta::getCompetitionMeta('region_logo')); ?>" alt="logo" />
                        </a>
                    <?php } ?>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <?php foreach (Meta::getMenuItems() as $item) { ?>
                            <li>
                                <a class="page-scroll" href="#<?php echo Dnt::name_url($item); ?>"><?php echo $item; ?></a>
                            </li>
                        <?php } ?>
                        <?php if (Meta::getCompetitionMeta('region_logo')) { ?>
                            <li class="logo-region-section-pc">
                                <a class="navbar-brand page-scroll" target="_blank" href="<?php echo $link_region_dest; ?>">
                                    <img class="img-responsive logo" src="<?php echo $image->getFileImage(Meta::getCompetitionMeta('region_logo')); ?>" alt="logo" />
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>

    <!-- modul loader -->
    <?php
    print_r(Meta::getModulItems());
    foreach (Meta::getModulItems() as $modul) {
        getModul(Dnt::name_url($modul), $image, $CAPTCHA, $CAPTCHA_MIN, $CAPTCHA_MAX, $NO_ROBOT, $link_region_dest, $link_region_show, $link_partner_dest, $link_partner_show);
    }
    ?>


    <div style="clear: both"></div>
    <!-- FOOTER -->
    <footer>
        <div class="multipage_footer">
            <div class="footer_top_two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="footer_widget">
                                <h2>MENU</h2>
                                <ul>
                                    <?php foreach (Meta::getMenuItems() as $item) { ?>
                                        <li>
                                            <a class="page-scroll"  href="#<?php echo Dnt::name_url($item); ?>"><?php echo $item; ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="footer_widget">
                                <div class="footer_social_two">
                                    <h2>&nbsp;</h2>
                                    <ul>
                                        <?php if (Meta::getCompetitionMeta('social_fb')) { ?>
                                            <li><a target="_blank" href="<?php echo Meta::getCompetitionMeta('social_fb'); ?>"><i class="fa fa-facebook"></i></a></li>
                                        <?php } ?>
                                        <?php if (Meta::getCompetitionMeta('social_fb')) { ?>
                                            <li><div class="fb-like" data-href="<?php echo Meta::getCompetitionMeta('social_fb'); ?>" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div></li>
                                        <?php } ?>
                                        <?php if (Meta::getCompetitionMeta('social_twitter')) { ?>
                                            <li><a target="_blank" href="<?php echo Meta::getCompetitionMeta('social_twitter'); ?>"><i class="fa fa-twitter"></i></a></li>
                                        <?php } ?>
                                        <?php if (Meta::getCompetitionMeta('social_linked_in')) { ?>
                                            <li><a target="_blank" href="<?php echo Meta::getCompetitionMeta('social_linked_in'); ?>"><i class="fa fa-instagram"></i></a></li>
                                        <?php } ?>
                                        <?php if (Meta::getCompetitionMeta('social_google_plus')) { ?>
                                            <li><a target="_blank" href="<?php echo Meta::getCompetitionMeta('social_google_plus'); ?>"><i class="fa fa-google-plus"></i></a></li>
                                        <?php } ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom_two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="copyright_text_two">
                                <p>All Rights Reserved &copy; <?php echo Dnt::get_rok(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- SCRIPTS -->
    <!-- jQuery -->
    <script src="<?php echo $js_path; ?>/lightbox.js"></script>
    <script src="<?php echo $js_path; ?>/gmap3.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $js_path; ?>/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="<?php echo $js_path; ?>/jquery.easing.min.js"></script>
    <script src="<?php echo $js_path; ?>/jquery.fittext.js"></script>
    <script src="<?php echo $js_path; ?>/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $js_path; ?>/creative.js"></script>
    <script src="<?php echo $js_path; ?>/custom.js"></script>
    <script type='text/javascript' src="<?php echo $js_path; ?>/jquery.validate.js"></script>
</body>