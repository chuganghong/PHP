<?php
/**
 *删除文件
 *@param string $suffix 文件后缀
 */
function delete_file($dir,$suffix)
{
	$msg = '';
	foreach(glob($dir . '/*.' . $suffix) as $filename)
	{
		
		if(unlink($filename))
		{
			$msg .= '删除了' . basename($filename) . '<br />';
		}
			
	}
	echo $msg;
} 
Header('Content-Type:text/html;charset=utf-8');
$dir = '../../python/20140310';
$suffix = 'html';
delete_file($dir,$suffix);