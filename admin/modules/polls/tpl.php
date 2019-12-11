<?php include "plugins/webhook/tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "plugins/webhook/top.php"; ?>

<section class="content">
   <div class="row">
      <section class="content">
         <div class="row">
            <div style="clear: both;"></div>
            <!-- BEGIN CUSTOM TABLE -->
            <div class="col-md-12">
               <div class="grid no-border">
                  <div class="grid-header">
                     <i class="fa fa-table"></i>
                     <span class="grid-title">Ankety</span>
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
                              <th>#id</th>
                              <th>Názov ankety</th>
                              <th>Typ ankety</th>
                              <th>Upraviť anketu</th>
                              <th>Je publikovaná?</th>
                              <th>Zobrazenie na pracovnej adrese</th>
                              <th>Zobrazenie na developerskom serveri</th>
                           </tr>
                        </thead>
                        <tbody>
						
						<?php
						$query = Polls::getPollsAdmin();
						 if($db->num_rows($query)>0){
							 foreach($db->get_results($query) as $row){
						?>
                           <tr>
                              <td><?php echo $row['id_entity']?></td>
                              <td style="max-width: 500px;"><b><a href="index.php?src=polls&action=edit_poll&post_id=<?php echo $row['id_entity']?>"><?php echo $row['name']?></a></b></td>
                              <td><?php echo Polls::currentTypeStr($row['type']);?></td>
                              <td style="text-align: center;">
                                 <a href="index.php?src=polls&action=edit_poll&post_id=<?php echo $row['id_entity']?>"><i class="fa fa-arrow-right bg-blue action"></i></a>
                              </td>
                               <td style="text-align: center;">
							  <?php if($row['show'] == 2){ ?>
                                 <i class="fa fa-arrow-right bg-red action"></i> &nbsp;&nbsp;&nbsp;NIE
							  <?php } elseif($row['show'] == 1){ ?>	 
								 <i class="fa fa-arrow-right bg-green action"></i> &nbsp;ÁNO
							  <?php } elseif($row['show'] == 0){ ?>	 
								 <i class="fa fa-arrow-right bg-black action"></i> &nbsp;&nbsp;KOŠ
							  <?php } ?> 
                              </td>
                               <td style="text-align: center;">
                                 <a href="<?php echo WWW_PATH."ankety/".$row['id_entity']."/".$row['name_url']."" ?>" target="_blank"><i class="fa fa-arrow-right bg-blue action"></i></a>
                              </td>
                              <td style="text-align: center;">
                                  <a href="<?php echo WWW_PATH."ankety/".$row['id_entity']."/".$row['name_url']."" ?>" target="_blank"><i class="fa fa-arrow-right bg-blue action"></i></a>
                              </td>
                              <td>
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
               <!-- END PAGINATION -->
            </div>
            <!-- BEGIN PAGINATION -->
            <!-- END CUSTOM TABLE -->			
         </div>
      </section>
   </div>
</section>
<!-- END CUSTOM TABLE -->
<?php include "plugins/webhook/bottom.php"; ?>
<?php get_bottom(); ?>