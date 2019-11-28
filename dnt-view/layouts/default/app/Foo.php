<?php

class Foo{
    
    private function bar(){
        return "baz";
    }
    
    public function init(){
        return $this->bar();
    }
    
}
