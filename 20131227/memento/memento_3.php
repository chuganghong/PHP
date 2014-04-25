<?php
//备忘录
class Memento
{
	public function backup()
	{
		//保存现有的分页样式
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
	//备忘录对象
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
	
	//撤销方法
	public function undo()
	{
		//先保存，为了redo
		$this->memento->backup();
		$this->memento->restore();
	}
	
	//重做方法
	public function redo()
	{
		$this->memento->restore();
	}
}

$listStyle = new ListStyle();
//设置样式，同时备份
$listStyle->setStyle();
//撤销设置
$listStyle->undo();
//重做设置
$listStyle->redo();