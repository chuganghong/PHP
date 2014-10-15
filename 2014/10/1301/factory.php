<?php
/**
 *factory pattern
 */
abstract class OperationAlgorithm
{
	protected $numberA;
	protected $numberB;

	abstract public function getResult();

	public function numberA($numberA)
	{
		$this->numberA = $numberA;
	}

	public function numberB($numberB)
	{
		$this->numberB = $numberB;
	}
}

//add
class OperationAdd extends OperationAlgorithm
{
	public function getResult()
	{
		$result = $this->numberA + $this->numberB;
		return $result;
	}
}

//sub
class OperationSub extends OperationAlgorithm
{
	public function getResult()
	{
		$result = $this->numberA - $this->numberB;
		return $result;
	}
}

//div
class OperationDiv extends OperationAlgorithm
{
	public function getResult()
	{
		try
		{
			if($this->numberB == 0)
			{
				throw new Exception('Division by zero!');
			}

			$result = $this->numberA/$this->numberB;
			return $result;
		}
		catch(Exception $e)
		{
			echo $e->getMessage() . '<br />';
		}
	}
}

//mul
class OperationMul extends OperationAlgorithm
{
	public function getResult()
	{
		$result = $this->numberA * $this->numberB;
		return $result;
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
			exit($e->getMessage());
		}

		switch ($operate) {
			case '+':
				$oper = new OperationAdd();
				break;
			case '-':
				$oper = new OperationSub();
				break;
			case '*':
				$oper = new OperationMul();
				break;
			case '/':
				$oper = new OperationDiv();
				break;
			default:
				$oper = '不支持 %s 运算';
		}

		return $oper;
	}
}

//test
$oper = Factory::createOperate('*');
$oper->numberA(200);
$oper->numberB(0);
$result = $oper->getResult();
var_dump($result);
