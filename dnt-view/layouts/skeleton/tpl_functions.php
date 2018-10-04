<?php
function get_top($data){
?>	
<!DOCTYPE html>
<!--[if IE 9]> <html lang="sk" class="ie9"> <![endif]-->
<!--[if !IE]><!--> 
<html lang="sk"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
        <title><?php echo $data['title'];?></title>
		

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<?php 
	if(isset($data['meta'])){
		foreach($data['meta'] as $meta){
			echo $meta;
		}
	}
	?>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $data['media_path']; ?>img/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $data['media_path']; ?>img/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $data['media_path']; ?>img/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $data['media_path']; ?>img/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $data['media_path']; ?>img/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $data['media_path']; ?>img/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $data['media_path']; ?>img/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $data['media_path']; ?>img/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $data['media_path']; ?>img/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $data['media_path']; ?>img/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $data['media_path']; ?>img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $data['media_path']; ?>img/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $data['media_path']; ?>img/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo $data['media_path']; ?>img/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo $data['media_path']; ?>img/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">




	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700'>

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/blog.style.css">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/header-v8.css?<?php echo rand(10, 1000)?>">
	<link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/footer-v8.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/animate.css">
	<link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/line-icons.css">
	<link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/jquery.fancybox.css">
	<link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/style.css">
	<link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/masterslider.css">
	<link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/default.style.css">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/default.colors.css" id="style_color">
	<link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/dark.css">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/custom.css?<?php echo rand(10, 1000)?>">
	<link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/green.css">
	<script src="<?php echo $data['media_path']; ?>js/jquery.min.js"></script>
	<script src="<?php echo $data['media_path']; ?>js/jquery.validate.js"></script>
</head>
<?php } ?>
<?php
function get_bottom($data){
	?>
<!-- JS Global Compulsory -->
<script src="<?php echo $data['media_path']; ?>js/jquery-migrate.min.js"></script>
<script src="<?php echo $data['media_path']; ?>js/bootstrap.min.js"></script>


<!-- JS Implementing Plugins -->
<script src="<?php echo $data['media_path']; ?>js/back-to-top.js"></script>
<script src="<?php echo $data['media_path']; ?>js/smoothScroll.js"></script>
<script src="<?php echo $data['media_path']; ?>js/waypoints.min.js"></script>
<script src="<?php echo $data['media_path']; ?>js/jquery.counterup.min.js"></script>
<script src="<?php echo $data['media_path']; ?>js/jquery.fancybox.pack.js"></script>
<script src="<?php echo $data['media_path']; ?>js/owl.carousel.js"></script>
<script src="<?php echo $data['media_path']; ?>js/masterslider.js"></script>
<script src="<?php echo $data['media_path']; ?>js/jquery.easing.min.js"></script>
<script src="<?php echo $data['media_path']; ?>js/modernizr.js"></script>
<script src="<?php echo $data['media_path']; ?>js/main.js"></script> <!-- Gem jQuery -->
<script src="<?php echo $data['media_path']; ?>js/cookies.js"></script> <!-- Gem jQuery -->

<!-- JS Customization -->
<script src="<?php echo $data['media_path']; ?>js/custom.js"></script>
<!-- JS Page Level -->


<script src="<?php echo $data['media_path']; ?>js/app.js"></script>
<script src="<?php echo $data['media_path']; ?>js/fancy-box.js"></script>
<script src="<?php echo $data['media_path']; ?>js/owl-carousel.js"></script>
<script src="<?php echo $data['media_path']; ?>js/master-slider-showcase1.js"></script>
<script src="<?php echo $data['media_path']; ?>js/style-switcher.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function() {
		App.init();
		App.initCounter();
		FancyBox.initFancybox();
		OwlCarousel.initOwlCarousel();
		OwlCarousel.initOwlCarousel2();
		StyleSwitcher.initStyleSwitcher();
		MasterSliderShowcase1.initMasterSliderShowcase1();
	});
