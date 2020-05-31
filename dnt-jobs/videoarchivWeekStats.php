<?php

namespace DntJobs;

class VideoarchivWeekStatsJob
{

    protected function parseData()
    {
        $i = 1;
        $week = 50;
        $next = 1;
        $return = [];
        if (($handle = fopen('data/content-users.csv', 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                if ($i % 7 == 0) {
                    $next = $i;
                    $week++;
                }
                $return[$week] = !isset($return[$week]) ? 0 : $return[$week];
                if ($i >= $next && $i <= $next + 7) {
                    $countData = explode(';', $data[1]);
                    $return[$week] += $countData[0];
                }
                $i++;
            }
            fclose($handle);
            return ($return);
        }
    }

    public function run()
    {
        $data = $this->parseData();
        $i = 0;
        foreach ($data as $key => $value) {
            if ($key > 52) {
                $i++;
                $week = $i;
            } else {
                $week = $key;
            }
            echo $week . ',' . $value . '<br/>';
        }
    }

}
