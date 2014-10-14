<?php
/**
 *strategy design pattern
 */
abstract class Strategy
{
	public abstract function algorithmInterface();
}

class ConcreteStrategyA extends Strategy
{
	public function algorithmInterface()
	{
		$msg = '算法A实现';
		printf('%s',$msg);
	}
}

class ConcreteStrategyB extends Strategy
{
	public function algorithmInterface()
	{
		$msg = '算法B实现';
		printf('%s',$msg);
	}
}

//context
class Context
{
	private $strategy;

	public function __construct($strategy)
	{
		$this->strategy = $strategy;
	}

	public function contextInterface()
	{
		$this->strategy->algorithmInterface();
	}
}

//test
Header('Content-Type:text/html;charset=utf-8');
$context = new Context(new ConcreteStrategyA());
$context->contextInterface();
echo '<br />';
$context = new Context(new ConcreteStrategyB());
$context->contextInterface();