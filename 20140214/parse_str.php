<?php
$str = "manage=value&arr[]=foo+bar&arr[]=baz";
parse_str($str);
echo $manage . '<br />';
echo $arr[0] . '<br />';
echo $arr[1] . '<br />';
var_dump($arr);
echo '<hr>';
parse_str($str,$output);
var_dump($output);