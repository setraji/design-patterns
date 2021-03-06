<?php

// Beispiel: Verschiedene Rechenoperationen
// Es soll je nach Bedarf der passende Algorithmus angewendet werden...

// Das Interface:
interface StrategyInterface {
    public function calculate($values);
}

// Die Algorithmen:
class AddAlgorithm implements StrategyInterface {
    public function calculate($values) {
        $calculator = $values->getValueOne() + $values->getValueTwo();
        return $calculator;
    }
}

class MultiplyAlgorithm implements StrategyInterface {
    public function calculate($values) {
        $calculator = $values->getValueOne() * $values->getValueTwo();
        return $calculator;
    }
}

// Die Strategie-Klasse:
class StrategyContext {
    private $strategy = null;
    public function __construct($strategy_case) {
        switch ($strategy_case) {
            case "A":
                $this->strategy = new AddAlgorithm();
                break;
            case "M":
                $this->strategy = new MultiplyAlgorithm();
                break;
        }
    }
    public function showValue($values) {
        return $this->strategy->calculate($values);
    }
}

// Die Kontext-Klasse:
class Calculator {
    private $value_one;
    private $value_two;
    function __construct($value_one_in, $value_two_in) {
        $this->value_one = $value_one_in;
        $this->value_two = $value_two_in;
    }
    function getValueOne() {
        return $this->value_one;
    }
    function getValueTwo() {
        return $this->value_two;
    }
}

// Test:
$values = new Calculator(10, 15);
$strategyContextA = new StrategyContext("A");
$strategyContextM = new StrategyContext("M");

echo "Wert 1: " . $values->getValueOne() . "<br/>";
echo "Wert 2: " . $values->getValueTwo() . "<br/>";
echo "Werte addieren: " . $strategyContextA->showValue($values) . "<br/>";
echo "Werte multiplizieren: " . $strategyContextM->showValue($values);

// Ergebnis:
// Wert 1: 10
// Wert 2: 15
// Werte addieren: 25
// Werte multiplizieren: 150
