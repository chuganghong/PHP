<?php
/**
 *clone
 *对于clone，有这些认识:
 *1.对象复制可以用clone关键字实现。
 *2.当被复制的对象中定义了魔术方法__clone时，复制完成时，复制生成的新对象中的__clone方法会被调用。
 *3.__destruct魔术方法可以用来检测内存中有多少个对象副本。
 */
class A
{
	private $i;
	private $b;
	private $c = 's';

	public function __clone()
	{
		// $this->c = 'cc';
		echo time();
	}

	public function setI($i)
	{
		$this->i = $i;
	}

	public function setB($b)
	{
		$this->b = $b;
	}

	public function getI()
	{
		return $this->i;
	}

	public function getB()
	{
		return $this->b;
	}

	public function __destruct()
	{
		printf('%s','unset<br />');
	}
}

$a = new A();

$b = $a;

$c = clone $a;