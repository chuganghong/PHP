<?php
/**
 *insert-sort
 */
$arr = array(2,0,5,3,1,99,105,6);
var_dump($arr);
$num = count($arr);
for($i=1;$i<$num;$i++)
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
var_dump($arr);