<?php
/**
 *sort
 */
class Sort
{
	public function generateArr()
	{
		for($i=0;$i<5;$i++)
		{
			$arr[] = mt_rand(1,200);
		}
		
		return $arr;
	}
	
	/**
	 *insert sort desc
	 */
	public function insertSortDesc($arr)
	{
		$count = count($arr);
		if($count)
		{
			for($i=1;$i<$count;$i++)
			{
				$j = $i - 1;
				$k = $arr[$i];
				
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
}

//test
$s = new Sort();
$arr = $s->generateArr();
var_dump($arr);
$arr1 = $s->insertSortDesc($arr);
var_dump($arr1);