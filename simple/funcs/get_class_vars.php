<?php
class MyClass
{
	public $var1;
	public $var2 = 'xyz';
	public $var3 = 100;
	public $var4;

	function __construct()
	{
		$this->var1 = 'foo';
		$this->var2 = 'bar';
		return true;
	}
}

$my_class = new MyClass();
$class_vars = get_class_vars(get_class($my_class));
var_dump($class_vars);