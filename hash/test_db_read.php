<?php
/**
 *测试DB.class.php
 */
require('DB.class.php');
$db = new DB();
$db->open('dbtest3');
/* 
try
{
	$host = 'localhost';
	$root = 'root';
	$pwd = '';
	if(!($conn = mysql_connect($host,$root,$pwd)))
	{
		throw new Exception('Error message:' . mysql_error());
	}
	mysql_select_db('meinv',$conn) or die('Can\'t use meinv:' . mysql_error());
	
	mysql_query('SET NAMES utf8');
	
	$arr = array();
	
	$res = mysql_query('SELECT album_title FROM meinv_album LIMIT 300') or die('Error:' . mysql_error());
	
	
	while($row=mysql_fetch_row($res))
	{
		// var_dump($row);
		$arr[] = $row[0];
	}
	
}
catch(Exception $e)
{
	echo $e->getMessage() . '<br />';
}
// var_dump($arr);
// exit();
$start_time = microtime(true);

for($i=0;$i<count($arr);$i++)
{
	$db->insert('key' . $i,'value' . $i);
} 

foreach($arr as $key=>$value)
{
	$db->insert('key' . $key,$value);
}

$end_time = microtime(true);

$db->close();

echo 'process time in ' . ($end_time-$start_time) . ' seconds<br />';

echo '<hr>';
exit();
 */
$start_time = microtime(true);

for($i=0;$i<300;$i++)
{
	$data = $db->fetch("key$i");
	var_dump($data);
}

$end_time = microtime(true);

$db->close();

echo 'process time in ' . ($end_time-$start_time) . ' seconds<br />';