<?php

// Beispiel: Upper/Lower String
// Wenn die Unterklasse TemplateLower aufgerufen wird, fehlt eine Methode, 
// es wird an dieser Stelle null zurückgegeben. Hierbei handelt es sich um einen sogenannten Hook.
// Ansonsten werden die Eingaben entsprechend innerhalb der Unterklassen bearbeitet.

// Die abstrakte Klasse:
abstract class TemplateAbstract {
    public final function showName($name_in) {
        $first_name = $name_in->getFirstName();
        $last_name = $name_in->getLastName();
        $edit_firstname = $this->editFirstName($first_name);
        $edit_lastname = $this->editLastName($last_name);
        if (null == $edit_lastname) {
            $name = $edit_firstname . "<br/>";
        }
        else {
            $name = $edit_firstname . " " . $edit_lastname . "<br/>";
        }
        return $name;
    }

    public abstract function editFirstName($first_name);

    public function editLastName($last_name) {
        return null;
    } 
}

// Die konkreten Unterklassen:
class TemplateUpper extends TemplateAbstract {
    public function editFirstName($first_name) {
        return strtoupper($first_name); 
    }

    public function editLastName($last_name) {
        return strtoupper($last_name);
    }
}

class TemplateLower extends TemplateAbstract {
    public function editFirstName($first_name) {
        return strtolower($first_name); 
    }
}

// Die Kontext-Klasse:
class MyName {
    private $first_name;
    private $last_name;

    public function __construct($f_name_in, $l_name_in) {
        $this->first_name = $f_name_in;
        $this->last_name = $l_name_in;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }
}

// Test:
$my_name = new MyName("Andreas", "Setraji");
$upper = new TemplateUpper();  
$lower = new TemplateLower();

echo $upper->showName($my_name);
echo $lower->showName($my_name);

// Ergebnis:
// ANDREAS SETRAJI
// andreas
