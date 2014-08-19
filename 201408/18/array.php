<?php
/**
 *1.测试cookie在不同页面间的传递array.php和array2.php
 *2.array增加新元素
 */
$value = $_GET['t'];
$arr = isset($_COOKIE['key'])?$_COOKIE['key']:array();
$arr = json_decode($arr,true);
$arr[]= $value;
$v = json_encode($arr);
setcookie('key',$v,time()+3600);

var_dump($v);



$arr = array(222);
var_dump($arr);
$arr[] = 555;
var_dump($arr);
