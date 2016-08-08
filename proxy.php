<?php

class ProxyAccessTest {
    private $access; 
    private $phrase;
    private $pw;
    
    public function __construct(Access $phrase_in, $passwd) {
        $this->phrase = $phrase_in;
        $this->pw = $passwd;
    }

    public function getPhraseOrDenial() {
        if ($this->pw == "foobar") {
            $this->getPhrase();
            $this->access->getPhraseOrDenial($this->phrase->getPhrase());
        } else {
           echo "no access";
        }
    }

    function getPhrase() {
        $this->access = new AccessTest();
    }
}

class AccessTest {
    public function getPhraseOrDenial($phrase) {
        echo $phrase;
    }
}

class Access {
    private $phrase;

    function __construct($phrase_in) {
      $this->phrase = $phrase_in;
    }

    public function getPhrase() {
        return $this->phrase;
    }
}


$access = new Access("It works...!");
$proxyAccessTest = new ProxyAccessTest($access, "foobar");
$proxyAccessTest->getPhraseOrDenial();
