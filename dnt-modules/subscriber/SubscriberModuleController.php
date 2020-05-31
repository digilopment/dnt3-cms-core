<?php

namespace DntModules\Controllers;

use DntLibrary\Base\DB;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class SubscriberModuleController
{

    protected $db;
    protected $rest;

    public function __construct()
    {
        $this->db = new DB();
        $this->rest = new Rest();
    }

    protected function testGenerateUrl($status = 0)
    {

        // generate URL IN client
        //
        // ZRUSIT PRIJMANIE
        // $url = WWW_PATH . 'subscriber/?email=' . urlencode(base64_encode('thomas.doubek@gmail.com')) . '&vendor_id=' . urlencode(base64_encode(Vendor::getId())) . '&status=' . urlencode(base64_encode('1')) . '&id_entity=' . urlencode(base64_encode('46899'));
        //
        // POTVRDIT PRIJMANIE
        // $url = WWW_PATH . 'subscriber/?email=' . urlencode(base64_encode('thomas.doubek@gmail.com')) . '&vendor_id=' . urlencode(base64_encode(Vendor::getId())) . '&status=' . urlencode(base64_encode('0')) . '&id_entity=' . urlencode(base64_encode('46899'));
        //
        $id_entity = 46899;
        $email = 'thomas.doubek@gmail.com';
        $url = WWW_PATH . 'subscriber/?email=' . urlencode(base64_encode($email)) . '&vendor_id=' . urlencode(base64_encode(Vendor::getId())) . '&status=' . urlencode(base64_encode($status)) . '&id_entity=' . urlencode(base64_encode($id_entity));
        return $url;
    }

    protected function test()
    {
        if ($this->rest->get('test') == 1) {
            echo 'zrusit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $this->testGenerateUrl(0);
            echo '<br/>';
            echo 'potvrdit&nbsp;' . $this->testGenerateUrl(1);
            exit;
        }
    }

    public function run()
    {

        $email = base64_decode(urldecode($this->rest->get('email')));
        $vendor_id = base64_decode(urldecode($this->rest->get('vendor_id')));
        $status = base64_decode(urldecode($this->rest->get('status')));
        $id_entity = base64_decode(urldecode($this->rest->get('id_entity')));

        $this->test();

        if ($status == 1 || $status = 0) {

            $this->db->update(
                    'dnt_mailer_mails',
                    array(
                        'show' => $status
                    ),
                    array(
                        'vendor_id' => $vendor_id,
                        'email' => $email,
                        'id_entity' => $id_entity,
                    )
            );

            if ($status == 0) {
                $errTitle = 'Zrušenie žiadosti / <strong>o príjmanie newslettrov</strong>';
                $errContent = '<strong>Vaša žiadosť o prijmanie newslettrov bola úspešne zrušená.</strong><br/><a href="' . WWW_PATH . '">Domov</a>';
            }
            if ($status == 1) {
                $errTitle = 'Potvrdenie žiadosti / <strong>o príjmanie newslettrov</strong>';
                $errContent = '<strong>Vaša žiadosť o prijmanie newslettrov bola úspešne potvrdená.</strong><br/><a href="' . WWW_PATH . '">Domov</a>';
            }
            include 'templates/default.php';
        }
    }

}
