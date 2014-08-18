<?php
/**
 *使用memcache缓存数据库的查询结果
 */
Header('Content-Type:text/html;charset=utf-8');
$mc = new Memcache();
$conn = $mc->connect('127.0.0.1',11211);
var_dump($conn);
$tid = isset($_GET['tid'])?int($_GET['tid']):2;
/**
 *当此sql读取的数据很大时，将查询结果存储到memcached中就失败；
 *我将读取的数据慢慢调小，终于可以成功将数据存储到memcached中了。
 *这说明，Memcached默认只能存储不大于1M的数据。
 */
$sql = 'SELECT * FROM dht_file WHERE f_id<10';
$key = md5($sql);
var_dump($key);

$start_time = microtime(true);
if(!($data = $mc->get($key)))
{
	// echo time();exit;
	$conn = mysql_connect('localhost','root','') or die ('Error:' . mysql_error());
	mysql_select_db('dht',$conn) or die('Error:' . mysql_error());
	mysql_query('SET NAMES utf8');
	
	$res = mysql_query($sql);
	// var_dump($res);
	
	while($row=mysql_fetch_assoc($res))
	{
		// var_dump($row);
		$data[] = $row;
	}
	
	// $mc->set($key,$data);
	echo 2;
	var_dump($mc->add($key,$data));
}
$end_time = microtime(true);

$cost_time = $end_time-$start_time;

$format = 'Cost time %d.<br />';
printf($format,$cost_time);
// var_dump($data);
$data2 = $mc->get($key);
var_dump(strlen($data2));

