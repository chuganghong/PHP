<?php
/**
 *组合模式，公式
 */
// 公式抽象类或接口
abstract class Company
{
	protected $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function removeUnit($unit,$arr)
	{
		if( ($key=array_search($unit, $arr)) !== false )
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

	abstract public function add($c);
	abstract public function remove($c);
	abstract public function display($depth);
	abstract public function lineOfDuty();	//履行职责
}

// 具体公司类，实现接口
class ConcreteCompany extends Company
{
	private $children = array();

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function add($c)
	{
		$this->children[] = $c;
	}

	public function remove($c)
	{
		$this->removeUnit($c,$this->children);
	}

	public function display($depth)
	{
		$this->show($depth,$this->name);

		foreach($this->children as $child)
		{
			$child->display($depth+2);
		}
	}

	public function lineOfDuty()
	{
		foreach($this->children as $child)
		{
			$child->lineOfDuty();
		}
	}
}

// 人力资源部
class HRDepartment extends Company
{
	public function __construct($name)
	{
		parent::__construct($name);
	}

	public function add($c)
	{

	}

	public function  remove($c)
	{

	}

	public function display($depth)
	{
		$this->show($depth,$this->name);
	}

	public function lineOfDuty()
	{
		$format = '%s员工招聘培训管理<br />';
		printf($format,$this->name);
	}
}

// 财务部
class FinanceDepartment extends Company
{
	public function __construct($name)
	{
		parent::__construct($name);
	}

	public function add($c)
	{

	}

	public function remove($c)
	{

	}

	public function display($depth)
	{
		$this->show($depth,$this->name);
	}

	public function lineOfDuty()
	{
		$format = '%s公司财务收支管理<br />';
		printf($format,$this->name);
	}
}

// test
Header('Content-Type:text/html;charset=utf-8');
$root = new ConcreteCompany('北京总公司');
$root->add(new HRDepartment('总公司人力资源部'));
$root->add(new FinanceDepartment('总公司财务部'));

$comp = new ConcreteCompany('上海华东分公司');
$comp->add(new HRDepartment('上海华东分公司人力资源部'));
$comp->add(new FinanceDepartment('上海华东分公司财政部'));
$root->add($comp);

$comp2 = new ConcreteCompany('南京办事处');
$comp2->add(new HRDepartment('南京办事处人力资源部'));
$comp2->add(new FinanceDepartment('南京办事处财政部'));

$root->add($comp2);



$root->display(0);