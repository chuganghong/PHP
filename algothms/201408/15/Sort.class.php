<?php
/**
 *排序
 *初步测试，发现还是PHP的内置排序函数sort最给力！
 *速度远远超过我根据算法写出来的这些排序函数。
 *但是，我清晰地记得，有一次，不能直接使用PHP的内置排序函数，
 *我就自己写了个排序函数。那个例子是，需要根据数组的元素的某个组成部分排序。
 */
class Sort
{
	private $min;
	private $max;
	
	
	public function __construct($min,$max)
	{
		$this->min = $min;
		$this->max = $max;
	}
	
	/**
	 *产生随机数字数组
	 */
	public function generateArr($n)
	{
		$arr = array();
		
		for($i=0;$i<$n;$i++)
		{
			$arr[] = mt_rand($this->min,$this->max);
		}
		
		return $arr;
	}
	
	/**
	 *比较两个数的大小
	 */
	public function swap(&$a,&$b)
	{
		
		if($a<$b)
		{
			$tmp = $a;
			$a = $b;
			$b = $tmp;
		}
		
	}
	
	/**
	 *排序 bubble asc
	 */
	public function bubbleSortAsc($arr)
	{
		$num = count($arr);
		
		for($i=0;$i<($num-1);$i++)
		{
			for($j=$i+1;$j<$num;$j++)
			{
				if($arr[$j]<$arr[$i])
				{
					$tmp = $arr[$j];
					$arr[$j] = $arr[$i];
					$arr[$i] = $tmp;
				}
			}
		}
		
		return $arr;
	}
	
	/**
	 *快速排序
	 */
	public function quickSortAsc($arr)
	{
		// var_dump($arr);
		if(count($arr)>1)
		{
			$x = array();
			$y = array();
			$size = count($arr);
			$k = $arr[0];
			
			for($i=1;$i<$size;$i++)
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
			
			$x = $this->quickSortAsc($x);
			$y = $this->quickSortAsc($y);
			
			return array_merge($y,array($k),$x);
		}
		else
		{
			return $arr;
		}
	}
	
	/**
	 *快速排序 quickSort Desc
	 */
	public function quickSortDesc($arr)
	{
		if(count($arr)>1)
		{
			$k = $arr[0];
			$x = array();
			$y = array();
			$size = count($arr);
			
			for($i=1;$i<$size;$i++)
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
				
			return array_merge($x,array($k),$y);
		}
		else
		{
			return $arr;
		}
	}
	
	/**
	 *排序 bubble desc
	 *冒泡排序，经过第二重for循环之后，把最小或最大的数移到了起点位置。
	 *我不理解这点。
	 */
	public function bubbleSortDesc($arr)
	{
		$num = count($arr);
		
		for($i=0;$i<($num-1);$i++)
		{
			for($j=$i+1;$j<$num;$j++)
			{
				if($arr[$j]>$arr[$i])
				{
					$tmp = $arr[$j];
					$arr[$j] = $arr[$i];
					$arr[$i] = $tmp;
				}
			}
		}
		
		return $arr;
	}
	
	
	/**
	 *排序 asc
	 */
	public function sortByAsc($arr)
	{
		for($i=0;$i<count($arr);$i++)
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
	
	/**
	 *排序 desc
	 */
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


// test
$insert = new Sort(2,120);
$arr = $insert->generateArr(6);
var_dump($arr);
/* 
$arr1_1 = $insert->sortByAsc($arr);
var_dump($arr1_1);
$arr1_2 = $insert->sortByDesc($arr);
var_dump($arr1_2);

$arr2 = $insert->bubbleSortAsc($arr);
var_dump($arr2);

$arr3 = $insert->bubbleSortDesc($arr);
var_dump($arr3); */

$arr4 = $insert->quickSortAsc($arr);
// sort($arr);
var_dump($arr4);
$arr5 = $insert->quickSortDesc($arr);
var_dump($arr5);