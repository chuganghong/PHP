<?php
/**
 *intval()的结果是只保留float型参数的整数部分
 */
$num = 2.4;
var_dump(intval($num));
var_dump(intval(2.7));
$num = 2.01;
var_dump(ceil($num));