</script>
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->
</body>
</html>
<?php } ?>
<?php
function get_top_lista($data){
$multylanguage 	= new MultyLanguage;
$db 			= new Db;
$translate['home'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "home"));
$translate['hladat'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "hladat"));
$translate['prihlasit'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "prihlasit"));
?>
<div class="blog-topbar">
	<div class="topbar-search-block">
		<div class="container">
			<form action="<?php echo WWW_PATH."search" ?>">
				<input type="text" name="q" class="form-control" placeholder="<?php echo $translate['hladat'];?>">
				<div class="search-close"><i class="fa fa-times" aria-hidden="true"></i></div>
			</form>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-xs-8">
			
				<div class="jazyky">
			 <ul>
				<?php 
				  $query = $multylanguage->getLangs(true);
				 if($db->num_rows($query)>0){
					 foreach($db->get_results($query) as $row){
					 if($row['slug'] == DEAFULT_LANG){
						 $lang = "";
					 }else{
						 $lang = $row['slug'];
					 }
				   ?>
				<li>
				   <a href="<?php echo MultyLanguage::changeLanguage($lang)?>" >
				   <img src="<?php echo WWW_PATH_ADMIN."img/flags/".$row['img']; ?>" alt="<?php echo $row['name']; ?>"></a>
				</li>
				<?php
				   }
				   }
				   ?>
			 </ul>
		  </div>
			</div>
			<div class="col-sm-4 col-xs-4 clearfix">
				<i class="fa fa-search search-btn pull-right"></i>
				<ul class="topbar-list topbar-log_reg pull-right visible-sm-block visible-md-block visible-lg-block">
					<li class="cd-log_reg home"><a class="cd-signin" href="javascript:void(0);"><?php echo $translate['prihlasit'];?></a></li>
				</ul>
			</div>
		</div><!--/end row-->
	</div><!--/end container-->
</div>
		<!-- End Topbar blog -->
<?php } ?>
<?php function get_nav_menu($data){ 
   $multylanguage 	= new MultyLanguage;
   $article 		= new ArticleView;
   $rest 		= new Rest;
   $db 			= new Db;
   ?>	
<!-- Navbar -->
<div class="navbar mega-menu" role="navigation">
   <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="res-container">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         </button>
         <div class="navbar-brand">
            <a href="<?php echo Url::get("WWW_PATH")?>">
            <img class="logo" src="<?php echo Settings::getImage("logo_firmy");?>" alt="Logo">
            </a>
         </div>
      </div>
      <!--/end responsive container-->
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-responsive-collapse">
         <div class="res-container">
            <ul class="nav navbar-nav">
               <!-- Home -->
              <?php 
				foreach(Navigation::getParents() as $row){ 
				$name_url_1 = $article->getPostParam("name_url", $row['id_entity'], false);
				?>
				<li class="dropdown home <?php if($article->getPostParam("name_url", $row['id_entity']) == $rest->webhook(1)){echo "active";}?> ">
                  <?php if($row['name_url'] == "no_url"){ ?>
                  <a><?php echo $article->getPostParam("name", $row['id_entity']);?></a>
                  <?php }else{?>
                  <a  href="<?php echo $name_url_1;?>"><?php echo  $article->getPostParam("name", $row['id_entity']);?></a>
                  <?php } ?>
                  <?php  if(Navigation::hasChild($row['id_entity'])){ ?>
                  <ul class="dropdown-menu">
                     <?php   
						foreach(Navigation::getChildren($row['id_entity']) as $row2){ 
						$name_url_2 = $article->getPostParam("name_url", $row2['id_entity'], false);
					 ?>
                     <li class="<?php if($article->getPostParam("name_url", $row['id_entity']) == $rest->webhook(1)){echo "active";}?>"><a href="<?php echo $name_url_2;?>"><?php echo $article->getPostParam("name", $row2['id_entity']);?></a></li>
                     <?php } ?>
                  </ul>
                  <?php } ?>
               </li>
			<?php } ?>
            </ul>
         </div>
         <!--/responsive container-->
      </div>
      <!--/navbar-collapse-->
   </div>
   <!--/end contaoner-->
</div>
<!-- End Navbar -->
<?php } ?>
<?php 
function get_footer($data){ 
$multylanguage 	= new MultyLanguage;
$translate['kontakt'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "kontakt"));
$translate['ustredie'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "ustredie"));
$translate['tel_c'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "tel_c"));
$translate['email'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "email"));
$translate['socialne_siete'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "socialne_siete"));
?>
<!--=== Footer v8 ===-->
<div class="footer-v8">
   <footer class="footer">
      <div class="container">
         <div class="row">
            <div class="col-md-9 col-sm-6 column-one md-margin-bottom-50">
               <h2><?php echo $translate['kontakt']; ?></h2>
               <div class="row">
                  <div class="col-md-3">
                     <span>Osmos Bratislava</span>
                     <p><?php echo $translate['ustredie'];?>:</p>
                     <hr/>
                  </div>
                  <div class="col-md-3">
                     <span><?php echo $translate['tel_c']; ?>:</span>
                     <p><?php echo $data['meta_settings']['keys']['vendor_tel']['value']; ?></p>
                     <hr/>
                  </div>
                  <div class="col-md-3">
                     <span><?php echo $translate['email']; ?>:</span>
                     <a href="mailto:<?php echo $data['meta_settings']['keys']['vendor_email']['value']; ?>"><?php echo $data['meta_settings']['keys']['vendor_email']['value']; ?></a>
                     <hr/>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-6">
               <h2><?php echo $translate['socialne_siete'];?></h2>
               <!-- Social Icons -->
               <ul class="social-icon-list margin-bottom-20">
                  <li><a target="_blank" href="<?php echo  $data['meta_settings']['keys']['facebook_page']['value']; ?>"><i class="rounded-x fa fa-facebook"></i></a></li>
                  <li><a target="_blank" href="#"><i class="rounded-x fa fa-linkedin"></i></a></li>
               </ul>
               <!-- End Social Icons -->
            </div>
         </div>
         <!--/end row-->
      </div>
      <!--/end container-->
   </footer>
   <footer class="copyright">
      <div class="container">
         <ul class="list-inline terms-menu">
            <li>2016 &copy; All Rights Reserved.</li>
            <li class="home"><a href="http://designdnt.query.sk/" target="_blank">Vytvorené v redakčnom systéme</a></li>
            <li><a href="http://designdnt.query.sk/" target="_blank">Designdnt3</a></li>
         </ul>
      </div>
      <!--/end container-->
   </footer>
