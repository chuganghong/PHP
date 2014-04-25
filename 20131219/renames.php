<?php
$sou = 'html';
$dest = 'dwt';
renames($sou,$dest);




/**
 *将file.html改名为file.dwt
 *@param string $sou 原文件的后缀名，比如html
 *@param string $dest 新文件的后缀名，比如dwt
 *@param string $dir 原文件所在的目录，默认为当前目录'./'
 *@date 2013/12/19 14：31
 */ 
function renames($sou,$dest,$dir = './')
{
	foreach(glob($dir . '*') as $v)
	{
		$dest_file = '';		
		$suffix = strrchr($v,'.');		
		$suffix = substr($suffix,1);
		if($suffix == $sou)
		{			
			$v2 = basename($v);			
			$filename = strstr($v2,'.',true);			
			$dest_file .=  $dir . $filename . '.' . $dest;			
			echo sprintf('%s',$dest_file) . '<br />';
			rename($v,$dest_file);
		}
	}
}


	