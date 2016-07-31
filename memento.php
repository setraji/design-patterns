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

$programming = new Programming('Memento Pattern');
$backup = new Backup($programming);
echo $programming->getWriting() . "<br/>";
$programming->setWriting("Memento Pattern extended");
$backup->setWriting($programming);
echo $programming->getWriting() . "<br/>";
$programming->setWriting("Memento Pattern extended with bug");
echo $programming->getWriting() . "<br/>";  
$backup->getWriting($programming);
echo $programming->getWriting() . "<br/>";
