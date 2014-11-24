<?php
//str_replace($search,$replace,$subject)
$search = array(':a',':b');
$replace = array('t'=>'A','g'=>'B');
$subject = 'where a=:a AND b=:b';
$res = str_replace($search,$replace,$subject);
var_dump($res);

$set = '';
$replace = formatData($replace);
foreach($replace as $k=>$v)
{
	$set .= $k . '=' . $v . ' AND ';
}
$set = rtrim($set,' AND ');
var_dump($set);


/*
	 *处理数组，将数组中的元素加上引号
	 */
	function formatData($arr)
	{
		foreach($arr as $k=>$v)
		{
			$arr[$k] = '\'' . $v . '\'';
		}
		return $arr;
	}