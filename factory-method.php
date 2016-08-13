<?php

class UpperCase {
    private $param = null;
    public function __construct($param_in) {
        $this->param = $param_in;
        echo strtoupper($this->param);
    }
}

class LowerCase {
    private $param = null;
    public function __construct($param_in) {
        $this->param = $param_in;
        echo strtolower($this->param);
    }
}

class FactoryMethod {
    static public function factory($classname, $param) {
        return new $classname($param);
    }
}

$object = FactoryMethod::factory("LowerCase", "Hello World!");
