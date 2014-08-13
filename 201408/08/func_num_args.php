<?php
/**
 *使用func_num_args()
 */
function a($a,$b)
{
	echo 2;
	$num = func_num_args();
	var_dump($num);
}
a(2,3);
