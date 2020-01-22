<body class="skin-dark">
   <!-- BEGIN HEADER -->
   <?php get_header();
   $rest = new Rest();
   ?>
   <!-- END HEADER -->
   <div class="wrapper row-offcanvas row-offcanvas-left">
   <!-- BEGIN SIDEBAR -->
   <aside class="left-side sidebar-offcanvas">
      <section class="sidebar">
         <div class="user-panel">
            <div class="pull-left image">
               <img style="cursor:pointer" onclick="location.href='index.php?src=access&action=edit&post_id=<?php echo AdminUser::data("admin", "id")."";?>'" src="<?php echo AdminUser::avatar();?>" class="img-circle" alt="<?php echo AdminUser::data("admin", "name")." ".AdminUser::data("admin", "surname"); ?>">
            </div>
            <div class="pull-left info">
               <p><strong style="cursor:pointer" onclick="location.href='index.php?src=access&action=edit&post_id=<?php echo AdminUser::data("admin", "id")."";?>'" ><?php echo AdminUser::data("admin", "name")." ".AdminUser::data("admin", "surname"); ?></strong></p>
               <span ><i class="fa fa-circle text-green"></i> Online</span>
            </div>
         </div>
         <form action="<?php echo WWW_PATH_ADMIN; ?>index.php?src=<?php echo $rest->get("src")?>" method="GET" class="sidebar-form">
            <div class="web-title">web: <b><a target="_blank" href="<?php echo WWW_PATH;?>"><?php echo Vendor::getColumn("name") ?></a></b></div>
            <div class="input-group">
               <input type="hidden" name="src" value="<?php echo $rest->get("src")?>">
			   <?php if(isset($_GET['action'])){
				   echo ' <input type="hidden" name="action" value="'.$rest->get("action").'">';
			   }?>
               <input type="text" name="search" class="form-control" placeholder="Hľadať...">
               <span class="input-group-btn">
               <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
               </span>
            </div>
         </form>
         <?php admin_menu(); ?>
      </section>
   </aside>
   <!-- END SIDEBAR -->
   <!-- BEGIN CONTENT -->
   <aside class="right-side">
   <!-- BEGIN CONTENT HEADER -->
   <section class="content-header">
   </section>