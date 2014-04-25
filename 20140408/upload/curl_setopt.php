<?php
// cURL上传文件

$ch = curl_init();

$path = '@E:/www/Github/PHPClassFunctions/20140408/upload/test.jpg';
$data = array('name'=>'Foo','file'=>$path);

curl_setopt($ch,CURLOPT_URL,'http://localhost/Github/PHPClassFunctions/20140408/upload/upload.php');
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

curl_exec($ch);