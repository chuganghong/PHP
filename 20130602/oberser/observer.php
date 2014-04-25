<?php
/**
 *observer pattern
 *通过了测试
 */
interface subject
{
	function add($observer);
	function splice($observer);
	function notify($msg);
}

interface observer
{
	function update($msg);
}

class ConcreteSubject implements subject
{
	protected $observers;
	
	function __get($name)
	{
		return $this->$name;
	}
	
	function add($observer)
	{
		$this->observers[] = new $observer();
	}
	
	function splice($observer)
	{
		$observer1 = new $observer();
		//$key = array_search($observer1,$this->observers) or die('Not exists!');
		$key = array_search($observer1,$this->observers);
		
		foreach($this->observers as $k=>$v)
		{
			if( $k==$key )
			{
				continue;
			}
			$observers2[] = $v;
		}
		$this->observers = $observers2;
		
	}
	
	function notify($msg)
	{
		foreach($this->observers as $v)
		{
			$v->update($msg);
		}
	}
}

abstract class AbstractObserver implements observer
{
	function update($msg)
	{
		echo 'It is ' . $msg . ' now.';
		$this->action();
	}
	
	abstract function action();
}

class Observer1 extends AbstractObserver
{
	function action()
	{
		echo 'I must go home.<br />';
	}
}

class Observer2 extends AbstractObserver
{
	function action()
	{
		echo 'I must have supper.I am so hungry.<br />';
	}
}

class Observer3 extends AbstractObserver
{
	function action()
	{
		echo 'I must go to bed.<br />';
	}
}

class Observer4 extends AbstractObserver
{
	function action()
	{
		echo 'I will go to see my classmate tomorrow.<br />';
	}
}

//test
$subject = new ConcreteSubject();
$subject->add('Observer1');
$subject->add('Observer2');
$subject->add('Observer3');
$subject->notify(9);
var_dump($subject->__get('observers'));
$subject->add('Observer4');
var_dump($subject->__get('observers'));
$subject->notify(10);

$subject->splice('Observer2');
var_dump($subject->__get('observers'));
$subject->notify(14);

		
	