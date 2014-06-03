<?php
/**
 *统计一个数组中的元素的个数
 *@param array $arr
 *@return 
 */
function  analyze($arr)
{
	$res = array();
	foreach($arr as $key=>$value)
	{
		if(array_key_exists($value,$res))
		{
			$res[$value]++;
		}
		else
		{
			$res[$value] = 1;
		}
	}
	return $res;
}

$arr = array('a','b','a','b','c',0,0,0);
var_dump($arr);
$res = analyze($arr);
var_dump($res);