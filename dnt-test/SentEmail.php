<?php

namespace DntTest;

use DntLibrary\Base\Mailer;

class SentEmailTest
{
    public function run()
    {
        $dntMailer = new Mailer();

        $senderEmail = 'test@winprizes.eu';
        $recipientEmail = 'thomas.doubek@gmail.com';
        $msg = 'Správa bola úspešne odoslaná';
        $messageTitle = 'Registrace do soutěže';

        $dntMailer->set_recipient(array($recipientEmail));
        $dntMailer->set_msg($msg);
        $dntMailer->set_subject($messageTitle);
        $dntMailer->set_sender_name($senderEmail);
        $dntMailer->set_sender_email($senderEmail);
        $dntMailer->sent_email();

        echo 'snet, time: ' . time();

        return array(
            1 => array(
                'email' => array('thomas.doubek@gmail.com', 'odkazovac@markiza.sk', 'odkazovac.telerano@markiza.sk'),
                'title' => 'Súťaže a odkazy', 'sender' => 'no-reply@markiza.sk'),
            2 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Masterchef', 'sender' => 'no-reply@markiza.sk'),
            3 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Som reportér', 'sender' => 'no-reply@markiza.sk'),
            4 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Kastingový list - moderátor', 'sender' => 'no-reply@markiza.sk'),
            5 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Pusa pre šťastie', 'sender' => 'no-reply@markiza.sk'),
            6 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Kastingový list - redaktor', 'sender' => 'no-reply@markiza.sk'),
            7 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Súťaž jelínek - 1.týždeň', 'sender' => 'no-reply@markiza.sk'),
            8 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Zámena manželiek', 'sender' => 'no-reply@markiza.sk'),
            9 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Súťaž jelínek - 2. týždeň', 'sender' => 'no-reply@markiza.sk'),
            10 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Svokra', 'sender' => 'no-reply@markiza.sk'),
            11 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Súťaž jelínek - 3. týždeň', 'sender' => 'no-reply@markiza.sk'),
            12 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Súťaž jelínek - 4. týždeň', 'sender' => 'no-reply@markiza.sk',),
            14 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Ostrov', 'sender' => 'no-reply@markiza.sk',),
            15 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Bluf - 1. týždeň', 'sender' => 'no-reply@markiza.sk',),
            16 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Bluf - 2. týždeň', 'sender' => 'no-reply@markiza.sk',),
            17 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Bluf - 3. týždeň', 'sender' => 'no-reply@markiza.sk',),
            18 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Bluf - 4. týždeň', 'sender' => 'no-reply@markiza.sk',),
            19 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Bluf - 5. týždeň', 'sender' => 'no-reply@markiza.sk',),
            20 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Bluf - 6. týždeň', 'sender' => 'no-reply@markiza.sk',),
            21 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Bluf - 7. týždeň', 'sender' => 'no-reply@markiza.sk',),
            22 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Bluf - 8. týždeň', 'sender' => 'no-reply@markiza.sk',),
            23 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Bluf - 9. týždeň', 'sender' => 'no-reply@markiza.sk',),
            24 => array('email' => array('thomas.doubek@gmail.com'), 'title' => '20 výročie Mar', 'sender' => 'no-reply@markiza.sk',),
            25 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Ako naladiť', 'sender' => 'no-reply@markiza.sk',),
            26 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Horná dolná súťaž', 'sender' => 'no-reply@markiza.sk',),
            27 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Tvoja tvár súťaž', 'sender' => 'no-reply@markiza.sk',),
            28 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Pomoc v núdzi', 'sender' => 'no-reply@markiza.sk',),
            29 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'AVON - Superstar', 'sender' => 'no-reply@markiza.sk',),
            30 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Superstár v Teleráne', 'sender' => 'no-reply@markiza.sk',),
            31 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Zbav sa komplexov s Teleránom', 'sender' => 'no-reply@markiza.sk',),
            34 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Kariera - Formulár Stážista', 'sender' => 'no-reply@markiza.sk',),
            35 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Nadácia - Kontaktný formulár', 'sender' => 'no-reply@markiza.sk',),
            36 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Teleráno Vezmi ma na dovolenku', 'sender' => 'no-reply@markiza.sk',),
            37 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Kŕčové žily', 'sender' => 'no-reply@markiza.sk',),
            38 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Kariera - Formulár Stáž do telerána', 'sender' => 'no-reply@markiza.sk',),
            39 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Nadácia - Vianocny zazrak', 'sender' => 'no-reply@markiza.sk',),
            40 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Teleráno - Nový úsmev z telerána', 'sender' => 'no-reply@markiza.sk',),
            41 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Teleráno - Sobáš v Teleráne', 'sender' => 'no-reply@markiza.sk',),
            43 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Teleráno - Prasa v žite', 'sender' => 'no-reply@markiza.sk',),
            44 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Teleráno - Upratovacia čata', 'sender' => 'no-reply@markiza.sk',),
            45 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Teleráno - Formulár Bona', 'sender' => 'no-reply@markiza.sk',),
            46 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Teleráno - S Teleránom na hokej', 'sender' => 'no-reply@markiza.sk',),
            47 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Veľký plán', 'sender' => 'no-reply@markiza.sk',),
            48 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Nedostatky', 'sender' => 'no-reply@markiza.sk',),
            49 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Bezpečne s teleranom', 'sender' => 'no-reply@markiza.sk',),
            50 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Hvizdna cesta', 'sender' => 'no-reply@markiza.sk',),
            51 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Let stíhačkou', 'sender' => 'no-reply@markiza.sk',),
            52 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'spievaj.markiza.sk', 'sender' => 'no-reply@markiza.sk',),
            53 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Teleráno - súťaž o tehly', 'sender' => 'no-reply@markiza.sk',),
            54 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Farma - Farmárske recepty', 'sender' => 'no-reply@markiza.sk',),
            55 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Kariera - Formulár Stáž Program', 'sender' => 'no-reply@markiza.sk',),
            56 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Formulár - Do formy', 'sender' => 'no-reply@markiza.sk',),
            57 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Formulár - Vianočný zázrak', 'sender' => 'no-reply@markiza.sk',),
            58 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Formulár - Stretnutie s oteckami', 'sender' => 'no-reply@markiza.sk',),
            59 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Formulár - Upratovacia čata v Teleráne', 'sender' => 'no-reply@markiza.sk',),
            60 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Formulár - Vysnívaný dom z Telerána', 'sender' => 'no-reply@markiza.sk',),
            61 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Teleráno - Sobáš v Teleráne', 'sender' => 'no-reply@markiza.sk',),
            62 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Teleráno - Valentínske vyznania z Telerána', 'sender' => 'no-reply@markiza.sk',),
            63 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Teleráno - súťaž o tehly', 'sender' => 'no-reply@markiza.sk',),
            64 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Teleráno - Upratovacia čata', 'sender' => 'no-reply@markiza.sk',),
            65 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Teleráno - Formulár Bona', 'sender' => 'no-reply@markiza.sk',),
            66 => array('email' => array('thomas.doubek@gmail.com'), 'title' => 'Teleráno - Therapy Air Ion', 'sender' => 'no-reply@markiza.sk'),
        );
    }
}
