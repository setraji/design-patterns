<?php

// Beispiel: Erstellung eines Logfiles
// Es wird eine einzige global verfügbare Logfile-Datei benötigt. 
// Diese soll, wenn sie noch nicht vorhanden ist, automatisch erstellt werden.
// Die zweite Aufgabe ist Nachrichten mit einem aktuellen Zeitstempel an das Ende der Datei hinzuzufügen.

// Die Klasse:
class Logfile {
    private static $instance = null;
    private $logfile = null;

    public function __construct() {
        $this->logfile = fopen("logfile.txt", "a");
    }

    public static function getInstance() {
        if (self::$instance == null)
        {
            self::$instance = new Logfile();
        }
        return self::$instance;
    }

    public function write($message) {
        $message = date("d.m.Y H:i:s - ", time()) . $message . "\n";
        fputs($this->logfile, $message);
    }

    public function __destruct() {
        fclose($this->logfile);
    }
}

// Test:
$log = Logfile::getInstance();
$log->write("log entry xyz");

// Der Inhalt der logfile.txt-Datei:
// 17.07.2016 20:26:54 - Logeintrag xyz
// 17.07.2016 20:27:00 - Logeintrag zyx
// 17.07.2016 20:27:02 - Logeintrag zxy
// 17.07.2016 20:27:02 - Logeintrag yxz
// 17.07.2016 20:27:03 - Logeintrag xyz
