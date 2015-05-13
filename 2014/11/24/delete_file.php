<?php
Header('Content-Type:text/html;charset=utf-8');
// $filename = 'delete_file.php';
// var_dump(get_file_suffix($filename));

$dir = 'E:\Github\C';
$type = array('exe','o');
// var_dump(DIRECTORY_SEPARATOR);
delete_file($dir,$type);
//删除文件

function delete_file($dir,$type)
{
	//var_dump(glob($dir . DIRECTORY_SEPARATOR . '*'));EXIT;
	foreach(glob($dir . DIRECTORY_SEPARATOR . '*') as $v)
	{
		if(is_dir($v))
		{
			delete_file($v,$type);
		}
		else
		{
			$suffix = get_file_suffix($v);
			if(in_array($suffix,$type))
			{
				//echo $v . '<br />';
				if(unlink($v))
				{
					printf('删除 %s 成功<br />',$v);
				}
				else
				{
					printf('删除 %s 失败<br />',$v);
				}
			}
		}
	}
}

/**
 *获取文件后缀
 */
function get_file_suffix($filename)
{
	$basename = basename($filename);
	$suffix = ltrim(strrchr($basename,'.'),'.');
	return $suffix;
}