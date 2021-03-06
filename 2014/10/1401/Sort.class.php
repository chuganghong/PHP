<?php
/**
 *sort algorithm
 */
class Sort
{
	private $num = 5;
	private $min = 0;
	private $max = 200;

	/**
	 *生成数组
	 */
	public function generateArr()
	{
		$arr = array();
		for($i=0;$i<$this->num;$i++)
		{
			$arr[] = mt_rand($this->min,$this->max);
		}
		return $arr;
	}

	/**
	 *insert sort desc
	 */
	public function insertSortDesc($arr)
	{
		$count = count($arr);

		if($count>1)
		{
			for($i=1;$i<$count;$i++)
			{
				$k = $arr[$i];
				$j = $i - 1;

				while( ($j>=0)&&($arr[$j]<$k) )
				{
					$arr[$j+1] = $arr[$j];
					$j--;
				}
				$arr[$j+1] = $k;
			}
		}

		return $arr;
	}

	/**
	 *merge array
	 */
	public function mergeArr($left_arr,$right_arr)
	{
		$arr = array();

		while( count($left_arr)&&count($right_arr) )
		{
			$arr[] = $left_arr[0]>$right_arr[0]?array_shift($left_arr):array_shift($right_arr);
		}

		return array_merge($arr,$left_arr,$right_arr);
	}

	/**
	 *merge sort desc
	 */
	public function mergeSortDesc($arr)
	{
		$count = count($arr);

		if($count>1)
		{
			$mid = intval($count/2);

			$left_arr = array_slice($arr,0,$mid);
			$right_arr = array_slice($arr,$mid);

			$left_arr = $this->mergeSortDesc($left_arr);
			$right_arr = $this->mergeSortDesc($right_arr);

			$arr = $this->mergeArr($left_arr,$right_arr);
		}

		return $arr;
	}

	/**
	 *bubble sort desc
	 */
	public function bubbleSortDesc($arr)
	{
		$count = count($arr);

		for($i=0;$i<$count-1;$i++)
		{
			for($j=$i+1;$j<$count;$j++)
			{
				if($arr[$i]<$arr[$j])
				{
					$tmp = $arr[$i];
					$arr[$i] = $arr[$j];
					$arr[$j] = $tmp;
				}
			}
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

			$arr = array_merge($x,array($k),$y);
		}

		return $arr;
	}

	/**
	 *select sort desc
	 */
	public function selectSortDesc($arr)
	{
		$count = count($arr);

		for($i=0;$i<$count-1;$i++)
		{
			$max = $i;

			for($j=$i+1;$j<$count;$j++)
			{
				if($arr[$j]>$arr[$max])
				{
					$max = $j;
				}
			}

			if($max != $i)
			{
				$tmp = $arr[$i];
				$arr[$i] = $arr[$max];
				$arr[$j] = $tmp;
			}
		}

		return $arr;
	}
}

//test
$s = new Sort();
$arr = $s->generateArr();
var_dump($arr);
$arr1 = $s->insertSortDesc($arr);
var_dump($arr1);

$left_arr = array(8,5,0);
$right_arr = array(-1,-3,-4);
$new_arr = $s->mergeArr($left_arr,$right_arr);
var_dump($new_arr);

$arr2 = $s->mergeSortDesc($arr);
var_dump($arr2);
$arr3 = $s->bubbleSortDesc($arr);
var_dump($arr3);
$arr4 = $s->quickSortDesc($arr);
var_dump($arr4);
$arr5 = $s->selectSortDesc($arr);
var_dump($arr5);