<?php
/**
 *builder
 *建造者模式
 */
class Product
{
	private $parts = array();

	public function Add($part)
	{
		$this->parts[] = $part;
	}

	public function show()
	{
		$msg = '产品创建：<br />';
		printf('%s',$msg);
		foreach($this->parts as $part)
		{
			// echo $part . '<br />';
			printf('%s<br />',$part);
		}
	}
}

abstract class Builder
{
	protected $product;

	public function __construct()
	{
		$this->product = new Product();
	}

	abstract public function buildPartA();
	abstract public function buildPartB();
	abstract public function getResult();
}

class ConcreteBuilderA extends Builder
{
	public function buildPartA()
	{
		$this->product->add('部件A');
	}

	public function buildPartB()
	{
		$this->product->add('部件B');
	}

	public function getResult()
	{
		return $this->product;
	}
}

class ConcreteBuilderB extends Builder
{
	public function buildPartA()
	{
		$this->product->add('部件X');
	}

	public function buildPartB()
	{
		$this->product->add('部件Y');
	}

	public function getResult()
	{
		return $this->product;
	}
}

class Director
{
	public function construct($builder)
	{
		$builder->buildPartA();
		$builder->buildPartB();
	}
}

// TEST
Header('Content-Type:text/html;charset=utf-8');
$director = new Director();
$b1 = new ConcreteBuilderA();
$b2 = new ConcreteBuilderB();

$director->construct($b1);
$p1 = $b1->getResult();
$p1->show();

$director->construct($b2);
$p2 = $b2->getResult();
$p2->show();