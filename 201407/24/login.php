<?php
require('funcs.php');
// error_reporting(0);
echo time();exit;
var_dump($_POST);
$username = trim($_POST['username']); 
$password = trim($_POST['password']); 
// $validatecode = $_POST['validateCode']; 
// $ref_url = $_GET['req_url']; 
if(isset($_POST['req_url']))
{
	$ref_url = $_POST['req_url'];
}
$remember = $_POST['remember']; 


 
$err_msg = ''; 
if($username=='' || $password==''){ 
$err_msg = "用户名和密码都不能为空"; 
}else{ 
$row = getUserInfo($username,$password); 

// var_dump($row);exit;

if(empty($row)){ 
$err_msg = "用户名和密码都不正确"; 
}else{ 
$_SESSION['user_info'] = $row; 
if(!empty($remember)){     //如果用户选择了，记录登录状态就把用户名和加了密的密码放到cookie里面 
setcookie("username", $username, time()+3600*24*365); 
setcookie("password", $password, time()+3600*24*365); 
}

// var_dump($ref_url);

 
if(strpos($ref_url,"form.php") === false){ 
header("location:".$ref_url); 
}else{ 
header("location:main_user.php"); 
} 
} 
}


