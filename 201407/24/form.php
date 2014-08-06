<?php
if(isset($_GET['ref_url']))
{
	$ref_url = $_GET['ref_url'];
}
else
{
	$ref_url = '';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>记住密码、自动登录</title>
</head>
<body>
<form action="login.php" method="POST">
<p>
	Username:<input type="text" name="username" value=""/>
</p>
<p>
	Passwrod:<input type="password" name="password" value=""/>
	<input type="hidden" name="req_url" value="<?php echo $ref_url; ?>" />
</p>
<p>
	<input type="checkbox" value="1" name="remember" />Remember
</p>
<p>
	<input type="Submit" value="Login" />
</p>
</form>
</body>
</html>