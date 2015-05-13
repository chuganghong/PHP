<?php
/**
 *cg
 *2015/01/19 21:32
 *遍历目录，并删除文件
 */
Header('Content-Type:text/html;charset=utf-8');
$dir = 'E:\code\c';
scan_dir($dir); 
 
function scan_dir($dir)
{
	foreach(glob($dir . "/*") as $v)
	{
		if(is_dir($v))
			scan_dir($v);
		else
		{
			if(check_file($v))
			{
				if(unlink($v))
					printf("删除 %s 成功<br />",$v);
				else
					printf("删除 %s 失败<br />",$v);
			}
		}
	}
}

/**
 *检测是否是.o或.exe文件
 */
function check_file($file)
{
	$suffix_arr = array('exe','o');
	$arr = explode('.',$file);
	$suffix = array_pop($arr);
	return in_array($suffix,$suffix_arr);
}