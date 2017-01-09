<?php function get_top(){ ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <![endif]-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Systém | Designdnt</title>
      <link rel="icon" href="<?php echo WWW_PATH_ADMIN; ?>img/favicon.ico">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- BEGIN CSS FRAMEWORK -->
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/font-awesome.min.css">
      <!-- END CSS FRAMEWORK -->
      <!-- BEGIN CSS PLUGIN -->
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/pace-theme-minimal.css">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/jquery.gritter.css">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/bootstrap-datetimepicker.min.css">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/jquery-jvectormap-1.2.2.css">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/blue.css">
      <!-- END CSS PLUGIN -->
      <!-- BEGIN CSS TEMPLATE -->
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/main.css">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/skins.css">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/designdnt.css">
      <!-- END CSS TEMPLATE -->
      <!-- CK EDITOR -->
      <!-- this editor is saved in designdnt library as included module -->
      <script src="../dnt-library/ckeditor/ckeditor.js"></script>
      <!-- END CK EDITOR -->
   </head>
<?php } ?>
<?php function get_bottom(){ ?>
      <script type="text/javascript">
         /* MAGNIFIC POPUP */
         $('.popup-gallery').magnificPopup({
         	delegate: 'a',
         	type: 'image',
         	tLoading: 'Loading image #%curr%...',
         	mainClass: 'mfp-img-mobile',
         	gallery: {
         		enabled: true,
         		navigateByImgClick: true,
         		preload: [0,1] // Will preload 0 - before current, and 1 after the current image
         	},
         	image: {
         		tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
         		titleSrc: function(item) {
         			return item.el.attr('title') + '<small>by Ryan McGuire</small>';
         		}
         	}
         });
      </script>
      <!-- BEGIN JS FRAMEWORK -->
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/jquery-2.1.0.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/bootstrap.min.js"></script>
      <!-- END JS FRAMEWORK -->
      <!-- BEGIN JS PLUGIN -->
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/pace.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/jquery.totemticker.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/jquery.ba-resize.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/jquery.blockUI.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/jquery.gritter.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/jquery.sparkline.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/icheck.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>summernote.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/dnt_custom.js"></script>
      <!--[if lte IE 8]>
      <script language="javascript" type="text/javascript" src="<?php echo WWW_PATH_ADMIN; ?>js/excanvas.min.js"></script>
      <![endif]-->
      <!-- END JS PLUGIN -->
      <!-- BEGIN JS TEMPLATE -->
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/main_system.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/skin-selector.js"></script>
   </body>
</html>
<!-- END JS TEMPLATE -->
<?php } ?>