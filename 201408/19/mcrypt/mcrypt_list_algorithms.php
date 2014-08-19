<?php
// 本PHP安装程序支持的加密算法
$algorithms = mcrypt_list_algorithms();
var_dump($algorithms);
$modes = mcrypt_list_modes();
var_dump($modes);