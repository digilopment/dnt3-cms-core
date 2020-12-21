<?php

/**
 *  class       PollsFrontend
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\Cookie;
use DntLibrary\Base\DB;
use DntLibrary\Base\Polls;
use DntLibrary\Base\PollsFrontend;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class PollsFrontend extends Polls
{

	public function __construct(){
		parent::__construct();
		$this->db = new DB();
		$this->dnt = new Dnt();
		$this->vendor = new Vendor();
		$this->rest = new Rest();
		$this->cookie = new Cookie();
	}
    /**
     * 
     * @param type $index
     * @param type $poll_id
     * @param type $question_id
     * @return type
     */
    public function url($index, $poll_id, $question_id)
    {
        $result_url = "result";
        $next_question = false;
        $prev_question = false;

        //first question 
        $query = "SELECT `question_id` FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		`key`       = 'question' AND
		poll_id 	= '" . $poll_id . "' LIMIT 1";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $first_question = $row['question_id'];
            }
        } else {
            $first_question = false;
        }

        //next question
        $query = "SELECT `question_id` FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		`key`       = 'question' AND
		`question_id` > '" . $question_id . "' AND
		poll_id 	= '" . $poll_id . "' LIMIT 1";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $next_question = $row['question_id'];
            }
        } else {
            $next_question = $result_url;
        }

        //prev question
        $query = "SELECT `question_id` FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		`key`       = 'question' AND
		`question_id` < '" . $question_id . "' AND
		poll_id 	= '" . $poll_id . "' LIMIT 1";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
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
    public function getCurrentQuestions($poll_id, $question_id)
    {
        $query = "SELECT `value` FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		poll_id 	= " . $poll_id . " AND
		question_id 	= " . $question_id . " AND
		`key`       = 'question'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                return $row['value'];
            }
        } else {
            return false;
        }
    }

    public function getValueByInputId($input, $id)
    {
        $query = "SELECT `$input` FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		id_entity = $id";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                return $row[$input];
            }
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $vendor_ansewer_id
     * @return int
     * METODA 1
     */
    public function getCorrectOpinion($vendor_ansewer_id)
    {
        $query = "SELECT `is_correct` FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		is_correct 	= '1' AND
		id_entity 	= '" . $vendor_ansewer_id . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
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
    public function getCorrectAnsewers($poll_id)
    {
        $correct = 0;
        foreach ($this->getPollsIds($poll_id) as $i) {
            $vendor_ansewer_id = $this->cookie->Get("poll_" . $poll_id . "_" . $i);
            $this->getCorrectOpinion($vendor_ansewer_id);
            if ($this->getCorrectOpinion($vendor_ansewer_id)) {
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
    public function getResultPercent($poll_id)
    {
        return (100 * $this->getCorrectAnsewers($poll_id)) / $this->getNumberOfQuestions($poll_id);
    }

    /**
     * 
     * @param type $poll_id
     * @return type
     * Funkcia vrati percentualny progress
     */
    public function getProgressPercent($poll_id, $question_id)
    {
        $current = -1;
        foreach ($this->getPollsIds($poll_id) as $currentQuestionId) {
            if ($currentQuestionId <= $question_id) {
                $current++;
            }
        }
        return (100 * $current) / $this->getNumberOfQuestions($poll_id);
    }

    /**
     * 
     * @param type $vendor_ansewer_id
     * @return int
     * METODA 2
     */
    public function getVendorAnsewerPoints($vendor_ansewer_id)
    {
        $query = "SELECT `points` FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		id_entity 	= '" . $vendor_ansewer_id . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
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
    public function getVendorPoints($poll_id)
    {
        $correct = 0;
        foreach ($this->getPollsIds($poll_id) as $i) {
            $vendor_ansewer_id = $this->cookie->Get("poll_" . $poll_id . "_" . $i);
            $this->getVendorAnsewerPoints($vendor_ansewer_id);
            if ($this->getVendorAnsewerPoints($vendor_ansewer_id)) {
                $correct += $this->getVendorAnsewerPoints($vendor_ansewer_id);
            }
        }
        return $correct;
    }

    /**
     * 
     * @param type $poll_id
     * @return type
     */
    public function getVendorResultPointsRange($poll_id)
    {
        $points = $this->getVendorPoints($poll_id);
        $data = array(false);
        $points_MAX = 0;
        $points_MIN = 0;

        $query = $this->getWinningCombinationData($poll_id);
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                //ziska maximum z rozsahu
                if ($row['points'] >= $points) {
                    $points_MAX = $row['points'];
                    break; //zabezpeči len nasledujucu hodnotu, nie tie dalsie 
                }
            }

            foreach ($this->db->get_results($query) as $row) {
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
    public function getVendorResultPointsCat($poll_id)
    {
        $points_range = $this->getVendorResultPointsRange($poll_id);
        $poins_max = $points_range['max'];
        //$points_range = $this->getVendorResultPointsRange($poll_id);

        $query = "SELECT * FROM dnt_polls_composer WHERE 
		`poll_id` = '$poll_id' AND
		`points` = '$poins_max' AND
		`key` = 'winning_combination' AND
		`vendor_id` = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
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
    public function getComposerDataById($column, $id)
    {
        $query = "SELECT `$column` FROM dnt_polls_composer WHERE 
		`id_entity` = '$id' AND
		`vendor_id` = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
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
    public function deleteCookies($poll_id)
    {
        foreach ($this->getPollsIds($poll_id) as $i) {
            $this->cookie->Delete("poll_" . $poll_id . "_" . $i);
        }
    }

}
