<?php

namespace DntTest;

use DateTime;
use DntLibrary\Base\Dnt;

class WeekNumberTest
{
    public function __construct()
    {
        $this->dnt = new Dnt();
    }

    public function run()
    {
        $date = new DateTime($this->dnt->datetime());
        $week = $date->format('W');
        echo "Weeknummer: <b>$week</b>";
    }
}
