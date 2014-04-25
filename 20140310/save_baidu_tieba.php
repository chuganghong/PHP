<?php
/**
 *下载百度贴吧网页
 *@param string $url 要下载的目标网址
 *@param integer $start 开始下载的页码数
 *@param integer $end 停止下载的页码数
 */
function save_baidu_tieba($url,$start,$end)
{
	for($i = 1;$i <= $end; $i++)
	{		
		$url2 = $url . $i;
		$html = file_get_contents($url2);
		if(file_put_contents($i . '.html',$html))
		{
			$msg = '成功保存' . $i . '.html' . '网易<br />';
			echo $msg;
		}
	}
}

$url = 'http://tieba.baidu.com/p/2908399462?pn=';
$start = 1;
$end = 10;
save_baidu_tieba($url,$start,$end);