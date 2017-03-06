
<?php if($row['url_fotka']){ ?>
<style type="text/css">
.microslider-wrapper{
	background: url('<?php echo setPostImage($row['url_fotka'], $row['fotka_pripona'], $row['typ'], $dntDb);?>') no-repeat center center fixed; 
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
}
</style>
<div class="microslider-wrapper">
<!--<div class="arrow-left"></div>-->
	<div class="page-name-wrapper">
		<span class="page-name"><span class="name"><?php echo getTranslate($row['id'], "nazov", "dnt_posts", $dntDb); ?></span></span>
	</div>
</div>
<?php } ?>

 


<div class="margin-bottom-60"></div>
<div class="container margin-bottom-40">
   <div class="row">
      <!-- Main Content -->
      <div class="col-md-9 main-content">
         <!-- Dynamic Item -->
         <div class="blog-grid margin-bottom-30">
            <h2 class="title-v4"> <?php echo get_title($dntDb);?></h2>
            <div class="overflow-h margin-bottom-10 article-view">