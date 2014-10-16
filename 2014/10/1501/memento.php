<?php
/**
 *备忘录模式
 *memento
 */
class Originator
{
	private $state;

	public function setState($state)
	{
		$this->state = $state;
	}

	public function getState()
	{
		return $this->state;
	}

	public function createMemento()
	{
		return (new Memento($this->state));
	}

	public function setMemento($memento)
	{
		$this->state = $memento->getState();
	}

	public function show()
	{
		$format = 'State=%s<br />';
		printf($format,$this->state);
	}
}

class Memento
{
	private $state;

	public function __construct($state)
	{
		$this->state = $state;
	}

	public function getState()
	{
		return $this->state;
	}
}

class Caretaker
{
	private $memento;

	public function setMemento($memento)
	{
		$this->memento = $memento;
	}

	public function getMemento()
	{
		return $this->memento;
	}
}

// test
$o = new Originator();
$o->setState('On');
$o->show();

$c = new Caretaker();
$memento = $o->createMemento();
$c->setMemento($memento);

$o->setState('Off');
$o->show();

$memento = $c->getMemento();
$o->setMemento($memento);
$o->show();