<?php
/**
 *filename:insertion_sort.php
 *插入排序
 */
$arr = array(2,0,5,3,9,7,4,100);
$arr2 = array();
$arr2[0] = $arr[0];
var_dump($arr2);
var_dump($arr);
$len = count($arr);

for($i=0;$i<$len;$i++)
{
	$key = $arr[$i];
	$j = $i-1;
	while($j>-1&&$key<$arr[$j])
	{
		$arr[$j+1] = $arr[$j];
		$j--;
	}
	$arr[$j+1] = $key;
}
var_dump($arr);
