<?php
/**
 *func_get_args()
 *func_get_arg()
 */
//func_get_args()
function foo1()
{
	var_dump(func_get_args());
}
foo1(2,3,4,'A',time());
//func_get_arg()
function foo2()
{
	//func_get_
	var_dump(func_get_arg(1));
}
foo2(2,4,5);