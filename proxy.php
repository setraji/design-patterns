<?php

class ProxyAccessTest {
    private $bookList; 
    private $book;
    private $pw;
    
    public function __construct(Access $inBook, $passwd) {
        $this->book = $inBook;
        $this->pw = $passwd;
    }
    public function getPhraseOrDenial() {
        
        if ($this->pw == "foobar") {
            $this->makeBookList();
            $this->bookList->getPhraseOrDenial($this->book->getPhrase());
        } else {
           echo "no access";
        }
    }

    function makeBookList() {
        $this->bookList = new AccessTest();
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
