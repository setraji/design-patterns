<?php

interface Handler {
    public function setSuccessor($nextService);
    public function handleRequest($request);
}

class Add implements Handler {
	private $successor;
	public function setSuccessor($nextService) {
		$this->successor = $nextService;
	}
	public function handleRequest($request) {
		if ($request->getService() == "add") {
			echo ("1 + 1 = 2");
		}
		else if ($this->successor != null) {
			$this->successor->handleRequest($request);
		}
	}
}

class Subtract implements Handler {
	private $successor;
	public function setSuccessor($nextService) {
		$this->successor = $nextService;
	}
	public function handleRequest($request) {
		if ($request->getService() == "subtract") {
			echo "1 - 1 = 0";
		}
		else if ($this->successor != null) {
			$this->successor->handleRequest($request);
		}
	}
}

class Multiply implements Handler {
	private $successor;
	public function setSuccessor($nextService) {
		$this->successor = $nextService;
	}
	public function handleRequest($request) {
		if ($request->getService() == "multiply") {
			echo ("1 * 1 = 1");
		}
		else if ($this->successor != null) {
			$this->successor->handleRequest($request);
		}
	}
}

class Request {
	private $value;
	public function __construct($service) {
		$this->value = $service;
	}
	public function getService() {
		return $this->value;
	}
}

class Client {
	public function __construct($queryNow) {
		$add = new Add();
		$subtract = new Subtract();
		$multiply = new Multiply();
		$add->setSuccessor($subtract);
		$subtract->setSuccessor($multiply);
		$loadup = new Request($queryNow);
		$add->handleRequest($loadup);
	}
}
	
$queryNow = "multiply";
$makeRequest = new Client($queryNow);
