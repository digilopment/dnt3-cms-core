<?php

namespace DntView\Layout\App;

class Foo
{

    private function bar()
    {
        return "baz";
    }

    public function init()
    {
        return $this->bar();
    }

}
