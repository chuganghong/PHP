<?php
/**
 *proxy design pattern
 */
abstract class Subject
{
	public abstract function request();
}

class RealSubject extends Subject
{
	public function request()
	{
		$msg = '真实的请求<br />';
		printf('%s',$msg);
	}
}

class Proxy extends Subject
{
	private $realSubject;

	public function request()
	{
		if(!isset($realSubject))
		{
			$this->realSubject = new RealSubject();
		}

		$this->realSubject->request();
	}
}

//test
Header('Content-Type:text/html;charset=utf-8');
$proxy = new Proxy();
$proxy->request();
