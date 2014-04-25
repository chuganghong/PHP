<?php
/**
 *类常量的使用方法
 */
class A
{
	const sa = 5;
	
	public function __construct()
	{
		echo self::sa;
	}
}

$a  = new A();