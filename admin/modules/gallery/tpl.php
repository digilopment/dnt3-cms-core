<?php include "plugins/webhook/tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "plugins/webhook/top.php";?>
<?php 
	$db 	= new Db;
	$rest 	= new Rest;
	$image 	= new Image;
?>
<!-- BEGIN CUSTOM TABLE -->

<!-- The modal -->
<?php galleryChooser("25"); ?>




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
      <form action="index.php?src=files&action=del" method="POST">
      <div class="grid-body">

  <h3>Galéria médii</h3>

    
      </div>
      </form>
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
<?php include "plugins/webhook/bottom.php"; ?>
<?php get_bottom(); ?>