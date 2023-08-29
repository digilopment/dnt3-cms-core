<?php

namespace DntTest;

class PerformanceTest
{
    public function run()
    {

        $RUNS = 100000000;
        $string = str_repeat('a', 1000);
        $maxChars = 500;

        $start = microtime(true);
        for ($i = 0; $i < $RUNS; ++$i) {
            strlen($string) <= $maxChars;
        }

        for ($i = 0; $i < $RUNS; ++$i) {
            !isset($string[$maxChars]);
        }
        $end = microtime(true);
        echo ($end - $start) . ' s';

        phpinfo();
    }
}
