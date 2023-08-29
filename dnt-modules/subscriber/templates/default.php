<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="designdnt">
        <title>Systém | Designdnt</title>
        <link rel="icon" href="<?php echo WWW_PATH_ADMIN_2; ?>img/favicon.ico">
        <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN_2; ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN_2; ?>css/main.css">
        <script>
            function goBack() {
                window.history.back()
            }
        </script>
    </head>
    <style>
        .login .account-wall {font-size: 17px;}
        .login .login-title {font-size: 24px;}
        .login .inner {width:800px;}
        @media screen and (max-width: 992px) {
            .login .inner {width:100%;}
        }
    </style>
    <body class="login">
        <div class="outer">
            <div class="middle">
                <div class="inner" style="width:800px">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="text-center login-title"><?php echo $errTitle; ?></h3>
                            <div class="account-wall text-center">
                                <img class="profile-img" src="<?php echo WWW_PATH_ADMIN_2; ?>img/designdnt_singl_dark.png" alt="">
                                <?php echo $errContent; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>