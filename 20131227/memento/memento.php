<?php
//发起人Originator
class Originator
{
	private $state1;
	private $state2;
	private $state3;
	private $state4;
	
	public function __get($property)
	{
		return $this->$property;
	}
	
	public function __set($property,$value)
	{
		$this->$property = $value;
	}
	
	public function create_memento()
	{
		return new Memento($this->state);
	}
	
	public function set_memento($memento)
	{
		//$this->state = $memento->state;//Fatal error: Cannot access private property Memento::$state 
		$this->state = $memento->get_state();
	}
	
	public function show()
	{
		$msg = 'State=' . $this->state . '<br />';
		echo sprintf('%s',$msg);
	}
}

//备忘录memento类
class Memento
{
	private $state1;
	private $state2;
	private $state3;
	private $state4;
	
	public function __construct($o)
	{
		$this->state1 = $o->state1;
		$this->state2 = $o->state2;
		$this->state3 = $o->state3;
		$this->state4 = $o->state4;
	}
	
	public function __get($property)
	{
		return $this->$property;
	}	
	
}

//管理者caretaker类
class Caretaker
{
	private $memento;
	
	public function get_memento()
	{
		return $this->memento;
	}
	
	public function set_memento($memento)
	{
		$this->memento = $memento;
	}
}

//客户端，即测试
$o = new Originator();
$state = 'On';
$o->set_state($state);
$o->show();

$c = new Caretaker();
$memento = $o->create_memento();

//$o2 = new Originator();
$state2 = '2';
$o->set_state($state2);
$o->show();



$memento2 = $o->create_memento();

$c->set_memento($memento);
$c->set_memento($memento2);

$state = 'Off';
$o->set_state($state);
$o->show();

//var_dump($memento2);
//$memento = $c->get_memento();
$o->set_memento($memento);
$o->show();


