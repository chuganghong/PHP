<?php
/**
 *组合模式
 */
abstract class Component
{
	protected $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function unsetUnit($unit,$arr)
	{
		if(($key=array_search($unit,$arr)) !== false)
		{
			array_splice($arr,$key,1);
		}

		return $arr;
	}

	public function show($depth,$name)
	{
		for($i=0;$i<$depth;$i++)
		{
			echo '-';
		}
		echo $name . '<br />';
	}

	public abstract function add($c);
	abstract public function remove($c);
	abstract public function display($depth);
}

class Leaf extends Component
{
	public function __construct($name)
	{
		parent::__construct($name);
	}

	public function add($c)
	{
		echo 'Can not add to a leaf<br />';
	}

	public function remove($c)
	{
		echo 'Can not remove from a leaf<br />';
	}

	public function display($depth)
	{
		$this->show($depth,$this->name);
	}
}

class Composite extends Component
{
	private $children = array();

	public function __construct($name)
	{
		parent::__construct($name);
	}

	public function add($c)
	{
		$this->children[] = $c;
	}

	public function remove($c)
	{
		$this->children = $this->unsetUnit($c,$this->children);
	}

	public function display($depth)
	{
		$this->show($depth,$this->name);

		foreach($this->children as $child)
		{
			$child->display($depth + 2);
		}
	}

}

// test
$root = new Composite('root');
$root->add(new Leaf('Leaf A'));
$root->add(new Leaf('Leaf B'));

$comp = new Composite('Composite X');
$comp->add(new Leaf('Leaf XA'));
$comp->add(new Leaf('Leaf XB'));

$root->add($comp);

$comp2 = new Composite('Composite XY');
$comp2->add(new Leaf('Leaf XYA'));
$comp2->add(new Leaf('Leaf XYB'));
$comp->add($comp2);

$root->add(new Leaf('Leaf C'));

$root->add(new Leaf('Leaf D'));
$root->remove(new Leaf('Leaf D'));

$leaf = new Leaf('E');
$leaf->add(new Leaf('EX'));

$root->display(1);