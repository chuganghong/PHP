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
	 *insert sort asc
	 */
	public function insertSortAsc($arr)
	{
		$count = count($arr);

		if($count>1)
		{
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
				if($arr[$i]>$arr[$j])
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
	 *merge sort
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
$arr_left = array(2,3,4,5);
$arr_right = array(0,1,6);
$new_arr = $s->mergeArr($arr_left,$arr_right);
var_dump($new_arr);
$arr4 = $s->mergeSortAsc($arr);
var_dump($arr4);