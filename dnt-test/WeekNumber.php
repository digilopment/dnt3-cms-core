<?php

class WeekNumberTest {

    public function run() {
        $date = new DateTime(Dnt::datetime());
        $week = $date->format("W");
        echo "Weeknummer: <b>$week</b>";
    }

}
