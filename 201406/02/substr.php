<?php
/**
 *检测substr($str,$start)中的$start大于$str的字节数时的结果
 */
$str = '检测substr($str,$start)中的$start大于$str的字节数时的结果';
$len = strlen($str);
$res = mb_substr($str,$len+2,3,'utf-8');
var_dump($res);