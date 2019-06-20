<?php

/**
 *  class       PollsFrontend
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
class PollsFrontend extends Polls {

    /**
     * 
     * @param type $index
     * @param type $poll_id
     * @param type $question_id
     * @return type
     */
    public function url($index, $poll_id, $question_id) {
        $db = new Db;
        $rest = new Rest;

        $result_url = "result";
        $next_question = false;
        $prev_question = false;

        //first question 
        $query = "SELECT `question_id` FROM dnt_polls_composer WHERE
		vendor_id 	= " . Vendor::getId() . " AND
		`key`       = 'question' AND
		poll_id 	= '" . $poll_id . "' LIMIT 1";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $first_question = $row['question_id'];
            }
        } else {
            $first_question = false;
        }

        //next question
        $query = "SELECT `question_id` FROM dnt_polls_composer WHERE
		vendor_id 	= " . Vendor::getId() . " AND
		`key`       = 'question' AND
		`question_id` > '" . $question_id . "' AND
		poll_id 	= '" . $poll_id . "' LIMIT 1";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $next_question = $row['question_id'];
            }
        } else {
            $next_question = $result_url;
        }

        //prev question
        $query = "SELECT `question_id` FROM dnt_polls_composer WHERE
		vendor_id 	= " . Vendor::getId() . " AND
		`key`       = 'question' AND
		`question_id` < '" . $question_id . "' AND
		poll_id 	= '" . $poll_id . "' LIMIT 1";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $prev_question = $row['question_id'];
            }
        } else {
            $prev_question = 1;
        }

        if ($index == "next")
            return WWW_PATH . "" . $rest->webhook(1) . "/" . $poll_id . "/" . $rest->webhook(3) . "/" . $next_question;
        elseif ($index == "prev") {
            return WWW_PATH . "" . $rest->webhook(1) . "/" . $poll_id . "/" . $rest->webhook(3) . "/" . $prev_question;
        } elseif ($index == "first") {
            return WWW_PATH . "" . $rest->webhook(1) . "/" . $poll_id . "/" . $rest->webhook(3) . "/" . $first_question;
            //www_PATH."/".$rest->webhook(1)."/".$rest->webhook(2)."/".$rest->webhook(3)."/1"
        }
    }

    /**
     * 
     * @param type $poll_id
     * @param type $question_id
     * @return boolean
     */
    public function getCurrentQuestions($poll_id, $question_id) {
        $db = new Db;
        $query = "SELECT `value` FROM dnt_polls_composer WHERE
		vendor_id 	= " . Vendor::getId() . " AND
		poll_id 	= " . $poll_id . " AND
		question_id 	= " . $question_id . " AND
		`key`       = 'question'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                return $row['value'];
            }
        } else {
            return false;
        }
    }
	
	 public function getValueByInputId($input, $id) {
        $db = new Db;
        $query = "SELECT `$input` FROM dnt_polls_composer WHERE
		vendor_id 	= " . Vendor::getId() . " AND
		id_entity = $id";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                return $row[$input];
            }
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $poll_id
     * @return int
     */
    public function getPollsIds($poll_id) {
        $db = new Db;
        $arr = array();
        $query = "SELECT `question_id` FROM dnt_polls_composer WHERE
		vendor_id 	= " . Vendor::getId() . " AND
		`key`       = 'question' AND
		poll_id 	= '" . $poll_id . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $arr[] = $row['question_id'];
            }
        } else {
            $arr[] = 0;
        }
        return $arr;
    }

    /**
     * 
     * @param type $vendor_ansewer_id
     * @return int
     * METODA 1
     */
    public function getCorrectOpinion($vendor_ansewer_id) {
        $db = new Db;
        $query = "SELECT `is_correct` FROM dnt_polls_composer WHERE
		vendor_id 	= " . Vendor::getId() . " AND
		is_correct 	= '1' AND
		id_entity 	= '" . $vendor_ansewer_id . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                return $row['is_correct'];
            }
        } else {
            return 0;
        }
    }

    /**
     * 
     * @param type $poll_id
     * @return int
     * Funkcia vrati počet spravnych odpovedí v type ankety, kde je očakávaný počet percent ako výsledok
     */
    public function getCorrectAnsewers($poll_id) {
        $correct = 0;
        foreach (self::getPollsIds($poll_id) as $i) {
            $vendor_ansewer_id = Cookie::Get("poll_" . $poll_id . "_" . $i);
            self::getCorrectOpinion($vendor_ansewer_id);
            if (self::getCorrectOpinion($vendor_ansewer_id)) {
                $correct++;
            }
        }
        return $correct;
    }

    /**
     * 
     * @param type $poll_id
     * @return type
     * Funkcia vrati percentualny vysledok spravnych odpovedi
     */
    public function getResultPercent($poll_id) {
        return (100 * self::getCorrectAnsewers($poll_id)) / self::getNumberOfQuestions($poll_id);
    }
	
	
	 /**
     * 
     * @param type $poll_id
     * @return type
     * Funkcia vrati percentualny progress
     */
    public function getProgressPercent($poll_id, $question_id) {
		$current = 0;
        foreach (self::getPollsIds($poll_id) as $currentQuestionId) {
            if($currentQuestionId <= $question_id){
                $current++;
            }
        }
		return (100 * $current) / self::getNumberOfQuestions($poll_id);
    }

    /**
     * 
     * @param type $vendor_ansewer_id
     * @return int
     * METODA 2
     */
    public function getVendorAnsewerPoints($vendor_ansewer_id) {
        $db = new Db;
        $query = "SELECT `points` FROM dnt_polls_composer WHERE
		vendor_id 	= " . Vendor::getId() . " AND
		id_entity 	= '" . $vendor_ansewer_id . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                return $row['points'];
            }
        } else {
            return 0;
        }
    }

    /**
     * 
     * @param type $poll_id
     * @return type
     */
    public function getVendorPoints($poll_id) {
        $correct = 0;
        foreach (self::getPollsIds($poll_id) as $i) {
            $vendor_ansewer_id = Cookie::Get("poll_" . $poll_id . "_" . $i);
            self::getVendorAnsewerPoints($vendor_ansewer_id);
            if (self::getVendorAnsewerPoints($vendor_ansewer_id)) {
                $correct += self::getVendorAnsewerPoints($vendor_ansewer_id);
            }
        }
        return $correct;
    }

    /**
     * 
     * @param type $poll_id
     * @return type
     */
    public function getVendorResultPointsRange($poll_id) {
        $db = new Db;
        $points = self::getVendorPoints($poll_id);
        $data = array(false);
        $points_MAX = 0;
        $points_MIN = 0;

        $query = self::getWinningCombinationData($poll_id);
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                //ziska maximum z rozsahu
                if ($row['points'] >= $points) {
                    $points_MAX = $row['points'];
                    break; //zabezpeči len nasledujucu hodnotu, nie tie dalsie 
                }
            }

            foreach ($db->get_results($query) as $row) {
                //ziska minimum z rozsah
                if ($row['points'] < $points) {
                    $points_MIN = $row['points'];
                }
            }
        }
        $data = array(
            "max" => $points_MAX,
            "min" => $points_MIN + 1 //+1 preto, aby sa dopočítal rozsah
        );
        return $data;
    }

    /**
     * 
     * @param type $poll_id
     * @return boolean
     */
    public function getVendorResultPointsCat($poll_id) {
        $db = new Db;
        $points_range = self::getVendorResultPointsRange($poll_id);
        $poins_max = $points_range['max'];
        //$points_range = self::getVendorResultPointsRange($poll_id);

        $query = "SELECT * FROM dnt_polls_composer WHERE 
		`poll_id` = '$poll_id' AND
		`points` = '$poins_max' AND
		`key` = 'winning_combination' AND
		`vendor_id` = '" . Vendor::getId() . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $points = $row['id'];
            }
        } else {
            $points = false;
        }

        return $points;
    }

    /**
     * 
     * @param type $column
     * @param type $id
     * @return boolean
     */
    public function getComposerDataById($column, $id) {
        $db = new Db;
        $query = "SELECT `$column` FROM dnt_polls_composer WHERE 
		`id_entity` = '$id' AND
		`vendor_id` = '" . Vendor::getId() . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $return = $row[$column];
            }
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * 
     * @param type $poll_id
     */
    public function deleteCookies($poll_id) {
        foreach (PollsFrontend::getPollsIds($poll_id) as $i) {
            Cookie::Delete("poll_" . $poll_id . "_" . $i);
        }
    }

}
