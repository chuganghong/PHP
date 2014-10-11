<?php
/**
 *简单工厂模式
 */

/**
 *运算类
 */
abstract class Operation
{
	protected $_numberA;
	protected $_numberB;

	abstract public function GetResult();

	public function NumberA($numberA)
	{
		$this->_numberA = $numberA;
	}

	public function NumberB($numberB)
	{
		$this->_numberB = $numberB;
	}

}

/**
 *Add
 */
class OperationAdd extends Operation
{
	public function GetResult()
	{
		$result = $this->_numberA + $this->_numberB;
		return $result;
	}
}

/**
 *Sub
 */
class OperationSub extends Operation
{
	public function GetResult()
	{
		$result = $this->_numberA - $this->_numberB;
		return $result;
	}
}

/**
 *Mul
 */
class OperationMul extends Operation
{
	public function GetResult()
	{
		$result = $this->_numberA * $this->_numberB;
		return $result;
	}
}

/**
 *Div
 */
class OperationDiv extends Operation
{
	public function GetResult()
	{
		try
		{
			if(!$this->_numberB)
			{
				throw new Exception('Division by zero.');
			}

			$result = $this->_numberA/$this->_numberB;
			return $result;
		}
		catch(Exception $e)
		{
			$msg = 'Caught exception: ' . $e->getMessage() . '<br />';
			printf('%s',$msg);
		}
		
	}
}

/**
 *factory
 */
class OperationFactory
{
	public static function CreateOperation($operation)
	{
		switch($operation)
		{
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
		}

		return $oper;
	}
}

//test
$oper = OperationFactory::CreateOperation('/');
$oper->NumberA(10);
$oper->NumberB(0);
$result = $oper->GetResult();
var_dump($result);