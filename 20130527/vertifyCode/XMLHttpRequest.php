<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<script type="text/javascript">
function verIm()
{
	
	var xmlHttp;
	if( window.XMLHttpRequest )
	{
		xmlHttp = new XMLHttpRequest();
	}
	else
	{
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var str = '';
	for(i=0;i<4;i++)
	{
		var number1 = Math.random()*26;   //0到1之间，包括0，不包括1;0到26之间，包括0，不包括26	
		var number2 = Math.floor(number1);
		var number3 = number2+65;
		var number4 = number2+97;
		str += String.fromCharCode(number3);
	}
	alert(str);
	var url = "imagecreatetruecolor.php?sid=" + Math.random() + "&code=" + str;
	document.getElementById("vertify2").value = str;
	xmlHttp.open("GET",url,true);
	xmlHttp.send();
	xmlHttp.onreadystatechange = function()
	{
		if( xmlHttp.readyState==4 && xmlHttp.status==200 )
		{
			document.getElementById("vertifyIm").src=url;
		}
	}
}

function check()
{
	vertify = document.getElementById("vertify").value;
	vertify2 = document.getElementById("vertify2").value;
	vertify = vertify.toUpperCase();
	vertify2 = vertify2.toUpperCase();
	
	if( vertify2 == vertify )
	{
		alert("Correct");
	}
	else
	{
		alert("False");
	}
}
</script>
<title>验证码</title>
</head>
<body>
<p>输入验证码：<input type="text" name="vertify" id="vertify" onblur="check()" /><img onclick="verIm()" src="imagecreatetruecolor.php?code=aswt" id="vertifyIm" /></p>
<input type="hidden" id="vertify2" value="aswt"/>
<script type="text/javascript">
//alert(charCodeAt('a'));
</script>
</body>
</html>