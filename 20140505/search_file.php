<?php
/**
 *查找目录下的某类文件
 */
function search_file($files,$suffix)
{
	$res = array();
	foreach($files as $file)
	{		
		$filename = basename($file);
		$suffix_file = strtoupper(substr(strrchr($file,'.'),1));		
		if($suffix_file == strtoupper($suffix))
		{			
			$res[] = $file;
		}
	}
	return $res;
}
 
 
 
/**
 *遍历某个目录
 *@param string $dir 要遍历的目录
 */
function scan_dir($dir)
{
	$file = array();
	foreach(glob($dir . '/*') as $f)
	{		
		if(is_dir($f))
		{
			scan_dir($f);
		}
		else
		{
			$b_name = basename($f);
			if($b_name =='.' || $b_name == '..')
			{
				continue;
			}			
			$file[] = $f;
		}
	}
	return $file;
}

// test
$dir = 'C:\Users\Administrator\Desktop\pbook';
$dir = str_replace('\\','/',$dir);
$files = scan_dir($dir);
$files2 = search_file($files,'pdf');
foreach($files2 as $file)
{
	echo substr(strrchr($file,'/'),1) . '<br />';
}