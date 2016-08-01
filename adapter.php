<?php

class MariaDb {
  protected $animal;

	public function __construct($animal_in) {
		$this->animal = $animal_in;
	}

	public function getAnimal() {
		return $this->animal;
	}
}

class Oracle {
	protected $animal;

	public function __construct($animal_in) {
		$this->animal = $animal_in;
	}

	public function getAnimal() {
		return $this->animal;
	}
}

class MariaDbOracleAdapter {
	private $mariadb;
	private $oracle;

	public function __construct(MariaDb $mariadb_in, Oracle $oracle_in) {
		$this->mariadb = $mariadb_in;
		$this->oracle = $oracle_in;
	}

	public function getAnimals() {
		return "Animal from MariaDB: " . $this->mariadb->getAnimal() . '<br/>' .
		"Animal from Oracle: " . $this->oracle->getAnimal();
	}
}

$mariadb = new MariaDb("Cats");
$oracle = new Oracle("Dogs");
$animals = new MariaDbOracleAdapter($mariadb, $oracle);

echo $animals->getAnimals();
