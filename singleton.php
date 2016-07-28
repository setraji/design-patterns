<?php

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

// test:
$log = Logfile::getInstance();
$log->write("log entry xyz");

?>
