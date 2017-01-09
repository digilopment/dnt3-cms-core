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
<?php } ?>
<?php function admin_menu(){
   $db = new Db;
   $andWhere = false;
   
   $query = "SELECT * FROM `dnt_admin_menu` WHERE 
   `type` = 'menu' AND 
   `show` = '1' ".$andWhere." AND 
   `vendor_id` = '".VENDOR_ID."' ORDER BY `order`";
   if ($db->num_rows($query) > 0){
   	?>
<ul class="sidebar-menu">
   <?php
      foreach($db->get_results($query) as $row){
      	if($row['name_url'] == "content"){ ?>
   <li class="menu">
      <a href="">
      <i class="fa <?php echo $row['ico'];?>"></i>
      <span><?php echo $row['name'];?></span>
      <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sub-menu">
         <?php
            $query2 = "SELECT * FROM `dnt_post_type` 
            WHERE 
            `show` = '1' AND 
            `included` = 'post' AND 
            `vendor_id` = '".VENDOR_ID."' ORDER BY `order` desc";
            if ($db->num_rows($query2) > 0){
            foreach($db->get_results($query2) as $row2){
            ?>
         <li>
            <a href="<?php echo WWW_PATH_ADMIN."index.php?src=".$row['name_url']."&filter=".$row2['id'];?>">
            <span><?php echo $row2['name'];?></span>
            &nbsp;&nbsp;<i style="text-align: right;" class="fa <?php echo $row2['ico'];?>"></i>
            </a>
         </li>
         <?php
            }
            }
            ?>
      </ul>
   </li>
   <?php
      }
      else{
      ?>
   <!--<li class="<?php if(isset($_GET['src']) && ($_GET['src'] == $row['name_url'])) echo "active"; else echo "menu"; ?>">-->
   <?php
      $query2 = "SELECT * FROM `dnt_admin_menu` 
      WHERE type = 'submenu' AND 
      `show` = '1' AND 
      `name_url` = '".$row['name_url']."' AND
      `vendor_id` = '".VENDOR_ID."' ORDER BY  `order` desc";
      
      if ($db->num_rows($query2) > 0){
      ?>
   <li class="menu">
      <a href="">
      <i class="fa <?php echo $row['ico'];?>"></i>
      <span><?php echo $row['name'];?></span>
      <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sub-menu">
         <?php
            foreach($db->get_results($query2) as $row2){
            ?>
         <li>
            <a href="<?php echo WWW_PATH_ADMIN."index.php?src=".$row2['name_url_sub']."";?>">
            <span><?php echo $row2['name'];?></span>
            &nbsp;&nbsp;<i style="text-align: right;" class="fa <?php echo $row2['ico'];?>"></i>
            </a>
         </li>
         <?php
            }
            ?>
      </ul>
      <?php
         }
         else{
         	?>
		<li class="">
      <a href="<?php echo WWW_PATH_ADMIN."index.php?src=".$row['name_url']."";?>">
      <i class="fa <?php echo $row['ico'];?>"></i>
      <span><?php echo $row['name'];?></span>
      </a>
      <?php
         }
         ?>
   </li>
   <?php
      } //end of main while
      }//end if obsah
      ?>
</ul>
<?php
   } //end of main if
   } ?>
<?php function get_header(){?>
 <header class="header">
         <!-- BEGIN LOGO -->
         <a href="<?php echo WWW_PATH_ADMIN; ?>" class="logo">
            <!--<img src="<?php echo WWW_PATH_ADMIN; ?>img/logo.png" alt="Kertas" height="20">-->
            <h3 style="text-align: left; margin-left: 10px;"><span class="designdnt_a">Design</span><span class="designdnt_b">dnt<big><strong>3</strong></big></span></h3>
         </a>
         <!-- END LOGO -->
         <!-- BEGIN NAVBAR -->
         <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars fa-lg"></span>
            </a>
            <!-- BEGIN NEWS TICKER -->
            <div class="ticker">
               <strong>Novinky:</strong>
               <ul>
                  <li>Designdnt 3 - nový Redakčný systém, ktorý komunikuje</li>
                  <li><a target="_blank" href="http://query.sk/">TheQuery</a></li>
                  <li><a target="_blank" href="http://designdnt.query.sk/kontakt/">Pomoc s ovládaním Designdnt3</a></li>
               </ul>
            </div>
            <!-- END NEWS TICKER -->
            <div class="navbar-right">
               <ul class="nav navbar-nav">
                  <!-- NOTIFIKACIE KOMENTAROV -->
                  <li class="dropdown navbar-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa-comments fa-lg"></i>
                     </a>
                     <ul class="dropdown-menu box inbox">
                        <li>
                           <div class="up-arrow"></div>
                        </li>
                        <li>
                           <p>Žiadne nové komentáre</p>
                        </li>
                     </ul>
                  </li>
                  <!-- END NOTIFIKACIE KOMENTAROV -->
                  <li class="dropdown navbar-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa-paper-plane-o fa-lg"></i>
                     </a>
                     <ul class="dropdown-menu box inbox">
                        <li>
                           <div class="up-arrow"></div>
                        </li>
                        <li>
                           <p>Žiadne nové správy</p>
                        </li>
                     </ul>
                  </li>
                  <!-- NOTIFIKACIA USERS-->
                  <li class="dropdown navbar-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa-user fa-lg"></i>
                     </a>
                     <ul class="dropdown-menu box inbox">
                        <li>
                           <div class="up-arrow"></div>
                        </li>
                        <li>
                           <p>Žiadni noví používatelia / zákazníci</p>
                        </li>
                     </ul>
                  </li>
                 
                  <li class="dropdown profile-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa-cog fa-lg"></i>
                     <span class="username"><?php echo AdminUser::data("name")." ".AdminUser::data("surname"); ?></span>
                     <i class="caret"></i>
                     </a>
                     <ul class="dropdown-menu box profile">
                        <li>
                           <div class="up-arrow"></div>
                        </li>
                        <li class="border-top">
                           <a href="index.php?src=pristupy&upravit&id=1"><i class="fa fa-user"></i>Môj účet</a>
                        </li>
                        <li>
                           <a href="index.php?src=content&add"><i class="fa fa-laptop"></i>Pridať post</a>
                        </li>
                        <li >
                           <a href="index.php?src=settings&pa=1"><i class="fa fa-gears"></i>Nastavenia stránky</a>
                        </li>
                        <li >
                           <a href="index.php?src=settings&pa=2"><i class="fa fa-gears"></i>Nastavenia vlastníctva</a>
                        </li>
                        <li >
                           <a href="index.php?src=settings&pa=4"><i class="fa fa-gears"></i>Nastavenia loga</a>
                        </li>
                        <li>
                           <a href="index.php?src=mailer">
                              <i class="fa fa-inbox"></i>Napísať email<!--<span class="badge">3</span>-->
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=logout"><i class="fa fa-power-off"></i>Odhlásiť sa</a>
                        </li>
                     </ul>
                  </li>
               </ul>
         </nav>
         <!-- END NAVBAR -->
      </header>
<?php } ?>