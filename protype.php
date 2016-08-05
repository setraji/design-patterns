<?php

abstract class Prototype {
	protected $carname;
	private $cartype;

	abstract public function __clone();

	public function getCartype() {
		return $this->cartype;
	}

	public function setCartype($cartype_in) {
		$this->cartype = $cartype_in;
	}

	public function getCarname() {
		return $this->carname;
	}
}

class Car extends Prototype {
	public function __construct($value) {
		$this->carname = $value;
	}

	public function __clone() {}
}

$volkswagen = new Car("VW");

$golf = clone $volkswagen;
$kaefer = clone $volkswagen;

$golf->setCartype("Golf");
$kaefer->setCartype("Käfer");

echo $golf->getCarname() . "<br />";
echo $golf->getCartype() . "<br />";
echo $kaefer->getCarname() . "<br />";
echo $kaefer->getCartype() . "<br />";
