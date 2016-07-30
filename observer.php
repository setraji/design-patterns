<?php 

interface Observer {
	public function update(Observeable $subject);
}

interface Observeable {
	public function attach(Observer $observer);
	public function detach(Observer $observer);
	public function notify();
}

class Kalender implements Observeable {

	private $_observers = Array();
	public $datum = null;

	public function attach(Observer $observer) {
		$this->_observers[] = $observer;
	}

	public function detach(Observer $observer) {
		$this->_observers = array_diff($this->_observers, Array($observer));
	}

	public function notify() {
		foreach ($this->_observers as $observer) {
			$observer->update($this);
		}
	}

	public function check($datum_in) {
		$this->datum = $datum_in;
		$this->notify();
		echo "Heute ist der " . $datum_in . "<br/>";
	}

}

class Neujahr implements Observer {
	public function update(Observeable $subject) {
		if ($subject->datum == "01.01.") {
			echo "Happy new year!!! ";
		}
	}
}

echo "<p>Ohne Beobachtung:</p>";
$kalender = new Kalender;
$kalender->check("31.12.");
$kalender->check("01.01.");
$kalender->check("02.01.");

echo "<p>Mit Beobachtung:</p>";
$kalender = new Kalender;
$kalender->attach(new Neujahr);
$kalender->check("31.12.");
$kalender->check("01.01.");
$kalender->check("02.01.");
