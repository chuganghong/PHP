<?php
/**
 *Test InsertSort.class.php
 */
set_time_limit(0);
require('InsertSort.class.php');
date_default_timezone_set('PRC');
$insert = new InsertSort(2,100);
$start = microtime(true);
$arr = $insert->generate_arr(50000);
// var_dump($arr);
$end = microtime(true);
$msg = 'Cost time ' . ($end-$start) . '<br />';
/* var_dump($start);
var_dump($end); */
echo $msg;

// sort
$start2 = microtime(true);
$arr2 = $insert->sortByAsc($arr);
$end2 = microtime(true);
$msg = 'Cost time ' . ($end2-$start2) . '<br />';
echo $msg;
// var_dump($arr2);
/* 
$arr3 = $insert->sortByDesc($arr);
var_dump($arr3); */