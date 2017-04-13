<?php
include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
$data = Frontend::get($custom_data);
//$data = false;
get_top($data);
include "dnt-view/layouts/".Vendor::getLayout()."/top.php";

?>
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
      <!-- Main Content -->
      <div class="col-md-9 main-content">
         <!-- Dynamic Item -->
         <div class="blog-grid margin-bottom-30">
            <h2 class="title-v4"><?php echo $data['article']['name'];?></h2>
            <div class="overflow-h margin-bottom-10 article-view">
             <?php echo $data['article']['perex'];?>
             <?php echo $data['article']['content'];?>
            </div>
         </div>
      </div>
      <!-- Right Sidebar -->
      <div class="col-md-3">
		<?php col_right($data); ?>
      </div>
      <!-- End Right Sidebar -->
   </div>
</div>
<?php
get_footer($data);
get_bottom($data);