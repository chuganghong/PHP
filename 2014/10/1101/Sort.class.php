<?php
/**
 *排序算法
 */
class Sort
{
	private $num = 5;
	private $min = 0;
	private $max = 200;

	/**
	 *生成一个数组
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
	 *insert sort asc
	 */
	public function insertSortAsc($arr)
	{
		$count = count($arr);

		for($i=1;$i<$count;$i++)
		{
			$k=$arr[$i];
			$j = $i - 1;

			while( ($j>=0)&&($arr[$j]>$k) )
			{
				var_dump($arr[$j]);
				$arr[$j+1] = $arr[$j];
				$j--;
			}

			$arr[$j+1] = $k;
		}

		return $arr;
	}

	/**
	 *bubble sort asc
	 */
	public function bubbleSortAsc($arr)
	{
		$count = count($arr);

		for($i=0;$i<$count-1;$i++)
		{
			for($j=$i+1;$j<$count;$j++)
			{
				if($arr[$j]<$arr[$i])
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
	 *select sort asc
	 */
	public function selectSortAsc($arr)
	{
		$count = count($arr);

		for($i=0;$i<$count-1;$i++)
		{
			$min = $i;
			for($j=$i+1;$j<$count;$j++)
			{
				if($arr[$j]<$arr[$min])
				{
					$min = $j;
				}
			}

			if($min != $i)
			{
				$tmp = $arr[$i];
				$arr[$i] = $arr[$min];
				$arr[$min] = $tmp;
			}
		}

		return $arr;
	}

	/**
	 *quick sort asc
	 */
	public function quickSortAsc($arr)
	{
		$count = count($arr);

		if($count>1)
		{
			$k = $arr[0];
			$x = array();
			$y = array();

			for($i=1;$i<$count;$i++)
			{
				if($k>$arr[$i])
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

			$arr = array_merge($x,array($k),$y);
		}

		return $arr;
	}

	/**
	 *merge array
	 */
	public function mergeArr($arr_left,$arr_right)
	{
		$arr = array();

		while( count($arr_left)&&count($arr_right) )
		{
			$arr[] = $arr_left[0]<$arr_right[0]?array_shift($arr_left):array_shift($arr_right);
		}

		return array_merge($arr,$arr_left,$arr_right);
	}

	/**
	 *merge sort asc
	 */
	public function mergeSortAsc($arr)
	{
		$count = count($arr);

		if($count>1)
		{
			$mid = intval($count/2);

			$arr_left = array_slice($arr,0,$mid);
			$arr_right = array_slice($arr,$mid);

			$arr_left = $this->mergeSortAsc($arr_left);
			$arr_right = $this->mergeSortAsc($arr_right);

			$arr = $this->mergeArr($arr_left,$arr_right);
		}

		return $arr;
	}

}

//test
$s = new Sort();
$arr = $s->generateArr();
var_dump($arr);
$arr1 = $s->insertSortAsc($arr);
var_dump($arr1);
$arr2 = $s->bubbleSortAsc($arr);
var_dump($arr2);
$arr3 = $s->selectSortAsc($arr);
var_dump($arr3);
$arr4 = $s->quickSortAsc($arr);
var_dump($arr4);

$arr_left = array(2,3,5);
$arr_right = array(10,20,345);
$arr_new = $s->mergeArr($arr_left,$arr_right);
var_dump($arr_new);

$arr5 = $s->mergeSortAsc($arr);
var_dump($arr5);