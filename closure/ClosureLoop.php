<?php
/**
 *@filename:ClosureLoop.php
 *@description 闭包
 */
$i = 1;

$lamda1 = function() use($i) {echo $i;};
$lamda2 = function() use(&$i) {echo $i . '<br />';};

for($i=2;$i<=5;$i++)
{
	$lamda1();
	$lamda2();
}