</div>
<!--=== End Footer v8 ===-->
<?php } ?>
<?php
function col_right($data){
$article = new ArticleView;
$multylanguage 	= new MultyLanguage;
$translate['dalsie_informacie'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "dalsie_informacie"));
$translate['dalsie_moznosti'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "dalsie_moznosti"));
	?>
   <!-- Blog Thumb v3 -->
   <div class="margin-bottom-50 dalsie-info">
      <h2 class="title-v4 "><?php echo $translate['dalsie_informacie'];?></h2>
      <div class="blog-thumb-v3">
	  
		<ul class="col-right pdc">
			<!-- vyskum a vyvoj --> 
			<li class="l"><a href="<?php echo $article->getPostParam("name_url", 13071, true); ?>"><?php echo $article->getPostParam("name", 13071); ?></a></li>
            
			<!-- vyskum a vyvoj --> 
			<li class=""><a href="<?php echo $article->getPostParam("name_url", 13075, true); ?>"><?php echo $article->getPostParam("name", 13075); ?></a></li>
            
			<!-- kontakt <i class="fa fa-phone fa-1x dnt_custom_ico"></i> -->
			<li class=""><a href="<?php echo $article->getPostParam("name_url", 13058, true); ?>"><?php echo $article->getPostParam("name", 13058); ?></a></li>
			
			<!-- partneri --> 
			<li class=""><a href="<?php echo $article->getPostParam("name_url", 13056, true); ?>"><?php echo $article->getPostParam("name", 13056); ?></a></li>
            
			<!-- kariera --> 
			<li class=""><a href="<?php echo $article->getPostParam("name_url", 13057, true); ?>"><?php echo $article->getPostParam("name", 13057); ?></a></li>
            
			<!-- fakturacne udaje --> 
			<li class=""><a href="<?php echo $article->getPostParam("name_url", 13093, true); ?>"><?php echo $article->getPostParam("name", 13093); ?></a></li>
            
			<!-- kontaktny form --> 
			<li class=""><a href="<?php echo $article->getPostParam("name_url", 13337, true); ?>"><?php echo $article->getPostParam("name", 13337); ?></a></li>
            
	     </ul>
      </div>
      <hr class="hr-xs">
   </div>
   
