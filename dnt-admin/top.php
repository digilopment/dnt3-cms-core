   <body class="skin-dark">
      <!-- BEGIN HEADER -->
     <?php get_header(); ?>
      <!-- END HEADER -->
      <div class="wrapper row-offcanvas row-offcanvas-left">
         <!-- BEGIN SIDEBAR -->
         <aside class="left-side sidebar-offcanvas">
            <section class="sidebar">
               <div class="user-panel">
                  <div class="pull-left image">
                     <img src="<?php echo AdminUser::avatar();?>" class="img-circle" alt="<?php echo AdminUser::data("name")." ".AdminUser::data("surname"); ?>">
                  </div>
                  <div class="pull-left info">
                     <p><strong><?php echo AdminUser::data("name")." ".AdminUser::data("surname"); ?></strong></p>
                     <a href="#"><i class="fa fa-circle text-green"></i> Online</a>
                  </div>
               </div>
               <form action="<?php echo WWW_PATH_ADMIN; ?>index.php?src=<?php echo $rest->get("src")?>" method="GET" class="sidebar-form">
                  <div class="input-group">
                     <input type="hidden" name="src" value="<?php echo $rest->get("src")?>">
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