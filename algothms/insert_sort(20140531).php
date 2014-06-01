<?php
/**
 *ggh
 *插入排序
 *@param array $arr 数组
 *@return array $arr 经过排序后的数组
 */
function insert_sort($arr)
{
	$num = count($arr);
	for($i=0;$i<$num;$i++)
	{
		$key = $arr[$i];
		
		$j = $i - 1;
		
		while( ($j>=0)&&($arr[$j]>$key) )
		{
			$arr[$j+1] = $arr[$j];
			$j--;
		}
		$arr[$j+1] = $key;
		
		
	}
	return $arr;
}

$arr = array(2,0,9,-5,100);
var_dump($arr);
$arr = insert_sort($arr);
var_dump($arr);