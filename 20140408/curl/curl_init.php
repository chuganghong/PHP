<?php
// 创建一个新cURL资源
$ch = curl_init();

// 设置URL和相应的选项
$url = 'http://bai.com';
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_HEADER,1);

// 抓取URL并把它传递给浏览器
curl_exec($ch);

// 关闭cURL资源，并且释放系统资源
curl_close($ch);