<?php
//遍历目录
$start = microtime(true);
set_time_limit(0);
$preDir = 'D:/wamp/www/GitHub/photo20130427/meinv';
_scandir($preDir,true);
$end = microtime(true);
$cost = $end-$start;
$msg = 'Cost time:' . $cost . 'secondes.';
echo $msg;
/**
 *遍历地删除或显示文件目录
 *@param string $dir 文件目录名
 *@param boolean $bool 控制是删除文件还是输出文件名：true--删除，false---输出
 */
function _scandir($dir,$bool)
{	
	foreach(glob($dir . '/*') as $k1=>$v1)
	{
		if(($v1==='.')||($v1==='..'))
		{
			break;
		}
		if(is_dir($v1))
		{
			//echo $k1 . '---' . $v1 . '<br />';
			_scandir($v1,true);
		}
		else
		{			
			$bool==true?unlink($v1):(print $v1 . '<br />');
		}
	}
}
