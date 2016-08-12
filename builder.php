<?php

abstract class AbstractPageBuilder {
    abstract function getPage();
}

abstract class AbstractPageDirector {
    abstract function __construct(AbstractPageBuilder $builder_in);
    abstract function buildPage();
    abstract function getPage();
}

class HTMLPage {
    private $page = null;
    private $page_text = null;

    function showPage() {
        return $this->page;
    }

    function setText($text_in) {
        $this->page_text = $text_in;
    }

    function formatPage() {
        $this->page = "<!DOCTYPE html>";
        $this->page .= "<html>";
        $this->page .= "<head><title>Test</title></head>";
        $this->page .= "<body>";
        $this->page .= "<p>" . $this->page_text . "</p>";
        $this->page .= "</body>";
        $this->page .= "</html>";
    }
}

class XMLPage {
    private $page = null;
    private $page_text = null;

    function showPage() {
        return $this->page;
    }

    function setText($text_in) {
        $this->page_text = $text_in;
    }

    function formatPage() {
        $this->page = "<?xml version='1.0' encoding='UTF-8' standalone='yes'?>";
        $this->page .= "<text>" . $this->page_text . "</text>";
    }
}

class PageBuilder extends AbstractPageBuilder {
    private $page = null;

    function __construct($strategy_case) {
        switch ($strategy_case) {
            case "HTML":
                $this->page = new HTMLPage();
                break;
            case "XML":
                $this->page = new XMLPage();
                break;
        }
    }

    function setText($text_in) {
        $this->page->setText($text_in);
    }

    function formatPage() {
        $this->page->formatPage();
    }

    function getPage() {
        return $this->page;
    }
}

class PageDirector extends AbstractPageDirector {
    private $builder = null;

    public function __construct(AbstractPageBuilder $builder_in) {
        $this->builder = $builder_in;
    }

    public function buildPage() {
        $this->builder->setText("Hello World!");
        $this->builder->formatPage();
    }

    public function getPage() {
        return $this->builder->getPage();
    }
}

$pageBuilder = new PageBuilder("XML");
$pageDirector = new PageDirector($pageBuilder);
$pageDirector->buildPage();
$page = $pageDirector->GetPage();
echo $page->showPage();
