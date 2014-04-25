<?php
/**
 *检测字符串组成状况
 *@param string $str
 *@return 1--纯英文；2--纯中文；3--中英文混合
 */
function check_str($str = '')
{
	if(trim($str)=='')
	{
		return '';
	}
	
	$m = mb_strlen($str,'utf-8');
	$s = strlen($str);	
	if($s==$m)
	{
		return 1;
	}
	
	if($s%$m==0&&$s%3==0)
	{
		return 2;
	}
	
	return 3;	
}

$str = '你 好';
$res = check_str($str);
var_dump($res);

$str = '你 好hi aq';
$res = check_str($str);
var_dump($res);

$str = 'str_re place';
$res = check_str($str);
var_dump($res);

