<?php


include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
$data = Frontend::get();
get_top($data);
$multylanguage 	= new MultyLanguage;
$article 		= new ArticleView;
$translate['citat_viac'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "citat_viac"));
include "dnt-view/layouts/".Vendor::getLayout()."/top.php";
?>

      <!-- End header-v8 -->
      <?php get_slider($data); ?>
      <div class="container margin-bottom-40">
         <div class="col-md-12 homepage">
            <div class="masonry-box homepage-items">
               <div class="row">
                  <?php
                     $post_type = "texty-na-homepage";
                     $query = "SELECT * FROM dnt_posts WHERE type = 'post' AND cat_id = '".AdminContent::getCatId($post_type)."' AND vendor_id = '".Vendor::getId()."'";
                     if($db->num_rows($query)>0){
                     	foreach($db->get_results($query) as $row){
                     ?>
					  <div class="blog-grid masonry-box-in col-3">
						 <h3><a href="<?php echo  $article->getPostParam("name_url", $row['id_entity'], false, $row['name_url']); ?>">
						 <?php echo $article->getPostParam("name", $row['id_entity'], false, $row['name']); ?></a></h3>
						 <hr>
						 <p><?php echo $article->getPostParam("perex", $row['id_entity'], false, $row['perex']); ?></p>
						 <a class="r-more" href="<?php echo $article->getPostParam("name_url", $row['id_entity'], false, $row['name_url']); ?>"><?php echo $translate['citat_viac'];?></a>
					  </div>
					<?php
                     }
                    }
                   ?>
               </div>
            </div>
            <!-- End Blog Grid -->
         </div>
      </div>
   </div>
<?php
get_footer($data);
get_bottom($data);