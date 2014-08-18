<?php
/**
 *使用memcache扩展
 */
// 创建Memcache对象
$mc = new Memcache();
// 连接memcache服务器
$mc->connect('127.0.0.1',11211);
$mc->set('key','values',0,10);
$value = $mc->get('key');
var_dump($value);
$mc->delete('key');
$value = $mc->get('key');
var_dump($value);
$mc->flush();
$mc->close();