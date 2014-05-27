<?php
/**
 *检测空数组的empty结果
 */
$arr = array();
if(empty($arr))
{
	echo 1;
}
else
{
	echo 2;
}