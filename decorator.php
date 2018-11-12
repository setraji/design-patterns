<?php

// Beispiel: Buchung eines Fluges
// Es soll dabei möglich sein ein Gepäckstück, ein Snack und eine Rücktrittsversicherung hinzuzubuchen..

class FlyTicket {
	private $fly;
	private $price;

	function __construct($fly_in, $price_in) {
		$this->fly = $fly_in;
		$this->price = $price_in;
	}

	function getFly() {
		return $this->fly;
	}

	function getPrice() {
		return $this->price;
	}
}

class OrderDecorator {
	protected $order;
	protected $fly;
	protected $price;

	public function __construct(FlyTicket $order_in) {
		$this->order = $order_in;
		$this->resetOrder();
    }

	function resetOrder() {
		$this->fly = $this->order->getFly();
		$this->price = $this->order->getPrice();
	}

	function showOrder() {
		return $this->fly . ", Price: " . $this->price . " Euro";
	}
}

class Insurance extends OrderDecorator {
	private $order_decorator;
	private $insurance_price;

	public function __construct(OrderDecorator $order_in, $insurance_price_in) {
		$this->order_decorator = $order_in;
		$this->insurance_price = $insurance_price_in;
	}

	function addInsurance() {
		$this->order_decorator->fly = $this->order_decorator->fly . " + Insurance";
		$this->order_decorator->price = $this->order_decorator->price + $this->insurance_price;
	}
}

class Baggage extends OrderDecorator {
	private $order_decorator;
	private $baggage_price;

	public function __construct(OrderDecorator $order_in, $baggage_price_in) {
		$this->order_decorator = $order_in;
		$this->baggage_price = $baggage_price_in;
	}

	function addBaggage() {
		$this->order_decorator->fly = $this->order_decorator->fly . " + Baggage";
		$this->order_decorator->price = $this->order_decorator->price + $this->baggage_price;
	}
}

class Snack extends OrderDecorator {
	private $order_decorator;
	private $snack_price;

	public function __construct(OrderDecorator $order_in, $snack_price_in) {
		$this->order_decorator = $order_in;
		$this->snack_price = $snack_price_in;
	}

	function addSnack() {
		$this->order_decorator->fly = $this->order_decorator->fly . " + Snack";
		$this->order_decorator->price = $this->order_decorator->price + $this->snack_price;
	}
}


$order = new FlyTicket('Cologne - Madrid', 250);
 
$decorator = new OrderDecorator($order);
$insurance = new Insurance($decorator, 20);
$baggage = new Baggage($decorator, 50);
$snack = new Snack($decorator, 10);
 
echo "Flyticket:<br/>";
echo $decorator->showOrder() . "<br/>";

echo "+ Baggage:<br/>";
$baggage->addBaggage();
echo $decorator->showOrder() . "<br/>";

echo "+ Insurance:<br/>";
$insurance->addInsurance();
echo $decorator->showOrder() . "<br/>";

echo "+ Snack:<br/>";
$snack->addSnack();
echo $decorator->showOrder() . "<br/>";

echo "Delete additional services:<br/>";
$decorator->resetOrder();
echo $decorator->showOrder() . "<br/>";

// Flyticket:
// Cologne - Madrid, Price: 250 Euro
// + Baggage:
// Cologne - Madrid + Baggage, Price: 300 Euro
// + Insurance:
// Cologne - Madrid + Baggage + Insurance, Price: 320 Euro
// + Snack:
// Cologne - Madrid + Baggage + Insurance + Snack, Price: 330 Euro
// Delete additional services
// Cologne - Madrid, Price: 250 Euro
