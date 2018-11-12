<?php

// Beispiel: Erstellung einer DVD-Sammlung
// Die DVD-Instanzen werden nicht vom Clienten direkt, 
// sondern bei Bedarf über die Flyweight-Klasse erstellt

class FlyweightDVD {
    private $title;

    public function __construct($title_in) {
        $this->title = $title_in;
    }

    public function getTitle() {
        return $this->title;
    }
}

class FlyweightFactory {
    private $dvds = array();

    public function __construct() {
        $this->dvds[1] = null;
        $this->dvds[2] = null;
        $this->dvds[3] = null;
    }

    public function getDVD($dvdKey) {
        if (null == $this->dvds[$dvdKey]) {
            $makeFunction = "makeDVD" . $dvdKey;
            $this->dvds[$dvdKey] = $this->$makeFunction();
        }
        return $this->dvds[$dvdKey];
    }

    function makeDVD1() {
        $dvd = new FlyweightDVD("Braveheart"); 
        return $dvd;
    }

    function makeDVD2() {
        $dvd = new FlyweightDVD("Pulp Fiction"); 
        return $dvd;
    }

    function makeDVD3() {
        $dvd = new FlyweightDVD("Alien");
        return $dvd;
    }
}
 
class FlyweightDVDShelf {
    private $dvds = array();

    public function addDVD($dvd) {
        $this->dvds[] = $dvd;
    }

    public function showDVDs() {
        $return_string = null;
        foreach ($this->dvds as $dvd) {
            $return_string .= $dvd->getTitle() . "<br/>";
        }
        return $return_string;
    }
}

$flyweightFactory = new FlyweightFactory();
$flyweightDVDShelf1 = new FlyweightDVDShelf();
$flyweightDVDShelf2 = new FlyweightDVDShelf();
$flyweightDVD1 = $flyweightFactory->getDVD(1);
$flyweightDVD2 = $flyweightFactory->getDVD(2);
$flyweightDVD3 = $flyweightFactory->getDVD(3);
$flyweightDVDShelf1->addDVD($flyweightDVD1);
$flyweightDVDShelf2->addDVD($flyweightDVD2);
$flyweightDVDShelf1->addDVD($flyweightDVD3);
echo "DVD-Regal 1:<br/>" . $flyweightDVDShelf1->showDVDs();
echo "DVD-Regal 2:<br/>" . $flyweightDVDShelf2->showDVDs();

// Ergebnis:
// DVD-Regal 1:
// Braveheart
// Alien
// DVD-Regal 2:
// Pulp Fiction
