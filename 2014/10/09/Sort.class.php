<?php
/**
 *排序算法
 */
class Sort
{
	private $num = 5;
	private $min = 1;
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
				$j = $i - 1;

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
				if($arr[$i]>$k)
				{
					$y[] = $arr[$i];
				}
				else
				{
					$x[] = $arr[$i];
				}
			}

			$x = $this->quickSortAsc($x);
			$y = $this->quickSortAsc($y);

			return array_merge($x,array($k),$y);
		}
		else
		{
			return $arr;
		}
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
}

//test
$s = new Sort();
$arr = $s->generateArr();
var_dump($arr);
$arr1 = $s->insertSortAsc($arr);
var_dump($arr1);
$arr2 = $s->bubbleSortAsc($arr);
var_dump($arr2);
$arr3 = $s->quickSortAsc($arr);
var_dump($arr3);
$arr4 = $s->selectSortAsc($arr);
var_dump($arr4);