<?php
/**
 *原型模式 prototype
 */
abstract class Prototype
{
	private $id;

	public function __construct($id)
	{
		$this->id = $id;
	}


	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	abstract public function copy();
	
}

class ConcretePrototypeA extends Prototype
{
	public function copy()
	{
		return $this;
	}
}

$a = new ConcretePrototypeA(5);
var_dump($a);
$b = $a->copy();
$id_b = $b->getId();
var_dump($id_b);