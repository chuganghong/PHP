<?php
/**
 *检测global variable 和 local variable
 *经检测，和Python中的global variable相同
 */
function func_global($x)
{
	global $x;
	echo 'x is ' . $x . '<br />';
	$x = 2;
	echo 'Changed x is ' . $x . '<br />'; 
}

$x = time();

func_global($x);
echo 'x is ' . $x . '<br />';