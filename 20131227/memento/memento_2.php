<?php
class Memento
{
	public function backup()
	{
		//保存现有样式
		$msg = '样式已经保存<br />';
		echo sprintf('%s',$msg);
	}
	
	public function restore()
	{
		//用保存的样式去覆盖
		$msg = '样式已经恢复<br />';
		echo sprintf('%s',$msg);
	}
}

//设置分页样式
class ListStyle
{
	//备忘对象
	private $memento;
	
	//构造方法
	public function __construct()
	{
		$this->memento = new Memento();
	}
	
	//设置样式
	public function setStyle()
	{
		//开始先备份样式
		$this->memento->backup();
		
		//设置样式
		$msg = '设置了样式<br />';
		echo sprintf('%s',$msg);
	}
	
	//撤消方法
	public function undo()
	{
		$this->memento->restore();
	}
}

//test
$listStyle = new ListStyle();
//设置样式，同时备份
$listStyle->setStyle();
//撤销设置
$listStyle->undo();