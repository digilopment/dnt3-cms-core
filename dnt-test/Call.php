<?php

namespace DntTest;

class CallTest
{
    public function __call($methodName, $arguments)
    {
        if ($methodName == 'myarea') {
            var_dump($arguments);
        }
    }

    public function area()
    {
        return 'default area method';
    }

    public function run()
    {
        print $this->myarea(4, 2, 4);
    }
}
