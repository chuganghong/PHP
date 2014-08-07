<?php
/**
 *插入排序
 *@param array $arr 待排序的数组
 *@return array $arr 经过排序后的数组
 */
function insert_sort($arr)
{
	for($i=1;$i<count($arr);$i++)
	{
		$key = $arr[$i];
		$j = $i-1;
		
		// 插入排序的降序与升序，区别就在里$arr[$j]<$key(降序）,$arr[$j]>$key（升序）
		while(($j>=0)&&($arr[$j]<$key))
		{
			$arr[$j+1] = $arr[$j];
			$j--;
		}
		$arr[$j+1] = $key;
	}
	return $arr;
}

/**
 *产生一个随机数组
 *@param integer $count 随机数组的个数
 *@return array $arr 随机数组
 */
function get_random_arr($count)
{
	$arr = array();

	for($i=0;$i<$count;$i++)
	{
		$arr[] = rand(1,40);
	}

	return $arr;
}


//test
$arr = get_random_arr(4);
$b = $arr;
var_dump($arr);
sort($arr);
var_dump($arr);
$arr = insert_sort($b);
var_dump($arr);