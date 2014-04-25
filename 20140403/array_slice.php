<?php
//array_slice()
$arr = array(1,2,3,4,5,6,7);
$arr1 = array_slice($arr,0,5);
var_dump($arr1);
$arr2 = array_slice($arr,5,6);
var_dump($arr2);