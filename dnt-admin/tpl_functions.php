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
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- END CSS FRAMEWORK -->
      <!-- BEGIN CSS PLUGIN -->
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/pace-theme-minimal.css">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/jquery.gritter.css">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/bootstrap-datetimepicker.css">
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
      <!--<script src="<?php echo WWW_PATH_ADMIN; ?>summernote.min.js"></script>-->
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/dnt_custom.js"></script>
      <!--[if lte IE 8]>
      <script language="javascript" type="text/javascript" src="<?php echo WWW_PATH_ADMIN; ?>js/excanvas.min.js"></script>
      <![endif]-->
      <!-- END JS PLUGIN -->
      <!-- BEGIN JS TEMPLATE -->
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/main_system.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/skin-selector.js"></script>
	  
	  <script src="<?php echo WWW_PATH_ADMIN; ?>js/moment-with-locales.js"></script>
	  <script src="<?php echo WWW_PATH_ADMIN; ?>js/bootstrap-datetimepicker.js"></script>
      <!-- END CK EDITOR -->
   </head>
<?php } ?>
<?php function errorAccess($errTitle, $errContent){ ?>
<!DOCTYPE html>
<html lang="sk">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="designdnt">
      <title>Systém | Designdnt</title>
      <link rel="icon" href="<?php echo WWW_PATH_ADMIN; ?>img/favicon.ico">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/main.css">
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
						<h3 class="text-center login-title"><?php echo $errTitle;?></h3>
						<div class="account-wall text-center">
							<img class="profile-img" src="<?php echo WWW_PATH_ADMIN; ?>img/designdnt_singl_dark.png" alt="">
							<?php echo $errContent;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
   </body>
</html>
<?php } ?>
<?php function getLangNavigation(){ ?>
 <ul class="nav nav-tabs">
   <li class="active"><a href="#home-lang" data-toggle="tab">Defaultný jazyk</a></li>
   <?php 
   $db 	= new Db;
   $multylanguages 	= new MultyLanguage;
    $query 	= $multylanguages->getLangs();
	if($db->num_rows($query)>0){
	   foreach($db->get_results($query) as $row){
		   echo '<li class=""><a href="#lang-'.$row['slug'].'" data-toggle="tab">'.$row['name'].'</a></li>';
		} 
	} 
	?>
 </ul>
<?php } ?>
<?php function contentLanguagesVariations(){ ?>
 <?php 
   $db 		= new Db;
   $rest 	= new Rest;
   $id 		=  $rest->get('post_id');
   $multylanguages 	= new MultyLanguage;
   $query 	= $multylanguages->getLangs();
	if($db->num_rows($query)>0){
	   foreach($db->get_results($query) as $row){
		   
$name = $multylanguages->getTranslateLang(array("type" => "name", "lang_id" => $row['slug'], "translate_id" => $id, "table" => "dnt_posts"));
$name_url = $multylanguages->getTranslateLang(array("type" => "name_url", "lang_id" => $row['slug'], "translate_id" => $id, "table" => "dnt_posts"));
$content = $multylanguages->getTranslateLang(array("type" => "content", "lang_id" => $row['slug'], "translate_id" => $id, "table" => "dnt_posts"));
$perex = $multylanguages->getTranslateLang(array("type" => "perex", "lang_id" => $row['slug'], "translate_id" => $id, "table" => "dnt_posts"));
$tags = $multylanguages->getTranslateLang(array("type" => "tags", "lang_id" => $row['slug'], "translate_id" => $id, "table" => "dnt_posts"));

$name_name = "name_".$row['slug'];
$name_url_name = "name_url_".$row['slug'];
$name_tags = "name_tags_".$row['slug'];
$content_name = "name_content_".$row['slug'];
$perex_name = "name_perex_".$row['slug'];
?>
<div class="tab-pane" id="lang-<?php echo $row['slug'] ?>">
   <p class="lead dnt_bold">
      <span class="dnt_lang"><?php echo $row['name'] ?></span>
   </p>
   <br/>
   <div class="row">
      <div class="form-group">
         <div class="form-group">
            <label class="col-sm-2 control-label text-left"><b>Post Name:</b></label>
            <div class="col-sm-10">
               <input type="text" name="<?php echo $name_name; ?>" value="<?php echo $name;?>" class="form-control" placeholder="Názov:" minlength="2"  >
               <br/>
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-2 control-label text-left"><b>URL Address:</b></label>
            <div class="col-sm-10">
               <input type="text" name="<?php echo $name_url_name; ?>" value="<?php echo $name_url;?>" class="form-control" placeholder="Url:">
               <br/>
            </div>
         </div>
         <?php /*<div style="text-align: left;">
            <h3>Prílohy</h3>
            <input type="text" name="embed" value="<?php echo $embed;?>" class="form-control" placeholder="Prílohy:">
         </div>*/?>
         <div style="text-align: left;">
            <h3>Tags</h3>
            <input type="text" name="<?php echo $name_tags; ?>" value="<?php echo $tags; ?>" class="form-control" placeholder="Tags">
         </div> 
         <div id="click2edit" style="min-height: 495px;" >
            <div style="text-align: left;">
               <h3>Perex</h3>
            </div>
            <textarea name="<?php echo $perex_name; ?>" class="ckeditor" style="width: 100%; min-height: 200px;"><?php echo $perex;?></textarea>
            <div style="text-align: left;">
               <h3>Content</h3>
            </div>
            <textarea name="<?php echo $content_name; ?>" class="ckeditor" style="min-height: 495px;"><?php echo $content;?></textarea>
         </div>
         <br/>
      </div>
   </div>
   <br/>
</div>
<?php
		} 
	} 
	?>
<?php } ?>
<?php function get_bottom(){ ?>
      <script type="text/javascript">
         /* MAGNIFIC POPUP */
         /*$('.popup-gallery').magnificPopup({
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
         });*/
      </script>
     
   </body>
</html>
<?php } ?>
<?php function admin_menu(){
   $db = new Db;
   $admin = new AdminUser;
   $andWhere = false;
   
   $query = "SELECT * FROM `dnt_admin_menu` WHERE 
   `type` = 'menu' AND 
   `show` = '1' ".$andWhere." AND 
   `vendor_id` = '".Vendor::getId()."' ORDER BY `order`";
   if ($db->num_rows($query) > 0){
   	?>
<ul class="sidebar-menu">
   <?php
      foreach($db->get_results($query) as $row){
if($row['name_url'] == "content"){ 
	$included = $row['included'];
?>
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
            `admin_cat` = '".$row['included']."' AND 
            `vendor_id` = '".Vendor::getId()."' ORDER BY `order` desc";
            if ($db->num_rows($query2) > 0){
            foreach($db->get_results($query2) as $row2){
            ?>
			 <li>
				<a href="<?php echo WWW_PATH_ADMIN."index.php?src=".$row['name_url']."&included=".$row2['admin_cat']."&filter=".$row2['id_entity'];?>">
			<span><?php echo $row2['name'];?> - <small>(<?php echo $row2['id_entity'];?>)</small></span>
				&nbsp;&nbsp;<i style="text-align: right;" class="fa fa-laptop"></i>
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
	  elseif($row['name_url'] == "access"){ 
	  ?>
	  	 <li class="menu">
      <a href="">
      <i class="fa <?php echo $row['ico'];?>"></i>
      <span><?php echo $row['name'];?></span>
      <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sub-menu">
		<li>
            <a href="<?php echo WWW_PATH_ADMIN."index.php?src=".$row['name_url'];?>" >
            <span>Všetci používatelia</span>
            &nbsp;&nbsp;<i style="text-align: right;" class="fa "></i>
            </a>
         </li>
		 <li>
            <a href="<?php echo WWW_PATH_ADMIN."index.php?src=".$row['name_url']."&action=add";?>" >
            <span>Pridať používatelia</span>
            &nbsp;&nbsp;<i style="text-align: right;" class="fa "></i>
            </a>
         </li>
         <!--<?php
            //$admin->getUserColumns();
            foreach($admin->getUserTypes() as $row2){
            ?>
			 <li>
				<a href="<?php echo WWW_PATH_ADMIN."index.php?src=".$row['name_url']."&type=".$row2['name_url'];?>">
				<span><?php echo $row2['name'];?></span>
				&nbsp;&nbsp;<i style="text-align: right;" class="fa fa-laptop"></i>
				</a>
			 </li>
         <?php
            }
            ?>-->
      </ul>
   </li>
	<?php		
	  //getUserColumns()
	  }
	  

      else{
      ?>
   <?php
      $query2 = "SELECT * FROM `dnt_admin_menu` 
      WHERE type = 'submenu' AND 
      `show` = '1' AND 
      `name_url` = '".$row['name_url']."' AND
      `vendor_id` = '".Vendor::getId()."' ORDER BY  `order` desc";
      
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
                     <span class="username"><?php echo AdminUser::data("admin", "name")." ".AdminUser::data("admin", "surname"); ?></span>
                     <i class="caret"></i>
                     </a>
                     <ul class="dropdown-menu box profile">
                        <li>
                           <div class="up-arrow"></div>
                        </li>
                        <li class="border-top">
                           <a href="index.php?src=access&action=edit&post_id=<?php echo AdminUser::data("admin", "id")."";?>"><i class="fa fa-user"></i>Môj účet</a>
                        </li>
                        <?php /*<li>
                           <a href="index.php?src=content&add"><i class="fa fa-laptop"></i>Pridať post</a>
                        </li> */?>
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
                              <i class="fa fa-inbox"></i>Odoslať email<!--<span class="badge">3</span>-->
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
<?php function getConfirmMessage($kam_presmerovat, $hlaska){?>
<div class="row" style="padding: 0px 30px;">
	<div class="grid">
		<div class="grid-header bg-green">
			<i class="fa fa-laptop"></i>
			<span class="grid-title">Gratulujeme! Údaje sa úspešne zmenili.</span>
			<div class="pull-right grid-tools">
				<a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
				<a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
			</div>
		</div>
		<div class="grid-body">
			<h3>V poriadku! <?php echo $hlaska; ?></h3>
				<br/>
			<br/><br/>
			<p>
				<a href="<?php echo $kam_presmerovat;?>"><span type="button" class="btn btn-success">Naspäť</span></a>
			</p>
		</div>
	</div>
</div>
<?php } ?>
<?php
function error_message($nazov_pola, $volitelne_pole){
	if($volitelne_pole == false){
		$volitelne_pole = false;
		}
	else{
		$volitelne_pole = $volitelne_pole;
		}
?>
<div class="row" style="padding: 0px 30px;">
	<div class="grid">
		<div class="grid-header bg-red">
			<i class="fa fa-laptop"></i>
			<span class="grid-title">Hups, niečo je zle &nbsp;&nbsp;<i class="fa fa-meh-o"></i></span>
			<div class="pull-right grid-tools">
				<a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
				<a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
			</div>
		</div>
		<div class="grid-body">
			<h3>Ľutujeme, ale pole <b><?php echo $nazov_pola;?></b> je zle vyplnené. Prosím opravte chybu a akciu zopakujte.
				<br/>
				<br/>( <?php echo $volitelne_pole ;?> )
				</h3>
			<br/><br/>
			<p>
				<a href="javascript:history.back(1)"><span type="button" class="btn btn-danger">Opraviť</span></a>
			</p>
		</div>
	</div>
</div>
<?php
}
function error_message_default($message){

?>
<div class="row" style="padding: 0px 30px;">
	<div class="grid">
		<div class="grid-header bg-red">
			<i class="fa fa-laptop"></i>
			<span class="grid-title">Hups, niečo je zle &nbsp;&nbsp;<i class="fa fa-meh-o"></i></span>
			<div class="pull-right grid-tools">
				<a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
				<a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
			</div>
		</div>
		<div class="grid-body">
			<h3><b><?php echo $message;?></b>
				<br/>
				</h3>
			<br/><br/>
			<p>
				<a href="javascript:history.back(1)"><span type="button" class="btn btn-danger">Naspäť</span></a>
			</p>
		</div>
	</div>
</div>
<?php
}
function deleteMssage($presmeruj, $volitelne_pole){
	if($volitelne_pole == false){
		$volitelne_pole = false;
		}
	else{
		$volitelne_pole = "( ".$volitelne_pole." )";
	}
?>
<div class="row" style="padding: 0px 30px;">
	<div class="grid">
		<div class="grid-header bg-red">
			<i class="fa fa-laptop"></i>
			<span class="grid-title">Rozhodli ste sa <b>zmazať</b> túto položku? &nbsp;&nbsp;</span>
			<div class="pull-right grid-tools">
				<a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
				<a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
			</div>
		</div>
		<div class="grid-body">
			<h3>Pozor, klikli ste na tlačídlo <b>zmazať</b>. Naozaj chcete pokračovať a zmazať danú položku?
				<br/>Zmeny už nie je možné vrátiť späť.
				<br/> <?php echo $volitelne_pole ;?>
				</h3>
			<br/><br/>
			<p>
				<a href="javascript:history.back(1)"><span type="button" class="btn btn-danger">Vrátiť sa späť</span></a>
				<a href="<?php echo $presmeruj;?>"><span type="button" class="btn btn-default">Zmazať navždy</span></a>
			</p>
		</div>
	</div>
</div>
<?php
}
?>
<?php function no_results(){?>
<tr>
	<td colspan="20" style="text-align: center;">
		<h3>Ľutujeme, ale pre toto zobrazenie neexistujú žiadne výsledky</h3>
	</td>
</tr>
<?php } ?>
<?php
function admin_zobrazenie_stav($zobrazenie){
	if ($zobrazenie == 1)
		$return = "fa fa-arrow-right bg-green action";
	elseif ($zobrazenie == 2){
		$return = "fa fa-arrow-down bg-blue action";
	}
	else{
		$return = "fa fa-times bg-red action";
		}
	return $return;
	}
function getParamUrl(){
	$adresa = explode("?", WWW_FULL_PATH);
	if(isset($_GET['page'])){
		$adresa_bez_page = explode("&page=".$_GET['page']."", $adresa[1]); //src=obsah&page=2
		return $adresa_bez_page[0];
	}
	else{
		return $adresa[1]; //this function return an array
	}
}
?>
<?php
function get_typ_zaradenie($cat_id, $sub_cat_id, $type){
$db = new Db;	
?>
	<h5>Zaradenie postu v rámci typu:<br/></h5>
	<select name="type" id="cname" class="form-control" minlength="2" required style="">
	<?php 
		   foreach(AdminContent::primaryCat() as $key => $value){
			   if($key == $type)
				echo '<option value="'.$key.'" selected>'.$value.'</option>';
			   else
				echo '<option value="'.$key.'">'.$value.'</option>';
			}
	   ?>
	</select>
	<br/>
	
	<h5>Zaradenie postu v rámci kategórie:<br/></h5>
	<select name="cat_id" id="cname" class="form-control" minlength="2" required style="">
	<?php 
	   
	   echo '<option value="">(nezaradené)</option>';
	   foreach(AdminContent::primaryCat() as $key => $value){
	   $query = "SELECT * FROM `dnt_post_type` WHERE 
	   `show` = '1'  AND 
	   `vendor_id` = '".Vendor::getId()."' AND 
	   `admin_cat` = '".$key."'";
	   
	    if($db->num_rows($query)>0){
		   foreach($db->get_results($query) as $row){
			   if($row['id_entity'] == $cat_id)
				echo '<option value="'.$row['id_entity'].'" selected>'.$value.' -> '.$row['name'].'</option>';
			   else
				echo '<option value="'.$row['id_entity'].'">'.$value.' -> '.$row['name'].'</option>';
			}
	   }
	   else{
			echo '<option value="page">Hlavná kategória</option>';
	   }
	   }
	   ?>
	</select>
	<br/>
	
	<h5>Zaradenie substránky:<br/></h5>
	<select name="sub_cat_id" id="cname" class="form-control">
	<?php 
	echo '<option value="">(nezaradené)</option>';
	   foreach(AdminContent::primaryCat() as $key => $value){
	   $query = "SELECT * FROM `dnt_posts` WHERE 
	   `show` = '1'  AND 
	   `vendor_id` = '".Vendor::getId()."' AND 
	   `cat_id` = '".AdminContent::getCatId($key)."'";
	   if($key == "sitemap"){
	   if($db->num_rows($query)>0){
		   foreach($db->get_results($query) as $row){
			if($sub_cat_id == $row['id_entity'])
				echo '<option value="'.$row['id_entity'].'" selected>'.$value.' -> '.$row['name'].'</option>';
			else
				echo '<option value="'.$row['id_entity'].'">'.$value.' -> '.$row['name'].'</option>';
			}

	   }else{
		//echo '<option value="page">Stránka</option>';
		}
	  }elseif($key == "article"){
		   $query = "SELECT * FROM `dnt_post_type` WHERE 
		   `show` = '1'  AND 
		   `vendor_id` = '".Vendor::getId()."' AND 
		   `admin_cat` = 'article'";
		  if($db->num_rows($query)>0){
		   foreach($db->get_results($query) as $row){
			if($sub_cat_id == $row['id_entity'])
				echo '<option value="'.$row['id_entity'].'" selected>'.$value.' -> '.$row['name'].'</option>';
			else
				echo '<option value="'.$row['id_entity'].'">'.$value.' -> '.$row['name'].'</option>';
			}

	   }else{
		   //echo '<option value="page">Stránka</option>';
		}
	  }
	}
	   ?>
	</select>
	<br/>
<?php
   }
?>
<?php
function getZobrazenie($stav){
		foreach (Settings::showStatus() as $key => $value) {
			if($stav == $key)
				echo "<option value='".$key."' selected>".$value."</option>"; 
			else
				echo "<option value='".$key."'>".$value."</option>"; 
		}
}
function tpl_sending_mails($to_finish, $sender_email, $next_id){
get_top();

echo '
<body class="error">
  <div class="outer">
	<div class="middle">
		<div class="inner">
			<div class="row">
				<!-- BEGIN ERROR PAGE -->
				<div class="col-lg-12">
					<!-- BEGIN ERROR -->
					<div class="circle">
						<i class="fa fa-chain-broken bg-blue"></i>
					<span>'.$to_finish.'</span>
					</div>
					<!-- END ERROR -->
					<!-- BEGIN ERROR DESCRIPTION -->
					<span class="status">...emailov ešte musím odoslať</span>
					<span class="detail">Teraz odosielam na adresu: 
						<b><a href="mailto:'.$sender_email.'" target="_blank">'.$sender_email.'</a></b>
					</span>
					<!-- END ERROR DESCRIPTION -->
				</div>
				<!-- END ERROR PAGE -->
			</div>
		</div>
	</div>
  </div>
</div>
<!--<meta http-equiv="refresh" content="2;url='.Rest::setGet(array("mail_id" => $next_id)).'">-->
<meta http-equiv="refresh" content="2;url='.AdminMailer::sent_next_mail($next_id).'">
';
get_bottom();
}
function tpl_sending_finish($sending_mail){
get_top();
	echo '
<body class="error">
  <div class="outer">
	<div class="middle">
		<div class="inner">
			<div class="row">
				<!-- BEGIN ERROR PAGE -->
				<div class="col-lg-12">
					<!-- BEGIN ERROR -->
					<div class="circle">
						<i class="fa fa-chain-broken bg-blue"></i>
					<span>'.$sending_mail .'</span>
					</div>
					<!-- END ERROR -->
					<!-- BEGIN ERROR DESCRIPTION -->
					<span class="status">mailov bolo úspešne odoslaných</span>
					<br/>
					<a href="'.WWW_PATH_ADMIN.'?src=mailer">Domov</a>
					<!-- END ERROR DESCRIPTION -->
				</div>
				<!-- END ERROR PAGE -->
			</div>
		</div>
	</div>
  </div>
</div>

';
get_bottom();
}
?>
<?php function galleryChooser($keyId){ 
	$rest 	= new Rest;
	$db 	= new Db;
	$image 	= new Image;
	?>   
	
<link rel="stylesheet" type="text/css" href="<?php echo WWW_PATH_ADMIN; ?>css/image-picker.css">

<script src="<?php echo WWW_PATH_ADMIN; ?>js/prettify.js" type="text/javascript"></script>
<script src="<?php echo WWW_PATH_ADMIN; ?>js/jquery.masonry.min.js" type="text/javascript"></script>
<script src="<?php echo WWW_PATH_ADMIN; ?>js/image-picker.js" type="text/javascript"></script>

<div class="modal fade dnt-gallery-chooser" id="image_picker_<?php echo $keyId; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="modalLabelSmall">Media Library</h4>
         </div>
         <div class="modal-body">
          <div class="picker">
               <select name="gallery" id="gallery_key_<?php echo $keyId; ?>_s" class="image-picker show-html" data-limit="10" multiple="multiple" 
			   style="display:nones;" >
				<?php
				  $query = FileAdmin::query();
                  if($db->num_rows($query)>0){
                  	foreach($db->get_results($query) as $row){
						
						if(Dnt::in_string("image", $row['type'])){ 
							echo '<option data-img-src="'.$image->getFileImage($row['id_entity']).'" value="'.$row['id_entity'].'">Cute Kitten 1</option>';
						}
					}
				  }
				  ?>
               </select>
			   <input type="hidden" name="gallery_key_<?php echo $keyId; ?>" id="gallery_key_<?php echo $keyId; ?>">
            </div>
			<span id="save_<?php echo $keyId; ?>" data-dismiss="modal" aria-label="Close" class="btn center-block clode btn-success" style="width:150px;">Uložiť</span>
            <script type="text/javascript">
               $("#image_picker_<?php echo $keyId; ?> select.image-picker").imagepicker({
                 hide_select:  true,
               });
               
              /* $("select.image-picker.show-labels").imagepicker({
                 hide_select:  true,
                 show_label:   true,
               });
               
               $("#image_picker_<?php echo $keyId; ?> select.image-picker.limit_callback").imagepicker({
                 limit_reached:  function(){alert('We are full!')},
                 hide_select:    false
               });*/
               
               var container = $("#image_picker_<?php echo $keyId; ?> select.image-picker.masonry").next("ul.thumbnails");
               container.imagesLoaded(function(){
                 container.masonry({
                   itemSelector:   "li",
                 });
               });
			   
			   $( document ).ready(function() {
				   $( "#gallery_key_<?php echo $keyId; ?>_s" ).change(function() {
					var selectedValues = $('#gallery_key_<?php echo $keyId; ?>_s').val();
					$( "#save_<?php echo $keyId; ?>" ).click(function() {
						$( "#gallery_key_<?php echo $keyId; ?>" ).val(selectedValues);
					});
					});
				});
            </script>
         </div>
      </div>
   </div>
</div>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#image_picker_<?php echo $keyId; ?>">
Vybrať súbory z galérie
</button>
<?php } ?>
