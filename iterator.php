<?php

class meinIterator implements Iterator {
    private $position = 0;
    private $array = array();

    public function __construct() {
        $this->position = 0;
    }

    public function addCar($car) {
        array_push($this->array, $car);
    }

    function rewind() {
        $this->position = 0;
    }

    function current() {
        return $this->array[$this->position];
    }

    function key() {
        return $this->position;
    }

    function next() {
        ++$this->position;
    }

    function valid() {
        return isset($this->array[$this->position]);
    }
}

$it = new meinIterator;
$it->addCar("Volvo");
$it->addCar("BMW");
$it->addCar("Mercedes");

foreach($it as $key => $value) {
    echo $key . ": " . $value;
    echo "\n";
}
