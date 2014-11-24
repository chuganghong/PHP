<?php
/**
 *facade
 *外观模式
 */
class SubSystemOne
{
	public function methodOne()
	{
		$msg = '子系统方法一<br />';
		printf('%s',$msg);
	}
}

class SubSystemTwo
{
	public function methodTwo()
	{
		$msg = '子系统方法二<br />';
		printf('%s',$msg);
	}
}

class SubSystemThree
{
	public function methodThree()
	{
		$msg = '子系统方法三<br />';
		printf('%s',$msg);
	}
}

class SubSystemFour
{
	public function methodFour()
	{
		$msg = '子系统方法四<br />';
		printf('%s',$msg);
	}
}

//外观类
class Facade
{
	private $one;
	private $two;
	private $three;
	private $four;

	public function __construct()
	{
		$this->one = new SubSystemOne();
		$this->two = new SubSystemTwo();
		$this->three = new SubSystemThree();
		$this->four = new SubSystemFour();
	}

	public function methodA()
	{
		echo '方法组A（）---<br />';
		$this->one->methodOne();
		$this->two->methodTwo();
		$this->four->methodFour();
	}

	public function methodB()
	{
		echo '方法组B()---<br />';
		$this->three->methodThree();
		$this->four->methodFour();
	}
}


// test
Header('Content-Type:text/html;charset=utf-8');
$facade = new Facade();
$facade->methodA();
$facade->methodB();