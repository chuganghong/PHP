<?php
//array array_chunk ( array $input , int $size [, bool $preserve_keys = false ] )
$input = array('a','b','c','d','e');
$arr1 = array_chunk($input,3);
var_dump($arr1);
$arr2 = array_chunk($input,4,true);
var_dump($arr2);