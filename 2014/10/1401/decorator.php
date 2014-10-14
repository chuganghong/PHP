<?php
/**
 *decorator design pattern
 */
abstract class Component
{
	public abstract function operation();
}

class ConcreteComponent extends Component
{
	public function operation()
	{
		$msg = '具体对象的操作<br />';
		printf('%s',$msg);
	}
}

class Decorator extends Component
{
	protected $component;

	public function setComponent($component)
	{
		$this->component = $component;
	}

	public function operation()
	{
		if($this->component != null)
		{
			$this->component->operation();
		}
	}
}

class ConcreteDecoratorA extends Decorator
{
	private $addedState;

	public function operation()
	{
		parent::operation();
		$this->addedState = 'New State';
		$msg = '具体装饰对象A的操作<br />';
		printf('%s',$msg);
	}
}

class ConcreteDecoratorB extends Decorator
{
	public function operation()
	{
		parent::operation();
		$this->addBehavior();
		$msg = '具体装饰对象B的操作<br />';
		printf('%s',$msg);
	}

	private function addBehavior()
	{

	}
}

//test
Header('Content-Type:text/html;charset=utf-8');
$c = new ConcreteComponent();
$d1 = new ConcreteDecoratorA();
$d2 = new ConcreteDecoratorB();

$d1->setComponent($c);
$d2->setComponent($d1);
$d2->operation();