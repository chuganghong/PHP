<?php
/**
 *strpos
 */
$str = '1,2,3,4';
if($position = strpos($str,'1') !== false)
{
	echo 1;
}
var_dump($position);