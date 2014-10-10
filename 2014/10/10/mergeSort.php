<?php
/**
 *归并排序
 */
class Sort
{
	private $arr;
	public function __construct()
	{
		$arr = array();

		for($i=0;$i<5;$i++)
		{
			$arr[] = mt_rand(0,200);
		}

		$this->arr = $arr;
	}

	public function __get($name)
	{
		return $this->$name;
	}

	public function mergeArr($arr_left,$arr_right)
	{
		$arr = array();

		while( count($arr_left)&&count($arr_right) )
		{
			$arr[] = $arr_left[0]<$arr_right[0]?array_shift($arr_left):array_shitf($arr_right);
		}

		return array_merge($arr,$arr_left,$arr_right);
	}


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

			$arr = array_merge($arr_left,$arr_right);
		}

		return $arr;
	}


}

//test
$s = new Sort();
$arr = $s->__get('arr');
var_dump($arr);
$arr_left = array(0,2,4);
$arr_right = array(5,7,9);
$arr_new = $s->mergeArr($arr_left,$arr_right);
var_dump($arr_new);
$arr1 = $s->mergeSortAsc($arr);
var_dump($arr1);