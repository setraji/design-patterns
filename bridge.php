<?php

abstract class NameStyle {
    abstract public function showName($name);
}

class BoldStyle extends NameStyle {
	public function showName($name_in) {
		return "<span style='font-style:italic;'>" . $name_in . "</span>";
	}
}

class ItalicStyle extends NameStyle {
	public function showName($name_in) {
		return "<span style='font-weight:bold;'>" . $name_in . "</span>";
	}
}

abstract class Name {
	private $name;
	private $fontstyle;

	public function __construct($name_in, $fontstyle_in) {
		$this->name = $name_in;
		switch ($fontstyle_in) {
		    case "bold":
		        $this->fontstyle = new BoldStyle();
		        break;
		    case "italic":
		        $this->fontstyle = new ItalicStyle();
		        break;
		}
	}

	public function getName() {
		return $this->fontstyle->showName($this->name);
	}
}

class GreenColorStyle extends Name {
	function showName() {
		return "<p style='color:#009900;'>" . $this->getName() . "</p>";
	}
}

class RedColorStyle extends Name {
    function showName() {
		return "<p style='color:#ff0000;'>" . $this->getName() . "</p>";
	}
}

$name = new GreenColorStyle("Andreas Setraji", "bold");
echo $name->showName();

$name = new RedColorStyle("Andreas Setraji", "italic");
echo $name->showName();
