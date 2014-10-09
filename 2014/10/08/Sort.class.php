<?php
/**
 *插入排序
 */
class Sort
{
	private $num = 5;
	private $min = 1;
	private $max = 200;

	/**
	 *生成一个数字数组
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
	public function insertSortDesc($arr)
	{
		$count = count($arr);

		if($count>1)
		{
			for($i=1;$i<$count;$i++)
			{
				$k = $arr[$i];
				$j = $i-1;

				while( ($j>=0)&&($k>$arr[$j]) )
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

				while( ($j>=0)&&($k<$arr[$j]) )
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
					$temp = $arr[$i];
					$arr[$i] = $arr[$j];
					$arr[$j] = $temp;
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

			$arr = array_merge($x,array($k),$y);

			return $arr;
		}
		else
		{
			return $arr;
		}
	}

	/**
	 *quick sort asc
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
				if($arr[$i]<$k)
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
			$arr = array_merge($y,array($k),$x);

			return $arr;
		}
		else
		{
			return $arr;
		}
	}

	/**
	 *selection sort asc
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
	 *selection sort desc
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
				$arr[$max] = $tmp;
			}
		}

		return $arr;
	}
}


//test
$s = new Sort();
$arr = $s->generateArr();
var_dump($arr);
/*$arr1 = $s->insertSortDesc($arr);
var_dump($arr1);
$arr2 = $s->insertSortAsc($arr);
var_dump($arr2);
$arr3 = $s->bubbleSortAsc($arr);
var_dump($arr3);
$arr4 = $s->bubbleSortDesc($arr);
var_dump($arr4);
$arr5 = $s->quickSortAsc($arr);
var_dump($arr5);*/
$arr6 = $s->quickSortDesc($arr);
var_dump($arr6);
$arr7 = $s->selectSortAsc($arr);
var_dump($arr7);
$arr8 = $s->selectSortDesc($arr);
var_dump($arr8);
