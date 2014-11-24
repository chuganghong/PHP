<?php
/**
 *observer
 *观察者模式
 */
class Subject
{
	protected $observers = array();

	//增加观察者
	public function attach($observer)
	{
		$this->observers[] = $observer;
	}

	//移除观察者
	public function detach($observer)
	{
		// $observers = $this->observers;
		$this->observers = $this->removeUnit($observer,$this->observers);
	}

	//从数组中移除一个元素
	public function removeUnit($value,$arr)
	{
		if(($key=array_search($value,$arr)) !== false)
		{
			array_splice($arr,$key,1);
		}

		return $arr;
	}

	//通知
	public function notify()
	{
		foreach($this->observers as $observer)
		{
			$observer->update();
		}
	}
}


abstract class Observer
{
	abstract public function update();
}

class ConcreteSubject extends Subject
{
	private $subjectState;

	public function setSubjectState($subjectState)
	{
		$this->subjectState = $subjectState;
	}

	public function getSubjectState()
	{
		return $this->subjectState;
	}
}

class ConcreteObserver extends Observer
{
	private $name;
	private $observerState;
	private $subject;

	public function __construct($subject,$name)
	{
		$this->subject = $subject;
		$this->name = $name;
	}

	public function update()
	{
		$this->observerState = $this->subject->getSubjectState();
		$msg = "观察者%s的新状态是%s<br />";
		printf($msg,$this->name,$this->observerState);
	}

	public function setSubject($subject)
	{
		$this->subject = $subject;
	}

	public function getSubject()
	{
		return $this->subject;
	}
}


//test
Header('Content-Type:text/html;charset=utf-8');
$s = new ConcreteSubject();

$o1 = new ConcreteObserver($s,'X');
$o2 = new ConcreteObserver($s,'Y');
$o3 = new ConcreteObserver($s,'Z');

$s->attach($o1);
$s->attach($o2);
$s->attach($o3);
echo '<hr>';
$s->setSubjectState('ABCDEFG');
$s->notify();
echo '<hr>';
$s->setSubjectState('RUN');
$s->notify();
echo '<hr>';
$s->detach($o1);
$s->notify();