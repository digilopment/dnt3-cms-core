<?php include "tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "top.php";?>
<?php 
	$db 	= new Db;
	$rest 	= new Rest;
?>
<!-- BEGIN CUSTOM TABLE -->
<section class="row content-header">
	<ul>
	
		<li class="post_type" style="text-decoration: underline">
			<a href="<?php echo Rest::setGet(array("action"=>"add")); ?>">
				<span class="label label-primary bg-green" style="padding: 5px;"><big>PRIDAŤ TENTO POST</big></span>
			</a>
		</li>
		<li class="post_type">
			<a href="index.php?src=obsah&amp;pridat=pages-podmenu">
				<span class="label label-primary bg-green" style="padding: 5px;"><big>PRIDAŤ PODSTRÁNKU</big></span>
			</a>
		</li>
		<br/>
		<br/>
		<li class="post_type">
			<a href="index.php?src=obsah&amp;filtruj=1">
				<span class="label label-primary bg-blue" style="padding: 5px;"><big>Pages</big></span>
			</a>
		</li>
	</ul>
</section>
<div style="clear: both;"></div>
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
                  $query = FileAdmin::query();
				  $i = FileAdmin::showOrder();
                  if($db->num_rows($query)>0){
                  	foreach($db->get_results($query) as $row){
					$cat_id 	= $row['cat_id'];
					$post_id 	= $row['id'];
					$sub_cat_id 	= $row['sub_cat_id'];
					$type 	= $row['type'];
					$page 	= FileAdmin::getPage("current");
                  ?>
				   <tr>
					  <td><?php echo $i++; ?></td>
					  <td><?php echo $row['id'] ?></td>
					  <td style="max-width: 500px;"><b><a href="<?php echo FileAdmin::url("edit", $cat_id, $sub_cat_id, false, $post_id, $page) ?>"><?php echo $row['name']; ?></a></b></td>
					  <td><a href="<?php echo FileAdmin::url("filter", $cat_id, $sub_cat_id, $type, $post_id, $page) ?>">
						<?php echo FileAdmin::getPostParam("sub_cat_id", $row['id'])." -> ".FileAdmin::getPostParam("cat_id", $row['id']); ?>
						</a></td>
					  <td><b><?php echo $row['datetime_creat']; ?></b></td>
					  <td>
						 <a href="<?php echo FileAdmin::url("show_hide", $cat_id, $sub_cat_id, $type, $post_id, $page) ?>">
						 <i class="<?php echo admin_zobrazenie_stav($row['show']);?>"></i>
						 </a>
					  </td>
					  <td>
						 <span class="text-green">
						 <a href="<?php echo FileAdmin::url("move_up", $cat_id, $sub_cat_id, $type, $post_id, $page) ?>"><i class="fa fa-angle-up"></i></a>
						 <a href="<?php echo FileAdmin::url("mowe_down", $cat_id, $sub_cat_id, $type, $post_id, $page) ?>"><i class="fa fa-angle-down"></i></a>
						 </span>
					  </td>
					  <td>
						 <a href="<?php echo FileAdmin::url("edit",$cat_id, $sub_cat_id, $type, $post_id, $page) ?>"><i class="fa fa-pencil bg-blue action"></i></a>
						 <?php 
							if($row['protected'] == 1){
								echo "<i class='fa fa-times bg-red action' style='opacity: 0.1' title='Chránené proti zmazaniu'></i>";
							}else{?>	
							<a href="<?php echo FileAdmin::url("del", $cat_id, $sub_cat_id, $type, $post_id, $page) ?>"><i class="fa fa-times bg-red action"></i></a>
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
         <a href="<?php echo FileAdmin::paginator("prev");?>">
         &laquo;
         </a>
      </li>
      <li>
         <a href="<?php echo FileAdmin::paginator("first");?>">
         <?php echo FileAdmin::getPage("first");?>
         </a>
      </li>
      <li>
         <a href="<?php echo FileAdmin::paginator("last");?>">
         <?php echo FileAdmin::getPage("last");?>
         </a>
      </li>
      <li>
         <a href="<?php echo FileAdmin::paginator("next");?>">
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