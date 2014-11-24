<?php
/**
 *templateMethod--模板方法模式
 */
abstract class AbstractClass
{
	public abstract function primitiveOperationA();

	public abstract function primitiveOperationB();

	public function templateMethod()
	{
		$this->primitiveOperationA();
		$this->primitiveOperationB();
	}
}

class ConcreteClassA extends AbstractClass
{
	public function primitiveOperationA()
	{
		$msg = '具体类A方法A实现<br />';
		printf('%s',$msg);
	}

	public function primitiveOperationB()
	{
		$msg = '具体类A方法B实现<br />';
		printf('%s',$msg);
	}
}

class ConcreteClassB extends AbstractClass
{
	public function primitiveOperationA()
	{
		$msg = '具体类B方法A实现<br />';
		printf('%s',$msg);
	}

	public function primitiveOperationB()
	{
		$msg = '具体类B方法B实现<br />';
		printf('%s',$msg);
	}
}

//TEST
Header('Content-Type:text/html;charset=utf-8');
$c = new ConcreteClassA();
$c->templateMethod();

$c = new ConcreteClassB();
$c->templateMethod();