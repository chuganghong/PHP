<?php
var_dump($_GET);
// var_dump($_SERVER['HTTP_REFERER']);
// var_dump($_SERVER);
$cur_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['REQUEST_URI'];
// var_dump($cur_url);

$suffix = get_suffix($cur_url);
var_dump($suffix);
function get_suffix($url)
{
	$pos = strrpos('/',$url);
	$str = substr($url,$pos);
	$arr = explode('.',$str);
	$res = $arr[1];
	return strpos('?',$res)?strstr($res,'?',true):$res;	
}