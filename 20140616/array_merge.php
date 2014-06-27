<?php
/**
 **数组合并
 *array_merge
 */

$arr = array('2'=>'a','4'=>'b');
$arr2 = array('2'=>'d','4'=>'ui');
$arr3 = array_merge($arr,$arr2);
var_dump($arr3);