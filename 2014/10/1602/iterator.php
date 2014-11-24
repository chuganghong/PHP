<?php
/**
 *iterator 
 *迭代器模式
 */
abstract class Iterator2
{
	public abstract function first();
	public abstract function next();
	public abstract function isDone();
	public abstract function currentItem();
}

abstract class Aggregate
{
	public abstract function createIterator();
}

class ConcreteIterator extends Iterator2
{
	private $aggregate;
	private $current = 0;

	public function __construct($aggregate)
	{
		$this->aggregate = $aggregate;
	}

	public function first()
	{
		return $this->aggregate->items[0];
	}

	public function next()
	{
		$ret = '';
		$this->current++;
		if($this->current<count($this->aggregate->items))
		{
			$ret = $this->aggregate->items[$this->current];
		}
		return $ret;
	}

	public function isDone()
	{
		$count = count($this->aggregate->items);
		return $this->current>=$count?true:false;
	}

	public function currentItem()
	{
		return $this->aggregate->items[$this->current];
	}
}

class ConcreteAggregate extends Aggregate
{
	public $items = array();

	public function createIterator()
	{
		return new ConcreteIterator($this);
	}

	public function getCount()
	{
		return count($this->items);
	}

	public function getItem($index)
	{
		return $this->items[$index];
	}

	public function setItem($index,$value)
	{
		$this->items[$index] = $value;
	}
}

// test
Header('Content-Type:text/html;charset=utf-8');
$a = new ConcreteAggregate();
$a->setItem(0,'大鸟');
$a->setItem(1,'小菜');
$a->setItem(2,'行李');
$a->setItem(3,'老王');

$i = new ConcreteIterator($a);

$item = $i->first();

while( !($i->isDone()) )
{
	$format = '%s请买车票！<br />';

	printf($format,$i->currentItem());
	$i->next();
}