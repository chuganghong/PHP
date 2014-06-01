<?php
/**
 *冒泡排序
 */
function bubble_sort($arr)
{
	$num = count($arr);
	for($i=$num-1;$i>=0;$i--)
	{
		for($j=0;$j<$i;$j++)
		{
			if($arr[$j]>$arr[$j+1])
			{
				$temp = $arr[$j];				
				$arr[$j] = $arr[$j+1];
				$arr[$j+1] = $temp;
			}
		}
	}
	return $arr;
}

$arr = array(2,0,9,-5,100);
var_dump($arr);
$arr = bubble_sort($arr);
var_dump($arr);