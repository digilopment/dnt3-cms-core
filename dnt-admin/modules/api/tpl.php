
<?php get_top(); ?>
<?php get_top_html(); 
   $api = new Api;
		$SQL_LOG_FILES = array();
		$folderOfQueries = "../dnt-logs/".Vendor::getId()."/sql/";
		$files = glob($folderOfQueries."*.{csv}", GLOB_BRACE);
		foreach($files as $file) {
			$SQL_LOG_FILES[] = (basename($file));
		}
					
   ?>
<section class="content">
<div class="row">
   <div style="clear: both;"></div>
   <!-- BEGIN CUSTOM TABLE -->
   <div class="col-md-12">
      <div class="grid no-border">
         <div class="grid-header">
            <i class="fa fa-table"></i>
            <span class="grid-title">Spustené SQL query v jednotlivých moduloch</span>
            <div class="pull-right grid-tools">
               <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
               <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
               <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
            </div>
         </div>
		 
		 
		 <ul class="nav nav-tabs">
			<?php 
			$i = 0;
			foreach($SQL_LOG_FILES as $file) { ?>
            <li class="<?php if($i==0){echo "active";}?>"><a href="#<?php echo md5($file); ?>" data-toggle="tab"><?php echo $file; ?></a></li>
			<?php 
			$i++;
			} ?>
         </ul>

		 
		 <div class=" tab-content">
            <!-- base settings -->
			
			<?php 
			$i = 0;
			foreach($SQL_LOG_FILES as $file) { ?>
            <div class="tab-pane <?php if($i==0){echo "active";}?>" id="<?php echo md5($file); ?>">
        
		<div class="grid-body">
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th>#id</th>
                     <th>Názov</th>
                     <th>Query</th>
                     <th>Url pre JSON</th>
                     <th>Url pre XML</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                    // $i = 1;
					 
                    //foreach($api->getAll() as $row){
						
					$row = array();
					$i = 0;
					if (($handle = fopen($folderOfQueries.$file, "r")) !== FALSE) {
					  while (($row = fgetcsv($handle, 10000000, ";")) !== FALSE) {
						/*for ($c=0; $c < $num; $c++) {
							echo $data[$c] . "<br />\n";
						}*/
						//echo $row[0];
					  if(isset($row['0']) && $i > 0){
                    
					 $name			= $row[3];
					 $nameUrl		= $row[4];
					 $getQuery		= $row[5];

					 $base64Query = base64_encode(urldecode($getQuery));
					 
					 $jsonURL 	= WWW_PATH."dnt-api/json/".$nameUrl."/base64/?q=".$base64Query;
                     $xmlURL 	= WWW_PATH."dnt-api/xml/".$nameUrl."/base64/?q=".$base64Query;
					 
					 $jsonURLShow 	= WWW_PATH."dnt-api/json/".$nameUrl;
                     $xmlURLShow 	= WWW_PATH."dnt-api/xml/".$nameUrl;
					 //echo $jsonURL;
                     ?>
                  <tr>
                     <td style="width: 2%;"><?php echo $i; ?></td>
                     <td style="width: 8%;"><b><?php echo $name; ?></b></td>
                     <td style="width: 30%;">
						<textarea style="width: 100%; height:60px"><?php echo $getQuery; ?></textarea></td>

					
                     <td style="width: 20%;">
                        <i class="fa fa-arrow-right bg-green action"></i> <a href="<?php echo $jsonURL; ?>" target="_blank">
							<?php echo $jsonURLShow; ?></a>
                     </td>
                      <td style="width: 20%;">
                        <i class="fa fa-arrow-right bg-green action"></i> <a href="<?php echo $xmlURL; ?>" target="_blank">
							<?php echo $xmlURLShow; ?></a>
                     </td>
                     <?php /*<td>
                        <button data-toggle="modal" data-target="#modalPrimary<?php echo $row['id_entity']; ?>"><i class="fa fa-pencil bg-blue action"></i></button>
                        <!-- START MODAL -->								
                        <div class="modal fade" id="modalPrimary<?php echo $row['id_entity']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8" aria-hidden="true">
                           <div class="modal-wrapper">
                              <div class="modal-dialog">
                                 <form action="index.php?src=vendor&action=update&id=<?php echo $row['id_entity']; ?>" method="POST">
                                    <div class="modal-content">
                                       <div class="col-md-12">
                                          <div class="modal-header bg-blue">
                                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                             <h4 class="modal-title" id="myModalLabel8">&nbsp;</h4>
                                          </div>
                                          <div class="col">
                                             <div class="tab-content" style="border: 0px solid; padding: 0px;">
                                                <div class="tab-pane active" id="home-lang">
                                                   <p class="lead dnt_bold">
                                                      <span class="dnt_lang">Defaultný jazyk</span>
                                                   </p>
                                                   <br/>
                                                   <div class="row">
                                                      <div class="form-group">
                                                         <div class="form-group">
                                                            <label class="col-sm-3 control-label"><b>Názov:</b></label>
                                                            <div class="col-sm-9">
                                                               <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Názov:">
                                                               <br/>
                                                            </div>
                                                         </div>
                                                         <div class="form-group">
                                                            <label class="col-sm-3 control-label"><b>Url hash:</b></label>
                                                            <div class="col-sm-9">
                                                               <input type="text"  value="<?php echo $row['nameUrl']; ?>" name="url" class="form-control" placeholder="Názov:">
                                                               <br/>
                                                            </div>
                                                         </div>
                                                         <!-- layout -->
                                                         <div class="form-group">
                                                            <label class="col-sm-3 control-label"><b>Layout</b></label>
                                                            <div class="col-sm-9 ">
                                                               
                                                               <br/>
                                                            </div>
                                                         </div>
                                                         <div class="form-group">
                                                            <label class="col-sm-3 control-label"><b>Zobraziť na vlastnej adrese:</b></label>
                                                            <div class="col-sm-9 ">
                                                               
                                                               <br/>
                                                            </div>
                                                         </div>
                                                         <div class="form-group">
                                                            <label class="col-sm-3 control-label"><b>Povoliť registráciu:</b></label>
                                                            <div class="col-sm-9 ">
                                                              
                                                               <br/>
                                                            </div>
                                                         </div>
                                                         <div class="form-group">
                                                            <label class="col-sm-3 control-label"><b>Vlastná URL adresa:</b></label>
                                                            <div class="col-sm-9">
                                                               <input type="text"  value="" name="real_url" class="form-control" placeholder="Názov:">
                                                               <br/>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <br/>
                                                </div>
                                             </div>
                                             <!-- end here -->
                                             <input type="hidden"  value="<?php echo $row['id_entity']; ?>" name="vendor_id">
                                             <?php echo Dnt::returnInput(); ?>
                                             <input type="submit" name="sent" class="btn btn-primary btn-lg btn-block" value="Upraviť" />
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <!-- END MODAL -->
                     </td>*/?>

                  </tr>
                  <?php /*<tr colspan="20">
					<td colspan="20">
                        <pre style="width:100%"><?php echo $getQuery; ?></pre>
                     </td>
                  </tr> */?>
                  <?php 
                     
					 }
					 $i++;
					 }
					  fclose($handle);
					}
                     ?>
               </tbody>
            </table>
         </div>
		 
		 

		 

            <!-- base settings -->
           
		</div>
		<?php 
			$i++;
			} ?>
		</div> <!-- end tabs -->
		
		
		
		
      </div>
      <!-- END PAGINATION -->
   </div>
   <!-- BEGIN PAGINATION -->
   <!-- END CUSTOM TABLE -->			
</div>
<!-- END CUSTOM TABLE -->
<?php get_bottom_html(); ?>
<?php get_bottom(); ?>