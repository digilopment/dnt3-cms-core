<?php
class PollsFrontend extends Polls{
	
	
	
	public function url($index, $poll_id, $question_id){
		$db 	= new Db;
		$rest 	= new Rest;
		
		$result_url		= "result";
		$next_question 	= false;
		$prev_question 	= false;
		
		//next question
		$query = "SELECT `question_id` FROM dnt_polls_composer WHERE
		vendor_id 	= ".Vendor::getId()." AND
		`key`       = 'question' AND
		`question_id` > '".$question_id."' AND
		poll_id 	= '".$poll_id."' LIMIT 1";
		if($db->num_rows($query)>0){
			foreach($db->get_results($query) as $row){
				$next_question = $row['question_id'];
			}
		}else{
			$next_question = $result_url;
		}
		
		//prev question
		$query = "SELECT `question_id` FROM dnt_polls_composer WHERE
		vendor_id 	= ".Vendor::getId()." AND
		`key`       = 'question' AND
		`question_id` < '".$question_id."' AND
		poll_id 	= '".$poll_id."' LIMIT 1";
		if($db->num_rows($query)>0){
			foreach($db->get_results($query) as $row){
				$prev_question = $row['question_id'];
			}
		}else{
			$prev_question = 1;
		}
		
		if($index == "next")
			return WWW_PATH."".$rest->webhook(1)."/".$poll_id."/".$rest->webhook(3)."/".$next_question;
		elseif($index == "prev"){
			return WWW_PATH."".$rest->webhook(1)."/".$poll_id."/".$rest->webhook(3)."/".$prev_question;
		}
		elseif($index == "first"){
			return WWW_PATH."".$rest->webhook(1)."/".$poll_id."/".$rest->webhook(3)."/1";
			//www_PATH."/".$rest->webhook(1)."/".$rest->webhook(2)."/".$rest->webhook(3)."/1"
		}
	}
	
	public function getCurrentQuestions($poll_id, $question_id){
		$db 	= new Db;
		$query = "SELECT `value` FROM dnt_polls_composer WHERE
		vendor_id 	= ".Vendor::getId()." AND
		poll_id 	= ".$poll_id." AND
		question_id 	= ".$question_id." AND
		`key`       = 'question'";
		if($db->num_rows($query)>0){
			foreach($db->get_results($query) as $row){
				return $row['value'];
			}
		}else{
			return false;
		}
	}
	
	public function getCorrectOpinion($vendor_ansewer_id){
		$db 	= new Db;
		$query = "SELECT `is_correct` FROM dnt_polls_composer WHERE
		vendor_id 	= ".Vendor::getId()." AND
		is_correct 	= '1' AND
		id 	= '".$vendor_ansewer_id."'";
		if($db->num_rows($query)>0){
			foreach($db->get_results($query) as $row){
				return $row['is_correct'];
			}
		}else{
			return 0;
		}
	}
	
	public function getPollsIds($poll_id){
		$db 	= new Db;
		$arr = array();
		$query = "SELECT `question_id` FROM dnt_polls_composer WHERE
		vendor_id 	= ".Vendor::getId()." AND
		`key`       = 'question' AND
		poll_id 	= '".$poll_id."'";
		if($db->num_rows($query)>0){
			foreach($db->get_results($query) as $row){
				$arr[] = $row['question_id'];
			}
		}else{
			$arr[] = 0;
		}
		return $arr;
	}
	
	
	//Funkcia vrati počet spravnych odpovedí v type ankety, kde je očakávaný počet percent ako výsledok
	public function getCorrectAnsewers($poll_id){
		$correct = 0;
		 foreach(self::getPollsIds($poll_id) as $i){
			 $vendor_ansewer_id = Cookie::Get("poll_".$poll_id."_".$i);
			 self::getCorrectOpinion($vendor_ansewer_id);
			 if(self::getCorrectOpinion($vendor_ansewer_id)){
				 $correct++;
			 }
		}
		return $correct;
	}
	
	//Funkcia vrati percentualny vysledok spravnych odpovedi
	public function getResultPercent($poll_id){
		return (100 * self::getCorrectAnsewers($poll_id)) / self::getNumberOfQuestions($poll_id);
	}
	
	public function deleteCookies($poll_id){
		foreach(PollsFrontend::getPollsIds($poll_id) as $i){
			Cookie::Delete("poll_".$poll_id."_".$i);
		}
	}
	
}