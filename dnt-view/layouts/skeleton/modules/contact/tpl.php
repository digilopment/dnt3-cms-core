<?php
include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
get_top($data);
include "dnt-view/layouts/".Vendor::getLayout()."/top.php";

$multylanguage 	= new MultyLanguage;
$article 		= new ArticleView;

$translate['sidlo'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "sidlo"));
$translate['kontakt'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "kontakt"));
$translate['meno'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "meno"));
$translate['ulica'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "ulica"));
$translate['mesto'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "mesto"));
$translate['email'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "email"));
$translate['tel_c'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "tel_c"));
$translate['pobocka'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "pobocka"));

?>
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
<!--<div class="arrow-left"></div>-->
	<div class="page-name-wrapper">
		<span class="page-name"><span class="name"><?php echo $data['article']['img'];?></span></span>
	</div>
</div>
*/?>
<div class="margin-bottom-60"></div>

<div class="container margin-bottom-40">
   <div class="row">
      <!-- Main Content -->
      <div class="col-md-9 main-content">
         <!-- Dynamic Item -->
         <div class="blog-grid margin-bottom-30">
            <h2 class="title-v4"> <?php echo $data['article']['name'];?></h2>
            <div class="overflow-h margin-bottom-10 article-view">
			
<div class="row">
            <div class="col-md-12" style="margin-bottom: 20px;">
               <h3><span class="sidlo-a-pobocka"><?php echo $translate["sidlo"]?>:</span> Osmos Bratislava</h3>
               <?php 
                  $suradnice_1 = "48.1224109";
                  $suradnice_2 = "17.0926335";
                  $zoom = "12";
                  ?>
               <iframe style="width: 100%; height: 400px; border: none; border-radius: 5px;" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $suradnice_1;?>%2C%20<?php echo $suradnice_2;?>&key=AIzaSyDgCVlyp5VJW0VazAYxi70omj3Cv1UjNfk"></iframe>
               <br/><br/>
               <h3><?php echo $translate["kontakt"]?></h3>
               <ul class="dnt_kontakt">
                  <li><?php echo $translate["meno"]?>: <b>Osmos Bratislava</b></li>
                  <li><?php echo $translate["ulica"]?>: <b>Gogoľova 18</b></li>
                  <li><?php echo $translate["mesto"]?>: <b>851 01 Bratislava</b></li>
                  <li><?php echo $translate["email"]?>: <b>info@osmos.sk</b></li>
                  <li><?php echo $translate["tel_c"]?>: <b>+421 2 6381 3478</b></li>
               </ul>
            </div>
			
            <div class="col-md-6">
               <h3><span class="sidlo-a-pobocka"><?php echo $translate["pobocka"]?>:</span> Osmos Prievidza</h3>
               <?php
                  $suradnice_1 = "48.7729056";
                  $suradnice_2 = "18.6193191";
                  $zoom = "12";
                  ?>
               <iframe style="width: 100%; height: 400px; border: none; border-radius: 5px;" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $suradnice_1;?>%2C%20<?php echo $suradnice_2;?>&key=AIzaSyDgCVlyp5VJW0VazAYxi70omj3Cv1UjNfk"></iframe>
               <br/><br/>
               <h3><?php echo $translate["kontakt"]?></h3>
               <ul class="dnt_kontakt">
                  <li><?php echo $translate["meno"]?>: <b>Osmos Prievidza</b></li>
                  <li><?php echo $translate["ulica"]?>: <b>A. Hlinku 20</b></li>
                  <li><?php echo $translate["mesto"]?>: <b>971 01 Prievidza</b></li>
                  <li><?php echo $translate["email"]?>: <b>info@osmos.sk</b></li>
                  <li><?php echo $translate["tel_c"]?>: <b>+421 46 542 5081</b></li>
               </ul>
            </div>
			
			 <div class="col-md-6"  id="bytca">
               <h3><span class="sidlo-a-pobocka"><?php echo $translate["pobocka"]?>:</span> Nástrojáreň OSMOS Bytča</h3>
               <?php
                  $suradnice_1 = "49.2179016";
                  $suradnice_1 = "49.218074";
                  $suradnice_2 = "18.5504945";
                  $suradnice_2 = "18.552686";
                  $zoom = "17";
                  ?>
               <iframe style="width: 100%; height: 400px; border: none; border-radius: 5px;" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $suradnice_1;?>%2C%20<?php echo $suradnice_2;?>&key=AIzaSyDgCVlyp5VJW0VazAYxi70omj3Cv1UjNfk"></iframe>
               <br/><br/>
               <h3><?php echo $translate["kontakt"]?></h3>
               <ul class="dnt_kontakt">
                  <li><?php echo $translate["meno"]?>: <b>Osmos Bytča</b></li>
                  <li><?php echo $translate["ulica"]?>: <b>Malobytčianska 1421</b></li>
                  <li><?php echo $translate["mesto"]?>: <b>014 01 Bytča</b></li>
                  <li><?php echo $translate["email"]?>: <b>info@osmos.sk</b></li>
                  <li><?php echo $translate["tel_c"]?>: <b>+421 2 6381 3478</b></li>
               </ul>
            </div>
         </div>
		 <br/>
		 <br/>
		 
		 </div>
         </div>
      </div>
	  
	  <!-- Right Sidebar -->
	  <div class="col-md-3">
		<?php col_right($data); ?>
	  </div><!-- End Right Sidebar -->
	  
	  
   </div>
</div>

<?php
get_footer($data);
get_bottom($data);