<!-- nastrojaren -->
    <div class="margin-bottom-50 dalsie-info">
      <h2 class="title-v4 "><?php echo $article->getPostParam("name", 13075); ?></h2>
      <div class="blog-thumb-v3">
		<ul class="pdc">
			<li class=""><a href="<?php echo $article->getPostParam("name_url", 13075, true); ?>#bytca"><?php echo $article->getPostParam("name", 13075); ?></a></li>
			<li class=""><a href="<?php echo $article->getPostParam("name_url", 13058, true); ?>"><?php echo $article->getPostParam("name", 13058); ?></a></li>
		</ul>
      </div>
      <hr class="hr-xs">
   </div>
   
<!-- vyskum a vzvoj -->   
   <div class="margin-bottom-50 dalsie-info">
      <h2 class="title-v4 "><?php echo $article->getPostParam("name", 13055); ?></h2>
      <div class="blog-thumb-v3">
		<ul class="pdc">
			<li class=""><a href="<?php echo $article->getPostParam("name_url", 13055, true); ?>"><?php echo $article->getPostParam("name", 13055); ?></a></li>
			<li class="kontakt"><a href="<?php echo $article->getPostParam("name_url", 13058, true); ?>#bytca"><?php echo $article->getPostParam("name", 13058); ?></a></li>
		</ul>
      </div>
      <hr class="hr-xs">
   </div>
   
<!-- PDC -->
   <div class="margin-bottom-50 dalsie-info">
      <h2 class="title-v4 ">PDC</h2>
      <div class="blog-thumb-v3">
		<ul class="pdc">
			<li class="kontakt"><a href="<?php echo $article->getPostParam("name_url", 13053, true); ?>"><?php echo $article->getPostParam("name", 13053); ?></a></li>
			<li class="kontakt"><a href="<?php echo $article->getPostParam("name_url", 13058, true); ?>#bytca"><?php echo $article->getPostParam("name", 13058); ?></a></li>
		</ul>
      </div>
      <hr class="hr-xs">
   </div>
   
   
   <div class="margin-bottom-50 dalsie-moznosti">
      <h2 class="title-v4"> <?php echo $translate['dalsie_moznosti'];?></h2>
      <div class="blog-thumb-v3">
	  
		  <ul class="default">
			<!-- personal --> 
			<li class=""><a href="<?php echo $article->getPostParam("name_url", 13059, true); ?>"><?php echo $article->getPostParam("name", 13059); ?></a></li>
			<!--<li class=""><a href="<?php echo $article->getPostParam("name_url", 13059, true); ?>"><?php echo $article->getPostParam("name", 13059); ?></a></li>-->
           
		   </ul> 
      </div>
      <hr class="hr-xs">
   </div>
   <!-- End Blog Thumb v3 -->

   <!-- End Blog Thumb v3 -->
   <!-- Social Shares -->
   <div class="margin-bottom-50">
      <h2 class="title-v4">Facebook</h2>
      <ul class="blog-social-shares">
         <li>
            <i class="rounded-x fb fa fa-facebook"></i>
            <a class="rounded-3x" target="_blank" href="https://www.facebook.com/osmosbratislava/?fref=ts">Like</a>
         </li>
      </ul>
   </div>
   <!-- End Social Shares -->
   <!-- Blog Carousel Heading -->
  
<?php } ?>
<?php 
function get_slider($data){
?>
<?php
$multylanguage 	= new MultyLanguage;
$article 		= new ArticleView;
$db 			= new Db;
$query = "SELECT * FROM dnt_posts WHERE type = 'post' AND cat_id = '".AdminContent::getCatId("sliders")."' AND vendor_id = '".Vendor::getId()."'";
if($db->num_rows($query)>0){
?>
<!-- Master Slider -->
<div class="blog-ms-v1 content-sm bg-color-darker margin-bottom-60">
	<div class="master-slider ms-skin-default" id="masterslider">
		<?php foreach($db->get_results($query) as $row){ ?>
		<div class="ms-slide blog-slider">
			<img src="/dnt-system/layouts/quy_osmos/images/blank.gif" data-src="<?php echo $article->getPostImage($row['id_entity']); ?>" alt="lorem ipsum dolor sit"/>
			<span class="blog-slider-badge" onclick="location.href = '<?php echo "".$row['embed'];?>';"><?php echo $row['name'];?></span>
			<div class="ms-info"></div>
			<div class="blog-slider-title">
				<a href="<?php echo "".$row['embed'];?>">
				<h2><?php echo $row['perex'];?></h2>
				</a>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<!-- END Master Slider -->
<?php } ?>
<?php } ?>