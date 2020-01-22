
<?php get_top(); ?>
<?php get_top_html(); 
   $vendor = new Vendor;
   ?>
<section class="content">
<div class="row">
   <div style="clear: both;"></div>
   <!-- BEGIN CUSTOM TABLE -->
   <div class="col-md-12">
      <div class="grid no-border">
         <div class="grid-header">
            <i class="fa fa-table"></i>
            <span class="grid-title">Zoznam webov pod platformou</span>
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
                     <th>id</th>
                     <th>Názov webu</th>
                     <th>Administrácia webu</th>
                     <th>Zobrazenie na pracovnej adrese</th>
                     <th>Zobrazenie na vlastnej doméne</th>
                     <th>Globálne nastavenia webu</th>
                     <th>Vymazať</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                     $i = 1;
                     foreach($vendor->getAll() as $row){
                     $webUrl 	= HTTP_PROTOCOL.$row['name_url'].".".DOMAIN.WWW_FOLDERS;
                     $develUrl 	= HTTP_PROTOCOL."devel.".$row['name_url'].".".DOMAIN.WWW_FOLDERS;
                     $realUrl 	= $row['real_url'];
					 $email     = AdminUser::data("admin", "email");
					 $vendorId  = $row['id_entity'];
                     $adminUrl 	= $webUrl."/".ADMIN_URL_2."/index.php?src=login&action=auto-login&domain_change=1&admin_id=".$email."&id_entity=".$vendorId;
                     ?>
                  <tr>
                     <td><?php echo $i; ?></td>
                     <td><?php echo $row['id_entity']; ?></td>
                     <td style="max-width: 500px;"><b><a target="_blank" href="<?php echo $adminUrl; ?>"><?php echo $row['name']; ?></a></b></td>
                     <td><a href="<?php echo $adminUrl; ?>"><i class="fa fa-pencil bg-blue action"></i></a></td>
                     <td>
                        <i class="fa fa-arrow-right bg-green action"></i> <a href="<?php echo $webUrl; ?>" target="_blank"><?php echo $webUrl; ?></a>
                     </td>
                     <td>
                        <?php if($row['show_real_url'] == 1){?>
                        <i class="fa fa-arrow-right bg-green action"></i> <a href="<?php echo $realUrl; ?>" target="_blank"><?php echo $realUrl; ?></a>
                        <?php } else {?>
                        <i class="fa fa-times bg-red action"></i> - K tomuto webu nie je priradená žiadna doména
                        <?php } ?>
                     </td>
                     <td style="display: none;">
                        <span class="text-green">
                        <a href="#"><i class="fa fa-angle-up"></i></a>
                        <a href="#"><i class="fa fa-angle-down"></i></a>
                        </span>
                     </td>
                     <td>
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
                                                               <input type="text"  value="<?php echo $row['name_url']; ?>" name="url" class="form-control" placeholder="Názov:">
                                                               <br/>
                                                            </div>
                                                         </div>
														 
														 <div class="form-group">
                                                            <label class="col-sm-3 control-label"><b>Vendor ID:</b></label>
                                                            <div class="col-sm-9">
                                                               <input type="number"  value="<?php echo $row['id']; ?>" name="vendor_id_move" class="form-control" placeholder="Názov:">
                                                               <br/>
                                                            </div>
                                                         </div>
														 
                                                         <!-- layout -->
                                                         <div class="form-group">
                                                            <label class="col-sm-3 control-label"><b>Layout</b></label>
                                                            <div class="col-sm-9 ">
                                                               <select class="form-control" name="layout" style="">
                                                               <?php 
                                                                  foreach($vendor->getlayouts() as $layout){
                                                                   if($row['layout'] == $layout){
                                                                    echo '<option selected value="'.$layout.'">'.$layout.'</option>';
                                                                   }else{
                                                                    echo '<option value="'.$layout.'">'.$layout.'</option>';
                                                                   }
                                                                   
                                                                  }
                                                                  ?>
                                                               </select>
                                                               <br/>
                                                            </div>
                                                         </div>
                                                         <div class="form-group">
                                                            <label class="col-sm-3 control-label"><b>Zobraziť na vlastnej adrese:</b></label>
                                                            <div class="col-sm-9 ">
                                                               <?php Dnt::setMetaStatus($row['show_real_url'], "show_real_url");?>
                                                               <br/>
                                                            </div>
                                                         </div>
                                                         <div class="form-group">
                                                            <label class="col-sm-3 control-label"><b>Povoliť registráciu:</b></label>
                                                            <div class="col-sm-9 ">
                                                               <?php Dnt::setMetaStatus($row['in_progress'], "in_progress");?>
                                                               <br/>
                                                            </div>
                                                         </div>
                                                         <div class="form-group">
                                                            <label class="col-sm-3 control-label"><b>Vlastná URL adresa:</b></label>
                                                            <div class="col-sm-9">
                                                               <input type="text"  value="<?php echo $row['real_url']; ?>" name="real_url" class="form-control" placeholder="Názov:">
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
                     </td>
                     <td>
						<?php if(Vendor::getId() == $row['id_entity'] || DELETING_VENDORS == false){
							echo '<i title="Nemôžete vymazať web, v ktorom ste prihlásený." class="fa fa-times bg-red action" style="opacity:0.3;border:2px solid red "></i>';
						}else{?>
                         <a <?php echo Dnt::confirmMsg("Naozaj chcete vymazať tento web?"); ?> href="index.php?src=vendor&action=del&vendor_id=<?php echo $row['id_entity']; ?>"><i class="fa fa-times bg-red action"></i></a>
						<?php } ?>
                     </td>
                  </tr>
                  <?php 
                     $i++;
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
<!-- END CUSTOM TABLE -->
<?php get_bottom_html(); ?>
<?php get_bottom(); ?>