<?php
/**
 *strtotime()
 */
$d1 = 'Thursday';
var_dump(strtotime($d1));

$d1 = '1956-01-05';
$d1 = explode('-',$d1);
var_dump($d1);
var_dump($d2 = mktime(0,0,0,$d1[1],$d1[2],$d1[0]));
var_dump($d2);
echo '<hr>';
$date = date('Y-m-d',258825600);
var_dump($date);
$date = date('Y-m-d',353692800);
var_dump($date);
