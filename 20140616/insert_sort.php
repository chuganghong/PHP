<?php
/**
 *插入排序
 */
function insert_sort($arr)
{
	for($i=count($arr)-1;$i>0;$i--)
	{
		$cur = $arr[$i];
		$j = $i+1;
		
		while( ($j<(count($arr)-1)) && ($arr[$j]>$cur) )
		{
			$arr[$j+1] = $cur;
			$j--;
		}
		
		$arr[$j+1] = $arr[$j];
	}
	
	return $arr;
}

$arr = array(2,-1,3,0,1,7,4);

var_dump($arr);
$arr2 = insert_sort($arr);
var_dump($arr2);