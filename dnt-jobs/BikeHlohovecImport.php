<?php

namespace DntJobs;

class BikeHlohovecImportJob
{

    public function run()
    {

        $xml = simplexml_load_file("data/dataSchindler.xml", 'SimpleXMLElement', LIBXML_NOCDATA) or die("Error: Cannot create object");

        $i = 0;
        foreach ($xml->children() as $item) {
            if ($item->YEAR == 2020) {
                if ($i < 10000) {
                    print ($item->IMGURL[0]);
                    $i++;
                }
            }
        }
    }

}
