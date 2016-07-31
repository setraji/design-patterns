<?php

class Programming {
	private $writing;

	function __construct($writing_in) {
		$this->setWriting($writing_in);
	}

	public function getWriting() {
		return $this->writing;
	}

	public function setWriting($writing_in) {
		$this->writing = $writing_in;
	}
}

class Backup {
	private $writing;

	function __construct(Programming $programming) {
		$this->setWriting($programming);
	}

	public function getWriting(Programming $programming) {
		$programming->setWriting($this->writing);
	}

	public function setWriting(Programming $programming) {
		$this->writing = $programming->getWriting();
	}
}

$programming = new Programming('Creation of a database');
$backup = new Backup($programming);
echo $programming->getWriting() . "<br/>";
$programming->setWriting("Database with correct entries");
$backup->setWriting($programming);
echo $programming->getWriting() . "<br/>";
$programming->setWriting("Database with incorrect entries");
echo $programming->getWriting() . "<br/>";  
$backup->getWriting($programming);
echo $programming->getWriting() . "<br/>";
