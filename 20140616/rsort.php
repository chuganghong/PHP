<?php
/**
 *对数组进行逆向排序
 *resort()
 */
$arr = array('a','b','d');

var_dump($arr);

/* rsort($arr);

var_dump($arr); */

$arr = my_rsort($arr);

var_dump($arr);



function my_rsort($arr)
{
	$num = count($arr)-1;
	for($i=$num;$i>=0;$i--)
	{
		$res[] = $arr[$i];
	}
	
	return $res;
}