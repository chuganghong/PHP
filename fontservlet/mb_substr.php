<?php
Header('Content-Type:text/html;charset=utf-8');
$str = 'Hello 你好';
$start = 0;
$res = getOne($str,$start);
var_dump($res);
function getOne($str,$start,$encoding='utf-8')
{
	$str = mb_substr($str,$start,1,$encoding);
	return $str;
}