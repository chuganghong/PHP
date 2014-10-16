<?php
/**
 *状态模式
 *state
 */
abstract class State
{
	abstract public function writeProgram($w);
}

// 上午工作状态
class ForenoonState extends State
{
	public function writeProgram($w)
	{
		if($w->hour<12)
		{
			$format = '当前工作时间：%s 点 上午工作，精神百倍<br />';
			printf($format,$w->hour);
		}
		else
		{
			$w->setState(new NoonState());
			$w->writeProgram();
		}
	}
}

// 中午工作状态
class NoonState extends State
{
	public function writeProgram($w)
	{
		if($w->hour<13)
		{
			$format = '当前工作时间：%s点，饿了。午休，犯困，休息<br />';
			printf($format,$w->hour);
		}
		else
		{
			$w->setState(new AfternoonState());
			$w->writeProgram();
		}
	}
}

// 下午和傍晚工作状态
class AfternoonState extends State
{
	public function writeProgram($w)
	{
		if($w->hour<17)
		{
			$format = '当前工作时间：%s点，状态还不错，继续努力<br />';
			printf($format,$w->hour);
		}
		else
		{
			$w->setState(new EveningState());
			$w->writeProgram();
		}
	}
}

// 晚上工作状态
class EveningState extends State
{
	public function writeProgram($w)
	{
		if($w->getFinish())
		{
			$w->setState(new RestState());
			$w->writeProgram();
		}
		else
		{
			if($w->hour<21)
			{
				$format = '当前工作时间：%s点，加班，累<br />';
				printf($format,$w->hour);
			}
			else
			{
				$w->setState(new SleepingState());
				$w->writeProgram();
			}
		}

	}
}

// 睡眠状态
class SleepingState extends State
{
	public function writeProgram($w)
	{
		$format = '当前时间：%s点，不行了，睡着了<br />';
		printf($format,$w->hour);
	}
}

// 下班状态
class RestState extends State
{
	public function writeProgram($w)
	{
		$format = '当前时间：%s点，下班了，回家了<br />';
		printf($format,$w->hour);
	}
}

// 工作
class Work
{
	private $current;
	public  $hour;
	private $finish = false;

	public function __construct()
	{
		$this->current = new ForenoonState();
	}

	public function setHour($hour)
	{
		$this->hour = $hour;
	}

	public function getHour($hour)
	{
		return $this->hour;
	}

	public function setFinish($bool)
	{
		$this->finish = $bool;
	}

	public function getFinish()
	{
		return $this->finish;
	}

	public function setState($s)
	{
		$this->current = $s;
	}

	public function writeProgram()
	{
		// var_dump($this->current);
		$this->current->writeProgram($this);
	}

}

// test
Header('Content-Type:text/html;charset=utf-8');
$work = new Work();
$work->setHour(9);
$work->writeProgram();
$work->setHour(13);
$work->writeProgram();
// $work->setFinish(true);
$work->setHour(17);
$work->writeProgram();
$work->setHour(22);
$work->writeProgram();
