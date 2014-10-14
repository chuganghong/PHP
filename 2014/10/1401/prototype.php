<?php
interface Prototype
{
	public function copy();
}

class ConcretePrototype implements Prototype
{
	private $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function copy()
	{
		return clone $this;
	}
}

class Client
{
	public static function main()
	{
		$pro = new ConcretePrototype('substr');
		$pro2 = $pro->copy();
		echo $pro->getName() . '<br />';
		echo $pro2->getName() . '<br />';
	}
}

Client::main();