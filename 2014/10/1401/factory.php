<?php
/**
 *factory design pattern
 */
abstract class Operate
{
	protected $numberA;
	protected $numberB;

	public function numberA($numberA)
	{
		$this->numberA = $numberA;
	}

	public function numberB($numberB)
	{
		$this->numberB = $numberB;
	}

	abstract public function getResult();

}

//add
class OperateAdd extends Operate
{
	public function getResult()
	{
		$result = $this->numberA + $this->numberB;
		return $result;
	}
}

//sub
class OperateSub extends Operate
{
	public function getResult()
	{
		$result = $this->numberA - $this->numberB;
		return $result;
	}
}

//mul
class OperateMul extends Operate
{
	public function getResult()
	{
		return ($this->numberA * $this->numberB);
	}
}

//div
class OperateDiv extends Operate
{
	public function getResult()
	{
		try
		{
			if($this->numberB == 0)
			{
				throw new Exception('Division by zero.');
			}

			return ($this->numberA/$this->numberB);
		}
		catch(Exception $e)
		{
			printf('%s',$e->getMessage());
		}
	}
}

//factory
class Factory
{
	public static function createOperate($operate)
	{
		try
		{
			if(!in_array($operate,array('+','-','*','/')))
			{
				throw new Exception('不支持 ' . $operate . ' 运算。');
				
			}
		}
		catch(Exception $e)
		{
			printf('%s',$e->getMessage());
			exit();
		}

		switch($operate)
		{
			case '+':
				$oper = new OperateAdd();
				break;
			case '-':
				$oper = new OperateSub();
				break;
			case '*':
				$oper = new OperateMul();
				break;
			case '/':
				$oper = new OperateDiv();
				break;
		}		

		return $oper;		
	}
}


//test
Header('Content-Type:text/html;charset=utf-8');
$oper = Factory::createOperate('~');
$oper->numberA(200);
$oper->numberB(0);
$result = $oper->getResult();
var_dump($result);