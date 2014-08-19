<?php
/**
 *解密数据
 */
session_start();
Header('Content-Type:text/html;charset=utf-8');
$res = isset($_SESSION['name'])?'':exit('data does\'t exist!');

// 创建密钥
$key = md5('cg');

// 打开加密算子
$m = mcrypt_module_open('rijndael-256','','cbc','');

// 解码初始化向量
// $iv = base64_decode($_SESSION['iv']);
$iv = $_SESSION['iv'];


// 初始化解密过程
mcrypt_generic_init($m,$key,$iv);

// 解密数据
// $data = mdecrypt_generic($m,base64_decode($_SESSION['name']));
$data = mdecrypt_generic($m,$_SESSION['name']);

// 完成Mcrypt代码
mcrypt_generic_deinit($m);
mcrypt_module_close($m);

echo trim($data);
