<?php
/**
 *在PHP函数中return的作用
 *经测试，在function中，遇到return后，函数就返回一个值，并且结束此函数的执行。
 *在检查代码的过程中，我出现了思路不清晰、不清醒的状态，怀疑这一点。
 */
function test()
{
	$arr = array();
	for($i=0;$i<20;$i++)
	{
		if($i==7)
		{
			
			return $i;
			
		}

		$arr[] = $i;
	}

	return $arr;;
}

$t = test();
var_dump($t);
