<?php

// the facade interface
class OfficeFacade {
    public static function textVerarbeitung() {
        $document = Document::oeffnen();
        $document = Document::bearbeiten();
        $document = Document::speichern();
    }
    public static function drucken() {
        $drucken = Drucker::konfigurieren();
        $drucken = Drucker::papierEinlegen();
        $drucken = Drucker::ausdrucken();
    }
    public static function unterschreiben() {
        $unterschreiben = Unterschrift::dokumentUnterschreiben();
    }
}

// various classes of a subsystem
class Document {
    public static function oeffnen() {
        echo "Dokument öffnen<br/>";
    }
    public static function bearbeiten() {
        echo "Dokument bearbeiten<br/>";
    }
    public static function speichern() {
        echo "Dokument speichern<br/>";
    }
}

class Drucker {
    public static function konfigurieren() {
        echo "Drucker konfigurieren<br/>";
    }
    public static function papierEinlegen() {
        echo "Papier einlegen<br/>";
    }
    public static function ausdrucken() {
        echo "Dokument ausdrucken<br/>";
    }
}

class Unterschrift {
    public static function dokumentUnterschreiben() {
        echo "Kündigung unterschreiben<br/>";
    }
}

// test:
$kuendigen = new OfficeFacade();
echo "Kündigung schreiben:<br/>";
$kuendigen->textVerarbeitung();
echo "Kündigung ausdrucken:<br/>";
$kuendigen->drucken();
echo "Kündigung unterschreiben:<br/>";
$kuendigen->unterschreiben();
