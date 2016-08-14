<?php

class Interpreter {  
    private $phrase;

    public function __construct(Phrase $phrase_in) {
        $this->phrase = $phrase_in;
    }

    public function interpret($string_in) {     
        $regex_test = "/^([A-Za-z0-9ÄÖÜäöüß ]{6,50})$/";
        if(preg_match($regex_test, $string_in)) {
            echo $string_in . ": " . $this->phrase->getPhrase() . "<br/>";
        }
        else {
            echo "Invalid string!";
        }
    }
}

class Phrase {
    private $phrase;
    function __construct($phrase_in) {
        $this->phrase = $phrase_in;
    }

    function getPhrase() {
        return $this->phrase;
    }
}

$phrase = new Phrase("Hello World");
$interpreter = new Interpreter($phrase);

echo "String mit gültigen Zeichen:<br/>";
echo $interpreter->interpret("Please print Hello World");
echo "String mit einem ungültigen Zeichen (Ausrufezeichen):<br/>";
echo $interpreter->interpret("Please print Hello World!");
