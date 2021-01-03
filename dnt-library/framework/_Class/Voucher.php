<?php

/**
 *  class       Voucher
 *  author      Tomas Doubek
 *  framework   Sessions
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\Mailer;
use DntLibrary\Base\User;
use DntLibrary\Base\Vendor;

class Voucher
{

    public function __construct()
    {
        $this->db = new DB();
        $this->frontend = new Frontend();
        $this->dnt = new Dnt();
        $this->mailer = new Mailer();
        $this->user = new User();
        $this->vendor = new Vendor();
    }

    protected function sentEmail($recipientEmail, $voucherValue)
    {


        $data = $this->frontend->get();
        $senderEmail = $data['meta_settings']['keys']['notifikacny_email']['value'];
        $messageTitle = "Zľavový kód na Skipas";
        $msg = 'Dobrý deň, prednedávnom ste sa zapojili do súťaže  na www stránke <b>http://markiza.localhost/dnt3/</b>. Vyžrebovali sme Vás z pomedzi súťažiacich. Vás kód môžete použiť v Lyžiarskom stredisku <b>Zell Am See</b>.<br><br/>
		Váš kupón: <h3>' . $voucherValue . '<h3>';

        $this->mailer->set_recipient(array($recipientEmail));
        $this->mailer->set_msg($msg);
        $this->mailer->set_subject($messageTitle);
        $this->mailer->set_sender_name($senderEmail);
        $this->mailer->sent_email();
    }

    public function assignLastVoucher($userId)
    {
        $this->db->dbTransaction();
        $query = "SELECT * FROM dnt_vouchers WHERE user_id = '0' ORDER BY `order` ASC LIMIT 1";
        $v_value = false;
        $v_id_entity = false;
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $v_value = $row['value'];
                $v_id_entity = $row['id_entity'];
                $voucherData = $v_value . ";" . $v_id_entity;
            }
        }

        //AK JE ESTE VOLNY VOUCHER
        if ($v_id_entity) {
            $user = $this->user->getUser($userId);
            if ($user[0]['voucher'] == "") {
                //UPDATE USER
                $this->db->update(
                        "dnt_registred_users", //table
                        array(//set
                            'voucher' => $voucherData,
                            'datetime_update' => $this->dnt->datetime(),
                        ), array(//where
                    'id_entity' => $userId,
                    'vendor_id' => $this->vendor->getId(),
                        )
                );

                //UPDATE VOUCHERS
                $this->db->update(
                        "dnt_vouchers", //table
                        array(//set
                            'user_id' => $userId,
                            'datetime_update' => $this->dnt->datetime(),
                        ), array(//where
                    'id_entity' => $v_id_entity,
                    'vendor_id' => $this->vendor->getId(),
                        )
                );

                //ODOSLAT EMAIL
                $this->sentEmail($user[0]['email'], $v_value);
            }
            $return = true;
        } else {
            $return = false;
        }
        $this->db->dbCommit();
        return $return;
    }

}
