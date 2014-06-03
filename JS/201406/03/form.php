<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>用新方法document取得FORM中的元素的value</title>
<script>
function sub()
{
	var name = document.forms['theForm'].elements['name'].value;
	var sex = document.forms['theForm'].elements['sex'].value;
	alert(name);
	alert(sex);
	return false;
}
</script>
</head>
<body>
<form action="" method="POST" name="theForm" onSubmit="return sub()">
<p>
	Username:<input type="text" name="name" value="" />
</p>
<p>
	<select name="sex">
		<option value="0">男
		<option value="1">女
	</select>
</p>
<p>
	<input type="submit" value="Submit">
</p>
</form>
</body>
</html>
