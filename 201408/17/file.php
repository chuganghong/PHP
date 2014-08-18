<?php
/**
 *文件操作函数
 *fread($handle,$length)是否只有在mode为r/r+时才能读取数据？若是，
 *w等读写方式，又是什么意思？
 */
$file = 'data.txt';
$fp = fopen($file,'w+b');
if(isset($_GET['s'])&&($_GET['s']==1))
{
	$str = 'Hello world!';
	fwrite($fp,$str,49);
}
var_dump($fp);
$res = fread($fp,1024);
var_dump($res);

