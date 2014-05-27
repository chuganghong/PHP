<?php
/**
 *数字转为数组
 */
$int  = '557';
var_dump(strlen($int));
var_dump($int[0]);
var_dump(substr($int,0,1));
for($i=0;$i<strlen($int);$i++)
{
	echo $int[$i];
}