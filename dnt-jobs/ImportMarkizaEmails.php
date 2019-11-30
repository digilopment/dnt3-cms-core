﻿<?php

class ImportMarkizaEmailsJob {

    protected $dbEmails = [];
    protected $fileEmails = [];
    protected $catId = 55;
    protected $vendorId = 39;

    protected function countEmails() {
        $db = new Db;
        $query = "SELECT email FROM dnt_mailer_mails WHERE cat_id = '" . $this->catId . "' AND vendor_id = '" . $this->vendorId . "'";
        $emails = [];
        foreach ($db->get_results($query) as $row) {
            $emails[] = $row['email'];
        }
        return count($emails);
    }

    protected function writeToDb($email) {
        $db = new Db;
        $name = "";
        $surname = "";
        $table = "dnt_mailer_mails";

        $insertedData = array(
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'vendor_id' => $this->vendorId,
            'cat_id' => $this->catId,
            'datetime_creat' => Dnt::datetime(),
            'datetime_update' => Dnt::datetime()
        );

        $db->insert('dnt_mailer_mails', $insertedData);
    }

    protected function deleteFromDb($email) {
        $db = new Db;
        $where = array(
            'email' => $email,
            'vendor_id' => $this->vendorId
        );
        $db->delete('dnt_mailer_mails', $where, 1);
    }

    protected function dbEmails() {

        $table = "dnt_mailer_mails";
        $db = new Db;

        $query = "SELECT email FROM $table WHERE cat_id = '" . $this->catId . "' AND vendor_id = '" . $this->vendorId . "'";
        foreach ($db->get_results($query) as $row) {
            $this->dbEmails[] = strtolower($row['email']);
        }
    }

    protected function fileEmails($file) {
        $row = 1;
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $row++;
                for ($c = 0; $c < $num; $c++) {
                    $this->fileEmails[] = strtolower($data[$c]);
                }
            }
            fclose($handle);
        }
    }

    protected function insert() {
        $this->dbEmails();
        $this->fileEmails("velkanoc2019.csv");

        //INSERT
        foreach ($this->fileEmails as $fileEmail) {
            if (!in_array($fileEmail, $this->dbEmails)) {
                $this->writeToDb($fileEmail);
                echo $fileEmail . "nie je v databaze<br/>";
            }
        }
    }

    protected function delete() {
        $this->dbEmails();
        $this->fileEmails("delete.csv");

        //DELETE GDPR
        foreach ($this->fileEmails as $fileEmail) {
            if (in_array($fileEmail, $this->dbEmails)) {
                $this->deleteFromDb($fileEmail);
                echo $fileEmail . "je v databaze a treba zmazat<br/>";
            }
        }
    }

    public function run() {

        if ((new Rest())->get('inser')) {
            $this->insert();
        }
        if ((new Rest())->get('delete')) {
            $this->delete();
        }
        if ((new Rest())->get('count')) {
            print $this->countEmails();
        }
    }

}