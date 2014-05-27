<?php
/**
 *insertion-sort
 */
/**
 *@description generate array
 *@param integer $num 产生多少个随机数
 *@return array $arr 由num个随机数组成的数组
 */
function genArray($num)
{
	$arr = array();
	for($i=0;$i<$num;$i++)
	{
		$arr[] = mt_rand();
	}
	return $arr;
}

/**
 *@description insertion sort
 *@param array $arr 待排序的数组
 *@param array $res 经过排序后的数组
 */
function insertionSort($arr)
{
	$num = count($arr);
	for($i=1;$i<$num;$i++)
	{
		$key = $arr[$i];
		$j = $i-1;
		while( ($j>=0)&&($arr[$j]>$key) )
		{
			$arr[$j+1] = $arr[$j];
			$j--;
		}
		$arr[$j+1] = $key;
	}
	return $arr;
}
set_time_limit(0);
$arr1 = genArray(200);
// var_dump($arr1);
$arr2 = insertionSort($arr1);
var_dump($arr2);
