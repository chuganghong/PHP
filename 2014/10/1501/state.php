<?php
/**
 *state
 *状态模式
 */
abstract class State
{
	public abstract function handle($context);
}

class ConcreteStateA extends State
{
	public function handle($context)
	{
		// $context->state = new ConcreteStateB();
		$context->setState(new ConcreteStateB());
		echo '当前状态：A'  . '<br />';
	}
}

class ConcreteStateB extends State
{
	public function handle($context)
	{
		// $context->state = new ConcreteStateA();
		$context->setState(new ConcreteStateA());
		echo '当前状态：B'  . '<br />';
	}
}

class Context
{
	protected $state;

	public function __construct($state)
	{
		$this->state = $state;
	}

	public function getState()
	{
		return $this->state;
	}

	public function setState($state)
	{
		$this->state = $state;
	}

	public function request()
	{
		$this->state->handle($this);
	}
}


// test
Header('Content-Type:text/html;charset=utf-8');
$c = new Context(new ConcreteStateA());

$c->request();
$c->request();
$c->request();
$c->request();