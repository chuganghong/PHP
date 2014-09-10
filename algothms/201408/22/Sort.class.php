<?php
/**
 *排序算法
 *非常熟练：quick sort
 *不熟练：bubble sort
 *一般：insert sort
 */
class Sort
{
	private $min = 1;
	private $max = 2000;
	
	// 产生随机数组
	function generateArr($num)
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
	function quickSortDesc($arr)
	{
		$count = count($arr);
		if($count>1)
		{
			$k = $arr[0];
			$x = array();
			$y = array();
			
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
		}
		else
		{
			$res = $arr;
		}
		
		return $res;
	}
	
	/**
	 *quick sort asc
	 */
	function quickSortAsc($arr)
	{
		$count = count($arr);
		if($count>1)
		{
			$k = $arr[0];
			$x = array();
			$y = array();
			
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
			
			$x = $this->quickSortAsc($x);
			$y = $this->quickSortAsc($y);
			$res = array_merge($y,array($k),$x);
		}
		else
		{
			$res = $arr;
		}
		
		return $res;
	}
	
	/**
	 *insert sort desc
	 */
	function insertSortDesc($arr)
	{
		$count = count($arr);
		for($i=1;$i<$count;$i++)
		{
			$k = $arr[$i];
			$j = $i-1;
			
			while( ($j>=0)&&($arr[$j]<$k) )
			{
				$arr[$j+1] = $arr[$j];
				$j--;
			}
			
			$arr[$j+1] = $k;
		}
		
		return $arr;
	}
	
	/**
	 *insert sort asc
	 */
	function insertSortAsc($arr)
	{
		$count = count($arr);
		
		for($i=1;$i<$count;$i++)
		{
			$k = $arr[$i];
			$j = $i-1;
			
			while( ($j>=0)&&($arr[$j]>$k) )
			{
				$arr[$j+1] = $arr[$j];
				$j--;
			}
			
			$arr[$j+1] = $k;
		}
		
		return $arr;
	}
	
	/**
	 *bubble sort desc
	 */
	function bubbleSortDesc($arr)
	{
		$count = count($arr);
		
		for($i=0;$i<$count-1;$i++)
		{
			$k = $arr[$i];
			$j = $i+1;
			for($j;$j<$count;$j++)
			{
				if($arr[$j]>$arr[$i])
				{
					$temp = $arr[$j];
					$arr[$j] = $arr[$i];
					$arr[$i] = $temp;
				}
			}
		}
		
		return $arr;
	}
	
	/**
	 *bubble sort asc
	 */
	function bubbleSortAsc($arr)
	{
		$count = count($arr);
		for($i=0;$i<$count-1;$i++)
		{
			// $k = $arr[$i];
			// $j = $i+1;
			for($j=0;$j<$count-1-$i;$j++)
			{
				if($arr[$j+1]<$arr[$j])
				{
					$temp = $arr[$j+1];
					$arr[$j+1] = $arr[$j];
					$arr[$j] = $temp;
				}
			}
		}
		
		return $arr;
	}
	
	/**
	 *cocktail sort desc
	 */
	function cocktailSortDesc($arr)
	{
		$count = count($arr);
		$num = ($count-1)/2;
		for($i=0;$i<$num;$i++)
		{
			// 把大的数移到左端
			for($j=$i;$j<$count-1-$i;$j++)
			{
				if($arr[$j+1]>$arr[$j])
				{
					$temp = $arr[$j+1];
					$arr[$j+1] = $arr[$j];
					$arr[$j] = $temp;
				}
			}
			
			// 把小的数移到右端
			for($j=$count-1-$i;$j>$i;$j--)
			{
				if($arr[$j]>$arr[$j-1])
				{
					$temp = $arr[$j-1];
					$arr[$j-1] = $arr[$j];
					$arr[$j] = $temp;
				}
			}
		}
		
		return $arr;
	}
	
	/**
	 *cocktail srot asc
	 */
	function cocktailSortAsc($arr)
	{
		$count = count($arr);
		$num = ($count-1)/2;
		
		for($i=0;$i<$num;$i++)
		{
			// 把小的数移到左端
			for($j=$i;$j<$count-1-$i;$j++)
			{
				if($arr[$j+1]<$arr[$j])
				{
					$temp = $arr[$j+1];
					$arr[$j+1] = $arr[$j];
					$arr[$j] = $temp;
				}
			}
			
			// 把大的数移到右端
			for($j=$count-1-$i;$j>$i;$j--)
			{
				if($arr[$j]<$arr[$j-1])
				{
					$temp = $arr[$j];
					$arr[$j] = $arr[$j-1];
					$arr[$j-1] = $temp;
				}
			}
		}
		
		return $arr;
	}
	
	// selection sort desc
	function selectionSortDesc($arr)
	{
		$num = count($arr)-1;
		
		for($i=0;$i<$num;$i++)
		{
			$max = $i;
			for($j=$i+1;$j<count($arr);$j++)
			{
				if($arr[$j]>$arr[$max])
				{
					$max = $j;
				}
			}
			
			if($max != $i)
			{
				$temp = $arr[$max];
				$arr[$max] = $arr[$i];
				$arr[$i] = $temp;
			}
		}
		
		return $arr;
	}
	
}

// test
$s = new Sort();
$arr = $s->generateArr(5);
var_dump($arr);
$arr2 = $s->quickSortDesc($arr);
var_dump($arr2);
$arr3 = $s->quickSortAsc($arr);
var_dump($arr3);
$arr4 = $s->insertSortDesc($arr);
var_dump($arr4);
$arr5 = $s->insertSortAsc($arr);
var_dump($arr5);
$arr6 = $s->bubbleSortDesc($arr);
var_dump($arr6);
$arr7 = $s->bubbleSortAsc($arr);
var_dump($arr7);
$arr8 = $s->cocktailSortDesc($arr);
var_dump($arr8);
$arr9 = $s->cocktailSortAsc($arr);
var_dump($arr9);
$arr10 = $s->selectionSortDesc($arr);
var_dump($arr10);