<?php
/**
 *适配器模式
 *adapter
 */
class Target
{
	public function request()
	{
		echo '普通请求<br />';
	}
}

class Adaptee
{
	public function specificRequest()
	{
		echo '特殊请求<br />';
	}
}

class Adapter extends Target
{
	private $adaptee;

	public function __construct()
	{
		$this->adaptee = new Adaptee();
	}

	public function request()
	{
		$this->adaptee->specificRequest();
	}
}

// test
Header('Content-Type:text/html;charset=utf-8');
$target = new Adapter();
$target->request();