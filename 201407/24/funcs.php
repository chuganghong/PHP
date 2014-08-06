<?php
function checklogin()
{ 
	if(!$_SESSION)
	{
		ob_clean();
		session_start();
	}
	if(empty($_SESSION['user_info']))
	{    //检查一下session是不是为空 
		if(empty($_COOKIE['username']) || empty($_COOKIE['password']))
		{  //如果session为空，并且用户没有选择记录登录状 
			header("location:form.php?req_url=".$_SERVER['REQUEST_URI']);  //转到登录页面，记录请求的url，登录后跳转过去，用户体验好。 
		}
		else
		{   //用户选择了记住登录状态 
			$user = getUserInfo($_COOKIE['username'],$_COOKIE['password']);   //去取用户的个人资料 
			if(empty($user))
			{    //用户名密码不对没到取到信息，转到登录页面 
				header("location:form.php?req_url=".$_SERVER['REQUEST_URI']); 
			}
			else
			{ 
				$_SESSION['user_info'] = $user;   //用户名和密码对了，把用户的个人资料放到session里面 
			} 
		} 
	} 
}


function logout()
{ 
	if(!$_SESSION)
	{
		ob_clean();
		session_start();
	}
	unset($_SESSION['user_info']); 
	if(!empty($_COOKIE['username']) || !empty($_COOKIE['password']))
	{ 
		setcookie("username", null, time()-3600*24*365); 
		setcookie("password", null, time()-3600*24*365); 
		Header('Location:form.php');
	} 
}


function getUserInfo($username,$password)
{
	/* var_dump($username);
	var_dump($password); */
	if($username=='admin'&&$password=='123123')
	{
		$row = array('username'=>$username,'password'=>$password);
		// var_dump($row);
		return $row;
	}
	else
	{
		return false;
	}
}