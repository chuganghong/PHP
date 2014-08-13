<?php
/**
 *curl上传文件
 *注意Line35行，必须是完整路径，并且要在路径前面加上@，在upload.php中的$_FILES才有数据
 *注意Line39行，必须是是完整路径
 *注意
 */

// create a file
if(!file_exists('test.txt'))
{
	$fp = fopen('test.txt','ab');
	fwrite($fp,'Hello,world!');
	fclose($fp);
}

foreach(glob('./*') as $v)
{
	print $v . '<br />';
}

$ch = curl_init();

/* $data = array(
	'name'	=>	'Foo',
	'pwd'	=>	'123',
	'email'	=>	'chuganghong@qq.com',
	'file'	=>	'@E:/www/GitHub/PHP/cURL/201408/13/upload/test.txt',
); */

$data = array(
	'name'	=>	'Foo',
	'pwd'	=>	'123',
	'email'	=>	'chuganghong@qq.com',
	'file'	=>	'@F:/2.jpg',
);

// curl_setopt($ch,CURLOPT_URL,'./upload.php');
curl_setopt($ch,CURLOPT_URL,'http://localhost/Github/php/cURL/201408/13/upload/upload.php');
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

curl_exec($ch);

