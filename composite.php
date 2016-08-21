<?php

abstract class Firma {
    abstract function getMitarbeiterInfo($mitarbeiter);
    abstract function getMitarbeiterzaehler();
    abstract function setMitarbeiterzaehler($zaehler);
    abstract function addMitarbeiter($mitarbeiter);
    abstract function removeMitarbeiter($mitarbeiter);
}

class Mitarbeiter extends Firma {
    private $name;

    function __construct($name_in) {
      $this->name = $name_in;
    }

    function getMitarbeiterInfo($mitarbeiter) {
        if (1 == $mitarbeiter) {
            return $this->name;
        }
        else {
            return false;
        }
    }

    function getMitarbeiterzaehler() {
        return 1;
    }

    function setMitarbeiterzaehler($zaehler) {
        return false;
    }

    function addMitarbeiter($mitarbeiter) {
        return false;
    }

    function removeMitarbeiter($mitarbeiter) {
        return false;
    }
}

class Chef extends Firma {
    private $team = array();
    private $zaehler;

    public function __construct() {
        $this->setMitarbeiterzaehler(0);
    }

    public function getMitarbeiterzaehler() {
        return $this->zaehler;
    }

    public function setMitarbeiterzaehler($zaehler) {
        $this->zaehler = $zaehler;
    }

    public function getMitarbeiterInfo($mitarbeiter) {   
        if ($mitarbeiter <= $this->zaehler) {
            return $this->team[$mitarbeiter]->getMitarbeiterInfo(1);
        }
        else {
            return false;
        }
    }

    public function addMitarbeiter($mitarbeiter) {
        $this->setMitarbeiterzaehler($this->getMitarbeiterzaehler() + 1);
        $this->team[$this->getMitarbeiterzaehler()] = $mitarbeiter;
        return $this->getMitarbeiterzaehler();
    }

    public function removeMitarbeiter($mitarbeiter) {
        $counter = 0;
        while (++$counter <= $this->getMitarbeiterzaehler()) {
            if ($mitarbeiter->getMitarbeiterInfo(1) == $this->team[$counter]->getMitarbeiterInfo(1)) {
                for ($x = $counter; $x < $this->getMitarbeiterzaehler(); $x++) {
                    $this->team[$x] = $this->team[$x + 1];
                }
                $this->setMitarbeiterzaehler($this->getMitarbeiterzaehler() - 1);
            }
        }
        return $this->getMitarbeiterzaehler();
    }
}

$mitarbeiter1 = new Mitarbeiter("Andreas Setraji");
echo $mitarbeiter1->getMitarbeiterInfo(1) . "<br/>";
$mitarbeiter2 = new Mitarbeiter("Frank Müller");
echo $mitarbeiter2->getMitarbeiterInfo(1) . "<br/>";
$mitarbeiter3 = new Mitarbeiter("Kurt Knorbelsack");
echo $mitarbeiter3->getMitarbeiterInfo(1) . "<br/>";
$chef = new Chef();
$zaehler = $chef->addMitarbeiter($mitarbeiter1);
echo $chef->getMitarbeiterInfo($zaehler) . "<br/>";
$zaehler = $chef->addMitarbeiter($mitarbeiter2);
echo $chef->getMitarbeiterInfo($zaehler) . "<br/>";
$zaehler = $chef->addMitarbeiter($mitarbeiter3);
echo $chef->getMitarbeiterInfo($zaehler) . "<br/>";
$zaehler = $chef->removeMitarbeiter($mitarbeiter1);
echo $chef->getMitarbeiterzaehler() . "<br/>";
echo $chef->getMitarbeiterInfo(1) . "<br/>";
echo $chef->getMitarbeiterInfo(2) . "<br/>";
