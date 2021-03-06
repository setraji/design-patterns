<?php

// Beispiel: Verschiedene Reisemöglichkeiten
// Beim Fliegen und Fahren gibt es jeweils ein Ziel und ein geeignetes Transportmittel, 
// beim Fahren soll zusätzlich noch die Anzahl der Pausen behandelt werden..

// Die abstrakten Element-Klassen:
abstract class Reisen {
    abstract public function getReiseZiel();
    abstract public function getTransportmittel();
    abstract public function empfangen(Besucher $besucher);
}

// Die konkreten Element-Klassen:
class Fliegen extends Reisen {
    private $reiseziel;
    private $transportmittel;

    public function __construct($ziel, $transport) {
        $this->reiseziel = $ziel;
        $this->transportmittel = $transport;
    }

    public function getReiseziel() {
        return $this->reiseziel;
    }

    public function getTransportmittel() {
        return $this->transportmittel;
    }

    public function empfangen(Besucher $besucher) {
        $besucher->besucheFliegen($this);
    }
}

class Fahren extends Reisen {
    private $reiseziel;
    private $transportmittel;
    private $pausen;

    public function __construct($ziel, $transport, $stop) {
        $this->reiseziel = $ziel;
        $this->transportmittel = $transport;
        $this->pausen = $stop;
    }

    public function getReiseziel() {
        return $this->reiseziel;
    }

    public function getTransportmittel() {
        return $this->transportmittel;
    }

    public function getPausen() {
        return $this->pausen;
    }

    public function empfangen(Besucher $besucher) {
        $besucher->besucheFahren($this);
    }
}

// Die abstrakte Besucher-Klasse:
abstract class Besucher {
    abstract public function besucheFliegen(Fliegen $fliegen);
    abstract public function besucheFahren(Fahren $fahren);
}

// Eine konkrete Besucher-Klasse:
class Reisender extends Besucher {
    private $ausgabe = null;

    public function getAusgabe() {
        return $this->ausgabe;
    }

    public function setAusgabe($ausgabe) {
        $this->ausgabe = $ausgabe;
    }

    public function besucheFliegen(Fliegen $fliegen) {
        $this->setAusgabe(
            "Reiseziel: " . $fliegen->getReiseziel() . "<br />" .
            "Transportmittel: " . $fliegen->getTransportmittel() . "<br />"
        );
    }

    public function besucheFahren(Fahren $fahren) {
        $this->setAusgabe(
            "Reiseziel: " . $fahren->getReiseziel() . "<br />" .
            "Transportmittel: " . $fahren->getTransportmittel() . "<br />" .
            "Pausen: " . $fahren->getPausen() . "<br />"
        );
    }
}

// Test:
$reise1 = new Fliegen("Madrid", "Flugzeug");
$reise2 = new Fahren("Hamburg", "Auto", 2);
$reisender = new Reisender();

empfangeBesucher($reise1, $reisender);
echo $reisender->getAusgabe() . "<br />";
empfangeBesucher($reise2, $reisender);
echo $reisender->getAusgabe() . "<br />";

function empfangeBesucher(Reisen $reisen, Besucher $besucher)
{
    $reisen->empfangen($besucher);
}

// Ergebnis:
// Reiseziel: Madrid
// Transportmittel: Flugzeug

// Reiseziel: Hamburg
// Transportmittel: Auto
// Pausen: 2
