<?php include "tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "top.php";?>
<?php 
	$db 	= new Db;
	$rest 	= new Rest;
?>
<!-- BEGIN CUSTOM TABLE -->
<div class="col-md-12">
   <div class="grid no-border">
      <div class="grid-header">
         <i class="fa fa-table"></i>
         <span class="grid-title">Posty</span>
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
                  <th>post ID</th>
                  <th>Názov postu</th>
                  <th>Typ postu</th>
                  <th>Dátum zverejnenia</th>
                  <th>Zobrazenie</th>
                  <th>Pozícia</th>
                  <th>Akcia</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $query = AdminContent::query();
				  $i = AdminContent::showOrder();
                  if($db->num_rows($query)>0){
                  	foreach($db->get_results($query) as $row){
					$type 	= $row['type'];
					$id 	= $row['id'];
					$page 	= AdminContent::getPage("current");
                  ?>
				   <tr>
					  <td><?php echo $i++; ?></td>
					  <td><?php echo $row['id'] ?></td>
					  <td style="max-width: 500px;"><b><a href="<?php echo AdminContent::url("edit", $type, $id, $page) ?>"><?php echo $row['name']; ?></a></b></td>
					  <td><a href="<?php echo AdminContent::url("filter", $type, $id, $page) ?>"><span class="label label-<?php echo $row['type'];?>"><?php echo $row['type']; ?></span></a></td>
					  <td><b><?php echo $row['datetime_creat']; ?></b></td>
					  <td>
						 <a href="<?php echo AdminContent::url("show_hide", $type, $id, $page) ?>">
						 <i class="<?php echo admin_zobrazenie_stav($row['show']);?>"></i>
						 </a>
					  </td>
					  <td>
						 <span class="text-green">
						 <a href="<?php echo AdminContent::url("move_up", $type, $id, $page) ?>"><i class="fa fa-angle-up"></i></a>
						 <a href="<?php echo AdminContent::url("mowe_down", $type, $id, $page) ?>"><i class="fa fa-angle-down"></i></a>
						 </span>
					  </td>
					  <td>
						 <a href="<?php echo AdminContent::url("edit", $type, $id, $page) ?>"><i class="fa fa-pencil bg-blue action"></i></a>
						 <?php 
							if($row['protected'] == 1){
								echo "<i class='fa fa-times bg-red action' style='opacity: 0.1' title='Chránené proti zmazaniu'></i>";
							}else{?>	
							<a href="<?php echo AdminContent::url("del", $type, $id, $page) ?>"><i class="fa fa-times bg-red action"></i></a>
						 <?php } ?>
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
   <ul class="pagination">
      <li class="">
         <a href="<?php echo AdminContent::paginator("prev");?>">
         &laquo;
         </a>
      </li>
      <li>
         <a href="<?php echo AdminContent::paginator("first");?>">
         <?php echo AdminContent::getPage("first");?>
         </a>
      </li>
      <li>
         <a href="<?php echo AdminContent::paginator("last");?>">
         <?php echo AdminContent::getPage("last");?>
         </a>
      </li>
      <li>
         <a href="<?php echo AdminContent::paginator("next");?>">
         &raquo;
         </a>
      </li>
   </ul>
   <!-- END PAGINATION -->
</div>
<!-- BEGIN PAGINATION -->
<!-- END CUSTOM TABLE -->
<?php include "bottom.php"; ?>
<?php get_bottom(); ?>