<?php
/**
 *检测string 和integer相乘产生的结果是什么
 */
$str = '45';
$int = $str * 3;	//是int
var_dump($int);
$float = floatval($str) * 3;
var_dump($float);