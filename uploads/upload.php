<?php
/**
 *自动创建目录
 *bool mkdir ( string $pathname [, int $mode = 0777 [, bool $recursive = false [, resource $context ]]] )
 *recursive Allows the creation of nested directories specified in the pathname
 *我之前写过自动创建目录的代码，写得比较麻烦，没有想到的是，PHP的mkdir已经实现了
 *自动创建嵌套目录的功能，怪自己对函数的掌握不全面
 *@date 2014/04/30 11:44
 */
$root = dirname(__FILE__);
$targetFolder = $root;
$host = 'http://' . $_SERVER['HTTP_HOST'];
echo $root;
echo '<hr>';
$search = array("E:\www","\\");
$replace = array($host,"/");
$root = str_replace($search,$replace,$root);
echo $root;
echo '<hr>';
echo $_SERVER['DOCUMENT_ROOT'];
echo '<hr>';
echo $_SERVER['HTTP_HOST'];
echo '<hr>';
echo dirname($_SERVER['PHP_SELF']);
echo '<hr>';
// exit;

$y = date('Y',time());
		$m = date('m',time());
		
mkdir($targetFolder . '/a/bc/de/fm','0777',true);
// echo $targetFolder;exit;
		$y = date('Y',time());
		$m = date('m',time());
		$d = date('d',time());
		
		$y = 5;
		$m = 4;
		$d = 3;
		
		if(!file_exists($targetFolder . "/" . $y . "/" . $m . "/" . $d )){
		
			mkdir($targetFolder . "/" . $y . "/" . $m . "/" . $d,"0777",true);
		}