<?php
class foo
{
	function __construct()
	{
		date_default_timezone_set('PRC');
		echo date('Y-m-d H:i:s',time()) . '<br />';
	}

	function name()
	{
		printf('My name is %s<br />',get_class());
	}
}

$bar = new foo();

printf('Its name is %s<br />',get_class($bar));

$bar->name();