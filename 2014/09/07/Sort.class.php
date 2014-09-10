<?php
/**
 *排序
 */
class Sort
{
	private $min = 0;
	private $max = 300;
	
	public function __construct()
	{
	}
	
	/**
	 *产生随机数组
	 */
	public function generateArr($num)
	{
		$arr = array();
		for($i=0;$i<$num;$i++)
		{
			$arr[] = mt_rand($this->min,$this->max);
		}
		return $arr;
	}
	
	/**
	 *quick sort desc
	 */
	public function quickSortDesc($arr)
	{			
		$count = count($arr);
		if($count>1)
		{			
			$k = $arr[0];
			$x = array();
			$y = array();
			
			$res = array();		
			
			for($i=1;$i<$count;$i++)
			{
				if($arr[$i]>$k)
				{
					$x[] = $arr[$i];
				}
				else
				{
					$y[] = $arr[$i];
				}
			}
			
			$x = $this->quickSortDesc($x);
			$y = $this->quickSortDesc($y);
			$res = array_merge($x,array($k),$y);
			return $res;		
			
		}
		else
		{
			return $arr;
		}
	}
}

// test
$s = new Sort();
$arr = $s->generateArr(5);
var_dump($arr);
$arr1 = $s->quickSortDesc($arr);
var_dump($arr1);