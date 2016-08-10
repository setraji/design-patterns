<?php

class Cars implements Iterator {
    private $pointer = 0;
    private $array = array();

    public function __construct() {
        $this->pointer = 0;
    }

    public function addCar($car) {
        array_push($this->array, $car);
    }

    function rewind() {
        $this->pointer = 0;
    }

    function current() {
        return $this->array[$this->pointer];
    }

    function key() {
        return $this->pointer;
    }

    function next() {
        ++$this->pointer;
    }

    function valid() {
        return isset($this->array[$this->pointer]);
    }
}

$car = new Cars;
$car->addCar("Volvo");
$car->addCar("BMW");
$car->addCar("Mercedes");

foreach ($car as $key => $value) {
    echo $key . ": " . $value . "<br />";
}
