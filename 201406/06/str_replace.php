<?php
/**
 *str_replace($search,$replace,$str)
 */
Header('Content-Type:text/html;charset=utf-8');
$search = array(0=>'{title}','{a}','{b}');
$replace1 = array('标题','小a','大A');
$str = '{title}是什么？这是{a},那是{b}';
$res = str_replace($search,$replace1,$str);

var_dump($str);
var_dump($res);
$replace2 = array('','','大A');
$res2 = str_replace($search,$replace2,$str);
var_dump($res2);

$search = array('{title}','{a}','{b}');
$replace1 = array('标题','小a','大A');
$str = '{title}是什么？这是{a},那是{b}';
$res = str_replace($search,$replace1,$str);

var_dump($str);
var_dump($res);

$arr = array();
$keys = array_keys($arr);
var_dump($keys);
foreach($keys as $v)
{
	echo $v;
}
$vs = array_values($arr);
$res = str_replace($keys,$vs,$str);
var_dump($res);