<?php
/**
 *格式化URL，加上http
 */
function convert_url($url)
{
	$pos = strpos($url,'http');
	$pos2 = strpos($url,'https');
	
	if($pos===0 || $pos2===0)
	{
		return $url;
	}
	else
	{
		$url = 'http://' . $url;
		return $url;
	}
}

$url1 = 'www.baidu.com';
$url1 = convert_url($url1);
var_dump($url1);
$url1 = 'http:www.baidu.com';
$url1 = convert_url($url1);
var_dump($url1);