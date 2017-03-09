<?php include "tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "top.php"; ?>
<div class="row">
<!-- BEGIN CUSTOM TABLE -->
<div class="col-md-12">
   <div class="grid no-border">
      <div class="grid-header">
         <i class="fa fa-table"></i>
         <span class="grid-title">Prístupy</span>
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
                  <th>Vlajka</th>
                  <th>Názov jazyku</th>
                  <th>slug</th>
                  <th>Zobrazenie</th>
               </tr>
            </thead>
            <tbody>
               <?php
                   $query = "SELECT * FROM `dnt_languages` WHERE 
                   parent_id = '0' AND
                   vendor_id = '".Vendor::getId()."' ORDER BY id asc"; 
				   $pocet_aktivne = $db->num_rows($query);
                    if($db->num_rows($query)>0){
                   	foreach($db->get_results($query) as $row){
                   ?>
				   <tr>
					  <td><?php echo $row['id']; ?></td>
					  <td><img src="<?php echo WWW_PATH_ADMIN?>img/flags/<?php echo $row['img']; ?>"></td>
					  <td><b><?php echo $row['name']?></b></td>
					  <td>
						 <span class="">
						 <?php echo $row['slug']; ?>
						 </span>
					  </td>
					  <td>
						 <a href="<?php echo WWW_PATH_ADMIN."index.php?src=".$rest->get('src')."&action=show_hide&post_id=".$row['id']; ?>">
						 <i class="<?php echo admin_zobrazenie_stav($row['show']);?>"></i>
						 </a>
					  </td>
				   </tr>
               <?php
                  }
                  }
                  else{
                  no_results();
                  }
                  ?>									
            </tbody>
         </table>
      </div>
   </div>
</div>
<!-- END CUSTOM TABLE -->
<?php include "bottom.php"; ?>
<?php get_bottom(); ?>