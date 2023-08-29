<?php

namespace DntModules\Controllers;

use App\Subscriber;
use DntLibrary\Base\Rest;

class SubscriberModuleController
{
    protected $subscriber;

    protected $dnt;

    public function __construct()
    {
        $this->subscriber = new Subscriber();
        $this->rest = new Rest();
        $this->customReferers = [
            'markiza',
            'tvnoviny',
            'localhost',
        ];
    }

    /*
      protected function htmlResponse()
      {
      if ($this->isSubsscriber == 1) {
      $errTitle = 'Potvrdenie žiadosti / <strong>o príjmanie newslettrov</strong>';
      $errContent = '<strong>Vaša žiadosť o prijmanie newslettrov bola úspešne potvrdená.</strong><br/><a href="' . WWW_PATH . '">Domov</a>';
      } elseif ($this->isSubsscriber == 0) {
      $errTitle = 'Zrušenie žiadosti / <strong>o príjmanie newslettrov</strong>';
      $errContent = '<strong>Vaša žiadosť o prijmanie newslettrov bola úspešne zrušená.</strong><br/><a href="' . WWW_PATH . '">Domov</a>';
      } else {
      $errTitle = '<strong>Vaša žiadosť bola zamietnutá.</strong><br/>';
      $errContent = '<strong>Nastala neznáma chyba. <a href="' . WWW_PATH . '">Domov</a>';
      }
      include 'templates/default.php';
      }
     */

    public function testGenerateUrl()
    {
        if ($this->rest->get('test') == 1) {
            $id_entity = 46899;
            $email = 'thomas.doubek@gmail.com';
            $unSubscribeUrl = $this->subscriber->generateUrl($id_entity, $email, 0);

            echo 'zrusit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $unSubscribeUrl;
            echo '<br/>';
            echo 'potvrdit&nbsp;' . $this->subscriber->generateUrl($id_entity, $email, 1);
            exit;
        }
    }

    public function init()
    {

        $this->testGenerateUrl();
        $this->subscriber->requestValidator($this->customReferers);
        $this->subscriber->getData();
        $this->subscriber->update();
        $this->subscriber->jsonResponse();
    }

    public function run()
    {
        $this->init();
    }
}
