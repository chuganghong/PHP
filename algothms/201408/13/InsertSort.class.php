<?php
/**
 *插入排序
 */
class InsertSort
{
	private $min;
	private $max;
	private $arr;
	
	public function __construct($min,$max)
	{
		$this->min = $min;
		$this->max = $max;
	}
	
	
	// 生成随机数组
	public function generate_arr($n)
	{
		for($i=0;$i<$n;$i++)
		{
			$arr[] = mt_rand($this->min,$this->max);
		}
		return $arr;
	}
	
	// 插入排序--升序
	public function sortByAsc($arr)
	{
		for($i=1;$i<count($arr);$i++)
		{
			$key = $arr[$i];
			$j = $i-1;
			
			while(($j>=0)&&($arr[$j]>$key))
			{
				$arr[$j+1] = $arr[$j];
				$j--;
			}
			
			$arr[$j+1] = $key;
		}
		
		return $arr;
	}
	
	// 插入排序--降序
	public function sortByDesc($arr)
	{
		for($i=1;$i<count($arr);$i++)
		{
			$key = $arr[$i];
			$j = $i-1;
			
			while(($j>=0)&&($arr[$j]<$key))
			{
				$arr[$j+1] = $arr[$j];
				$j--;
			}
			$arr[$j+1] = $key;
		}
		
		return $arr;
	}
	
}