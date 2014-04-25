<?php
/**
 *@description 使用$GLOBALS---引用全局作用域中可用的全部变量
 */
 
//example 1
function test()
{
	$foo = 'local variable';
	
	echo '$foo in global scope: ' . $GLOBALS['foo'] . '<br />';
	echo '$foo in local scope: ' . $foo . '<br />';
}
$foo = php_uname();
test();
echo '<hr>';
//example 2
$conf['conf']['foo'] = 'this is foo';
$conf['conf']['bar'] = 'this is bar';

function foobar()
{
	global $conf;
	var_dump($conf);
	var_dump($GLOBALS['conf']);
}
foobar();