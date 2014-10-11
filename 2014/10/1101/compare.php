<?php
/**
 *检测'3'与'2'的大小，仍然是按数字大小来比较的
 */
function compare($str1,$str2)
{
	if($str1>$str2)
	{
		var_dump($str1);
	}
	else
	{
		var_dump($str2);
	}
	
}

//test
$str1 = '000';
$str2 = '24';
$res = compare($str1,$str2);
var_dump($res);