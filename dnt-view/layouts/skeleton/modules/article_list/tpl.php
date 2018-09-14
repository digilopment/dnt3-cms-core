2<?php
//include "dnt-view/layouts/markiza/tpl_functions.php";
//include "dnt-view/layouts/markiza/top.php";

include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
$data = Frontend::get();
//$data = false;
get_top($data);
include "dnt-view/layouts/".Vendor::getLayout()."/top.php";

$rest 		= new Rest;
$db 		= new Db;
$articleView 		= new ArticleView;


?>

<div style="margin-top: 60px;"></div>
	<div class="container panel panel-primary dnt-poll">
	   

		
		<div class="container">
   <div class="row">
      <div class="col-md-1"></div>

      <div class="col-md-10">
	  
	  <?php 
	   $query = ArticleList::query();
	   if($db->num_rows($query)>0){
			foreach($db->get_results($query) as $row){
				$url = $articleView->detailUrl($row['cat_name_url'], $row['id'], $row['name_url']);
		?>
         <div class="row">
            <div class="col-sm-4"><a href="<?php echo $url; ?>" class=""><img src="<?php echo Image::getPostImage($row['id'],"dnt_posts");?>" class="img-responsive"></a>
            </div>
            <div class="col-sm-8">
               <h3 class="title"><a href="<?php echo $url; ?>"><?php echo $row['name']; ?></a></h3>
               <p class="text-muted"><span class="glyphicon glyphicon-lock"></span> <?php echo $articleView->getPostParam("perex", $row['id']) ?></p>
               <p><?php echo $row['content']; ?></p>
               <p class="text-muted">powered by <a href="http://designdnt.query.sk/" target="_blank">designdnt</a></p>
            </div>
         </div>
         <hr>
		 		<?php 
			}
	   }else{
		   echo "ERR";
	   }
		?>


         <?php /*<ul class="pagination pagination-lg pull-right">
            <li><a href="#">«</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">»</a></li>
         </ul> */ ?>
      </div>
	  <div class="col-md-1"></div>
   </div>
</div>
	   
	   
	</div>
<div class="margin-bottom-60"></div>
<?php
get_footer($data);
get_bottom($data);