<?php 

use DntLibrary\Base\Dnt;
use DntLibrary\Base\MultyLanguage;
use DntLibrary\Base\Rest;

get_top(); ?>
<?php get_top_html(); 
$rest = new Rest;
$dnt = new Dnt;
$multiLanguage = new MultyLanguage;
?>
 
 <section class="content-header">
   </section>
   <!-- END CONTENT HEADER -->
   <section class="content">
      <div class="row">
         <section class="content-header">
            <ul>
               <li class="post_type" style="text-decoration: underline">
                  <a href="index.php?src=multylanguage&amp;action=pridat">
                  <span class="label label-primary bg-green" style="padding: 5px;"><big>PRIDAŤ PREKLAD</big></span>
                  </a>
               </li>
			   <?php /*<li class="post_type" style="text-decoration: underline">
                  <a href="index.php?src=multylanguage&action=translate-all">
                  <span class="label label-primary bg-green" style="padding: 5px;"><big>Preložiť všetko</big></span>
                  </a>
               </li>*/?>
            </ul>
         </section>
         <!-- BEGIN CUSTOM TABLE -->
         <div class="col-md-12">
            <div class="grid no-border">
               <div class="grid-header">
                  <i class="fa fa-table"></i>
                  <span class="grid-title">Preklady</span>
                  <div class="pull-right grid-tools">
                     <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                     <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                     <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                  </div>
               </div>
               <div class="grid-body">
                  <table class="table table-hover">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Názov prekladu</th>
                           <th>Názov prekladu</th>
                           <th>Jazyk</th>
                           <th>Kľúč</th>
                           <th>Zmazať</th>
                           <th>Akcia</th>
                        </tr>
                     </thead>
                     <tbody>
					 
					 <?php 
					 $query = $multiLanguage->query();
					 
					 if($rest->get("page")){
						$nextPage =  ceil($rest->get("page") +1);
						$prevPage =  ceil($rest->get("page") -1);
						$currentPage = $rest->get("page");
						$lastPage = $query['pages'];
					 }else{
						$prevPage =  1;
						$nextPage =  2;
						$currentPage = 1;
						$lastPage =  $query['pages'];
					 }
					 
					 
					 $nextPageUrl = "&page=".$nextPage;
					 $prevPageUrl = "&page=".$prevPage;
					 
					 if($db->num_rows($query['query'])>0){
						foreach($db->get_results($query['query']) as $row){
					?>
					 
                        <tr>
                           <td><?php echo $row['id_entity']; ?></td>
                           <td><b><?php echo $row['translate']; ?></b></td>
                           <td><b><?php echo $row['translate']; ?></b></td>
                           <td><b><?php if(MULTY_LANGUAGE == false) echo ""; else echo $row['lang_id']; ?></b></td>
                           <td><b><?php echo $row['translate_id']; ?></b></td>
                           <td>
                              <a <?php echo $dnt->confirmMsg("Naozaj chcete zmazať tento preklad?"); ?> href="<?php echo WWW_PATH_ADMIN_2."index.php?src=multylanguage&action=del&translate_id=".$row['translate_id']."";?>">
                              <i class="fa fa-times bg-red action"></i>
                              </a>
                           </td>
                           <td>
                              <a href="<?php echo WWW_PATH_ADMIN_2."index.php?src=multylanguage&action=edit&translate_id=".$row['translate_id']."&page=".$rest->get('page').""; ?>"><i class="fa fa-pencil bg-blue action"></i></a>
                           </td>
                        </tr>
                        <?php 
							}
						}
						?>
						
                     </tbody>
                  </table>
               </div>
            </div>
            <ul class="pagination">
               <li class="">
                  <a href="<?php echo WWW_PATH_ADMIN_2."index.php?src=multylanguage&action=translates".$prevPageUrl."";?>">
                  «
                  </a>
               </li>
               
			   
			   <li>
                  <a href="">
                  <?php echo $currentPage." / ".$lastPage; ?>
                  </a>
               </li>
			   
			   <?php /*<li>
                  <a href="<?php echo WWW_PATH_ADMIN_2."index.php?src=multylanguage&action=translates".$prevPageUrl."";?>">
                  <?php echo $prevPage; ?>
                  </a>
               </li>
               <li>
                  <a href="<?php echo WWW_PATH_ADMIN_2."index.php?src=multylanguage&action=translates".$nextPageUrl."";?>">
                  <?php echo $nextPage; ?>							</a>
               </li>*/?>
			   
			   
               <li>
                   <a href="<?php echo WWW_PATH_ADMIN_2."index.php?src=multylanguage&action=translates".$nextPageUrl."";?>">
                  »
                  </a>
               </li>
            </ul>
            <!-- END PAGINATION -->
         </div>
         <!-- BEGIN PAGINATION -->
         <!-- END CUSTOM TABLE -->			
      </div>
   </section>
   
   <?php get_bottom_html(); ?>
<?php get_bottom(); ?>