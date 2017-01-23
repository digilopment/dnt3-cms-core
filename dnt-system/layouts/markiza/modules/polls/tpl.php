<?php
include "dnt-system/layouts/markiza/tpl_functions.php";
include "dnt-system/layouts/markiza/tpl_top.php";
$rest 		= new Rest;
$db 		= new Db;
$poll_id 	= $rest->webhook(2);
$question_id= $rest->webhook(4);
$poll_input_name = "poll_".$poll_id."_".$question_id;
?>

<div class="panel panel-primary dnt-poll">
   <div class="panel-heading">
      <h3 class="panel-title">
         <span class="glyphicon glyphicon-arrow-right"></span><?php echo PollsFrontend::getCurrentQuestions($poll_id, $question_id); ?>
      </h3>
   </div>
   <div class="panel-body">
      <ul class="list-group">
         <?php
            $query = Polls::getQuestions($poll_id, $question_id);
            if($db->num_rows($query)>0){
            	foreach($db->get_results($query) as $row){
            	?>
         <li class="list-group-item">
            <div class="radio">
               <label>
               <input type="radio" name="<?php echo $poll_input_name; ?>" value="<?php echo $row['id']?>">
               <?php echo $row['value']?>
               </label>
            </div>
         </li>
         <?php
            }
            }
            ?>
      </ul>
   </div>
   <div class="panel-footer">
      <nav aria-label="...">
         <ul class="pagination pagination-lg">
            <li class="page-item ">
               <a class="page-link" href="<?php echo PollsFrontend::url("prev", $poll_id, $question_id)?>" tabindex="-1">Predchádzajúca otázka</a>
            </li>
            <li class="page-item">
               <a class="page-link" href="<?php echo PollsFrontend::url("next", $poll_id, $question_id)?>">Ďalšia otázka</a>
            </li>
         </ul>
      </nav>
   </div>
   <script>
   
   function pollThisDomain() {
       var domena_all = document.domain.split(".sk")[0];
       var domena = domena_all.split(".");
       var lastItem = domena.pop();
       return lastItem;
   }

   function pollDeleteCookie(name) {
       createCookie(name, "", -1);
   }

   function pollSetCookie(cname, cvalue, exMinutes) {
       var d = new Date();
       d.setTime(d.getTime() + (exMinutes * 60 * 1000));
       var expires = "expires=" + d.toGMTString();
       document.cookie = cname + "=" + cvalue + ";path=/;domain=" + pollThisDomain() + ".sk; " + expires;
   }

   function pollGetCookie(cname) {
       var name = cname + "=";
       var ca = document.cookie.split(';');
       for (var i = 0; i < ca.length; i++) {
           var c = ca[i];
           while (c.charAt(0) == ' ') c = c.substring(1);
           if (c.indexOf(name) == 0) {
               return c.substring(name.length, c.length);
           }
       }
       return "";
   }

   function pollCheckCookie() {
       var user = getCookie("username");
       if (user != "") {
           alert("Welcome again " + user);
       } else {
           user = prompt("Please enter your name:", "");
           if (user != "" && user != null) {
               pollSetCookie("username", user, 30);
           }
       }
   }

   function pollIsCookie(name) {

       var myCookie = getCookie(name);

       if (myCookie != "") {
           return true;
       } else {
           return false;
       }
   }

   function pollSetCookie(cname, cvalue, exMinutes) {
       var d = new Date();
       d.setTime(d.getTime() + (exMinutes * 60 * 1000));
       var expires = "expires=" + d.toGMTString();
       document.cookie = cname + "=" + cvalue + ";path=/;domain=" + pollThisDomain() + "; " + expires;
   }
	
	 $( document ).ready(function() {
		 var pollData;
		$("input[name=<?php echo $poll_input_name; ?>]").click(function() {    
			if($("input[name=<?php echo $poll_input_name; ?>]").is(':checked')){
				pollData = $("input[name=<?php echo $poll_input_name; ?>]:checked").val();
				pollSetCookie("<?php echo $poll_input_name; ?>", pollData, 60);
				console.log(pollData);
			}

		});
	});
	</script>
</div>
<?php
include "dnt-system/layouts/markiza/tpl_bottom.php";