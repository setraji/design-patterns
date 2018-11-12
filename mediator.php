<?php

// Beispiel: Synchronisation eines Chats
// Gibt Chatter 1 etwas ein, soll der eingegebene Text bei Chatter 1 
// und bei Chatter 2 ausgegeben werden und umgekehrt..

class Mediator {
    private $chatter_one;
    private $chatter_two;

    public function __construct() {
        $this->chatter_one = new ChatterOneColleague($this);
        $this->chatter_two = new ChatterTwoColleague($this);
    }

    public function getChatterOne() {
        return $this->chatter_one;
    }

    public function getChatterTwo() {
        return $this->chatter_two;
    }

    public function change(ChatterColleague $changing) {
        if ($changing instanceof ChatterOneColleague) {
            $this->getChatterOne()->setChatterOne($changing->getChatterOne());
            $this->getChatterTwo()->setChatterTwo($changing->getChatterOne());
        }
        else if ($changing instanceof ChatterTwoColleague) {
            $this->getChatterOne()->setChatterOne($changing->getChatterTwo());
            $this->getChatterTwo()->setChatterTwo($changing->getChatterTwo());
        }
    }
}

abstract class ChatterColleague {
    private $mediator;

    public function __construct($mediator_in) {
        $this->mediator = $mediator_in;
    }

    public function getMediator() {
        return $this->mediator;
    }
}

class ChatterOneColleague extends ChatterColleague {
    private $chatter_one;

    public function __construct($mediator_in) {
        parent::__construct($mediator_in);
    }

    public function getChatterOne() {
        return $this->chatter_one;
    }

    public function setChatterOne($chatter_one_in) {
        $this->chatter_one = $chatter_one_in;
    }

    public function setChatterOneMessage($message) {
        $this->setChatterOne($message);
        $this->getMediator()->change($this);
    }
}

class ChatterTwoColleague extends ChatterColleague {
    private $chatter_two;

    public function __construct($mediator_in) {
        parent::__construct($mediator_in);
    }

    public function getChatterTwo() {
        return $this->chatter_two;
    }

    public function setChatterTwo($chatter_two_in) {
        $this->chatter_two = $chatter_two_in;
    }

    public function setChatterTwoMessage($message) {
        $this->setChatterTwo($message);
        $this->getMediator()->change($this);
    }
}

$mediator = new Mediator();
$chatter_one = $mediator->getChatterOne();
$chatter_two = $mediator->getChatterTwo();
 
$chatter_one->setChatterOneMessage("hallo");
echo "Chatter 1: " . $chatter_one->getChatterOne() . " - ";
echo "Chatter 2: " . $chatter_two->getChatterTwo() . "<br />";
  
$chatter_two->setChatterTwoMessage("hi!");
echo "Chatter 1: " . $chatter_one->getChatterOne() . " - ";
echo "Chatter 2: " . $chatter_two->getChatterTwo() . "<br />";
