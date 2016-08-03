<?php

interface Zustand {
	public function abkuehlen($context);
	public function erhitzen($context);
}

class WasserErhitzen implements Zustand {
	public function abkuehlen($context) {
		$context->setState(new WasserAbkuehlen());
		return "Kaltes Wasser";
	}
	public function erhitzen($context) {
		return "Heißes Wasser";
	}
}

class WasserAbkuehlen implements Zustand {
	public function abkuehlen($context) {
		return "Eiskaltes Wasser";
	}
	public function erhitzen($context) {
		$context->setState(new WasserErhitzen());
		return "Warmes Wasser";
	}
}

class Wasser {
	private $zustand = null;
	public function __construct() {
		$this->setState(new WasserAbkuehlen());
	}
	public function erhitzen() {
		return $this->zustand->erhitzen($this);
	}
	public function abkuehlen() {
		return $this->zustand->abkuehlen($this);
	}
	public function setState($neu) {
		$this->zustand = $neu;
	}
}

$context = new Wasser();
echo "Abkühlen: " . $context->abkuehlen() . "<br/>";
echo "Erhitzen: " . $context->erhitzen() . "<br/>";
echo "Abkühlen: " . $context->abkuehlen() . "<br/>";
echo "Erhitzen: " . $context->erhitzen() . "<br/>";
echo "Erhitzen: " . $context->erhitzen() . "<br/>";
echo "Abkühlen: " . $context->abkuehlen() . "<br/>";
