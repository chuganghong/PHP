<?php
/**
 *学习PHP的异常处理
 */
function inverse($x)
{
	if(!$x)
	{
		throw new Exception('Division by zero.');
	}
	else
	{
		return 1/$x;
	}
}

try
{
	echo inverse(5) . "\n";
	echo inverse(0) . "\n";
}
catch(Exception $e)
{
	echo 'Caught exception: ', $e->getMessage(), "\n";
}

echo 'Hello World';