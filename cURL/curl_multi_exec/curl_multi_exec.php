<?php
/**
 *@filename curl_multi_exec.php
 *@description cURL批处理代码
 *@date 2014/04/27 22:45
 */
// 创建两个cURL资源
$ch1 = curl_init();
$ch2 = curl_init();

// 指定URL和适当的参数
curl_setopt($ch1,CURLOPT_URL,'http://www.hao123.com');
curl_setopt($ch1,CURLOPT_HEADER,0);

curl_setopt($ch2,CURLOPT_URL,'http://www.baidu.com');
curl_setopt($ch2,CURLOPT_HEADER,0);

//创建批处理句柄
$mh = curl_multi_init();
// 加上前面两个资源句柄
curl_multi_add_handle($mh,$ch1);
curl_multi_add_handle($mh,$ch2);

$running=null;
// 执行批处理句柄
do {
    usleep(40000);
    curl_multi_exec($mh,$running);
} while ($running > 0);

// 关闭全部句柄
curl_multi_remove_handle($mh, $ch1);
curl_multi_remove_handle($mh, $ch2);
curl_multi_close($mh);

/*
// 预定义一个状态变量
$active = null;

// 执行批处理
do
{
	$mrc = curl_multi_exec($mh,$active);
}while($mrc == CURLM_CALL_MULTI_PERFORM);

while($active && $mrc==CURLM_OK)
{
	if(curl_multi_select($mh,$active)!=-1)
	{
		do
		{
			$mrc = curl_multi_exec($mh,$active);
		}while($mrc == CURLM_CALL_MULTI_PERFORM);
	}
}
// 关闭各个句柄
curl_multi_remove_handle($mh,$ch1);
curl_multi_remove_handle($mh,$ch2);
curl_multi_close($mh);
*/
