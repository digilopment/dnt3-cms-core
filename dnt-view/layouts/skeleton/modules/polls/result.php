<?php
include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
$data = Frontend::get();
//$data = false;
get_top($data);
include "dnt-view/layouts/".Vendor::getLayout()."/top.php";


$rest 		= new Rest;
$db 		= new Db;
$poll_id 	= $rest->webhook(2);
$question_id= $rest->webhook(4);
$poll_input_name = "poll_".$poll_id."_".$question_id;

//echo "<br>result template BEGIN<HERE><hr/>";
echo '<div style="margin-top: 60px;"></div>
<div class="container panel panel-primary dnt-poll">';

if(Polls::getParam("type", $poll_id) == 1){
	$rst = round(PollsFrontend::getResultPercent($poll_id), 2);
	echo "<h3>Kvzíz ste zodpovedali na <span style='color:red'>".$rst."%</span></h3>";
}elseif(Polls::getParam("type", $poll_id) == 2){
	$rst 			= PollsFrontend::getVendorPoints($poll_id); //returns yout points score
	$poll_range 	= PollsFrontend::getVendorResultPointsRange($poll_id); //return max of range
	$poll_max  		= $poll_range['max'];
	$poll_min  		= $poll_range['min'];
	$catId 			= PollsFrontend::getVendorResultPointsCat($poll_id); //return category ID witch you include
	$url = false;
	
?>
	<div class="container">
   <div class="row">
      <div class="col-md-1"></div>

      <div class="col-md-10">
	  <div class="row">
		<h2>Gratulujeme, úspešne ste prešli naším kvízom  s počtom bodov <span style='color:red'><?php echo $rst; ?></span></h2>
		<div style="margin-top: 60px;"></div>
		<hr/>
	  </div>
	   <div class="row">
            <div class="col-sm-4"><a href="<?php echo $url; ?>" class=""><img src="<?php echo Image::getPostImage($catId,"dnt_polls_composer");?>" class="img-responsive"></a>
            </div>
            <div class="col-sm-8">
               <h3 class="title"><a href="<?php echo $url; ?>"><?php echo PollsFrontend::getComposerDataById('value', $catId); ?></a></h3>
               <p class="text-muted"><span class="glyphicon glyphicon-lock"></span> 
			   Gratulujeme, úspešne ste prešli naším kvízom.
			   </p>
               <p><?php echo PollsFrontend::getComposerDataById('description', $catId); ?></p>
               <p class="text-muted">powered by <a href="http://designdnt.query.sk/" target="_blank">designdnt</a></p>
            </div>
         </div>
	  <div class="row">
		<h5><?php echo '<a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u='.WWW_FULL_PATH.'?share='.$catId.'&points='.$rst.'">Zdielať výsledok</a>'; ?></h5>
		<div style="margin-bottom: 60px;"></div>
		<hr/>
	  </div>
		      </div>
	  <div class="col-md-1"></div>
   </div>
</div>
	
	<?php /*echo "<h3> Výsledok: / Patríte do kategórie / {<span style='font-size:12px'>id kategorie na základe ktorej sa vyberú príslušné dáta </span> <span style='color:red'>".$catId."</span>} s počtom bodov <span style='color:red'>".$rst."</span></h3>";
	echo "<h3> Výsledok: / {<span style='font-size:12px'>bodovy rozsah kategorie je </span> <span style='color:red'>".$poll_min." - ".$poll_max."</span>}</h3>";
	
	echo '<a href="'.WWW_FULL_PATH.'?share='.$catId.'">SHARE URL</a>';
	echo '<img src="'.Image::getPostImage($catId,"dnt_polls_composer").'" style="height: 200px" />';
	*/?>
<?php
}
echo '</div><div class="margin-bottom-60"></div>';


get_footer($data);
get_bottom($data);