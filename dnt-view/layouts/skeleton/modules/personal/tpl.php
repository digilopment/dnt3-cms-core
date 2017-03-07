<?php
include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
get_top($data);
include "dnt-view/layouts/".Vendor::getLayout()."/top.php";

$multylanguage 	= new MultyLanguage;
$article 		= new ArticleView;
$db 		= new Db;
?>
<div class="margin-bottom-60"></div>
<div class="container margin-bottom-40">
   <div class="row">
      <!-- Main Content -->
      <div class="col-md-9 main-content">
         <!-- Dynamic Item -->
         <div class="blog-grid margin-bottom-30">
            <h2 class="title-v4"> <?php echo $data['article']['name'];?></h2>
            <div class="overflow-h margin-bottom-10 article-view">
               <?php
                  $post_type = "personal";
                  $query = "SELECT * FROM dnt_posts WHERE type = 'post' AND `show` = '1' AND cat_id = '".AdminContent::getCatId($post_type)."' AND vendor_id = '".Vendor::getId()."'";
                  if($db->num_rows($query)>0){
                  foreach($db->get_results($query) as $row){
                  ?>
               <div class="col-sm-6 sm-margin-bottom-50">
                  <div class="blog-grid personal">
                     <h3><?php echo $article->getPostParam("name", $row['id']);?></h3>
                     <img class="img-responsive" src="<?php echo $article->getPostImage($row['id']);?>" alt="">
                     <ul class="blog-grid-info">
                        <li><?php echo $article->getPostParam("content", $row['id']);?></li>
                     </ul>
                  </div>
               </div>
               <?php
                  }
                  }         
                 ?>	
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