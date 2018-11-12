<?php

// Beispiel: DVD-Sammlung
// Das Regal (Kompositum) kann DVDs hinzufügen, zählen und löschen. 
// Die DVDs (Blätter) selbst können dies nicht.

abstract class Collection {
    abstract function getDVDInfo($dvd);
    abstract function getDVDZaehler();
}

class DVD extends Collection {
    private $title;
    function __construct($title_in) {
      $this->title = $title_in;
    }

    function getDVDInfo($dvd) {
        if (1 == $dvd) {
            return $this->title;
        }
        else {
            return false;
        }
    }

    function getDVDZaehler() {
        return 1;
    }
}

class Shelf extends Collection {
    private $collection = array();
    private $zaehler;

    public function __construct() {
        $this->setDVDZaehler(0);
    }

    public function getDVDZaehler() {
        return $this->zaehler;
    }

    public function setDVDZaehler($zaehler) {
        $this->zaehler = $zaehler;
    }

    public function getDVDInfo($dvd) {   
        if ($dvd <= $this->zaehler) {
            return $this->collection[$dvd]->getDVDInfo(1);
        }
        else {
            return false;
        }
    }

    public function addDVD($dvd) {
        $this->setDVDZaehler($this->getDVDZaehler() + 1);
        $this->collection[$this->getDVDZaehler()] = $dvd;
        return $this->getDVDZaehler();
    }

    public function removeDVD($dvd) {
        $counter = 0;
        while (++$counter <= $this->getDVDZaehler()) {
            if ($dvd->getDVDInfo(1) == $this->collection[$counter]->getDVDInfo(1)) {
                for ($x = $counter; $x < $this->getDVDZaehler(); $x++) {
                    $this->collection[$x] = $this->collection[$x + 1];
                }
                $this->setDVDZaehler($this->getDVDZaehler() - 1);
            }
        }
        return $this->getDVDZaehler();
    }
}

$dvd1 = new DVD("Braveheart");
$dvd2 = new DVD("Pulp Fiction");
$dvd3 = new DVD("Alien");
$shelf = new Shelf();

echo "DVD-Regal befüllen:<br/>";
$zaehler = $shelf->addDVD($dvd1);
echo "Film '" . $shelf->getDVDInfo($zaehler) . "' hinzugefügt<br/>";
$zaehler = $shelf->addDVD($dvd2);
echo "Film '" . $shelf->getDVDInfo($zaehler) . "' hinzugefügt<br/>";
$zaehler = $shelf->addDVD($dvd3);
echo "Film '" . $shelf->getDVDInfo($zaehler) . "' hinzugefügt<br/>";
echo "Anzahl der Filme: " . $shelf->getDVDZaehler() . "<br/>";
$zaehler = $shelf->removeDVD($dvd1);
echo "Anzahl der Filme, nachdem Film 1 gelöscht wurde: " . $shelf->getDVDZaehler() . "<br/>";
echo "Info zu Film 1: '" . $shelf->getDVDInfo(1) . "'<br/>";
echo "Info zu Film 2: '" . $shelf->getDVDInfo(2) . "'<br/>";

// DVD-Regal befüllen:
// Film 'Braveheart' hinzugefügt
// Film 'Pulp Fiction' hinzugefügt
// Film 'Alien' hinzugefügt
// Anzahl der Filme: 3
// Anzahl der Filme, nachdem Film 1 gelöscht wurde: 2
// Info zu Film 1: 'Pulp Fiction'
// Info zu Film 2: 'Alien'
