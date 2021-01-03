<?php

/**
 *  class       Polls
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class Polls
{

    public function __construct()
    {
        $this->db = new DB();
        $this->dnt = new Dnt();
        $this->vendor = new Vendor();
        $this->rest = new Rest();
    }

    /**
     * 
     * @return type
     */
    public function getTypes()
    {
        return array(
            "1" => "Kvíz s percentuálnou úspešnosťou (Vedomostný kvíz)",
            "2" => "Kvíz s predpokladaným výsledkom kategorizácie (Priraďovací kvíz)",
        );
    }

    /**
     * 
     * @param type $type
     */
    public function currentType($type)
    {
        foreach ($this->getTypes() as $key => $value) {
            if ($type == $key)
                echo "<option value='" . $key . "' selected>" . $value . "</option>";
            else
                echo "<option value='" . $key . "'>" . $value . "</option>";
        }
    }

    /**
     * 
     * @param type $type
     * @return type
     */
    public function currentTypeStr($type)
    {
        $types = $this->getTypes();
        return $types[$type];
    }

    /**
     * 
     * @param type $poll_id
     */
    public function is_correct($poll_id)
    {
        
    }

    /**
     * 
     * @return string
     */
    public function getPolls()
    {
        return "SELECT * FROM dnt_polls WHERE `show` <> '0' AND `show` <> '3' AND vendor_id = '" . $this->vendor->getId() . "'";
    }

    /**
     * 
     * @return type
     */
    public function getPollsAdmin()
    {
        return "SELECT * FROM dnt_polls WHERE vendor_id = '" . $this->vendor->getId() . "'";
    }

    /**
     * 
     * @return type
     * returns @integer - last id 
     * add insert query *add insert query
     * this function generate wrapper of current poll
     */
    public function generatePoll()
    {
        $insertedData = array(
            'vendor_id' => $this->vendor->getId(),
            'name' => $this->rest->post("name"),
            'name_url' => $this->dnt->name_url($this->rest->post("name")),
            'type' => $this->rest->post("poll_type"),
            'datetime_creat' => $this->dnt->datetime(),
            'datetime_update' => $this->dnt->datetime(),
            'datetime_publish' => $this->dnt->datetime(),
            '`show`' => '0',
            'count_questions' => $this->rest->post("count_questions")
        );

        $this->db->insert('dnt_polls', $insertedData);
        $lastId = $this->dnt->getLastId('dnt_polls');
        return $lastId;
    }

    /**
     * 
     * @param type $column
     * @param type $poll_id
     * @return boolean
     * this functionreturn return dnt_polls param.
     */
    public function getParam($column, $poll_id)
    {
        $query = "SELECT `$column` FROM dnt_polls WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		id_entity 	= " . $poll_id . "";

        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                return $row[$column];
            }
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $poll_id
     * @return type
     * return $integer
     * this functionreturn number of question in one poll.
     */
    public function getNumberOfQuestions($poll_id)
    {
        $query = "SELECT * FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		poll_id 	= " . $poll_id . " AND
		`key`       = 'question'";
        return $this->db->num_rows($query);
    }

    /**
     * 
     * @param type $poll_id
     * no return 
     * add insert query
     * this function generate polls meta.
     */
    public function generateDefaultComposer($poll_id)
    {
        //get instances
        $question_id = 1;
        $questions = 5;
        $order = $questions;
        $winning_combination = 3;
        $count_questions = $this->getParam("count_questions", $poll_id);

        //generovanie inputov pre vyherne kombinacie..
        for ($i = 1; $i <= $winning_combination; $i++) {
            $points = ($i - 1) * 3; //zabezpeči relevantný počet bodov
            $insertedData = array(
                '`vendor_id`' => $this->vendor->getId(),
                '`poll_id`' => $poll_id,
                '`question_id`' => "0", // winning_combination ma vzdy index 0
                '`key`' => "winning_combination",
                '`value`' => "Výherná kombinácia č. $i",
                '`description`' => "Výherná kombinácia č. $i",
                '`show`' => "1",
                '`points`' => $points,
                '`order`' => "$order",
            );
            $this->db->insert('dnt_polls_composer', $insertedData);
        }

        for ($j = 1; $j <= $questions; $j++) {

            //generovanie inputov pre otazky..
            $insertedData = array(
                '`vendor_id`' => $this->vendor->getId(),
                '`poll_id`' => $poll_id,
                '`question_id`' => $question_id,
                '`key`' => "question",
                '`value`' => "Otázka",
                '`description`' => "Tu zadajte Vašu otázku",
                '`show`' => "1",
                '`order`' => "$order",
            );
            $this->db->insert('dnt_polls_composer', $insertedData);


            //generovanie inputov pre typy odpovedí A,B,C,D...
            for ($i = 1; $i <= $count_questions; $i++) {
                $insertedData = array(
                    '`vendor_id`' => $this->vendor->getId(),
                    '`poll_id`' => $poll_id,
                    '`question_id`' => $question_id,
                    '`key`' => "ans",
                    '`value`' => "Odpoveď pre otázku",
                    '`description`' => "Tu zadajte jednu z Vaších odpovedi pre otázku",
                    '`points`' => "$i",
                    '`show`' => "1",
                );
                $this->db->insert('dnt_polls_composer', $insertedData);
            }
            $question_id++;
            $order--;
        }
    }

    /**
     * 
     * @param type $poll_id
     * @param type $question_id
     */
    public function addQuestion($poll_id, $question_id)
    {
        $count_questions = $this->getParam("count_questions", $poll_id);
        $question_id = $question_id + 1;
        $order = false;

        $insertedData = array(
            '`vendor_id`' => $this->vendor->getId(),
            '`poll_id`' => $poll_id,
            '`question_id`' => $question_id,
            '`key`' => "question",
            '`value`' => "Otázka",
            '`description`' => "Tu zadajte Vašu otázku",
            '`show`' => "1",
            '`order`' => "$order",
        );
        $this->db->insert('dnt_polls_composer', $insertedData);

        //$this->dnt->getIdEntity($lastId);

        for ($i = 1; $i <= $count_questions; $i++) {
            $insertedData = array(
                '`vendor_id`' => $this->vendor->getId(),
                '`poll_id`' => $poll_id,
                '`question_id`' => $question_id,
                '`key`' => "ans",
                '`value`' => "Odpoveď pre otázku",
                '`description`' => "Tu zadajte jednu z Vaších odpovedi pre otázku",
                '`points`' => "",
                '`show`' => "1",
            );
            $this->db->insert('dnt_polls_composer', $insertedData);
        }
    }

    /**
     * 
     * @param type $poll_id
     * @param type $question_id
     */
    public function AddWinningCombination($poll_id, $question_id = 0)
    {
        $order = false;
        $insertedData = array(
            '`vendor_id`' => $this->vendor->getId(),
            '`poll_id`' => $poll_id,
            '`question_id`' => $question_id,
            '`key`' => "winning_combination",
            '`value`' => "Výherná kombinácia",
            '`description`' => "Výherná kombinácia",
            '`show`' => "1",
            '`order`' => "$order",
        );
        $this->db->insert('dnt_polls_composer', $insertedData);
    }

    /**
     * 
     * @param type $poll_id
     * @param type $question_id
     */
    public function delQuestion($poll_id, $question_id)
    {
        $where = array('question_id' => $question_id, 'poll_id' => $poll_id, 'vendor_id' => $this->vendor->getId());
        $this->db->delete('dnt_polls_composer', $where);
    }

    /**
     * 
     * @param type $id
     */
    public function delComposerInput($id)
    {
        $where = array('id_entity' => $id, 'vendor_id' => $this->vendor->getId());
        $this->db->delete('dnt_polls_composer', $where);
    }

    /**
     * 
     * @param type $poll_id
     * @param type $copy_poll_id
     * no return 
     * this function generate polls meta via copy.
     */
    public function copyComposer($poll_id, $copy_poll_id)
    {
        //get instances
        $query = "SELECT * FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		poll_id 	= " . $copy_poll_id . "";

        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $insertedData = array(
                    '`vendor_id`' => $this->vendor->getId(),
                    '`poll_id`' => $poll_id,
                    '`question_id`' => $row['question_id'],
                    '`key`' => $row['key'],
                    '`value`' => $row['value'],
                    '`description`' => $row['description'],
                    '`show`' => $row['show'],
                    '`points`' => $row['points'],
                    '`order`' => $row['order'],
                    '`is_correct`' => $row['is_correct'],
                    '`img`' => $row['img'],
                );

                $this->db->insert('dnt_polls_composer', $insertedData);
            }
        }

        $query = "SELECT * FROM dnt_polls WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		id_entity 	= " . $copy_poll_id . "";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {

                $table = "dnt_polls";
                $this->db->update(
                        $table, //table
                        array(//set
                            'name' => $row['name'],
                            'name_url' => $row['name_url'],
                            'type' => $row['type'],
                            'img' => $row['img'],
                            'content' => $row['content'],
                            'count_questions' => $row['count_questions'],
                        ), array(//where
                    'id_entity' => $poll_id,
                    '`vendor_id`' => $this->vendor->getId())
                );
            }
        }
    }

    /**
     * 
     * @param type $poll_id
     * @param type $question_id
     * @return type
     * return @string
     * this function returs query included 2 arguments: $poll_id and $question_id
     */
    public function getCurrentAnsewerData($poll_id, $question_id)
    {
        return "SELECT * FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		poll_id 	= " . $poll_id . " AND
		`key` <> 'winning_combination' AND
		question_id = " . $question_id . "";
    }

    /**
     * 
     * @param type $poll_id
     * @param type $question_id
     * @return type
     */
    public function getQuestions($poll_id, $question_id)
    {
        return "SELECT * FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		poll_id 	= " . $poll_id . " AND
		`key` LIKE '%ans%' AND
		question_id = " . $question_id . "";
    }

    /*
     *
     * return @string
     * this function returs query included 2 arguments: $poll_id and $question_id
     *
     */

    public function getWinningCombinationData($poll_id)
    {
        return "SELECT * FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		poll_id 	= " . $poll_id . " AND
		`key` = 'winning_combination'";
    }

    /**
     * 
     * @param type $poll_id
     * @return type
     */
    public function getPollData($poll_id)
    {
        return "SELECT * FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		poll_id 	= " . $poll_id . "";
    }

    /**
     * 
     * @param type $prefix
     * @param type $id
     * @param type $column
     * @return type
     * eturn @string
     * this function creat poll <input> name="{key}"
     */
    public function inputName($prefix, $id, $column)
    {
        return $id . "_" . $prefix . "_" . $column;
    }

    /**
     * 
     * @param type $poll_id
     * @param type $question_id
     * @return type
     * maximalny pocet bodov v jednej otazke
     * metoda sa pouzije na vypocet MAX points pre kazdu otazku
     */
    public function getMaxPointInQuestion($poll_id, $question_id)
    {
        $query = "SELECT MAX(points) FROM dnt_polls_composer WHERE 
		vendor_id = '" . $this->vendor->getId() . "' AND 
		`key` LIKE '%ans%' AND 
		poll_id = '" . $poll_id . "' AND 
		question_id = '" . $question_id . "'";
        $max = $this->db->get_row($query);
        return $max[0];
    }

    public function getPollsIds($poll_id)
    {
        $arr = array();
        $query = "SELECT `question_id` FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		`key`       = 'question' AND
		poll_id 	= '" . $poll_id . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $arr[] = $row['question_id'];
            }
        } else {
            $arr[] = 0;
        }
        return $arr;
    }

    /**
     * 
     * @param type $poll_id
     * @return type
     * return @string
     * this function return integer of MAX POINTS
     */
    public function getMaxPoint($poll_id)
    {

        $query = "SELECT * FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		`key` 	LIKE '%ans%' AND
		poll_id 	= " . $poll_id . "";

        $points = 0;
        foreach ($this->getPollsIds($poll_id) as $question_id) {
            $points += $this->getMaxPointInQuestion($poll_id, $question_id);
        }

        return $points;
    }

}
