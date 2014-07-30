<?php
/**
 *@time 2014/07/30 21:42
 *@author cg
 *@description 变量文件夹
 *@param string $dir 文件名
 *@return void
 */
function scan_dir($dir)
{
	foreach(glob($dir . '/*') as $v)
	{
		// echo $v . '<br />';
		if(is_dir($v))
		{
			echo 'dirname: ' . $v . '<br />';
			// scan_dir($dir . '/' . $v);
			scan_dir($v);
		}
		else
		{
			echo 'filename: ' . $v . '<br />';
		}
	}
}
$res = glob("E:/Github/PHP/201407/*");
var_dump($res);
scan_dir('E:/Github/PHP/201407');