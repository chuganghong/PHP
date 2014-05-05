<?php
/**
 *检测PHP向文件写入整数的情况
 *@date 2014/05/02 14:05
 */
function save($filename,$data=12)
{
	if(!file_exists($filename))
	{
		$mode = 'w+b';
	}
	else
	{
		$mode = 'r+b';
	}
	
	$fp = fopen($filename,$mode);
	fwrite($fp,$data,strlen($data));
	fclose($fp);
}

function read($filename)
{
	$fp = fopen($filename,'rb');
	if($fp)
	{
		$data = fread($fp,filesize($filename));
	}
	else
	{
		$data = NULL;
	}
	return $data;
}

// TEST

$filename = 'data.dat';
$data = 12;
save($filename,$data);
$str = read($filename);
$bin1 = decbin($str);
var_dump($bin1);
$bin2 = decbin(12);
var_dump($bin2);