<?php
/**
 *疑问：为什么在初次运行此代码的时候，会报错：$_COOKIE['user']未设置？
 *功能：php流量统计功能的实现代码
 *流量数据
 *总访问量：399
 *今日流量：14
 *昨日流量：16 
 *用json格式保存数据
 *array('Counter'=>'总访问量',
		'CounterToday'=>'今日流量',
		'CounterLastDay'=>'昨日流量',
		'RecordDate'=>'访问时间'
		);
 */
error_reporting(0);   // 关闭所有PHP错误报告
date_default_timezone_set('PRC');

if(!isset($_COOKIE['user']))
{
	setcookie('user','newGuest',time()+3600);	
}
else
{
	setcookie('user','oldGuest');
	
}
$file = 'data.txt';   //存储访问数据的文件
if(file_exists($file))
{	
	$json = file_get_contents($file);
	//var_dump($json);
	$arr = json_decode($json,true);
	
	$Counter = $arr['Counter'];
	$CounterToday = $arr['CounterToday'];
	$CounterLastday = $arr['CounterLastDay'];
	$RecordDate = $arr['RecordDate'];
	
	$now = date('Y-m-d');
	$now = explode('-',$now);
	$RecordDate = date('Y-m-d',$RecordDate);
	$RecordDate = explode('-',$RecordDate);
	
	
	if($now[0]>$RecordDate[0])
	{
		$isGone = true;
		
	}
	else if($now[0]==$RecordDate[0])
	{
		if($now[1]>$RecordDate[1])
		{
			$isGone = true;
		}
		else if($now[1]==$RecordDate[1])
		{
			if($now[2]>$RecordDate[2])
			{
				$isGone = true;
				
			}
			else
			{
				$isGone = false;
				
			}
		}
	}	
	if($_COOKIE['user'] != 'oldGuest'):	
	if($isGone)
	{
		//过了一天，更新今日访问量、访问总量、访问时间、昨日访问量
		$arr['CounterLastDay'] = $arr['CounterToday'];
		$arr['CounterToday'] = 1;
		$arr['Counter']++;
		$arr['RecordDate'] = time();		
	}
	else
	{
		//当天，更新今日访问量、访问总量
		$arr['CounterToday']++;
		$arr['Counter']++;
	}
	endif;
	$json = json_encode($arr);
	file_put_contents($file,$json);
	
}
else
{
	//
	$data = array('Counter'=>'0',
		'CounterToday'=>'0',
		'CounterLastDay'=>'0',
		'RecordDate'=>'0'
		);
	$json = json_encode($data);
	file_put_contents($file,$json);
}
Header('Content-Type:text/html;charset=utf-8');
$msg = '总访问量：' . $arr['Counter'] . '<br />';
$msg .= '昨日流量：' . $arr['CounterLastDay'] . '<br />';
$msg .= '今日流量：' . $arr['CounterToday'] . '<br />';
$msg .= '访问时间：' . date('Y-m-d H:i:s',$arr['RecordDate']). '<br />';
echo $msg;
echo '<hr>';
echo printf('时区：%s',date_default_timezone_get());
