<?php
/**
 *插入数据
 */
require('DB.class.php');
$db = new DB();
$db->open('dbtest4');


$key1 = 'B';
$value1 = 'B';
$db->insert($key1,$value1);

$db->fetch($key1);