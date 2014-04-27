<?php
/**
 *@filename curl1.php
 *@description PHP中使用cURL传送数据
 *@date 2014/04/27 22:26
 */
// $url = 'post_output.php';//417 - Expectation Failed
$url = 'http://localhost/curl/curl1/post_output.php'; 	//此次的url必须是完整的路径
$post_data = array(
	'foo' => 'bar',
	'query' => 'php',
	'action' => 'Submit',
);
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//设置为POST
curl_setopt($ch,CURLOPT_POST,1);
//把POST的变量加上
curl_setopt($ch,CURLOPT_POSTFIELDS,$post_data);
$output = curl_exec($ch);
curl_close($ch);
echo $output;