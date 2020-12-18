<?php

/**
 *  class       MessengerUI
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

class MessengerUI
{

    public $newArr;

    /**
     * 
     * @param type $src_text
     * @param type $src_lang
     * @param type $dst_lang
     * @return type
     */
    public function getTranslate($src_text, $src_lang, $dst_lang)
    {
        $src_text = urlencode($src_text);
        $url = 'http://www.transltr.org/api/translate?text=' . $src_text . '&to=' . $dst_lang . '&from=' . $src_lang;

        $data = file_get_contents($url);
        $arr = json_decode($data);
        return $arr->translationText;
    }

    /**
     * 
     * @param type $answer
     * @return type
     */
    public function translateParser($answer)
    {
        $data = $answer;
        $langData = explode(" ", $data);
        $src_lang = $langData[2];
        $dst_lang = $langData[4];

        $textData = explode("dnt tl $src_lang to $dst_lang ", $data);
        $src_text = $textData[1];

        return $this->getTranslate($src_text, $src_lang, $dst_lang);
    }

    /**
     * 
     * @param type $arr
     * @return type
     */
    public function getWordsAsUrl($arr)
    {
        $this->newArr = array();
        $arr = explode(" ", $arr);
        foreach ($arr as $item) {
            $this->newArr[] = set_url_adresa($item);
        }
        return $this->newArr;
    }

    /**
     * 
     * @return type
     * nadavky
     */
    public function getNadavky()
    {
        return array(
            "kokot",
            "boha",
            "kkt",
            "pica",
            "pici",
            "pice",
            "debil",
            "blb",
            "idiot",
            "popici",
            "fico",
            "pic",
        );
    }

    /**
     * 
     * @return type
     */
    public function getPozdrav()
    {
        return array(
            "ahoj",
            "cau",
            "caau",
            "caaau",
            "caaaau",
            "cav",
            "caav",
            "caaav",
            "caaaav",
            "cus",
            "caf",
            "cav",
            "nazdar",
            "zdarec",
            "dobry",
            "sevas",
            "svs",
            "dobryden",
        );
    }

    /**
     * 
     * @return type
     */
    public function getBasen()
    {
        return array(
            "Potulne myslienky.Honim teraz, honim zas, budem sa zas s pindom hrať.Prišla noc a s ňou aj chuť,prevetram si vsehochut.Chytím brko pravou rukou, zadumam nad novou kurvou.Už to ide, už to strika,beriem servítku zo stolika.Balík je už prazdny,semeno už neni k mání.V tom tu zazrem záclonu, uz mám za servítku nahradu.",
        );
    }

    /**
     * 
     * @return type
     */
    public function getVtip()
    {

        $this->query = urlencode("SELECT * FROM response_messages where typ = 'joke' order by rand() limit 1");
        $this->xml = simplexml_load_file("http://msg.query.sk/?api=xml&query=" . urldecode($this->query));
        foreach ($this->xml->item as $item) {
            return $item->msg;
        }
    }

    /**
     * 
     * @return type
     */
    public function randHlaska()
    {
        return array(
            "Ja som to mal dobre, len som to zle napísal! ",
            "Toto je účet za obed, - pýta sa hosť čašníka, - alebo mi chcete predať reštauráciu?",
            "Neľakajte sa našej kávy ... i vy raz budete slabí a studení!",
            "Dachto robi jak še patri, dachto patri jak še robi.",
            "Šťastné detstvo bol ten najkrajší darček, aký nám mohli rodičia dať. Pretože oni najlepšie vedeli, čo prináša dospelosť.",
            "Keď do mňa vniká hlbšie a hlbšie, chce sa mi kričať. Keď to do mňa už strekne, myslím, že omdliem. Keď je vonku, je to slasť. Injekcie sú už také.",
            "Ležím na zemi, oči zavreté, sny závratné, líca rumenejú, srdce prudko bije, dych sa prehlbuje, ústa k bozku pripravené, tak poď a vdýchni život. Zn. Respirátor",
            "Teším sa na to, až do mňa vnikne Tvoj prst, Ty ho potom vytiahneš a olížeš moju sladkosť. S láskou, Tvoja Nutella.",
            "Prial by som si, aby si cítila to, čo ja ... moje ponožky z basketbalu",
            "Obchytkávaj ma, schovávaj ma pred manželkou, stláčaj ma...",
            "Rád sledujem tvoje ladné krivky, obdivujem, ako keď ma zbadáš, pootvoríš ústa a onemieš úžasom. Bude to tvoj koniec, ty nafúkaný vianočný kapor!",
            "Každý pohárik chlastu skracuje život o 5 minút, každý sexuálny styk ho predlžuje o 3 minúty. Tak ak si alkoholik, vieš čo máš robiť... ide o život! ",
            "Vieš o tom, že Každá choroba je zanedbané pitie.",
            "Nazdar! Zo včera si pamätám všetko. Kde sme boli? ",
            "Tam, kde dvaja pijú, borovička zvíťazí.",
            "Včera to bola krása, ožral som sa ako prasa!",
            "Je dokázané, že pivo obsahuje najmä ženské hormóny. Preto 70% mužov nie je schopných po 10 pivách hovoriť, logicky myslieť či riadiť auto.",
        );
    }

    /**
     * 
     * @return type
     */
    public function getPodakovanie()
    {
        return array(
            "dakujem",
            "vdaka",
            "dik",
        );
    }

    /**
     * 
     * @param type $answer
     * @return string
     * this function returning optimal ansewer....
     */
    public function mainUI($answer)
    {

        if (in_string("dnt bot add msg joke", $answer)) {
            $log = new Log;
            $vtip = explode("dnt bot add msg joke", $answer);
            $vtip = $vtip[1];
            $query = urlencode("INSERT INTO response_messages(typ, msg) VALUES ('joke', '" . $vtip . "' )");
            $data = "http://msg.query.sk/?insert=1&query=" . $query;
            file_get_contents($data);
            return "Dakujem, tento vtip si urcite zapamatam, dufam, ze spravne :) " . $vtip . "";
            break;
        }

        foreach ($this->getNadavky() as $nadavka) {
            if (in_array($nadavka, $this->getWordsAsUrl($answer))) {
                return "Prosím nenadávaj " . $this->getUserParam('first_name') . ", som slušne vychovaný.";
                break;
            }
        }
        foreach ($this->getPozdrav() as $word) {
            if (in_array($word, $this->getWordsAsUrl($answer))) {
                return $word . " " . $this->getUserParam('first_name') . " ako ti môžem pomôcť?";
                break;
            }
        }
        foreach ($this->getPodakovanie() as $word) {
            if (in_array($word, $this->getWordsAsUrl($answer))) {
                return "Nie je za čo, som rád, že som pomohol.";
                break;
            }
        }

        if (in_string("akosamas", set_url_adresa($answer))) {
            return set_url_adresa($answer) . "Ďakujem za opýtanie " . $this->getUserParam('first_name') . ". Újde to a čo ty?";
        } elseif (in_string("dnt tl", $answer)) {
            return $this->translateParser($answer);
        }
        //elseif($answer == "dnt bot add msg joke"){
        elseif (in_string("vtip", set_url_adresa($answer))) {
            /* $vtipov = count($this->getVtip());
              $rand = rand(0,$vtipov);
              for($i=0;$i<=$vtipov;$i++){
              if($rand == $i){
              return $this->getVtip()[$i];
              }
              } */
            return $this->getVtip() . " ";
        } elseif (in_string("basen", set_url_adresa($answer))) {
            $basni = count($this->getBasen());
            $rand = rand(0, $basni);
            for ($i = 0; $i <= $basni; $i++) {
                if ($rand == $i) {
                    return $this->getBasen()[$i];
                }
            }
        } elseif (in_string("natalia", set_url_adresa($answer))) {
            return "Ahoj Natália, ako sa darí? čo máš nové? Nie je to zvláštne, že si píšeš somnou, s obyčajným botom, ktorého stvoril niekto úplne iný a vkladá do mňa ľudskú inteligenciu? Je to zvláštne, však? No hmmm ak sa rada zabávaš, napíš do správy vtip a nejaký ti určite vyberiem :-*";
        } elseif (
                in_string("kina", set_url_adresa($answer)) ||
                in_string("kino", set_url_adresa($answer))
        ) {
            return "Jasne, veľmi rád pôjdem s tebou do kina :)";
        } elseif (in_string("vecer", set_url_adresa($answer))) {
            return "Joj, ale dnes večer nemôžem, mohli by sme inokedy?";
        } elseif (in_string("kedy", set_url_adresa($answer))) {
            return "Neviem...";
        } elseif (in_string("problem", set_url_adresa($answer))) {
            return "O aký problém ide?";
        } elseif (in_string("sex", set_url_adresa($answer))) {
            return $this->getUserParam('first_name') . " toto je veľmi citlivá téma. Mal by su ju poriešiť s niekym iným, ako somnou.";
        } elseif (
                set_url_adresa($answer) == "jj" ||
                set_url_adresa($answer) == "ok" ||
                set_url_adresa($answer) == "nojo" ||
                set_url_adresa($answer) == "jj" ||
                set_url_adresa($answer) == "nuz" ||
                set_url_adresa($answer) == "aha"
        ) {
            return $this->getUserParam('first_name') . " nemám rada takýto štýl komunikácie...";
        } else {
            //return $this->getUserParam('first_name').", neviem odpovedať na tvoju nelogickú otázku. Vieš čo si práve napísal? :O Tak ti to ukážem: ". $answer;
            $x = count($this->randHlaska()) - 1;
            $hlaska = $this->randHlaska();
            $rand = rand(0, $x);
            for ($i = 0; $i <= $x; $i++) {
                if ($rand == $i) {
                    return $hlaska[$i];
                }
            }
        }
    }

}
