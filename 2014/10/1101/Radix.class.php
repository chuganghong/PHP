<?php
/**
 *radix sort---搞不定
 */
class Radix
{
	
	/**
	 *

	/**
	 *获得一个数的每位上的数
	 */
	public function getSingal($int)
	{
		settype($int,'string');
		$len = strlen($int);
		for($i=0;$i<$len;$i++)
		{
			var_dump($int[$i]);
		}
	}

	/**
	 *根据个位来排序 asc
	 */
	public function sortByUnit($arr)
	{
		$arr = $this->sortBy($arr);
		// var_dump($arr);
		$count = count($arr);
		for($i=1;$i<$count;$i++)
		{
			$max_k = strlen($arr[$i])-1;
			$k = $arr[$i][$max_k];

			$j = $i-1;
			//var_dump($j);

			while( ($j>=0)&&($k>$arr[$j][strlen($arr[$j])-1]) )
			{
				var_dump($j);
				var_dump($arr[$j]);
				/*var_dump($j);
				var_dump($arr[$j]);
				var_dump($arr[$j][strlen($arr[$j])-1]);*/
				$arr[$j+1] = $arr[$j];
				$j--;
			}

			$arr[$j+1] = $arr[$i];
		}

		return $arr;
	}

	/**
	 *根据个位来排序
	 */
	public function sortBy($arr)
	{
		$count = count($arr);

		for($i=0;$i<$count;$i++)
		{
			settype($arr[$i],'string');
		}

		return $arr;
		
	}
}

$r= new Radix();
$arr = array(541,789,302,432);
$r->sortBy($arr);
$arr1 = $r->sortByUnit($arr);
var_dump($arr1);