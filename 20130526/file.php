<?php
//整理文本：去除空格等
$str = file('1.txt');
var_dump($str);
echo '<hr>';
for($i=0;$i<7;$i++)
{
	var_dump($str[$i]);
}
array_walk($str,'clean');
function clean(&$v,$k)
{
	//$v=str_replace(' ','',$v);
	$pattern = '/[\s\n]*/i';
	preg_replace($pattern,'',$v);
}
var_dump($str);
var_dump('');
var_dump('    ');
$a = '       ';
if(empty($a[0]))
{
	echo 'yes<br />';
}
else
{
	echo 'no<br />';
}
var_dump((bool)($a[0]));
var_dump($str);
foreach($str as $v)
{
	if( strlen($v) != 2)
	{
		$new[] = $v;
	}
}
var_dump($new);
$fp = fopen('2.txt','a');
foreach($new as $v)
{
	$vv = '<p>' . $v . '</p>';
	fwrite($fp,$vv);
}
fclose($fp);
