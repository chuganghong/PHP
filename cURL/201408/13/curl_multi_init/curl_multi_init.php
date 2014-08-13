<?php
/**
 *curl_multi_init()
 */
// 创建一对cURL资源
$ch1 = curl_init();
$ch2 = curl_init();
$ch3 = curl_init();
$ch4 = curl_init();

// 设置URL和相应的选项
curl_setopt($ch1, CURLOPT_URL, "http://www.hao123.com/");
curl_setopt($ch1, CURLOPT_HEADER, 1);
curl_setopt($ch2, CURLOPT_URL, "http://www.baidu.com/");
curl_setopt($ch2, CURLOPT_HEADER,0);
/* curl_setopt($ch3,CURLOPT_URL,'http://www.wangye.com');
curl_setopt($ch3, CURLOPT_HEADER, 0); */
curl_setopt($ch4,CURLOPT_URL,'http://www.163.com');
curl_setopt($ch4, CURLOPT_HEADER, 0);

// 创建批处理cURL句柄
$mh = curl_multi_init();

// 增加4个句柄
curl_multi_add_handle($mh,$ch1);
curl_multi_add_handle($mh,$ch2);
// curl_multi_add_handle($mh,$ch3);
curl_multi_add_handle($mh,$ch4);

$running=null;
// 执行批处理句柄
do {
    usleep(10000);
    curl_multi_exec($mh,$running);
} while ($running > 0);

// 关闭全部句柄
curl_multi_remove_handle($mh, $ch1);
curl_multi_remove_handle($mh, $ch2);
// curl_multi_remove_handle($mh,$ch3);
curl_multi_remove_handle($mh,$ch4);
curl_multi_close($mh);

?>