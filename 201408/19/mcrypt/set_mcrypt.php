<?php
/**
 *利用mcrypt加密数据
 *这个知识点不难，数个固定的步骤，与生成图像是同一种类型。
 *能记住当然好，也不必刻意去记忆。
 */
session_start();
Header('Content-Type:text/html;charset=utf-8');
// 定义密钥和数据
$key = md5('cg');
$data = 'My name is ggh.';

// 打开加密算法
$m = mcrypt_module_open('rijndael-256','','cbc','');

// 创建初始化向量
$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($m),MCRYPT_DEV_RANDOM);
// save($iv);

// 加密初始化
mcrypt_generic_init($m,$key,$iv);

// 加密数据
$data = mcrypt_generic($m,$data);
// var_dump($data);//看到的是乱码

// 关闭所有的缓存和模块
mcrypt_generic_deinit($m);
mcrypt_module_close($m);
// var_dump($data);//看到的是乱码

// 将数据保存到SESSION中
/* $_SESSION['name'] = base64_encode($data);
$_SESSION['iv'] = base64_encode($iv); */

$_SESSION['name'] = $data;
$_SESSION['iv'] = $iv;

$format = 'The data has been stored.Its vaue is %s.';
printf($format,base64_encode($data));


/**
 *把数据写入文本文件
 */
function save($data,$file='data.txt')
{
	$fp = fopen($file,'wb');
	fwrite($fp,$data,strlen($data));
	fclose($fp);
}

?>
