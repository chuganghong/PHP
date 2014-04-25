<?php
//array array_slice ( array $array , int $offset [, int $length = NULL [, bool $preserve_keys = false ]] )
$arr = array(1,2,3,4,5,6,7,8);
$arr1 = array_slice($arr,0,8);
var_dump($arr1);