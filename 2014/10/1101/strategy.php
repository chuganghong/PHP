<?php
/**
 *策略模式
 */

//抽象算法类
abstract class Strategy
{
	public abstract function AlgorithmInterface();
}

//具体算法A
class ConcreteStrategyA extends Strategy
{
	public function AlgorithmInterface()
	{
		$msg = '算法A实现';
		printf('%s',$msg);
	}
}

//具体算法B
class ConcreteStrategyB extends Strategy
{
	public function AlgorithmInterface()
	{
		$msg = '算法B实现';
		printf('%s',$msg);
	}
}

//具体算法C
class ConcreteStrategyC extends Strategy
{
	public function AlgorithmInterface()
	{
		$msg = '算法C实现';
		printf('%s',$msg);
	}
}

//上下文
class Context
{
	private $strategy;

	public function __construct($strategy)
	{
		$this->strategy = $strategy;
	}

	//上下文接口
	public function ConcreteInterface()
	{
		$this->strategy->AlgorithmInterface();
	}
}

//客户端代码
Header('Content-Type:text/html;charset=utf-8');
//上下文
$strategyA = new ConcreteStrategyA();
$context = new Context($strategyA);
$context->ConcreteInterface();
echo '<hr>';
$strategyB = new ConcreteStrategyB();
$context = new Context($strategyB);
$context->ConcreteInterface();
echo '<hr>';
$strategyC = new ConcreteStrategyC();
$context = new Context($strategyC);
$context->ConcreteInterface();
