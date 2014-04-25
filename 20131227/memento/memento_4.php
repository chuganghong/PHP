<?php
class Memento
{
	//水晶矿
	public $ore;
	
	//气矿
	public $gas;
	
	//玩家所有的部队对象
	public $troop;
	
	//玩家所有的建筑对象
	public $building;
	
	//构造方法，参数为要保存的玩家的对象，这里强制参数的类型为Player型
	public function __construct($player)
	{
		//保存这个玩家的水晶矿
		$this->ore = $player->ore;
		//保存这个玩家的气矿
		$this->gas = $player->gas;
		//保存这个玩家的所有部队对象
		$this->troop = $player->troop;
		//保存这个玩家的所有的建筑对象
		$this->building = $player->building;
		
		/**尝试保存多个步骤
		//保存这个玩家的水晶矿
		$this->ore[] = $player->ore;
		//保存这个玩家的气矿
		$this->gas[] = $player->gas;
		//保存这个玩家的所有部队对象
		$this->troop[] = $player->troop;
		//保存这个玩家的所有的建筑对象
		$this->building[] = $player->building;
		*/
	}
}

class Player
{
	//水晶矿
	public $ore;
	//气矿
	public $gas;
	//玩家的所有的部队对象
	public $troop;
	//玩家所有的建筑对象
	public $building;
	//获取这个玩家的备忘对象
	public function getMemento()
	{
		return new Memento($this);//$this作为参数，感觉这种用法很陌生
	}
	
	//用这个玩家的备忘录对象来恢复这个玩家，这里强制参数的类型为Memento类
	public function restore($m)
	{		
		//水晶矿
		$this->ore = $m->ore;
		//气矿
		$this->gas = $m->gas;
		//玩家所有的部队对象
		$this->troop = $m->troop;
		//玩家所有的建筑对象
		$this->building = $m->building;
		/**尝试保存多个步骤
		//水晶矿
		$this->ore = end($m->ore);
		//气矿
		$this->gas = end($m->gas);
		//玩家所有的部队对象
		$this->troop = end($m->troop);
		//玩家所有的建筑对象
		$this->building = end($m->building);
		*/
	}
}

//制造一个玩家
$p1 = new Player();
//假设他现在采了100水晶矿
$p1->ore = 100;
//我们先保存游戏，然后继续玩游戏
$m = $p1->getMemento();
//假设他现在采了200水晶矿
$p1->ore = 200;
$p1->restore($m);
//输出水晶矿，可以看到已经变成原来保存的状态了
$msg = $p1->ore . '<br />';
echo sprintf('%s',$msg);