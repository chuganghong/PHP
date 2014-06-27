<?php
/**
 *观察implode的运行结果
 */
$arr = array('a','b','c');
var_dump($arr);
$arr2 = implode(',',$arr);
var_dump($arr2);