<?php

namespace DntTest;

class PointerTest
{
    protected function something(&$arg)
    {
        $return = $arg;
        $arg += 1;
        return $return;
    }

    public function run()
    {
        $a = 3;
        $b = $this->something($a);
        var_dump($a);
        var_dump($b);

        $x = 012; //10 in decimal
        $r = $x / 4;

        var_dump($r);
    }
}
