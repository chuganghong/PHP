<?php
/**
 *PHP的异常处理
 */
function checkNum($number)
{
	if($number>1)
	{
		throw new Exception('Value must be 1 or below.');
	}
	// return true;
	echo $number;
}

// checkNum(15);


try
{
	checkNum(70);
	
}
catch(Exception $e)
{
	echo 'Message: ' . $e->getMessage();
}