<?php
/**
 *学习PHP的异常处理机制
 *抛出一个异常，但是不去捕获它
 */
// create function with an exception
function checkNum($number)
{
	if($number>1)
	{
		throw new Exception('Value must be 1 or below');
	}
	return true;
}

// trigger exception
checkNum(2);

/* $a = 5;
echo $a; */