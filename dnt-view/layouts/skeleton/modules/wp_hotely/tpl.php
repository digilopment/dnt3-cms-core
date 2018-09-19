<?php
include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
$data = Frontend::get($custom_data);
get_top($data);
include "dnt-view/layouts/".Vendor::getLayout()."/top.php";
?>

<?php
//meta
if($data['meta_tree']['keys']['_menu_7_text_1']['show']){
	echo $data['meta_tree']['keys']['_menu_7_text_1']['value'];
}
//settings
//var_dump($data);
//var_dump($data['artcile']['meta_tree']['keys']);
?>
<div class="module" style="padding: 90px 0px;">
	<div class="section-devider-half-heading" id="crosscafe">
		  <div class="container">
			 <div class="row">
				<div class="col-sm-12">
				   <h2 class="text-center"><?php echo $data['meta_tree']['keys']['_menu_7_text_1']['value']?></h2>
				</div>
			 </div>
		  </div>
	   </div>
	<section>
	   <div class="container">
		  <div class="row">
			 <!-- left article -->
			 <div class="col-md-7">
				<div class="text-faded-dark faded-dark">
				   <p><span style="font-size:16px"><span style="font-family:georgia,serif"><strong>4*Hotel Terrassenhof am Tegernsee</strong></span></span></p>
				   <p><span style="font-size:16px"><span style="font-family:georgia,serif">Bei uns erwartet Sie bayerische Gastfreundschaft und herzlicher Service. Unsere Zimmer, Suiten und Apartments mit traumhaftem See- oder Bergblick sind komfortabel und bayerisch-modern ausgestattet. Genießen Sie in unserem Restaurant oder auf der See-Terrasse feine regionale und bayerische Köstlichkeiten. Wir haben ein vielfältiges Sport- und Freizeitangebot, das vom gemütlichen Spazierengehen über Wandern, Mountainbiken, Skifahren, Rodeln oder Baden am eigenen Strand bis zum Segeln reicht.</span></span></p>
				   <p><span style="font-size:16px"><span style="font-family:georgia,serif">Urlaub im Terrassenhof ist Erholung pur!</span></span></p>
				</div>
			 </div>
			 <!-- right article -->
			 <div class="col-md-5">
				<!--<a href="http://dnt.static-cdn.vyhrat.com/dnt-system/data/30/uploads/Terassenhof_450x310_logo.jpg?125" class="portfolio-box" data-lightbox="roadtrip" >-->
				<img src="http://dnt.static-cdn.vyhrat.com/dnt-system/data/30/uploads/Terassenhof_450x310_logo.jpg?125" class="img-responsive no-padding" style="width: 100%;" alt="">
				<!--</a>-->
			 </div>
		  </div>
		  <div class="row">
			 <div class="col-lg-3 col-md-6 text-center">
				<div class="service-box">
				   <i class="fa fa-4x fa-heart wow bounceIn text-primary" style="visibility: visible; animation-name: bounceIn;"></i>
				   <h3></h3>
				   <p class="text-muted">4*Hotel Terrassenhof am Tegernsee</p>
				</div>
			 </div>
			 <div class="col-lg-3 col-md-6 text-center">
				<div class="service-box">
				   <i class="fa fa-4x fa-location-arrow wow bounceIn text-primary" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: bounceIn;"></i>
				   <h3></h3>
				   <p class="text-muted">Adrian-Stoop-Str. 50   <br>   DE - 83707 Bad Wiessee</p>
				</div>
			 </div>
			 <div class="col-lg-3 col-md-6 text-center">
				<div class="service-box">
				   <i class="fa fa-4x fa-paper-plane-o wow bounceIn text-primary" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: bounceIn;"></i>
				   <h3></h3>
				   <p class="text-muted">+49 8022 8630</p>
				   <p class="text-muted"><a href="mailto:info@terrassenhof.de">info@terrassenhof.de</a></p>
				</div>
			 </div>
			 <div class="col-lg-3 col-md-6 text-center">
				<div class="service-box">
				   <i class="fa fa-4x fa-globe wow bounceIn text-primary" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: bounceIn;"></i>
				   <h3></h3>
				   <p class="text-muted"><a target="_blank" href="http://www.terrassenhof.de">www.terrassenhof.de</a></p>
				</div>
			 </div>
		  </div>
	   </div>
	</section>
</div>
<?php /*
<style type="text/css">
.microslider-wrapper{
	background: url('<?php echo $data['article']['img'];?>') no-repeat center center fixed; 
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
}
</style>
<div class="microslider-wrapper">
	<div class="page-name-wrapper">
		<span class="page-name"><span class="name"><?php echo $data['title'];?></span></span>
	</div>
</div>
<div class="margin-bottom-60"></div>
<div class="container margin-bottom-40">
   <div class="row">
      <div class="col-md-9 main-content">
         <div class="blog-grid margin-bottom-30">
            <h2 class="title-v4"><?php echo $data['article']['name'];?></h2>
            <div class="overflow-h margin-bottom-10 article-view">
             <?php echo $data['article']['perex'];?>
             <?php echo $data['article']['content'];?>
            </div>
         </div>
      </div>
      <div class="col-md-3">
		<?php col_right($data); ?>
      </div>
   </div>
</div>
*/?>
<?php
get_footer($data);
get_bottom($data);