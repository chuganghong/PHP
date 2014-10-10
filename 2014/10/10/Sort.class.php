<?php
/**
 *排序算法
 */
class Sort
{
	private $num = 5;
	private $min = 0;
	private $max = 20000;

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
	 *bubble sort asc---不能理解
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
	 *select sort asc---记错了，把select sort 记成了bubble sort
	 */
	public function selectSortAsc($arr)
	{
		$count = count($arr);
		if($count>1)
		{
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

				if($i != $min)
				{
					$tmp = $arr[$i];
					$arr[$i] = $arr[$min];
					$arr[$min] = $tmp;
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
		$count = count($arr);

		if($count>1)
		{
			$k = $arr[0];
			$x = array();
			$y = array();

			for($i=1;$i<$count;$i++)
			{
				if($arr[$i]<$k)
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
	 *merge sort asc 归并排序，副程序
	 */
	public function mergeArr($arr1,$arr2)
	{
		$arr = array();

		while( count($arr1)&&count($arr2) )
		{
			$arr[] = $arr1[0]<$arr2[0]?array_shift($arr1):array_shift($arr2);
		}

		return array_merge($arr,$arr1,$arr2);
	}

	/**
	 *merge sort asc 归并排序，主程序
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
$arr2 = $s->selectSortAsc($arr);
var_dump($arr2);
$arr3 = $s->bubbleSortAsc($arr);
var_dump($arr3);
$arr4 = $s->quickSortAsc($arr);
var_dump($arr4);
for($i=0;$i<240;$i++)
{
	if($i/120==1)
	{
		printf('%s','new');
	}

	printf('%s','-');
}
$arr11 = array(1,2,3);
$arr22 = array(5,7,9);
$arr33 = $s->mergeArr($arr11,$arr22);
var_dump($arr3);
$arr5 = $s->mergeSortAsc($arr);
var_dump($arr5);