<?php
include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
$data = Frontend::get();
//$data = false;
get_top($data);
include "dnt-view/layouts/".Vendor::getLayout()."/top.php";


$rest 		= new Rest;
$poll_id 	= $rest->webhook(2);
$catId		= $rest->get("share");
$rst		= $rest->get("points");
$url = false;

//echo "<br>result template BEGIN<HERE><hr/>";
echo '<div style="margin-top: 60px;"></div>
<div class="container panel panel-primary dnt-poll">';

if(Polls::getParam("type", $poll_id) == 1){
	$rst = round(PollsFrontend::getResultPercent($poll_id), 2);
	echo "<h3>Kvzíz ste zodpovedali na <span style='color:red'>".$rst."%</span></h3>";
}elseif(Polls::getParam("type", $poll_id) == 2){
	
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
		<div style="margin-bottom: 60px;"></div>
		<hr/>
	  </div>
		      </div>
	  <div class="col-md-1"></div>
   </div>
</div>
<?php
}
echo '</div><div class="margin-bottom-60"></div>';


get_footer($data);
get_bottom($data);