<?php

class Mediator {
    private $authorObject;
    private $titleObject;
    function __construct() {
      $this->authorObject = new BookAuthorColleague($this);
      $this->titleObject  = new BookTitleColleague($this);
    }
    function getAuthor() {return $this->authorObject;}
    function getTitle() {return $this->titleObject;}
    // when title or author change case, this makes sure the other
    // stays in sync
    function change(BookColleague $changingClassIn) {
      if ($changingClassIn instanceof BookAuthorColleague) {
        $this->getTitle()->setTitle($changingClassIn->getAuthor());
        $this->getAuthor()->setAuthor($changingClassIn->getAuthor());
      } elseif ($changingClassIn instanceof BookTitleColleague) {
        $this->getTitle()->setTitle($changingClassIn->getTitle());
        $this->getAuthor()->setAuthor($changingClassIn->getTitle());
      }
    }
}

abstract class BookColleague {
    private $mediator;
    function __construct($mediator_in) {
        $this->mediator = $mediator_in;
    }
    function getMediator() {return $this->mediator;}
    function changed($changingClassIn) {
        getMediator()->titleChanged($changingClassIn);
    }
}

class BookAuthorColleague extends BookColleague {
    private $author;
    function __construct($mediator_in) {
      parent::__construct($mediator_in);
    }
    function getAuthor() {return $this->author;}
    function setAuthor($author_in) {$this->author = $author_in;}

    function setAuthorLowerCase($message) {
      $this->setAuthor($message);
      $this->getMediator()->change($this);
    }
}

class BookTitleColleague extends BookColleague {
    private $title;
    function __construct($mediator_in) {
        parent::__construct($mediator_in);
    }
    function getTitle() {return $this->title;}
    function setTitle($title_in) {$this->title = $title_in;}
 
    function setTitleLowerCase($message) {
        $this->setTitle($message);
        $this->getMediator()->change($this);
    }
}
 
 

  $mediator = new Mediator();
 
  $author = $mediator->getAuthor();
  $title = $mediator->getTitle();
 
 
  $author->setAuthorLowerCase("hallo");


  writeln($author->getAuthor());
  writeln($title->getTitle());

  $title->setTitleLowerCase("huhu");
 
 
  writeln($author->getAuthor());
  writeln($title->getTitle());
  
  $author->setAuthorLowerCase("huhggu");
 
  writeln($author->getAuthor());
  writeln($title->getTitle());
 
$author->setAuthorLowerCase("huhfffu");
 
 
  writeln($author->getAuthor());
  writeln($title->getTitle());

 $title->setTitleLowerCase("huhu");
 
 
  writeln($author->getAuthor());
  writeln($title->getTitle());
  
  function writeln($line_in) {
    echo $line_in.'<br/>';
  }
