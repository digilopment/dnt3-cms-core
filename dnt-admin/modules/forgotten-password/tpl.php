<?php get_top(); ?>
<body class="login">
    <div class="outer">
        <div class="middle">
            <div class="inner">
                <div class="row">
                    <!-- BEGIN LOGIN BOX -->
                    <div class="col-lg-12">
                        <h3 class="text-center login-title">Žiadosť o odoslanie nového hesla</h3>
                        <div class="account-wall">
                            <!-- BEGIN PROFILE IMAGE -->
                            <img class="profile-img" src="<?php echo WWW_PATH_ADMIN_2; ?>img/designdnt_singl_dark.png" alt="">
                            <!-- END PROFILE IMAGE -->
                            <!-- BEGIN LOGIN FORM -->
                            <form name="login" action="<?php echo WWW_PATH_ADMIN_2 . 'index.php?src=forgotten-password&action=request'; ?>" method="POST" class="form-login">
                                <input type="text" name="email" class="form-control" placeholder="Váš email" autofocus>
                                <button class="btn btn-lg btn-primary btn-block" name="sent" type="submit">Odoslať žiadosť o nové heslo</button>
                                <label class="checkbox pull-left">
                                        <!--<input type="checkbox" value="remember-me">Remember me-->
                                </label>
                                <a href="http://designdnt.query.sk/" target="_blank" class="pull-right need-help">Potrebujete pomôcť?</a><span class="clearfix"></span>
                            </form>
                            <!-- END LOGIN FORM -->
                        </div>
                        <a href="<?php echo WWW_PATH_ADMIN_2 . 'index.php?src=login'; ?>" class="text-center new-account">Prihlásiť sa</a>
                    </div>
                    <!-- END LOGIN BOX -->
                </div>
            </div>
        </div>
    </div>
    <?php get_bottom(); ?>
