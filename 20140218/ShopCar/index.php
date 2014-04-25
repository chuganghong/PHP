<?php
require 'Shopcar.class.php';
session_start();

$name=$_POST['name'];
$num=$_POST['num'];
$price=$_POST['price'];
/*
$name = 'name';
$num = 4;
$price = 5;
*/
$product=array('name'=>$name,'num'=>$num,'price'=>$price);
print_r($product);
var_dump($product);
if(isset($_SESSION['shopcar']))
$shopcar=unserialize($_SESSION['shopcar']);
else
$shopcar=new Shopcar();
if($_REQUEST['act']=='add')
{
	$shopcar->add($product);
}
elseif($_REQUEST['act']=='delete')
{
	$shopcar->delete($product);
}
$_SESSION['shopcar']=serialize($shopcar); 