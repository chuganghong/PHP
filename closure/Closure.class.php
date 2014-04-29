<?php
/**
 *@filename Closure.class.php
 *@description 闭包例程
 */
class ClosureTest
{
	public $multiplier;
	
	public function __construct($multiplier)
	{
		$this->multiplier = $multiplier;
	}
	
	public function getClosure()
	{
		$mul = &$this->multiplier;
		return function($number) use(&$mul)
			   {
					return $mul * $number;
			   };
	}
}

$test = new ClosureTest(10);
$x = $test->getClosure();

echo $x(8);
echo '<br />';
$test->multiplier = 2;
echo $x(8);