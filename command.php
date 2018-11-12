<?php

// Beispiel: Verschiedene Mitarbeiter arbeiten mit verschiedenen Druckern

// the command interface
interface IDruckBefehl {
    public function execute();
}

// the commands
class SchwarzWeissDruckBefehl implements IDruckBefehl {
    private $drucker;
    public function __construct ($drucker_in) {
        $this->drucker = $drucker_in;
    }
    public function execute() {
        $this->drucker->konfigurieren();
        $this->drucker->drucken();
    }
}

class FarbDruckBefehl implements IDruckBefehl {
    private $drucker;
    public function __construct ($drucker_in) {
        $this->drucker = $drucker_in;
    }
    public function execute() {
        $this->drucker->drucken();
    }
}

class PDFDruckBefehl implements IDruckBefehl {
    private $drucker;
    public function __construct ($drucker_in) {
        $this->drucker = $drucker_in;
    }
    public function execute() {
        $this->drucker->speichern();
    }
}

class NadelDruckBefehl implements IDruckBefehl {
    private $drucker;
    public function __construct ($drucker_in) {
        $this->drucker = $drucker_in;
    }
    public function execute() {
        $this->drucker->umstaendlichKonfigurieren();
        $this->drucker->drucken();
    }
}

// the recipients
class SchwarzWeissDrucker {
    public function konfigurieren() {
        echo "Schwarzweiss-Drucker wird konfiguriert!<br/>";
    }
    public function drucken() {
        echo "Es wird schwarz-weiss ausgedruckt!<br/>";
    }
}

class FarbDrucker {
    public function drucken() {
        echo "Es wird farbig ausgedruckt!<br/>";
    }
}

class PDFDrucker {
    public function speichern() {
        echo "Es wird gespeichert!<br/>";
    }
}

class NadelDrucker {
    public function umstaendlichKonfigurieren() {
        echo "Nadel-Drucker wird umst&auml;ndlich konfiguriert!<br/>";
    }
    public function drucken() {
        echo "Es wird ordentlich genadelt!<br/>";
    }
}

// the clients
class Vorstand {
    public function drucken($command) {
        $command->execute();
    }
}

class Sekretaerin {
    public function drucken($command) {
        $command->execute();
    }
}

class Praktikant {
    public function drucken($command) {
        $command->execute();
    }
}

class Programmierer {
    public function drucken($command) {
        $command->execute();
    }
}

// test:
$schwarzweissdrucker = new SchwarzWeissDrucker();
$farbdrucker = new FarbDrucker();
$pdfdrucker = new PDFDrucker();
$nadeldrucker = new NadelDrucker();

$schwarzweiss = new SchwarzWeissDruckBefehl($schwarzweissdrucker);
$farbig = new FarbDruckBefehl($farbdrucker);
$pdf = new PDFDruckBefehl($pdfdrucker);
$nadel = new NadelDruckBefehl($nadeldrucker);

$vorstand = new Vorstand();
$sekretaerin = new Sekretaerin();
$praktikant = new Praktikant();
$programmierer = new Programmierer();

$vorstand->drucken($schwarzweiss);
$praktikant->drucken($pdf);
$programmierer->drucken($farbig);
$sekretaerin->drucken($nadel);

// Schwarzweiss-Drucker wird konfiguriert!
// Es wird schwarz-weiss ausgedruckt!
// Es wird gespeichert!
// Es wird farbig ausgedruckt!
// Nadel-Drucker wird umständlich konfiguriert!
// Es wird ordentlich genadelt!
