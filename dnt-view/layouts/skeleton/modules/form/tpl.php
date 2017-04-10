<?php
   include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
   get_top($data);
   include "dnt-view/layouts/".Vendor::getLayout()."/top.php";
   
   $multylanguage 	= new MultyLanguage;
   
   $translate['predmet'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "predmet"));
   $translate['meno'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "meno"));
   $translate['priezvisko'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "priezvisko"));
   $translate['firma'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "firma"));
   $translate['email'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "email"));
   $translate['tel_c'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "tel_c"));
   $translate['ulica'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "ulica"));
   $translate['psc'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "psc"));
   $translate['mesto'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "mesto"));
   $translate['sprava'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "sprava"));
   $translate['odoslat'] = $multylanguage->getTranslate(array("type" => "static", "translate_id" => "odoslat"));
   
   ?>

<div class="margin-bottom-60"></div>
<div class="container margin-bottom-40">
   <div class="row">
      <!-- Main Content -->
      <div class="col-md-9 main-content">
         <!-- Dynamic Item -->
         <div class="blog-grid margin-bottom-30">
            <h2 class="title-v4"><?php echo $data['article']['name'];?></h2>
            <div class="overflow-h margin-bottom-10 article-view">
               <?php
                  function FormRequestTypes($typ){ 
				  
				    $article 		= new ArticleView;
                  	$typy =array(
                  		1=>
                  		$article->getPostParam("name", 13338), //solidcam
                  		$article->getPostParam("name", 13339), //pdc
                  		$article->getPostParam("name", 13055), //vyskum a vzvoj
                  		//getTranslate(1547, "nazov", "dnt_posts", $dntDb), //lisovanie plastov
                  		$article->getPostParam("name", 13075), //nastrojaren
                  		$article->getPostParam("name", 13058), //kontakt
                  		//getTranslate(1185, "nazov", "dnt_posts", $dntDb) //vyroba
						
                  	);
                  	
                  	$pocet = count($typy);
                  	if(!$typ){	
                  		echo "<option value='' selected></option>";
                  	}
                  	for ($i=1;$i<=$pocet;$i++){
                  		if($typ == $i){
                  			echo "<option value='".$typ."' selected>".$typy[$typ]."</option>";
                  		}
                  		else{
                  			echo "<option value='".$i."'>".$typy[$i]."</option>";
                  		}	
                  	}
                  }
                  ?>
               <script type="text/javascript">
                  $(document).ready(function() {
                  	   $("#form-request").validate({
                  		rules: {
                  			meno: {
                  				required: true,
                  				minlength: 1
                  			},
                  			priezvisko: {
                  				required: true,
                  				minlength: 1
                  			},
                  			firma: {
                  				required: true,
                  				minlength: 1
                  			},
                  			ulica: {
                  				required: true,
                  				minlength: 1
                  			},
                  			c_domu: {
                  				required: true,
                  				minlength: 1
                  			},
                  			psc: {
                  				required: true,
                  				minlength: 1
                  			},
                  			tel_c: {
                  				required: true,
                  				minlength: 1
                  			},
                  			mesto: {
                  				required: true,
                  				minlength: 1
                  			},
                  			email: {
                  				required: true,
                  				email: true
                  			},
                  			sprava: {
                  				required: true,
                  				minlength: 1
                  			},
                  		},
                  		messages: { 
                  			meno:		"Nevyplnili ste meno",
                  			priezvisko:	"Nevyplnili ste priezvisko",
                  			firma:		"Nevyplnili ste firmu",
                  			email:		"Prosím zadajte platný e-mail",
                  			tel_c:		"Nevyplnili ste telefonné číslo",
                  			ulica:		"Nevyplnili ste ulicu",
                  			c_domu:		"Nevyplnili ste adresa domu",
                  			psc:		"Nevyplnili ste PSČ",
                  			mesto:		"Nevyplnili ste mesto",
                  			sprava:		"Nemôžete poslať prázdnu požiadavku",
                  
                  			},
                  		submitHandler: function(form) {
                  			$.ajax({
                  				type: "POST",
                  				url: '<?php echo WWW_PATH; ?>rpc/api/json/ajax-form',
                  				data: $(form).serialize(),
                  				timeout: 10000,
                  				dataType: "json",
                  				success: function(data) {
                  					//var data = jQuery.parseJSON(data);
                  					console.log(data);
                  					 if (data.success == 1) {
                  						$( "#form-request" ).hide();
                  						$( "#form_ok" ).show();
                  					 }
                  					 else if (data.success == 0) {
                  						alert("Bat token");
                  					 }
                  					 else{
                  						writeError(data.message); 
                  					 }
                  				},
                  				error: function() {
                  					alert("Momentálne sme zaneprázdnený.");
                  				}
                  			});
                  			return false;
                  		}
                  	   });	
                  
                  function writeError(message)  {
                  	$("#form-result").html("<div class=\"alert alert-error\">" + message + "</div>");
                  }
                  });
                  	
               </script>
               <form action="" method="post" id="form-request" class="sky-form contact-style">
                  <fieldset class="no-padding">
                     <label><?php echo  $translate["predmet"]; ?> <span class="color-red">*</span></label>
                     <div class="row sky-space-20">
                        <div class="col-md-7 col-md-offset-0">
                           <div>
                              <input type="text" name="predmet" id="predmet" class="form-control">
                           </div>
                        </div>
                     </div>
                     <label><?php echo  $translate["meno"]; ?> <span class="color-red">*</span></label>
                     <div class="row sky-space-20">
                        <div class="col-md-7 col-md-offset-0">
                           <div>
                              <input type="text" name="meno" id="meno" class="form-control">
                           </div>
                        </div>
                     </div>
                     <label><?php echo  $translate["priezvisko"]; ?> <span class="color-red">*</span></label>
                     <div class="row sky-space-20">
                        <div class="col-md-7 col-md-offset-0">
                           <div>
                              <input type="text" name="priezvisko" id="priezvisko" class="form-control">
                           </div>
                        </div>
                     </div>
                     <label><?php echo  $translate["firma"]; ?><span class="color-red">*</span></label>
                     <div class="row sky-space-20">
                        <div class="col-md-7 col-md-offset-0">
                           <div>
                              <input type="text" name="firma" id="firma" class="form-control">
                           </div>
                        </div>
                     </div>
                     <label><?php echo  $translate["email"]; ?> <span class="color-red">*</span></label>
                     <div class="row sky-space-20">
                        <div class="col-md-7 col-md-offset-0">
                           <div>
                              <input type="text" name="email" id="email" class="form-control">
                           </div>
                        </div>
                     </div>
                     <label><?php echo  $translate["tel_c"]; ?><span class="color-red">*</span></label>
                     <div class="row sky-space-20">
                        <div class="col-md-7 col-md-offset-0">
                           <div>
                              <input type="text" name="tel_c" id="tel_c" class="form-control">
                           </div>
                        </div>
                     </div>
                     <label><?php echo  $translate["ulica"]; ?> <span class="color-red">*</span></label>
                     <div class="row sky-space-20">
                        <div class="col-md-7 col-md-offset-0">
                           <div>
                              <input type="text" name="ulica" id="ulica" class="form-control">
                           </div>
                        </div>
                     </div>
                     <label><?php echo  $translate["psc"]; ?><span class="color-red">*</span></label>
                     <div class="row sky-space-20">
                        <div class="col-md-7 col-md-offset-0">
                           <div>
                              <input type="text" name="psc" id="psc" class="form-control">
                           </div>
                        </div>
                     </div>
                     <label><?php echo  $translate["mesto"]; ?> <span class="color-red">*</span></label>
                     <div class="row sky-space-20">
                        <div class="col-md-7 col-md-offset-0">
                           <div>
                              <input type="text" name="mesto" id="mesto" class="form-control">
                           </div>
                        </div>
                     </div>
                     <label><?php echo  $translate["sprava"]; ?> <span class="color-red">*</span></label>
                     <div class="row sky-space-20">
                        <div class="col-md-11 col-md-offset-0">
                           <div>
                              <textarea rows="8" name="sprava" id="message" class="form-control"></textarea>
                           </div>
                        </div>
                     </div>
                     <br/>
                     <button type="submit" name="sent_msg" value="1" class="btn-u"><?php echo  $translate["odoslat"];?></button>
                  </fieldset>
               </form>
               <div id="form_ok" style="display: none;">
                  <div class="message">
                     <h3><i class="rounded-x fa fa-check"></i>Vaša správa bola úspešne odoslaná.</h3>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Right Sidebar -->
      <div class="col-md-3">
         <?php col_right($data); ?>
      </div>
      <!-- End Right Sidebar -->
   </div>
</div>
<?php
get_footer($data);
get_bottom($data);